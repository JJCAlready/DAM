
package PaquetePrincipal;

/****************************************************************************
   * Este programa Identifica el hilo que ejecuta el método main() de la típica
   * aplicación de consola "¡Hola mundo!"
   * Se utilizan para ello los métodos: currentThread() y getName()
   * de la clase Thread
   */
/**
 * @author IMCG
 */
public class Main {
    public static void main(String[] args) {
       
    System.out.println("¡Hola mundo!\n");
    //imprime "¡Hola mundo!" en la Salida
    Thread miHilo = Thread.currentThread();
    //obtiene el hilo donde se está ejecutando este método mediante la
    //función Thread.currentThread(), y lo almacena en la variable
    //local miHilo

    //imprime el nombre del hilo en la Salida (función getName())
    System.out.println("Por defecto, el hilo que ejecuta el método main() "
            +"de mi programa se llama '" + miHilo.getName() + "'\n");

    
  }
}
