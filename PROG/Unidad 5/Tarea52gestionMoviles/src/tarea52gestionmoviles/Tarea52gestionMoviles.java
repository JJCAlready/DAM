/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea52gestionmoviles;

import java.util.ArrayList;
import java.util.LinkedList;
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
    public static void main(String[] args) {
        // TODO code application logic here
    }
    
}
class Movil{
    int numTelefono;
    long IMEI;
    String marca;
    String modelo;
    ArrayList<Integer> llamadas = new ArrayList<Integer>();
    // constructor por defecto
    public Movil(){}
    
    // constructor con argumentos
    public Movil(int numTel, long IMEI, String marca, String modelo){
        this.numTelefono = numTel;
        this.IMEI = IMEI;
        this.marca = marca;
        this.modelo = modelo;
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
                 "Marca: "+this.marca+"\n"+
                "Modelo: "+this.modelo+"\n";
        
        return desc_movil;
    }
    public void llamarA(Integer numTel){
        llamadas.add(numTel);
    }
    public boolean check_numTel(String numTel){
        boolean check = true;
        try{
            Integer.parseInt(numTel);
            Pattern p=Pattern.compile("[0-9]{9}");
            Matcher m=p.matcher(numTel);
            check = m.matches();
        }catch(NumberFormatException e){
            System.out.println("Debe introducir un número de 9 digitos");
            check = false;
        }
        return check;
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
        Pattern p=Pattern.compile("[a-zA-Z0-9]{2-20}");
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
        Pattern p=Pattern.compile("[a-zA-Z0-9]{2-20}");
        Matcher m=p.matcher(modelo);
        check = m.matches();
        if(!m.matches()){
            System.out.println("El modelo debe tener entre 2 y 20 caracteres");
            check = false;
        }
        return check;
    }
}
