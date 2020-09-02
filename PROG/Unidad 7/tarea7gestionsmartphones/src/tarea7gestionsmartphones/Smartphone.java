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


/**
 *
 * @author Jorge Custodio
 */
public class Smartphone extends Multimedia {
    Metodos chk = new Metodos();
    private boolean wifi;
    private String internet;
    private ArrayList<String> aplicaciones;
    BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
    public Smartphone() {
    }

    public Smartphone(boolean wifi, String internet, ArrayList<String> aplicaciones, int camara, int fotos, int numTelefono, long IMEI, String marca, String modelo, int llamadas) {
        super(camara, fotos, numTelefono, IMEI, marca, modelo, llamadas);
        this.wifi = wifi;
        this.internet = internet;
        this.aplicaciones = aplicaciones;
    }

    public boolean isWifi() {return wifi;}
    public void setWifi(boolean wifi) {this.wifi = wifi;}

    public String getInternet() {return internet;}
    public void setInternet(String internet) {this.internet = internet;}

    public ArrayList<String> getAplicaciones() {return aplicaciones;}
    public void setAplicaciones(ArrayList<String> aplicaciones) {this.aplicaciones = aplicaciones;}

    @Override
    public String toString() {
        return super.toString() +
                "Caracteristicas\n" + 
                "\tWifi:\t" + wifi + "\n" +
                "\tInternet:\t" + internet + "\n" +
                "\tAplicaciones:\t" + aplicaciones +  "\n";
    }
    
    /**
     * Comprueba si existe la aplicación, y sino la instala
     * @param aplicaciones 
     */
    public void instalarAplicacion(ArrayList<String> aplicaciones){
        String check = "";
        System.out.println("Introduce el nombre de la aplicacion a instalar");
        try{
            check = teclado.readLine();
        }catch(IOException ex){
                System.out.println("Error al leer el nombre");
        }
        
        if(chk.check_nombre_aplicacion(check).equals(check)){
            if(chk.check_aplicacion(check, aplicaciones)){
                System.out.println("La aplicación ya está instalada");
            }else{
                aplicaciones.add(check);
                System.out.println("Se instaló la aplicación");
            }
        }else{
            System.out.println("Error en el nombre de la aplicación, debe ser alfanumérico");
        }
    }
    
    /**
     * Comprueba si la aplicación está en la lista, y la borra.
     * @param aplicaciones 
     */
    public void borrarAplicacion(ArrayList<String> aplicaciones){
        String check = "";
        System.out.println("Introduce el nombre de la aplicacion a borrar");
        try{
            check = teclado.readLine();
        }catch(IOException ex){
                System.out.println("Error al leer el nombre");
        }
        if(chk.check_nombre_aplicacion(check).equals(check)){
            if(chk.check_aplicacion(check, aplicaciones)){
                aplicaciones.remove(check);
            }else{
                System.out.println("La aplicación no está instalada");
            }
        }else{
            System.out.println("Error en el nombre de la aplicación, debe ser alfanumérico");
        }
    }
    
}
