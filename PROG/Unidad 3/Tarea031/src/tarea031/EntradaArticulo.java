/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea031;

/**
 *
 * @author Jorge Custodio
 */
public class EntradaArticulo{

    public static void main(String[] args) {
        // articulo 1
        Articulo articulo1 = new Articulo("8400120120012", "Gafas de ver", 12, 15.37, 5);
        
        // articulo 2
        Articulo articulo2 = new Articulo();
        articulo2.set_codigoBarra("001019291092");
        articulo2.set_letras("Boligrafo de corregir");
        articulo2.set_unidades(3);
        articulo2.set_preciocompra(5.13);
        articulo2.set_beneficio(15);
        
        //Articulo 1
        System.out.println("Articulo número 1: "+ articulo1.get_letras());
        System.out.println("Código de barras: "+ articulo1.get_codigoBarra());
        System.out.println("Cantidad: "+ articulo1.get_unidades());
        System.out.println("Precio: "+ articulo1.pvp());
        System.out.println("-----------------------------------------");
        // Articulo 2
        System.out.println("Articulo número 2: "+ articulo2.letras.toString());
        System.out.println("Código de barras: "+ articulo2.codigoBarra.toString());
        System.out.println("Cantidad: "+ articulo2.unidades);
        System.out.println("Precio: "+ articulo1.pvp());
        
    }
}

class Articulo{
    String codigoBarra;
    String letras;
    int unidades;
    double preciocompra;
    int beneficio;
    
    public Articulo(){}
    public Articulo(String codigoBarra, String letras, int unidades, double preciocompra, int beneficio){
        this.letras = letras;
        this.codigoBarra = codigoBarra;
        this.unidades = unidades;
        this.preciocompra = preciocompra;
        this.beneficio = beneficio;
    }
    public String get_codigoBarra(){
        return this.codigoBarra;
    }
    public void set_codigoBarra(String codigoBarra){
        this.codigoBarra = codigoBarra;
    }
    
    public String get_letras(){
        return this.letras;
    }
    public void set_letras(String letras){
        this.letras = letras;
    }
    
    public int get_unidades(){
        return this.unidades;
    }
    public void set_unidades(int unidades){
        this.unidades = unidades;
    }
    
    public double get_preciocompra(){
        return this.preciocompra;
    }
    public void set_preciocompra(double preciocompra){
        this.preciocompra = preciocompra;
    }
    public int get_beneficio(){
        return this.beneficio;
    }
    public void set_beneficio(int beneficio){
        this.beneficio=beneficio;
    }
    public double pvp(){
        double pvp = this.preciocompra+((this.preciocompra*this.beneficio)/100);
        return pvp;
    }
}

