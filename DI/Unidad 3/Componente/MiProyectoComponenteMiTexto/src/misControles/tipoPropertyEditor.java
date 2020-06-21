/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package misControles;

import java.awt.Component;
import java.beans.PropertyEditorSupport;

/**
 *
 * @author MJ
 */
public class tipoPropertyEditor extends PropertyEditorSupport {
    /*
     * Unica propiedad que tiene nuestro componente, es el panel usado 
     * como interfaz gráfica para rellenar el dato tipo.
     */
    private editorPanel editor = null;

    /*
     * En el contructor nicializamos el panel.
     */
    public tipoPropertyEditor() {
        this.editor = new editorPanel();
    }

    /*
     * Devuelve el editor personalizado usamos el
     * inspector de propiedades para rellenar el 
     * dato tipo.
     */
    @Override
    public Component getCustomEditor() {
        return editor;
    }

    /*
     * Si el valor de la propiedad es un conjunto de valores enumerados, 
     * como es nuestro caso, el método getTags() debe devolver un array
     * con los posibles valores de la propiedad.
     */
    @Override
    public String[] getTags() {
        String[] tags = {"Entero", "Real", "Texto"};
        return tags;
    }

    /*
     * Devuelve el valor de la propiedad
     */
    @Override
    public Object getValue() {
        if(super.getValue()==null){
            setValue(null);
        }
        String ret = (String) super.getValue();
        ret = editor.cmbTipo.getSelectedItem().toString();
        return ret;
    }

    /*
     * Asigna un valor (obtenido del panel) a la propiedad
     */
    @Override
    public void setValue(Object tipo) {
        if(tipo==null){
            tipo = new String();
        }
        super.setValue(tipo);

    }

    /*
     * Indica si se proporciona un editor personalizado 
     */
    @Override
    public boolean supportsCustomEditor() {
        return true;
    }

    /*
     * Devuelve el valor de la propiedad como texto
     */
    @Override
    public String getAsText(){
        return super.getAsText();
    }

    /*
     * Asigna una texto a la propiedad
     */
    @Override
    public void setAsText(String text){
        super.setAsText(text);
    }

    /*
     * Este método se usa cuando se debe generar código Java
     * para establecer el valor de la propiedad. Debe devolver
     * un fragmento de código Java que se puede utilizar para 
     * inicializar una variable con el valor de la propiedad actual.
     */
    @Override
    public String getJavaInitializationString() {
        String tipo = editor.cmbTipo.getSelectedItem().toString();
        return tipo;
    }
}
