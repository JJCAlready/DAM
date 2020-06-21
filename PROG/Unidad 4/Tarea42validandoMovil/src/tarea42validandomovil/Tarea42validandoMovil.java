/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea42validandomovil;

/**
 *
 * @author avanza
 */
public class Tarea42validandoMovil {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
    }
    public boolean check_numTel(String numTel){
        boolean check = true;
        if(numTel.length()!=9){
            System.out.println("El número de teléfono debe de tener 9 cifras");
            check = false;
        }else{
            try{
                Integer.parseInt(numTel);
            }catch(NumberFormatException e){
                System.out.println("Debe introducir un número");
                check = false;
            }
        }
        return check;
    }
    public boolean check_IMEI(String IMEI){
        boolean check = true;
        if(IMEI.length()!=15){
            System.out.println("El IMEI tiene que tener 15 cifras");
            check = false;
        }else{
            try{
                Long.parseLong(IMEI);
            }catch(NumberFormatException e){
                System.out.println("Debe introducir un número");
                check = false;
            }
        }
        return check;
    }
    public boolean check_marca(String marca){
        boolean check = true;
        if(marca.length()<2 || marca.length()>20){
            System.out.println("La marca debe tener entre 2 y 20 caracteres");
            check = false;
        }
        return check;
    }
    public boolean check_modelo(String modelo){
        boolean check = true;
        if(modelo.length()<2 || modelo.length()>20){
            System.out.println("El modelo debe tener entre 2 y 20 caracteres");
            check = false;
        }
        return check;
    }
    public boolean check_tipoSo(String tipo){
        boolean check = true;
        if(tipo.length()<2||tipo.length()>20){
            System.out.println("El tipo de sistema operativo debe tener entre 2 y caracteres");
            check = false;
        }
        return check;
    }
    public boolean check_vSo(String version){
        boolean check = true;
        try{
            int v = Integer.parseInt(version);
            if(v<0||v>99){
                System.out.println("El número de versión debe estar entre 0 y 99");
                check = false;
            }
        }catch(NumberFormatException e){
            System.out.println("Debe introducir un número");
            check = false;
        }
        return check;
    }
    public boolean check_pesoDim(String peso){
        boolean check = true;
        try{
            int p = Integer.parseInt(peso);
            if(p<1||p>500){
                System.out.println("El peso debe estar entre 1 y 500");
                check = false;
            }
        }catch(NumberFormatException e){
            System.out.println("Debe introducir un número");
            check = false;
        }
        return check;
    }
    public boolean check_largoDim(String largo){
        boolean check = true;
        try{
            int l = Integer.parseInt(largo);
            if(l<1||l>200){
                System.out.println("El largo debe estar entre 1 y 200");
                check = false;
            }
        }catch(NumberFormatException e){
            System.out.println("Debe introducir un número");
            check = false;
        }
        return check;
    }
    public boolean check_anchoDim(String ancho){
        boolean check = true;
        try{
            int a = Integer.parseInt(ancho);
            if(a<1||a>200){
                System.out.println("El ancho debe estar entre 1 y 200");
                check = false;
            }
        }catch(NumberFormatException e){
            System.out.println("Debe introducir un número");
            check = false;
        }
        return check;
    }
    public boolean check_altoDim(String alto){
        boolean check = true;
        try{
            int a = Integer.parseInt(alto);
            if(a<1||a>20){
                System.out.println("El alto debe estar entre 1 y 20");
                check = false;
            }
        }catch(NumberFormatException e){
            System.out.println("Debe introducir un número");
            check = false;
        }
        return check;
    }
    public boolean check_resCam(String res){
        boolean check = true;
        if(res.length()!=3){
            System.out.println("El número de teléfono debe de tener 3 cifras");
            check = false;
        }else{
            try{
                Integer.parseInt(res);
            }catch(NumberFormatException e){
                System.out.println("Debe introducir un número");
                check = false;
            }
        }
        return check;
    }
    public boolean check_numCam(String numcam){
        boolean check = true;
        try{
            int a = Integer.parseInt(numcam);
            if(a<1||a>5){
                System.out.println("El número de cámaras debe estar entre 1 y 5");
                check = false;
            }
        }catch(NumberFormatException e){
            System.out.println("Debe introducir un número");
            check = false;
        }
        return check;
    }
    public boolean check_est(String est){
        boolean check = true;
        try{
            int e = Integer.parseInt(est);
            if(e<0||e>1){
                System.out.println("El número debe ser 1 para si y 0 para no");
                check = false;
            }
        }catch(NumberFormatException e){
            System.out.println("Debe introducir un número");
            check = false;
        }
        return check;
    }
    
}
