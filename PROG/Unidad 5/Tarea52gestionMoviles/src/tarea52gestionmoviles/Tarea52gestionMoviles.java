/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea52gestionmoviles;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 *
 * @author avanza
 */
public class Tarea52gestionMoviles {

    /**
     * @param args the command line arguments
     
     */ 
    
    public static void main(String[] args) throws IOException, NumberFormatException {
        // TODO code application logic here
        int numTelefono=0;
        long IMEI=0L;
        String marca="";
        String modelo="";
        String check="";
        Movil Movil = new Movil();
        ArrayList<Movil> moviles = new ArrayList<>();
        BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
        int opcion=0;
        
        Movil movil = new Movil(123456789, 123456789123456L, "Samsung", "Galaxy", moviles);
        movil.llamarA(684571648);
        movil.llamarA(684574448);
        movil.llamarA(684111648);
        System.out.print(movil.toString());
        
        do{
            System.out.println("*======= Menú gestión de móviles ============*");
            System.out.println("* 1. Alta de movil                           *");
            System.out.println("* 2. Buscar movil                            *");
            System.out.println("* 3. Baja de movil                           *");
            System.out.println("* 4. Modificar movil                         *");
            System.out.println("* 5. Hacer llamada                           *");
            System.out.println("* 6. Ver llamadas                            *");
            System.out.println("* 7. Listado                                 *");
            System.out.println("* 8. Salir                                   *");
            System.out.println("*============================================*");
            opcion = Integer.parseInt(teclado.readLine());
            switch(opcion){
                case 1:
                    do{
                        System.out.println("Introduce el número de teléfono");
                        check = teclado.readLine();
                    }while(Movil.check_numTel(check)!=(Integer.parseInt(check)));
                    numTelefono = Integer.parseInt(check);
                    do{
                        System.out.println("Introduce el IMEI del teléfono");
                        check = teclado.readLine();
                    }while(!Movil.check_IMEI(check));
                    IMEI = Long.parseLong(check);
                    do{
                        System.out.println("Introduce la marca del teléfono");
                        check = teclado.readLine();
                    }while(Movil.check_marca(check)!=true);
                    marca = teclado.readLine();
                    do{
                        System.out.println("Introduce el modelo del teléfono");
                        check = teclado.readLine();
                    }while(Movil.check_modelo(check)!=true);
                    modelo = teclado.readLine();
                    
                    Movil mv = new Movil(numTelefono, IMEI, marca, modelo, moviles);
                    mv.alta_movil(movil);
                    break;
                    
                case 2:
                    System.out.println("Introduce el número de teléfono");
                    check = teclado.readLine();
                    if(Movil.num_exists(check)){
                        System.out.print(Movil.buscar_movil(Integer.parseInt(check)));
                    }
                    break;
                    
                case 3:
                    System.out.println("Introduce el número de teléfono");
                    check = teclado.readLine();
                    if(Movil.num_exists(check)){
                        Movil.baja_movil(Integer.parseInt(check));
                    }
                    break;
                    
                case 4:
                    System.out.println("Introduce el número de teléfono");
                    check = teclado.readLine();
                    if(Movil.num_exists(check)){
                        Movil.modificar_movil(Integer.parseInt(check));
                    }
                    break;
                case 5:
                    System.out.println("Introduce el número de teléfono");
                    check = teclado.readLine();
                    if(Movil.num_exists(check)){
                        numTelefono = Integer.parseInt(check);
                        do{
                            System.out.println("Introduce el número a llamar");
                            check = teclado.readLine();
                        }while(Movil.check_numTel(check)!=(Integer.parseInt(check)));
                        int llamada = Integer.parseInt(check);
                        Movil.hacer_llamada(numTelefono, llamada, moviles);
                    }
                    break;
                case 6:
                    System.out.println("Introduce el número de teléfono");
                    check = teclado.readLine();
                    if(Movil.num_exists(check)){
                        numTelefono = Integer.parseInt(check);
                        Movil.ver_llamada(numTelefono, moviles);
                    }
                    break;
                case 7:
                    Movil.listado_moviles(moviles);
                }
        }while(opcion!=8);
        
    }
    
}


class Movil{

    BufferedReader mov_teclado = new BufferedReader(new InputStreamReader(System.in));
    int numTelefono;
    long IMEI;
    String marca;
    String modelo;
    ArrayList<Movil> moviles = new ArrayList<>();
    ArrayList<Integer> llamadas = new ArrayList<Integer>();
    // constructor por defecto
    public Movil(){}
    
    // constructor con argumentos
    public Movil(int numTel, long IMEI, String marca, String modelo, ArrayList<Movil> moviles){
        this.numTelefono = numTel;
        this.IMEI = IMEI;
        this.marca = marca;
        this.modelo = modelo;
        this.moviles = moviles;
    }

    // métodos get
    public int get_numTelefono(){ return this.numTelefono; }
    public long get_IMEI() { return this.IMEI; }
    public String get_marca(){ return this.marca; }
    public String get_modelo() { return this.modelo; }
    public ArrayList<Integer> getLlamadas() {return llamadas;}
  
  
    // métodos set
    public void set_numTelefono(int numTelefono){ this.numTelefono = numTelefono; }
    public void set_IMEI(long IMEI){ this.IMEI = IMEI; }
    public void set_marca(String marca){ this.marca = marca;}
    public void set_modelo(String modelo){ this.modelo = modelo;}
    public void setLlamadas(ArrayList<Integer> llamadas) {this.llamadas = llamadas;}


    @Override
    public String toString(){
        String desc_movil = "Teléfono: "+this.numTelefono+"\n"+
                "IMEI: "+this.IMEI+"\n"+
                "Marca: "+this.marca+"\n"+
                "Modelo: "+this.modelo+"\n";
        
        return desc_movil;
    }
    public void llamarA(Integer numTel){
        llamadas.add(numTel);
    }
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
    public boolean check_marca(String marca){
        boolean check = true;
        Pattern p=Pattern.compile("[a-zA-Z0-9]{2,20}");
        Matcher m=p.matcher(marca);
        check = m.matches();
        if(!m.matches()){
            System.out.println("La marca debe tener entre 2 y 20 caracteres");
            check = false;
        }
        return check;
    }
    public boolean check_modelo(String modelo){
        boolean check = true;
        Pattern p=Pattern.compile("[a-zA-Z0-9]{2,20}");
        Matcher m=p.matcher(modelo);
        check = m.matches();
        if(!m.matches()){
            System.out.println("El modelo debe tener entre 2 y 20 caracteres");
            check = false;
        }
        return check;
    }
    
    public boolean num_exists(String numTel){
        boolean check = false;
        int num = check_numTel(numTel);
        if(numTel.equals(num)&& moviles.contains(num)){
            System.out.println("El número existe");
            check = true;
        }
        return check;
    }
    public void alta_movil(Movil movil) {
        moviles.add(movil);
        System.out.println("Móvil añadido");
    }
    public String buscar_movil(int numTel){
        for(Movil movil : moviles){
            if(movil.numTelefono==numTel){
                return movil.toString();
            }
        }
        return "";
    }
    public void baja_movil(int numTel){
        boolean found = false;
        for(Movil movil : moviles){
            if(movil.numTelefono==numTel){
                moviles.remove(movil);
                System.out.println("El móvil "+ numTel+" ha sido eliminado.");
                found = true;
            }
        }
    }
    public void modificar_movil(int numTel) throws IOException, NumberFormatException{
        for(Movil movil : moviles){
            if(movil.numTelefono==numTel){
                int opt=0;
                System.out.println("¿Qué deseas cambiar? 1. marca 2. modelo 3.nada");
                do{
                    opt = Integer.parseInt(mov_teclado.readLine());                    
                    switch(opt){
                        case 1:
                            System.out.println("Introduce la marca");
                            String temp_marca = mov_teclado.readLine();
                            if(check_marca(temp_marca)){
                                movil.set_marca(temp_marca);
                            }
                            break;
                        case 2:
                            System.out.println("Introduce el modelo");
                            String temp_modelo = mov_teclado.readLine();
                            if(check_modelo(temp_modelo)){
                                movil.set_modelo(temp_modelo);
                            }
                            break;
                    }
                }while(opt!=3);
            }
        }
    }
    public void hacer_llamada(int numTel, int numLlamada, ArrayList<Movil> moviles){
        for(Movil movil : moviles){
            if(movil.numTelefono==numTel){
                movil.llamarA(numLlamada);
            }
        }
    }
    public void ver_llamada(int numTel, ArrayList<Movil> moviles){
        for(Movil movil : moviles){
            if(movil.numTelefono==numTel){
                for(int llamada : movil.getLlamadas()){
                    System.out.println(llamada);
                }
            }
        }
    }
    public void listado_moviles(ArrayList<Movil> moviles){
        for(Movil mov : moviles){
            System.out.println(mov.get_numTelefono());
        }
    }
}
