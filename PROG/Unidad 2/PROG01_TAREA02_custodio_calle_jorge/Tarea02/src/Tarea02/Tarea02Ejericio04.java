/*
 * Programa: Tarea02Ejericio04
 * 
 * Descripción
 * El programa inicializa cuatro variables con datos sobre el alumno
 * y genera una quinta con un noombre de usuario formado por subcadenas
 * de las otras variables, finalmente se muestra el texto formateado
 */
package Tarea02;

/**
 *
 * @author Jorge Custodio Calle
 */
public class Tarea02Ejericio04 {

    /**
     * @param args the command line arguments
     *  Inicialización de variables
     *  Creación de una quinta producto de la concatenación de 
     *  subcadenas de las otras cuatro variables
     *  Muestra del texto formateado
     */
    public static void main(String[] args) {
        String nombre = "Jorge";
        String primAp = "Custodio";
        String segAp = "Calle";
        String anio = "1984";
        
        String nombreUsuario = nombre.substring(0,1).toLowerCase() + 
                primAp.toLowerCase() + segAp.substring(0,1).toLowerCase() + anio.substring(2);
        
        System.out.printf("Nombre: %s\n"
                        + "Apellido1: %s\n"
                        + "Apellido2: %s\n"
                        + "Año de nacimiento: %s\n\n"
                        + "El nombre de usuario es: %s\n",nombre, primAp, segAp,
                        anio, nombreUsuario);        
    }
    
}
