/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package semaphoreejemplo2;

/**
 *
 * @author IMCG
 */
import java.util.concurrent.Semaphore;

public class Lector extends Thread {
//clase que implementa al hilo lector
    private Semaphore semaforo;

    //constructor
    public Lector(String nombre, Semaphore s) {
        super(nombre);
        this.semaforo = s;
    }

    public void run() {
        System.out.println(getName() + " : Intentando leer");
        //mensaje en consola para comprobar el funcionamiento
        try {
            semaforo.acquire();
            //solicita un permiso para acceder a la BD a leer
            //los otros 4 permisos, los pueden utilizar los otros hilos lectores
        } catch (InterruptedException e) {
            System.out.println(e);
        }
        System.out.println(getName() + " : Leyendo");
        try {
            sleep((int) (Math.random() * 50));
            //se duerme al hilo un tiempo aleatorio (para simular que tarda
            //en realizar su tarea y así otros hilos compiten por el acceso )
        } catch (InterruptedException e) {
            System.out.println(e);
        }
        semaforo.release();
        //libera el permiso
        System.out.println(getName() + " : Ya he leido");
        //mensaje en consola para comprobar el funcionamiento
    }
}
