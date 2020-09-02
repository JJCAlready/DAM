/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package actividades;

/**
 *
 * @author avanza
 */
public class Actividades {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
    }
    
}
class Araña{
    
    // Atributos
    String color;
    String especie;
    float tamaño;

    // constructor por defecto
    public Araña() {
    }
    // constructor con parametros
    public Araña(String color, String especie, float tamaño) {
        this.color = color;
        this.especie = especie;
        this.tamaño = tamaño;
    }

    public String getColor() {
        return color;
    }

    public void setColor(String color) {
        this.color = color;
    }

    public String getEspecie() {
        return especie;
    }

    public void setEspecie(String especie) {
        this.especie = especie;
    }

    public float getTamaño() {
        return tamaño;
    }

    public void setTamaño(float tamaño) {
        this.tamaño = tamaño;
    }
    
    // métodos
    public void tejer(){
        System.out.println("Tejiendo la tela");
        // código de tejido de tela
    }
    public void mover(int x, int y){
        System.out.println("Moviendo a "+y+","+x);
        // código de movimiento de araña
    }
    public boolean comer(String comida){
        boolean satisfecha = false;
        System.out.println("Comiendo");
        // código de movimiento de araña
        satisfecha = true;
        return satisfecha;
    }
    
    // toString

    @Override
    public String toString() {
        return "Ara\u00f1a{" + "color=" + color + ", especie=" + especie + ", tama\u00f1o=" + tamaño + '}';
    }
    
}