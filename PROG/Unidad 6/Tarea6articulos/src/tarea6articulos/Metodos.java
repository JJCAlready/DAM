/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea6articulos;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.logging.Level;
import java.util.logging.Logger;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 *
 * @author avanza
 */
public class Metodos {
     // métodos para interactuar con el programa principal
    BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
    Articulos articulo = new Articulos();
    public boolean check_archivo(String ruta){
        boolean check = false;
        ruta = substFileSeparator(ruta);
        if(new File(ruta).exists()){
            check = true;
        }
        return check;
    }
    public void add_articulo() throws IOException{
        
        Articulos articulo = do_add_checks();
        
        // Comprueba si existe el archivo
        String ruta = substFileSeparator("articulos.dat");
        File f_articulos = new File(ruta);
        if(!(check_archivo(ruta))){
            try{
                f_articulos.createNewFile();
            } catch (IOException e){
                System.out.println("Error al crear el archivo");
                System.out.println(e);
            }
        }
        /* Comprueba si existe el artículo
           Si no existe lo anadimos al archivo
        */
        if(!(check_objects(articulo, f_articulos))){
            try{
                FileOutputStream fos = new FileOutputStream(f_articulos, true);
                ObjectOutputStream oos = new ObjectOutputStream(fos);
                oos.writeObject(articulo);
                oos.close();
            }catch(IOException e){
                System.out.println("Error al escribir en el archivo");
                System.out.println(e);
            }
        }
        
        
    }
    boolean check_objects(Articulos articulo, File fichero) throws IOException{
        boolean check = false;
        boolean cont = true;
        FileInputStream fis = null;
        if (fichero.length()!=0){
            try {
                fis = new FileInputStream(fichero);
            } catch (FileNotFoundException ex) {
                System.out.println("Error, archivo no encontrado");
            }
            while (fis.available()>0) {
                try  {
                  ObjectInputStream input = new ObjectInputStream(fis);
                  Articulos obj = (Articulos) input.readObject();
                  
                    if(obj.getCodigoBarra().equals(articulo.getCodigoBarra())){
                        System.out.println("El artículo ya existe");
                        check = true;
                    }
                      
                }catch (FileNotFoundException ex) {
                    System.out.println("Error, archivo no encontrado");
                } catch (IOException ex) {
                    System.out.println("Error al leer del archivo");
                    System.out.println(ex);
                } catch (ClassNotFoundException ex) {
                    Logger.getLogger(Articulos.class.getName()).log(Level.SEVERE, null, ex);
                }
                
            }
            fis.close();
        }
        return check;
    }
    public void list_articulos() throws IOException{
        // Comprueba si existe el archivo
        String ruta = substFileSeparator("articulos.dat");
        File fichero = new File(ruta);
        if(!(check_archivo(ruta))){
            try{
                fichero.createNewFile();
            } catch (IOException e){
                System.out.println("Error al crear el archivo");
                System.out.println(e);
            }
        }
        if (fichero.length()!=0){
            // Inicializo el InputStream
            FileInputStream fis = null;
            try {
                fis = new FileInputStream(fichero);
            } catch (FileNotFoundException ex) {
                System.out.println("Error, archivo no encontrado");
            }

            /* Con un bucle while itero a través de los objetos,
                e imprimo por pantalla con el método toString de cada uno
            */
            Articulos obj = new Articulos();
            while (fis.available()>0) {
                try  {
                  ObjectInputStream input = new ObjectInputStream(fis);
                  obj = (Articulos)input.readObject();
                  System.out.print(obj.toString());
                }catch (FileNotFoundException ex) {
                    System.out.println("Error, archivo no encontrado");
                } catch (IOException ex) {
                    System.out.println("Error al leer del archivo");
                    System.out.println(ex);
                } catch (ClassNotFoundException ex) {
                    Logger.getLogger(Articulos.class.getName()).log(Level.SEVERE, null, ex);
                }catch(Exception ex){
                    System.out.println(ex);
                }
            }
            fis.close();
        }
        
    }
    public void search_articulo() throws IOException{
        // Comprueba si existe el archivo
        String codigoBarra="";
        String ruta = substFileSeparator("articulos.dat");
        File fichero = new File(ruta);
        if(!(check_archivo(ruta))){
            try{
                fichero.createNewFile();
            } catch (IOException e){
                System.out.println("Error al crear el archivo");
                System.out.println(e);
            }
        }
        FileInputStream fis = null;
        
        System.out.println("Introduce el código de barras");
        try {
            codigoBarra = teclado.readLine();
        } catch (IOException ex) {
            System.out.println("Error al código de barras");
        }
        if(check_codigoBarra(codigoBarra)!=codigoBarra){
            System.out.println("El artículo solicitado no existe");
            return;
        }
        try {
            fis = new FileInputStream(fichero);
        } catch (FileNotFoundException ex) {
            System.out.println("Error, archivo no encontrado");
        }
        while (fis.available()>0) {
            try  {
                ObjectInputStream input = new ObjectInputStream(fis);
                Articulos obj = (Articulos) input.readObject();
              
                 if(obj.getCodigoBarra().equals(codigoBarra)){
                    System.out.print(obj.toString());
                }
              
            }catch (FileNotFoundException ex) {
                System.out.println("Error, archivo no encontrado");
                System.out.println(ex);
            } catch (IOException ex) {
                System.out.println("Error al leer del archivo");
                System.out.println(ex);
            } catch (ClassNotFoundException ex) {
                Logger.getLogger(Articulos.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }
    public void delete_file(){
        String ruta = "articulos.dat";
        if(check_archivo(ruta)){
            try{         
                File f= new File(ruta);
                if(f.delete()){  
                    System.out.println(f.getName() + " deleted");   
                }  
                else{  
                    System.out.println("Error al borrar el fichero");
                }  
            }catch(Exception e){
                System.out.println("Error al borrar el fichero");
                System.out.println(e);
            }  
        }
    }
    
    // validaciones de entrada
    public String check_codigoBarra(String codigoBarra){
        Pattern p = Pattern.compile("[0-9a-zA-Z]{7}");
        Matcher m = p.matcher(codigoBarra);
        if(!m.matches()){
            System.out.println("El código de barras debe ser alfanumérico y debe tener 7 caracteres");
            return null;
        }
        return codigoBarra;
    }
    public String check_nombre(String nombre){
        Pattern p = Pattern.compile("[a-zA-Z]*");
        Matcher m = p.matcher(nombre);
        if(!m.matches()){
            System.out.println("El nombre no debe contener números");
            return null;
        }
        return nombre;
    }
    public int check_unidades(String unidades){
        int unds;
        try{
            unds = Integer.parseInt(unidades);
        }catch(NumberFormatException ex){
            System.out.println("Error, introduce un número");
            return 0;
        }
        return unds;
    }
    public float check_precio(String precio){
        float prc;
        try{
            prc = Float.parseFloat(precio);
        }catch(NumberFormatException ex){
            System.out.println("Error, introduce el precio correcto");
            return 0;
        }
        return prc;
    }
    
    public Articulos do_add_checks() throws NumberFormatException {
        Articulos articulo = new Articulos();
        String check_input="";
        // validar el código de barras
        do{
            System.out.println("Introduce el código de barras");
            try {
                check_input = teclado.readLine();
            } catch (IOException ex) {
                System.out.println("Error, vuelve a introducir el código de barras");
            }
        }while(check_codigoBarra(check_input)!=check_input);
        articulo.setCodigoBarra(check_input);
        
        // validar el nombre
        do{
            System.out.println("Introduce el nombre");
            try {
                check_input = teclado.readLine();
            } catch (IOException ex) {
                System.out.println("Error, vuelve a introducir el nombre");
            }
        }while(check_nombre(check_input)!=check_input);
        articulo.setNombre(check_input);
        
        //validar las unidades
        int unidades_check = 0;
        do{
            System.out.println("Introduce las unidades");
            try {
                check_input = teclado.readLine();
                unidades_check = Integer.parseInt(check_input);
            } catch (NumberFormatException | IOException ex) {
                System.out.println("Error, vuelve a introducir las unidades");
            } 
        }while(check_unidades(check_input)!=unidades_check);
        articulo.setUnidades(Integer.parseInt(check_input));
        
        // validar el precio
        float precio_check=0f;
        do{
            System.out.println("Introduce el precio");
            try {
                check_input = teclado.readLine();
                precio_check = Float.parseFloat(check_input);
            } catch (NumberFormatException | IOException ex) {
                System.out.println("Error, vuelve a introducir las unidades");
            }
        }while(check_precio(check_input)!=precio_check);
        articulo.setPrecio(Float.parseFloat(check_input));
        return articulo;
    }
    // Normalización de la ruta
    String substFileSeparator(String ruta){
        String separador = "\\";
        try{
        // Si estamos en Windows
           if ( File.separator.equals(separador) )
                separador = "/" ;
        // Reemplaza todas las cadenas que coinciden con la expresión
        // regular dada oldSep por la cadena File.separator
           return ruta.replaceAll(separador, File.separator);
        }catch(Exception e){
        // Por si ocurre una java.util.regex.PatternSyntaxException
           return ruta.replaceAll(separador + separador, File.separator);
        }
    }
}
