/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gestionpacientes;

import java.awt.Component;
import java.net.URL;
import java.util.ArrayList;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javax.swing.JOptionPane;
import javax.swing.JTextArea;

/**
 *
 * @author Jorge Custodio
 */
public class FXMLDocumentController implements Initializable {
    
    @FXML
    Label label;
    TextField txt_nif;
    TextField txt_nombre;
    TextField txt_apellidos;
    TextField txt_enfermedad;
    JTextArea txta_mostrar;
    Component lbl_msg;
    ArrayList<Paciente> Pacientes = new ArrayList<Paciente>();
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
    private void handleButtonAction(ActionEvent event){
        Metodos meth = new Metodos();
        Paciente paciente = new Paciente();
        int validate = 0;
        
        if(meth.checkNIF(txt_nif.getText())!=null){
            paciente.setNif(txt_nif.getText());
            validate++;
        }
        if(meth.checkPersData(txt_nombre.getText())!=null){
            paciente.setNombre(txt_nombre.getText());
            validate++;
        }
        if(meth.checkPersData(txt_apellidos.getText())!=null){
            paciente.setApellidos(txt_apellidos.getText());
            validate++;
        }
        if(meth.checkPersData(txt_enfermedad.getText())!=null){
            paciente.setEnfermedad(txt_enfermedad.getText());
            validate++;
        }
        if(validate==4){
            if(meth.medico_exists(paciente.getNif(), Pacientes)){
                JOptionPane.showMessageDialog(lbl_msg, "El médico ya está agregado");
            }else{
                Pacientes.add(paciente);
                JOptionPane.showMessageDialog(lbl_msg, "Médico agregado correctamente");
                clear_texts();
            }
        }else{
            JOptionPane.showMessageDialog(lbl_msg, "Los datos requeridos no son adecuados, por favor revise.");
        }
    }                                      
    public void clear_texts(){
        txt_nif.setText("");
        txt_nombre.setText("");
        txt_apellidos.setText("");
        txt_enfermedad.setText("");
        txta_mostrar.setText("");
                
    }
    private void btn_mostrarMouseClicked(java.awt.event.MouseEvent evt) {                                         
        // TODO add your handling code here:
        for(Paciente med: Pacientes){
            txta_mostrar.append(med.toString());
        }
    }
    
}
