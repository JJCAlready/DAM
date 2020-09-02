/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea7gestionsmartphones;

/**
 *
 * @author Jorge Custodio
 */
public class Multimedia extends Movil{
    protected int camara;
    protected int fotos;

    public Multimedia() {
    }

    public Multimedia(int camara, int fotos, int numTelefono, long IMEI, String marca, String modelo, int llamadas) {
        super(numTelefono, IMEI, marca, modelo, llamadas);
        this.camara = camara;
        this.fotos = fotos;
    }

    public int getCamara() {return camara;}
    public void setCamara(int camara) {this.camara = camara;}

    public int getFotos() {return fotos;}
    public void setFotos(int fotos) {this.fotos = fotos;}

    @Override
    public String toString() {
        return  super.toString() +
                "\tMegapixeles:\t\t"+camara+"\n"+
                "\tFotos:\t\t" + fotos+"\n";
    }
    
    /**
     * Añade una foto a la camara
     */
    public void hacerFoto(){this.fotos++;}
    
    /**
     * Borra una foto de la camara, en caso de haber
     */
    public void borrarFoto(){
        if (fotos>0){
            this.fotos--;
        }else{
            System.out.println("No hay fotos");
        }
    }
}
