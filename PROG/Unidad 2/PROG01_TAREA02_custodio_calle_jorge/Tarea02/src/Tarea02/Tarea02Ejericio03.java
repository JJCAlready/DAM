/*
 * Programa: Tarea02Ejericio03
 *
 * Descripción:
 * El programa incializa tres variables, y muestra una salida
 * formateada, incicando en último lugar la media redondeada hacia arriba
 * de las tres variables
 */
package Tarea02;

/**
 *
 * @author Jorge Custodio Calle
 */
public class Tarea02Ejericio03 {

    /**
     * @param args the command line arguments
     * 
     * Inicialización de variables
     * Muestra por pantalla de salida formateada de:
     * 1. Las tres variables iniciales
     * 2. El cálculo al vuelo de la media de las tres variables
     *    redondeada hacia arriba.
     */
    public static void main(String[] args) {

        double primEval = 9.5;
        double segEval = 8.7;
        double tercEval = 9.9;
    
        System.out.printf("Nota de la 1 evaluacion: %.1f\n"
                + "Nota de la 2 evaluacion: %.1f\n"
                + "Nota de la 3 evaluacion: %.1f\n"
                + "La nota media del alumno es: %d\n", primEval, segEval, 
                tercEval,(int)Math.ceil((primEval + segEval + tercEval)/3));
    }
    
}
