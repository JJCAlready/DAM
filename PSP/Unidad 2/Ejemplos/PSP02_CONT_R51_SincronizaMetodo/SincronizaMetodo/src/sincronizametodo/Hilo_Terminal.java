/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package sincronizametodo;

// @author IMCG

public class Hilo_Terminal extends Thread {
//clase derivada de Thread que define un hilo
    private ServidorWeb servidor;
    public Hilo_Terminal(ServidorWeb s) {
        this.servidor = s;
    }
    @Override
    public void run() {
        //método que incrementa la cuenta de accesos
        for (int i = 1; i <= 10; i++) //se simulan 10 accesos
        {
                servidor.incrementaCuenta();
                yield();
         }
        }
    }
