/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package colaborar;

/**
 *
 * @author JCstdio
 */
public class Colaborar {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // Bucle para abrir los cinco procesos
        if(args[0]!=null){
            for(int i=0; i<=5;i++){
                Process proceso;
                try{
                    // Se abre proceso tomando como argumento el programa a ejecutar
                    // el argumento para el número de letras y palabras se toma del for
                    proceso = Runtime.getRuntime().exec("java -jar " + args[0] +" " + i + " texto.txt");
                }catch(Exception e){
                    System.out.println("Error "+e);
                }
            }
        }
        else{
            System.out.println("Erro en el número de parámetros, introduce solo el programa a ejecutar");
        }
    }
}
