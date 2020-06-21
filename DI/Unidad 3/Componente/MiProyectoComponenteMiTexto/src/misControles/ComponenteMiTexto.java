/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package misControles;

import java.awt.Color;
import java.awt.Font;
import java.beans.*;
import java.io.Serializable;

/**
 *
 * @author avanza
 */
public class ComponenteMiTexto implements Serializable {
    
    private int ancho;

    /**
     * Get the value of ancho
     *
     * @return the value of ancho
     */
    public int getAncho() {
        return ancho;
    }

    private Font fuente;

    /**
     * Get the value of fuente
     *
     * @return the value of fuente
     */
    public Font getFuente() {
        return fuente;
    }

    /**
     * Set the value of fuente
     *
     * @param fuente new value of fuente
     */
    public void setFuente(Font fuente) {
        this.fuente = fuente;
    }

    private String tipo;

    /**
     * Get the value of tipo
     *
     * @return the value of tipo
     */
    public String getTipo() {
        return tipo;
    }

    /**
     * Set the value of tipo
     *
     * @param tipo new value of tipo
     */
    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    /**
     * Set the value of ancho
     *
     * @param ancho new value of ancho
     */
    public void setAncho(int ancho) {
        this.ancho = ancho;
    }

    private Color color;

    /**
     * Get the value of color
     *
     * @return the value of color
     */
    public Color getColor() {
        return color;
    }

    /**
     * Set the value of color
     *
     * @param color new value of color
     */
    public void setColor(Color color) {
        this.color = color;
    }

    public ComponenteMiTexto() {
     
    }
    
   
    
}
