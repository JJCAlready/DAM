/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package contarmuelles;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

/**
 *
 * @author avanza
 */
public class ContarMuelles {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws IOException, NumberFormatException {
        int muelles=0;
	int tardeAcabada;
	BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
	do{
		System.out.println("Cojo otro muelle, lo tiro por el retrete, y ya son "+muelles+" los que el retrete se ha tragado");
		System.out.println("¿Se acaba ya la tarde? introduce 1 para si");
		tardeAcabada = Integer.parseInt(teclado.readLine());
                muelles++;
	}while(tardeAcabada!=1);
	System.out.println("Se acabÃ³ la tarde, el retrete se ha tragado "+muelles+" muelles");
    }
    
}
