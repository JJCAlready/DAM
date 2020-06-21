/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea04ejercicio02cuadrado;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

/**
 *
 * @author avanza
 */
public class Tarea04Ejericio02Cuadrado {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int n=0;
        String printeable="";
        BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
        try{
            System.out.println("Introduce un número");
            n = Integer.parseInt(teclado.readLine());
        }catch(IOException e){
                System.out.println("Error al leer del teclado.");
                
        }catch(NumberFormatException e){
                System.out.println("Debe introducir un número");
        }finally{
            for(int i=1;i<=n;i++){
                for(int j=1;j<=n;j++){
                    printeable+="#";
                }
                System.out.println(printeable);
                printeable="";
            }
        }
    }
}
