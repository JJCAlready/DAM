/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea7gestionsmartphones;

/**
 *
 * @author Jorge Custodio
 */
public class Movil {
    protected int numTelefono;
    protected long IMEI;
    protected String marca;
    protected String modelo;
    protected int llamadas;
    
    public Movil() {
    }

    public Movil(int numTelefono, long IMEI, String marca, String modelo, int llamadas) {
        this.numTelefono = numTelefono;
        this.IMEI = IMEI;
        this.marca = marca;
        this.modelo = modelo;
        this.llamadas = llamadas;
    }

    public int getNumTelefono() {return numTelefono;}
    public void setNumTelefono(int numTelefono) {this.numTelefono = numTelefono;}

    public long getIMEI() {return IMEI;}
    public void setIMEI(long IMEI) {this.IMEI = IMEI;}

    public String getMarca() {return marca;}
    public void setMarca(String marca) {this.marca = marca;}

    public String getModelo() {return modelo;}
    public void setModelo(String modelo) {this.modelo = modelo;}

    public int getLlamadas() {return llamadas;}
    public void setLlamadas(int llamadas) {this.llamadas = llamadas;}

    @Override
    public String toString() {
        return "\tMovil:\t" + numTelefono + "\n"+
               "\tIMEI:\t" + IMEI + "\n"+ 
               "\tMarca:\t" + marca + "\n"+
               "\tModelo:\t" + modelo + "\n"+ 
               "\tLlamadas:\t" + llamadas + "\n";
    }
    
    /**
     * Incrementa el numero de llamadas en 1
     */
    public void llamar(){ this.llamadas++;}
    
}
