/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package jardinessincronizado;

// @author IMCG

public class RecursoJardin {
//clase que simula las entradas y las salidas al Jardín
    private int cuenta; //para contar las entradas y salidas al Jardín
    public RecursoJardin() {
        cuenta = 100; //inicalmente hay 100 personas en le jardín
    }
    public synchronized void incrementaCuenta() {
        //método que increamenta en 1 la varibale cuenta
        System.out.println("hilo " + Thread.currentThread().getName()
                + "----- Entra en Jardín");
        //muestra el hilo que entra en el método
        cuenta++;
        System.out.println(cuenta + " en jardín");
        //cuenta cada acceso al jardín y muestra el número de accesos
    }
   public synchronized void  decrementaCuenta() {
        //método que decrementa en 1 la varibale cuenta
        System.out.println("hilo " + Thread.currentThread().getName()
                + "----- Sale de Jardín");
        //muestra el hilo que sale en el método
        cuenta--;
        System.out.println(cuenta + " en jardín");
        //cuenta cada acceso al jardín y muestra el número de accesos
    }
}
