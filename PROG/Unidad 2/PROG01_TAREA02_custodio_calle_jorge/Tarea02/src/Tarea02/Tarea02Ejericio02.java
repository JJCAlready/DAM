/*
 * Programa: Tarea02Ejericio02
 * 
 * Descripción:
 * El programa inicializa unas variables, que luego usará para
 * mostrar por una salidad formateada.
 * 
 */
package Tarea02;

/**
 *
 * @author Jorge Custodio Calle
 */
public class Tarea02Ejericio02 {

    /**
     * @param args the command line arguments
     * 
     * Clase main que contiene las variables indicadas en la tarea.
     * Salida formateada para mostrar el texto acorde a las especificaciones.
     * 
     */
    public static void main(String[] args) {
        
        String nomAlumno = "Jorge";
        String apAlumno = "Custodio Calle";
        short edad = 35;
        boolean matriculado = true;
        String curso = "DAM1";
        float notaMedia = 9.75f;
        
        System.out.printf("El alumno se llama %s %s\n"
                + "Tiene %d años\n"
                + "Matriculado %b en %s\n"
                + "Su nota media es %.2f\n", nomAlumno, apAlumno, edad, 
                                        matriculado, curso, notaMedia );
        
    }
    
}
