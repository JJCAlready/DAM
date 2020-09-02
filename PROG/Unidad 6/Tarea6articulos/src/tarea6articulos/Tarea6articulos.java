/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea6articulos;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

/**
 *
 * @author avanza
 */
public class Tarea6articulos{

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws IOException{
        // TODO code application logic here
        int opcion=0;
        BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
        Metodos metodos = new Metodos();
        do{
            System.out.println("*======= Menú gestión de móviles ============*");
            System.out.println("* 1. Añadir artículo                         *");
            System.out.println("* 2. Listar artículos                        *");
            System.out.println("* 3. Buscar artículo                         *");
            System.out.println("* 4. Borrar el fichero de datos              *");
            System.out.println("* 5. Salir                                   *");
            System.out.println("*============================================*");
            try{
                opcion = Integer.parseInt(teclado.readLine());
            }catch(IOException | NumberFormatException ex){
                System.out.println("Introduce una de las opciones");
            }
            
            switch(opcion){
                case 1:
                    metodos.add_articulo();
                    break;
                case 2:
                    metodos.list_articulos();
                    break;
                case 3:
                    metodos.search_articulo();
                    break;
                case 4:
                    metodos.delete_file();
                    break;
            }
        }while(opcion!=5);
    }
    
}
