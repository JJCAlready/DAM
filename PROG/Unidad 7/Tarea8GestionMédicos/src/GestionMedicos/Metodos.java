/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GestionMedicos;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 *
 * @author Jorge Custodio
 */
public class Metodos {
    
    /**
     * Comprueba que el NIF esté correctamente introducido
     * @param nif
     * @return 
     */
    public String checkNIF(String nif){
        String check = null;
        Pattern p = Pattern.compile("[0-9]{8}[A-Za-z]{1}");
        Matcher m = p.matcher(nif);
        if(m.matches()){
            check = nif;
        }
        return check;
    }
    /**
     * Comprueba que los datos sean alfabeticos
     * se aplica a nombre y apellidos
     * @param data
     * @return 
     */
    public String checkPersData(String data){
        String check = null;
        Pattern p = Pattern.compile("[A-Za-z\\s]{2,}");
        Matcher m = p.matcher(data);
        if(m.matches()){
            check = data;
        }
        return check;
    }
}
