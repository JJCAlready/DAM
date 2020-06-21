/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gestioncredenciales;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 *
 * @author Jorge Custodio Calle
 */
public class GestionCredenciales {
    
    
    public static void main(String[] args) {
        ArrayList<String[]> credenciales = new ArrayList<String[]>();
        BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
        String[] creds = new String[2];
        String user="";
        String password="";        
        int opcion = 0;
        do{
            System.out.println("*======= Menú credenciales ============*");
            System.out.println("* 1. Alta de usuario                   *");
            System.out.println("* 2. Baja de usuario                   *");
            System.out.println("* 3. Listado de usuarios               *");
            System.out.println("* 4. Salir                             *");
            System.out.println("*======================================*");
            try {
                opcion = Integer.parseInt(teclado.readLine());
            } catch (IOException ex) {
                System.out.println("Introduce un número");
            }catch(NumberFormatException e){
                System.out.println("Debe introducir un número");
            }
            switch(opcion){
                case 1:
                    do{
                        System.out.println("Introduzca nombre de usuario");
                        try {
                            user = teclado.readLine();
                        } catch (IOException ex) {
                            System.out.println("Error al introducir el usuario");
                        }           
                    }while(check_user(user)!=user && user_exists(user, credenciales)!=true);
                    do{
                        System.out.println("Introduzca contraseña");
                        try {
                            password = teclado.readLine();
                        } catch (IOException ex) {
                            System.out.println("Error al introducir la contrasña");
                        }
                    }while(check_password(password,user)!=password);
                    creds[0] = user;
                    creds[1] = password;
                    add_user(creds, credenciales);
                    break;
                case 2:
                    int intentos=0;
                    do{
                        System.out.println("Introduzca nombre de usuario");
                        try {
                            user = teclado.readLine();
                        } catch (IOException ex) {
                            System.out.println("Error al introducir el usuario");
                        }
                        intentos++;
                    }while(user_exists(user, credenciales)!=true&& intentos<3);
                    
                    intentos=0;
                    do{
                        System.out.println("Introduzca contraseña");
                        try {
                            password = teclado.readLine();
                        } catch (IOException ex) {
                            System.out.println("Error al introducir la contrasña");
                        }
                        creds[0] = user;
                        creds[1] = password;
                        intentos++;
                    }while(intentos<3 && delete_user(creds, credenciales)!=true);
                    creds=null;
                    break;
                case 3:
                    show_list(credenciales);
                    break;
            }
        }while(opcion!=4);
    }
    
    public static String check_user(String usuario){
        Pattern p=Pattern.compile("[A-Za-z0-9]{8,20}");
        Matcher m=p.matcher(usuario);
        if (!m.matches()){ 
            System.out.println("El usuario no es válido");
            return null;
        }
        return usuario;
    }
    public static String check_password(String password, String user){
        
        Pattern a=Pattern.compile("[A-Za-z]{8,15}");
        Pattern n=Pattern.compile("[0-9]{8,15}");
        Pattern ane=Pattern.compile("[A-Za-z0-9]{8,15}");
        Pattern puser = Pattern.compile(user);
        
        Matcher ma=a.matcher(password);
        Matcher mn=n.matcher(password);
        Matcher mane=ane.matcher(password);
        Matcher muser=puser.matcher(password);
        
        if(ma.matches()){
            System.out.println("La contraseña no puede ser solo alfabética");
            return null;
        }
            
        else if (mn.matches()){
            System.out.println("La contraseña no puede ser solo numérica");
            return null;
        }
        else if (mane.matches()){
            System.out.println("La contraseña no puede ser solo alfanumérica");
            return null;
        }else if (muser.find()){
            System.out.println("El nombre de usuario no puede aparecer en la contraseña");
            return null;
        }else if(password.length()<8 || password.length()>20){
            System.out.println("La contraseña tiene que tener entre 8 y 20 caracteres");
            return null;
        }
        
        return password;
    }
    public static void add_user(String[] creds, ArrayList<String[]> credenciales) {
        if(user_exists(creds[0].toString(), credenciales)){
            System.out.println("El usuario ya existe");
        }else{
            credenciales.add(creds);
            System.out.println("Usuario añadido");
        }        
    }
    public static boolean user_exists(String user, ArrayList<String[]> credenciales){
        boolean check=false;
        if(credenciales.contains(user)){
            System.out.println("El usuario existe");
            check=true;
        }
        return check;
    }
    public static boolean delete_user(String[] creds, ArrayList<String[]> credenciales){
        boolean check = false;
        if(creds[1].equals(credenciales.get(credenciales.indexOf(creds))[1])){
            credenciales.remove(creds);
            System.out.println("Usuario eliminado con éxito.");
            check = true;
        }else{
            System.out.println("Contraseña incorrecta");
        }
        return check;
    }
    public static void show_list(ArrayList<String[]> credenciales){
        for(String[] creds : credenciales){
            System.out.println((credenciales.indexOf(creds)+1)+".\t "+creds[0].toString()+"\t"+creds[1].toString());
        }
    }
}
