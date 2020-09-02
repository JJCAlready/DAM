/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea7gestionsmartphones;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 *
 * @author Jorge Custodio
 */
public class Metodos {
    BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
    
    
    /**
     * Solicita los datos del movil, chequea que sean correctos,
     * si el móvil no está en la lista, se añade
     * @param moviles
     * @throws IOException 
     */
    public void add_smartphone(ArrayList<Smartphone> moviles) throws IOException{
        Smartphone smphone = new Smartphone();
        String check = "";
        do{
            System.out.println("Introduce el número de teléfono");
            check = teclado.readLine();
        }while(check_exists_numTel(check, moviles)==true);
        
        smphone.setNumTelefono(Integer.parseInt(check));
        do{
            System.out.println("Introduce el IMEI del teléfono");
            check = teclado.readLine();
        }while(!check_IMEI(check));
        smphone.setIMEI(Long.parseLong(check));
        do{
            System.out.println("Introduce la marca del teléfono");
            check = teclado.readLine();
        }while(!check_m(check));
        smphone.setMarca(check);
        do{
            System.out.println("Introduce el modelo del teléfono");
            check = teclado.readLine();
        }while(!check_m(check));
        smphone.setModelo(check);
        smphone.setLlamadas(0);
        do{
            System.out.println("Introduce la resolucion de la camara");
            check = teclado.readLine();
        }while(check_resolucion(check)==0);
        smphone.setCamara(check_resolucion(check));
        smphone.setFotos(0);
        System.out.println("¿Tiene wifi?, true para si, false para no");
        check = teclado.readLine();
        smphone.setWifi(check_wifi(check));
        do{
            System.out.println("¿De qué tipo de conexion a internet dispone?: marca 2, 3 o 4, para indicar G");
            check = teclado.readLine();
        }while(check_internet(check)<2 || check_internet(check)>4);
        smphone.setInternet(check+"G");
        int app_opciones=1;
        do{
            System.out.println("Añadir aplicacion instalada: 1 para si, 0 para no o para salir");
            try{
                app_opciones = Integer.parseInt(teclado.readLine());
            }catch(IOException | NumberFormatException ex){
                System.out.println("Error, introduce una de las dos opciones");
            }
            if (app_opciones==1){
                if(smphone.getAplicaciones()==null){
                    smphone.setAplicaciones(new ArrayList<String>());
                }
                smphone.instalarAplicacion(smphone.getAplicaciones());
            }
        }while(app_opciones!=0);
        moviles.add(smphone);
        
    }
    
    /**
     * Pide numero de telefono, comprueba si existe, y lo borra
     * @param moviles
     * @throws IOException 
     */
    public void delete_smartphone(ArrayList<Smartphone> moviles) throws IOException{
        String check = "";
        System.out.println("Introduce el número de teléfono");
        check = teclado.readLine();
        if(check_exists_numTel(check, moviles)){
            for(Smartphone smphone: moviles){
                if(smphone.getNumTelefono()==Integer.parseInt(check)){
                    moviles.remove(smphone);
                }
            }
        }
    }
    
    /**
     * Genera un listado de los moviles con su informacion
     * @param moviles 
     */
    public void listado_smartphones(ArrayList<Smartphone> moviles){
        for (Smartphone smphone: moviles){
            System.out.println(smphone.toString());
        }
    }
    
    /**
     * Pide numero de telefono, comprueba si existe, y hace una llamada 
     * @param moviles
     * @throws IOException 
     */
    public void hacer_llamada(ArrayList<Smartphone> moviles) throws IOException{
        String check = "";
        System.out.println("Introduce el número de teléfono");
        check = teclado.readLine();
        if(check_exists_numTel(check, moviles)){
            for(Smartphone smphone: moviles){
                if(smphone.getNumTelefono()==Integer.parseInt(check)){
                    smphone.llamar();
                }
            }
        }  
    }
    
    /**
     * Pide numero de telefono, comprueba si existe, y hace una foto 
     * @param moviles
     * @throws IOException 
     */
    public void hacer_foto(ArrayList<Smartphone> moviles) throws IOException{
        String check = "";
        System.out.println("Introduce el número de teléfono");
        check = teclado.readLine();
        if(check_exists_numTel(check, moviles)){
            for(Smartphone smphone: moviles){
                if(smphone.getNumTelefono()==Integer.parseInt(check)){
                    smphone.hacerFoto();
                }
            }
        }
    }
    
    /**
     * Pide numero de telefono, comprueba si existe, y borra una foto
     * @param moviles
     * @throws IOException 
     */
    public void borrar_foto(ArrayList<Smartphone> moviles) throws IOException{
    String check = "";
        System.out.println("Introduce el número de teléfono");
        check = teclado.readLine();
        if(check_exists_numTel(check, moviles)){
            for(Smartphone smphone: moviles){
                if(smphone.getNumTelefono()==Integer.parseInt(check)){
                    smphone.borrarFoto();
                }
            }
        }
    }
    
    /**
     * Pide numero de telefono, comprueba si existe,
     * pide el nombre de la aplicacion, comprueba si existe
     * Si no existe la añade
     * @param moviles
     * @throws IOException 
     */
    public void instalar_aplicacion(ArrayList<Smartphone> moviles) throws IOException{
    String check = "";
        System.out.println("Introduce el número de teléfono");
        check = teclado.readLine();
        if(check_exists_numTel(check, moviles)){
            for(Smartphone smphone: moviles){
                if(smphone.getNumTelefono()==Integer.parseInt(check)){
                    smphone.instalarAplicacion(smphone.getAplicaciones());
                }
            }
        }
    }
    
    /**
     * Pide numero de telefono, comprueba si existe,
     * pide el nombre de la aplicacion, comprueba si existe
     * Si existe la borra
     * @param moviles
     * @throws IOException 
     */
    public void borrar_aplicacion(ArrayList<Smartphone> moviles) throws IOException{
    String check = "";
        System.out.println("Introduce el número de teléfono");
        check = teclado.readLine();
        if(check_exists_numTel(check, moviles)){
            for(Smartphone smphone: moviles){
                if(smphone.getNumTelefono()==Integer.parseInt(check)){
                    smphone.borrarAplicacion(smphone.getAplicaciones());
                }
            }
        }
    }
    
    
    
    /**
     * comprueba si la aplicacion está en la lista
     * @param aplicacion
     * @return check boolean, true si está la aplicación en la lista
     */
    public boolean check_aplicacion(String aplicacion, ArrayList<String> aplicaciones){
        boolean check = false;
        if(aplicaciones!=null){
            if(aplicaciones.size()>0){
                for(String str: aplicaciones){
                    if(str.equals(aplicacion)){
                        check = true;
                    }
                }
            }
        }
        return check;
    }
    
     /**
     * Comprueba que el nombre de la aplicacion sea alfanumerico
     * @param aplicacion
     * @return aplicacion o null
     */
    public String check_nombre_aplicacion(String aplicacion){
        Pattern p = Pattern.compile("[A-Za-z0-9]*");
        Matcher m = p.matcher(aplicacion);
        if(!(m.matches())){
            return null;
        }
        return aplicacion;
    }
    
    /**
     * comprueba que es un número de 9 cifras, sinmo, devuelve null
     * @param numTel número de teléfono
     * @return num | null número de teléfono o nulo
     */
    public int check_numTel(String numTel){
        int num = 0;
        try{
            num =Integer.parseInt(numTel);
            Pattern p=Pattern.compile("[0-9]{9}");
            Matcher m=p.matcher(numTel);
            if(!m.matches()){
                System.out.println("Debe introducir un número de 9 digitos");
                return 0;
            }
        }catch(NumberFormatException e){
            System.out.println("Debe introducir un número de 9 digitos");
            return 0;
        }
        return num;
    }
    
    /**
     * Comprueba que el IMEI esté compuesto por 15 números
     * @param IMEI
     * @return check 
     */
    public boolean check_IMEI(String IMEI){
        boolean check = true;
        try{
            Long.parseLong(IMEI);
            Pattern p=Pattern.compile("[0-9]{15}");
            Matcher m=p.matcher(IMEI);
            if(!m.matches()){
                System.out.println("Debe introducir un número de 15 digitos");
                check = false;
            }
         }catch(NumberFormatException e){
            System.out.println("Debe introducir un número de 15 digitos");
            check = false;
        }
        return check;
    }
    
    /**
     * Comprueba que la cadena esté formada por alfanuméricos de 2 a 20 caracteres
     * @param marca
     * @return boolean
     */
    public boolean check_m(String marca){
        boolean check = true;
        Pattern p=Pattern.compile("[a-zA-Z0-9]{2,20}");
        Matcher m=p.matcher(marca);
        check = m.matches();
        if(!m.matches()){
            System.out.println("Debe tener entre 2 y 20 caracteres");
            check = false;
        }
        return check;
    }
    
    /**
     * Comprueba que la resolucion sea un entero
     * @param resolucion
     * @return 0 | resolucion
     */
    public int check_resolucion(String resolucion){
        int res=0;
        try{
            res = Integer.parseInt(resolucion);
        }catch(NumberFormatException ex){
            System.out.println("Error, introduce un número");
        }
        return res;
    }
    
    /**
     * Comprueba que se haya introducido correctamente el parametro del wifi
     * @param wifi
     * @return boolean
     */
    public boolean check_wifi(String wifi){
        boolean wi = false;
        wi = Boolean.parseBoolean(wifi);
        return wi;
    }
    
    /**
     * Comprueba que sea un número
     * @param internet
     * @return numero
     */
    public int check_internet(String internet){
        int inet=0;
        try{
            inet = Integer.parseInt(internet);
        }catch(NumberFormatException ex){
            System.out.println("Error al introducir el número");
        }
        return inet;
    }
    
    /**
     * Comprueba que el numero de telefono sea correcto, y si existe
     * @param numTel
     * @param moviles
     * @return boolean
     */
    public boolean check_exists_numTel(String numTel, ArrayList<Smartphone> moviles){
        boolean check = false;
        int num = check_numTel(numTel);
        if(num!=0){
            for(Smartphone smphone: moviles){
                if(num == smphone.getNumTelefono()){
                    check = true;
                }
            }
        }
        return check;
    }
}
