/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package lenguaje;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.PrintWriter;
import java.io.RandomAccessFile;
import java.nio.channels.FileLock;

/**
 *
 * @author JCstdio
 */
public class Lenguaje {
    /**
     * @param args the command line arguments
     * @throws java.io.FileNotFoundException
     * @throws java.io.IOException
     */
    public static void main(String[] args) throws FileNotFoundException, IOException {
        
        File archivo = new File(args[1]);        
        // Comprobamos que se hayan introducido al menos dos argumentos
        if(args[0]!=null && args[1]!=null){
            // Voy a generar las letras con la numeración ASCII con estos dos números
            int num_inicial = 97;
            int num_final = 122;

            // Recojo el número que se quiere de caracteres y palabras
            int num_args = Integer.parseInt(args[0]);
            
            try{
                // Bucle para las palabras
                for (int i=1; i<=num_args; i++){
                    // Inicializo la palabra en cada iteración
                    String palabra = "";

                    // Bucle para las letras
                    for (int j=1; j<=num_args; j++){
                        int numAleatorio = (int)Math.floor(Math.random()*(num_final -num_inicial)+num_inicial);
                        palabra+=(char)numAleatorio;
                    }
                    /* 
                    Accedo al archivo en modo aleatorio, lo bloqueo para escribir,
                    después me posiciono al final del mismo, escribo y libero el bloqueo
                    */
                    RandomAccessFile raf = new RandomAccessFile(archivo, "rwd");
                    FileLock block = raf.getChannel().lock();                    
                    raf.seek(archivo.length());
                    raf.writeBytes(palabra+"\n");
                    block.release();        
                }
            }catch(Exception e){
                e.printStackTrace();
            }
        }
        else{
            System.out.println("Error, insuficientes argumentos indique al menos 2");
        }
    }
    
}
