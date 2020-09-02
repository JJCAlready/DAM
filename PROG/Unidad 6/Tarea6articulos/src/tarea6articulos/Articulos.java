/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea6articulos;
import java.io.Serializable;


/**
 *
 * @author avanza
 */
public class Articulos implements Serializable{
    private String codigoBarra;
    private String nombre;
    private int unidades;
    private float precio;
    
    
    // constructor por defecto
    public Articulos() {
    }
    // constructor por parametros.
    public Articulos(String codigoBarra, String nombre, int unidades, float precio) {
        this.codigoBarra = codigoBarra;
        this.nombre = nombre;
        this.unidades = unidades;
        this.precio = precio;
    }

    // getters y setters
    public String getCodigoBarra() {return codigoBarra;}
    public void setCodigoBarra(String codigoBarra) {this.codigoBarra = codigoBarra;}

    public String getNombre() {return nombre;}
    public void setNombre(String nombre) {this.nombre = nombre;}

    public int getUnidades() {return unidades;}
    public void setUnidades(int unidades) {this.unidades = unidades;}

    public float getPrecio() {return precio;}
    public void setPrecio(float precio) {this.precio = precio;}

    @Override
    public String toString() {
        return "Código:\t" + codigoBarra +"\n"+
               "Nombre:\t" + nombre +"\n"+
               "Unidades:\t" + unidades +"\n"+ 
               "Precio=" + precio +"\n";
    }
    
   
}
