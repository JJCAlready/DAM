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
import tarea7gestionsmartphones.Smartphone.*;
/**
 *
 * @author Jorge Custodio
 */
public class Tarea7gestionsmartphones {

    /**
     * @param args the command line arguments
     */
    
    public static void main(String[] args) throws IOException {
        Metodos meth = new Metodos();
        BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
        ArrayList<Smartphone> moviles = new ArrayList<Smartphone>();
        int opcion =0;
        do{
            System.out.println("*========Menú de operaciones========*");
            System.out.println("* 1. Alta de movil                  *");
            System.out.println("* 2. Baja de movil                  *");
            System.out.println("* 3. Listado de moviles             *");
            System.out.println("* 4. Hacer llamada                  *");
            System.out.println("* 5. Hacer foto                     *");
            System.out.println("* 6. Borrar foto                    *");
            System.out.println("* 7. Instalar aplicaciones          *");
            System.out.println("* 8. Borrar aplicaciones            *");
            System.out.println("* 9. Salir                          *");
            System.out.println("*===================================*");
            try{
                opcion = Integer.parseInt(teclado.readLine());
            }catch(IOException | NumberFormatException ex){
                System.out.println("Error, introduce una opción válida");
            }
            switch(opcion){
                case 1:
                    meth.add_smartphone(moviles);
                    break;
                case 2:
                    meth.delete_smartphone(moviles);
                    break;
                case 3:
                    meth.listado_smartphones(moviles);
                    break;
                case 4:
                    meth.hacer_llamada(moviles);
                    break;
                case 5:
                    meth.hacer_foto(moviles);
                    break;
                case 6:
                    meth.borrar_foto(moviles);
                case 7:
                    meth.instalar_aplicacion(moviles);
                    break;
                case 8:
                    meth.borrar_aplicacion(moviles);
                    break;
            }
        }while(opcion!=9);
    }
    
}
