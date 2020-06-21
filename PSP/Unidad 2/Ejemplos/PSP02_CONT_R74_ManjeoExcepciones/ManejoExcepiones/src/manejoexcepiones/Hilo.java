/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package manejoexcepiones;

/**
 *
 * @author IMCG
 */
import java.util.Random;

public class Hilo extends Thread {
//clase que implementa el hilo
    
    //constructor
    public Hilo(String nombre) {
        super(nombre);
    }

    //
    public void run() {
        Random numero = new Random();
        //crea un objeto Random
        int division = 100 / numero.nextInt(4);
        //divide 100 entre el número pseudoaleatorio entre 0 y 4
        System.out.println("Division: " + division);
        //muestra el valor de la división
    }
}
