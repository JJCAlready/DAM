/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea032;

import java.util.Scanner;

/**
 *
 * @author Jorge Custodio
 */
public class AplicacionMovil {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        int numTelefono;
        int IMEI;
        String marca;
        String modelo;
        String tipoSO;
        int vSO;
        int dimPeso, dimLargo, dimAncho, dimAlto;
        int camRes, camNum;
        boolean camEst;

        System.out.println("Bienvenido a la aplicacion Movil");
        System.out.println("A continuación te solicitaremos una serie de datos sobre el movil:");
        System.out.println("Introduzca el número de teléfono");
        numTelefono = Integer.parseInt(teclado.nextLine());
        System.out.println("Introduzca el número de IMEI");
        IMEI = Integer.parseInt(teclado.nextLine());
        System.out.println("Introduzca la marca");
        marca = teclado.nextLine();
        System.out.println("Introduzca el modelo");
        modelo = teclado.nextLine();
        
        System.out.println("Introduzca el tipo de sistema operativo");
        tipoSO = teclado.nextLine();
        System.out.println("Introduzca el número de versión");
        vSO = Integer.parseInt(teclado.nextLine());
        So so = new So(tipoSO, vSO);
        
        System.out.println("Introduzca el peso del móvil");
        dimPeso = Integer.parseInt(teclado.nextLine());
        System.out.println("Introduzca el largo del móvil");
        dimLargo = Integer.parseInt(teclado.nextLine());
        System.out.println("Introduzca el ancho del móvil");
        dimAncho = Integer.parseInt(teclado.nextLine());
        System.out.println("Introduzca el alto del móvil");
        dimAlto = Integer.parseInt(teclado.nextLine());
        Dim dim = new Dim(dimPeso, dimLargo, dimAncho, dimAlto);
        
        System.out.println("Para la cámara frontal:");
        System.out.println("Introduzca la resolución");
        camRes = Integer.parseInt(teclado.nextLine());
        System.out.println("Introduzca el número de cámaras");
        camNum = Integer.parseInt(teclado.nextLine());
        System.out.println("¿Dispone de estabilizador?, 0 para no, 1 para si");
        camEst = Boolean.parseBoolean(teclado.nextLine());
        Cam camf = new Cam(camRes, camNum, camEst);
        
        System.out.println("Para la cámara trasera:");
        System.out.println("Introduzca la resolución");
        camRes = Integer.parseInt(teclado.nextLine());
        System.out.println("Introduzca el número de cámaras");
        camNum = Integer.parseInt(teclado.nextLine());
        System.out.println("¿Dispone de estabilizador?, 0 para no, 1 para si");
        camEst = Boolean.parseBoolean(teclado.nextLine());
        Cam camt = new Cam(camRes, camNum, camEst);
        
        Movil movil1 = new Movil(numTelefono,IMEI,marca,modelo,so,dim,camf,camt);
        
        System.out.print(movil1.toString());
    }
    
}

class Movil{
    int numTelefono;
    int IMEI;
    String marca;
    String modelo;
    So sistemaOperativo = new So();
    Dim dimensiones = new Dim();
    Cam camaraFrontal = new Cam();
    Cam camaraTrasera = new Cam();
    
    // constructor por defecto
    public Movil(){}
    
    // constructor con argumentos
    public Movil(int numTel, int IMEI, String marca,
            String modelo, So sistemaOperativo, Dim dimensiones, Cam camaraFrontal, Cam camaraTrasera){
        this.numTelefono = numTel;
        this.IMEI = IMEI;
        this.marca = marca;
        this.modelo = modelo;
        this.sistemaOperativo = sistemaOperativo;
        this.dimensiones = dimensiones;
        this.camaraFrontal = camaraFrontal;
        this.camaraTrasera = camaraTrasera;     
    }
    
    // métodos get
    public int get_numTelefono(){ return this.numTelefono; }
    public int get_IMEI() { return this.IMEI; }
    public String get_marca(){ return this.marca; }
    public String get_modelo() { return this.modelo; }
    public So get_sistemaOperativo(){ return this.sistemaOperativo; }
    public Dim get_dimensiones(){ return this.dimensiones;}
    public Cam get_camaraFrontal() { return this.camaraFrontal; }
    public Cam get_camaraTrasera() { return this.camaraTrasera; }
    
    
    // métodos set
    public void set_numTelefono(int numTelefono){ this.numTelefono = numTelefono; }
    public void set_IMEI(int IMEI){ this.IMEI = IMEI; }
    public void set_marca(String marca){ this.marca = marca;}
    public void set_modelo(String modelo){ this.modelo = modelo;}
    public void set_sistemaOperativo(So sistemaOperativo){ this.sistemaOperativo = sistemaOperativo;}
    public void set_dimensiones(Dim dimensiones){ this.dimensiones = dimensiones;}
    public void set_camaraFrontal(Cam camaraFrontal){ this.camaraFrontal = camaraFrontal;}
    public void set_camaraTrasera(Cam camaraTrasera){ this.camaraTrasera = camaraTrasera;}
    
    @Override
    public String toString(){
        String desc_movil = "Teléfono: "+this.numTelefono+"\n"+
                 "Marca: "+this.marca+"\n"+
                "Modelo: "+this.modelo+"\n"+
                sistemaOperativo.toString()+
                dimensiones.toString()+
                "Cámara Frontal:\n"+camaraFrontal.toString()+
                "Cámara Trasera:\n"+camaraTrasera.toString();
        return desc_movil;
    }

}

class So{
    String tipo;
    int version;

    public So() {
    }

    public So(String tipo, int version) {
        this.tipo = tipo;
        this.version = version;
    }

    public String getTipo() {return tipo;}
    public void setTipo(String tipo) {this.tipo = tipo;}

    public int getVersion() {return version;}
    public void setVersion(int version) {this.version = version;}

    @Override
    public String toString() {
        return "Sistema operativo: \n" +
                "\ttipo:" + tipo +"\n"+
                "\tversion:" + version+"\n";
    }
}

class Dim{
    int peso, largo, ancho, alto;

    public Dim() {
    }
    
    public Dim(int peso, int largo, int ancho, int alto) {
        this.peso = peso;
        this.largo = largo;
        this.ancho = ancho;
        this.alto = alto;
    }

    public int getPeso() {return peso;}
    public void setPeso(int peso) {this.peso = peso;}

    public int getLargo() {return largo;}
    public void setLargo(int largo) {this.largo = largo;}

    public int getAncho() {return ancho;}
    public void setAncho(int ancho) {this.ancho = ancho;}

    public int getAlto() {return alto;}
    public void setAlto(int alto) {this.alto = alto;}

    @Override
    public String toString() {
        return "Dimensiones :\n" +
                "\tPeso:" + peso +"\n"+
                "\tLargo:" + largo +"\n"+
                "\tAncho:" + ancho +"\n"+
                "\tAlto:"+ alto+"\n";
    }
}

class Cam{
    int res, num_cams;
    boolean estabilizador;

    public Cam() {
    }

    public Cam(int res, int num_cams, boolean estabilizador) {
        this.res = res;
        this.num_cams = num_cams;
        this.estabilizador = estabilizador;
    }
    
    public int getRes() {return res;}
    public void setRes(int res) {this.res = res;}

    public int getNum_cams() {return num_cams;}
    public void setNum_cams(int num_cams) {this.num_cams = num_cams;}

    public boolean isEstabilizador() {return estabilizador;}
    public void setEstabilizador(boolean estabilizador) {this.estabilizador = estabilizador;}

    @Override
    public String toString() {
        return "Especificaciones de cámara:\n " + 
                "\tResolucion: " + res +"\n"+
                "\tNúmero de cámaras:" + num_cams +"\n"+
                "\tEstabilizador:" + estabilizador + "\n";
    }
}