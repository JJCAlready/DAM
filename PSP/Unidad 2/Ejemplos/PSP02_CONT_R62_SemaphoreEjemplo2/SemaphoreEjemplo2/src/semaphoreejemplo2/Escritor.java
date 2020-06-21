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

public class Escritor extends Thread {
//calse que implementa al hilo escritor
    private Semaphore semaforo;

    //constructor
    public Escritor(String nombre, Semaphore s) {
        super(nombre);
        this.semaforo = s;
    }

    @Override
    public void run() {
        System.out.println(getName() + " intentando escribir");
        //mensaje en consola para comprobar funcionamiento
        try {
            semaforo.acquire(5);
            //adquiere 5 permisos para asegurarse que la BD está libre
        } catch (InterruptedException e) {
            System.out.println(e);
        }
        System.out.println(getName() + ": Escribirndo");
        //mensaje en consola para comprobar el funcionamiento
        try {
            sleep((int) (Math.random() + 50));
            //se duerme al hilo un tiempo aleatorio (para simular que tarda
            //en realizar su tarea y así otros hilos compiten por el acceso
        } catch (InterruptedException e) {
            System.out.println(e);
        }

        semaforo.release(5);
        //libera los 5 permisos para indicar que la BD está libre
        System.out.println(getName() + ": Ya he escrito");
        //mensaje en consola para comprobar el funcionamiento
    }
}
