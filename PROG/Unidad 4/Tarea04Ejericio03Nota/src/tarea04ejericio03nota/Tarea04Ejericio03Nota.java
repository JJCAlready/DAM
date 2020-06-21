/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea04ejericio03nota;

import java.math.BigDecimal;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
/**
 *
 * @author avanza
 */

public class Tarea04Ejericio03Nota {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
        double doubleNumber=0.0;
        int entero=0;
        int decimal=0;
        String linea="";
        System.out.println("Introduce una nota");
        try{
            linea = teclado.readLine();
            doubleNumber = Double.parseDouble(linea);
            entero = Integer.parseInt(linea.substring(0,1));
            decimal = Integer.parseInt(linea.substring(2,3));
            linea = "";
            linea = checkNum(entero) + " con " + checkNum(decimal);
            System.out.println(linea);
        }catch(IOException e){
            System.out.println("Error al leer del teclado.");    
        }catch(NumberFormatException e){
            System.out.println("Debe introducir un número con un decimal");
        }catch(IndexOutOfBoundsException e){
            System.out.println("Debe tener al menos un decimal");
        }   
    }
    public static String checkNum(int n){
        String s_num="";
        switch(n){
            case 1:
                s_num = "uno";
                break;
            case 2:
                s_num = "dos";
                break;
            case 3:
                s_num = "tres";
                break;
            case 4:
                s_num = "cuatro";
                break;
            case 5:
                s_num = "cinco";
                break;
            case 6:
                s_num = "seis";
                break;
            case 7:
                s_num = "siete";
                break;
            case 8:
                s_num = "ocho";
                break;
            case 9:
                s_num = "nueve";
                break;
            default:
                s_num = "cero";
        }
        return s_num;
    } 
}
