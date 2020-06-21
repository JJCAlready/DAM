/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea04ejericio04menucoche;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;


/**
 *
 * @author avanza
 */
public class Tarea04Ejercicio04MenuCoche {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws IOException {
        // TODO code application logic here
        BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
        int opcion=0;
        Coche coche = null;
        do{
            System.out.println("#======== Menú de operaciones ========#");
            System.out.println("1. Generar coche");
            System.out.println("2. Cambiar color");
            System.out.println("3. Mostrar datos del coche");
            System.out.println("4. Salir");
            System.out.println("#=====================================#");
            try {
                opcion = Integer.parseInt(teclado.readLine());
            } catch (IOException ex) {
                System.out.println("Introduce un número");
            }catch(NumberFormatException e){
                System.out.println("Debe introducir un número");
            }
            switch(opcion){
                case 1:
                    coche = new Coche("Seat", "Leon", "Rojo", 5);
                    break;
                case 2:
                    if(coche==null){
                        System.out.println("Primero tienes que generar el coche");
                    }else{
                        System.out.println("Elige el color");
                        String color = teclado.readLine();
                        coche.setColor(color);
                    }
                    break;
                case 3:
                    if(coche==null){
                        System.out.println("Primero tienes que generar el coche");
                    }else
                    System.out.print(coche.toString());
                    break;
            }   
        }while(opcion!=4);
    }
    public static class Coche{
        String marca, modelo, color;
        int puerta;

        public Coche() {
        }

        public Coche(String marca, String modelo, String color, int puerta) {
            this.marca = marca;
            this.modelo = modelo;
            this.color = color;
            this.puerta = puerta;
        }

        public String getMarca() {return marca;}
        public void setMarca(String marca) {this.marca = marca;}

        public String getModelo() {return modelo;}
        public void setModelo(String modelo) {this.modelo = modelo;}

        public String getColor() {return color;}
        public void setColor(String color) {this.color = color;}

        public int getPuerta() {return puerta;}
        public void setPuerta(int puerta) {this.puerta = puerta;}

        @Override
        public String toString() {
            return "Datos del coche:\n" + 
                    "Marca:" + marca +"\n"+
                    "Modelo:" + modelo +"\n"+
                    "Color:" + color +"\n"+
                    "Puertas:" + puerta  +"\n";
        }
        
    }
}
