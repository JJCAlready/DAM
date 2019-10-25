/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package aleatoriosnumeros;

/**
 *
 * @author soyel
 */
public class AleatoriosNumeros {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        for(int i=1; i<40; ++i ){
            int numero = (int)(Math.random()*100+1);
            System.out.println(numero);
        }
    }
    
}
