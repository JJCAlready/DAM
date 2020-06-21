/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package sincronizametodo;
// @author IMCG
public class Main {

    public static void main(String[] args) {
        ServidorWeb servidor = new ServidorWeb();
        //crea un objeto ServidorWeb
        Hilo_Terminal hterminal1 = new Hilo_Terminal(servidor);
        Hilo_Terminal hterminal2 = new Hilo_Terminal(servidor);
        Hilo_Terminal hterminal3 = new Hilo_Terminal(servidor);
        Hilo_Terminal hterminal4 = new Hilo_Terminal(servidor);
        //Se crean cuatro hilos

        hterminal1.start();
        hterminal2.start();
        hterminal3.start();
        hterminal4.start();
        //se inician los cuatro hilos
    }
}
