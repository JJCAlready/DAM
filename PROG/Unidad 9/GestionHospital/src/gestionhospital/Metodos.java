/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gestionhospital;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.Statement;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.JTextArea;

/**
 *
 * @author Jorge Custodio
 */
public class Metodos {
    public void crear_tabla(){
        Connection con;
        try {
            con = (Connection) DriverManager.getConnection (
                    "jdbc:mysql://localhost:3306/hospital", "root", "manahmanah");
            java.sql.Statement stmt = con.createStatement();
            stmt.execute("CREATE TABLE medicos (nif varchar(9) PRIMARY KEY, nombre VARCHAR(30), apellidos VARCHAR(100), especialidad VARCHAR(100));");
            
        } catch (SQLException ex) {
            Logger.getLogger(Metodos.class.getName()).log(Level.SEVERE, null, ex);
        }
        // Ejecuta la consulta
        
    }
    public void insertar_datos(){
        Connection con;
        try {
            con = (Connection) DriverManager.getConnection (
                    "jdbc:mysql://localhost:3306/hospital", "root", "manahmanah");
            java.sql.Statement stmt = con.createStatement();
            stmt.execute("INSERT INTO medicos(nif, nombre, apellidos, especialidad) VALUES(12345678A, Patatines', 'patatames paotato', 'cirugia');");
            stmt.executeUpdate("INSERT INTO medicos(nif, nombre, apellidos, especialidad) VALUES(12345678A, 'Juan', 'Palomo', 'odontologia');");
            stmt.executeUpdate("INSERT INTO medicos(nif, nombre, apellidos, especialidad) VALUES(12345678A, 'Paco', 'Mer', 'podologia');");
            
        } catch (SQLException ex) {
            Logger.getLogger(Metodos.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    public void seleccionar_datos(){
        Connection con;
        String mostrar="";
        try {
            con = (Connection) DriverManager.getConnection (
                    "jdbc:mysql://localhost:3306/hospital", "root", "manahmanah");
            java.sql.Statement stmt = con.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT * FROM medicos;");
            while(rs.next()){
                mostrar += rs.getString("nif") + "\n";
                mostrar += rs.getString("nombre") + "\n";
                mostrar += rs.getString("apellidos") + "\n";
                mostrar += rs.getString("especialidad") + "\n";
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(Metodos.class.getName()).log(Level.SEVERE, null, ex);
        }
        JOptionPane select = new JOptionPane();
        JOptionPane.showMessageDialog(null, select);
    }
}
