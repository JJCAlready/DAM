/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea04ejericio01parimpar;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;


/**
 *
 * @author Jorge Custodio
 */
public class Tarea04Ejericio01ParImpar {
    
    public static void main(String[] args) {
        int num_veces=0;
        int num=0;
        String linea="";
        boolean N = false;
        BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
        do{
            System.out.println("Introduzca un número");
            try{
                linea = teclado.readLine();
                if(linea.equals("N")){
                        N = true;
                        break;
                    }
            }catch(IOException e){
                System.out.println("Error al leer del teclado.\n"+e);
            }
            try{ 
                num = Integer.parseInt(linea);
                if(num%2==0){
                    System.out.println("El número es par");
                }
                else{
                    System.out.println("El número es impar");
                }
            }catch(NumberFormatException e){
                System.out.println("Debe introducir un número");
            }finally{ 
                num_veces++;
            }
        }while (N!=true);
        System.out.println("Este ha sido tu número de repeticiones: "+ num_veces);
    }
}
