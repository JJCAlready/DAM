/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea8gestionpacientes;

/**
 *
 * @author Jorge Custodio
 */
public class Paciente extends Persona{
    String enfermedad;

    public Paciente() {
    }

    public Paciente(String enfermedad) {
        this.enfermedad = enfermedad;
    }

    public Paciente(String enfermedad, String nif, String nombre, String apellidos) {
        super(nif, nombre, apellidos);
        this.enfermedad = enfermedad;
    }

    public String getEnfermedad() {
        return enfermedad;
    }

    public void setEnfermedad(String enfermedad) {
        this.enfermedad = enfermedad;
    }

    @Override
    public String toString() {
        return super.toString() + "enfermedad=" + enfermedad;
    }
    
    
}
