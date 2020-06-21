/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package misControles;

import java.awt.Color;
import java.awt.Font;
import java.io.Serializable;
import javax.swing.JTextField;

/**
 *
 * @author alumno
 */
public class ComponenteMiTexto extends JTextField implements Serializable {

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
        this.setForeground(color);
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
        this.setFont(fuente);
    }
    private int ancho;

    /**
     * Get the value of ancho
     *
     * @return the value of ancho
     */
    public int getAncho() {
        return ancho;
    }

    /**
     * Set the value of ancho
     *
     * @param ancho new value of ancho
     */
    public void setAncho(int ancho) {
        this.ancho = ancho;
        this.setColumns(ancho);
        
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
        if ( tipo.equals("Entero") || tipo.equals("Real") || tipo.equals("Texto") )
              this.tipo = tipo;
    }

    public ComponenteMiTexto() {
    }
    
    @Override
    public void setText(String text)
    {
        switch (tipo) {
            case "Entero":
                try{
                    Integer.parseInt(text);
                    super.setText(text);
                }catch (NumberFormatException e)
                {
                    super.setText("valor no válido");
                }
                break;
            case "Real":
                try{
                    Double.parseDouble(text);
                    super.setText(text);
                }catch (NumberFormatException e)
                {
                    super.setText("valor no válido");
                }
                break;
            default:
                super.setText(text);
                break;
        }
            
    }
    
}
