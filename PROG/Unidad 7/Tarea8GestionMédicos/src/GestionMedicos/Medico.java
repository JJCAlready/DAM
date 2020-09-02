/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GestionMedicos;

/**
 *
 * @author Jorge Custodio
 */

public class Medico extends Persona{
    String especialidad;

    public Medico() {
    }

    public Medico(String especialidad) {
        this.especialidad = especialidad;
    }

    public Medico(String especialidad, String nif, String nombre, String apellidos) {
        super(nif, nombre, apellidos);
        this.especialidad = especialidad;
    }

    public String getEspecialidad() {
        return especialidad;
    }

    public void setEspecialidad(String especialidad) {
        this.especialidad = especialidad;
    }

    @Override
    public String toString() {
        return super.toString() +"especialidad=" + especialidad;
    }
}
