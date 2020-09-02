/*
 * Tarea8GestionMedicosView.java
 */

package tarea8gestionmedicos;

import java.util.ArrayList;
import org.jdesktop.application.SingleFrameApplication;
import org.jdesktop.application.FrameView;
import javax.swing.JDialog;
import javax.swing.JOptionPane;


/**
 * The application's main frame.
 */
public class Tarea8GestionMedicosView extends FrameView {
    Metodos meth = new Metodos();
    ArrayList<Medico> Medicos = new ArrayList<Medico>();
    public Tarea8GestionMedicosView(SingleFrameApplication app) {
        super(app);

        initComponents();
    }

    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        mainPanel = new javax.swing.JPanel();
        lbl_medico = new javax.swing.JLabel();
        sep_top = new javax.swing.JSeparator();
        txt_nif = new javax.swing.JTextField();
        lbl_nif = new javax.swing.JLabel();
        txt_nombre = new javax.swing.JTextField();
        lbl_nombre = new javax.swing.JLabel();
        txt_apellidos = new javax.swing.JTextField();
        lbl_nif2 = new javax.swing.JLabel();
        txt_especialidad = new javax.swing.JTextField();
        lbl_nif3 = new javax.swing.JLabel();
        btn_nuevo = new javax.swing.JButton();
        sep_bot = new javax.swing.JSeparator();
        jScrollPane1 = new javax.swing.JScrollPane();
        txta_show = new javax.swing.JTextArea();
        btn_mostrar = new javax.swing.JButton();

        mainPanel.setName("mainPanel"); // NOI18N

        org.jdesktop.application.ResourceMap resourceMap = org.jdesktop.application.Application.getInstance(tarea8gestionmedicos.Tarea8GestionMedicosApp.class).getContext().getResourceMap(Tarea8GestionMedicosView.class);
        lbl_medico.setFont(resourceMap.getFont("lblMedico.font")); // NOI18N
        lbl_medico.setForeground(resourceMap.getColor("lblMedico.foreground")); // NOI18N
        lbl_medico.setText(resourceMap.getString("lblMedico.text")); // NOI18N
        lbl_medico.setToolTipText(resourceMap.getString("lblMedico.toolTipText")); // NOI18N
        lbl_medico.setName("lblMedico"); // NOI18N

        sep_top.setBackground(resourceMap.getColor("sep_top.background")); // NOI18N
        sep_top.setForeground(resourceMap.getColor("sep_top.foreground")); // NOI18N
        sep_top.setName("sep_top"); // NOI18N

        txt_nif.setName("txt_nif"); // NOI18N
        txt_nif.setNextFocusableComponent(txt_nombre);

        lbl_nif.setFont(resourceMap.getFont("lbl_nif.font")); // NOI18N
        lbl_nif.setForeground(resourceMap.getColor("lbl_nif.foreground")); // NOI18N
        lbl_nif.setText(resourceMap.getString("lbl_nif.text")); // NOI18N
        lbl_nif.setToolTipText(resourceMap.getString("lbl_nif.toolTipText")); // NOI18N
        lbl_nif.setName("lbl_nif"); // NOI18N

        txt_nombre.setName("txt_nombre"); // NOI18N
        txt_nombre.setNextFocusableComponent(txt_apellidos);

        lbl_nombre.setFont(resourceMap.getFont("lbl_nombre.font")); // NOI18N
        lbl_nombre.setForeground(resourceMap.getColor("lbl_nombre.foreground")); // NOI18N
        lbl_nombre.setText(resourceMap.getString("lbl_nombre.text")); // NOI18N
        lbl_nombre.setToolTipText(resourceMap.getString("lbl_nombre.toolTipText")); // NOI18N
        lbl_nombre.setName("lbl_nombre"); // NOI18N

        txt_apellidos.setName("txt_apellidos"); // NOI18N
        txt_apellidos.setNextFocusableComponent(txt_especialidad);
        txt_apellidos.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_apellidosActionPerformed(evt);
            }
        });

        lbl_nif2.setFont(resourceMap.getFont("lbl_nif2.font")); // NOI18N
        lbl_nif2.setForeground(resourceMap.getColor("lbl_nif2.foreground")); // NOI18N
        lbl_nif2.setText(resourceMap.getString("lbl_nif2.text")); // NOI18N
        lbl_nif2.setToolTipText(resourceMap.getString("lbl_nif2.toolTipText")); // NOI18N
        lbl_nif2.setName("lbl_nif2"); // NOI18N

        txt_especialidad.setName("txt_especialidad"); // NOI18N
        txt_especialidad.setNextFocusableComponent(btn_nuevo);

        lbl_nif3.setFont(resourceMap.getFont("lbl_nif3.font")); // NOI18N
        lbl_nif3.setForeground(resourceMap.getColor("lbl_nif3.foreground")); // NOI18N
        lbl_nif3.setText(resourceMap.getString("lbl_nif3.text")); // NOI18N
        lbl_nif3.setToolTipText(resourceMap.getString("lbl_nif3.toolTipText")); // NOI18N
        lbl_nif3.setName("lbl_nif3"); // NOI18N

        btn_nuevo.setFont(resourceMap.getFont("btn_nuevo.font")); // NOI18N
        btn_nuevo.setText(resourceMap.getString("btn_nuevo.text")); // NOI18N
        btn_nuevo.setName("btn_nuevo"); // NOI18N
        btn_nuevo.setNextFocusableComponent(txta_show);
        btn_nuevo.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                btn_nuevoMouseClicked(evt);
            }
        });

        sep_bot.setBackground(resourceMap.getColor("sep_bot.background")); // NOI18N
        sep_bot.setForeground(resourceMap.getColor("sep_bot.foreground")); // NOI18N
        sep_bot.setName("sep_bot"); // NOI18N

        jScrollPane1.setName("jScrollPane1"); // NOI18N

        txta_show.setColumns(20);
        txta_show.setRows(5);
        txta_show.setName("txta_show"); // NOI18N
        txta_show.setNextFocusableComponent(btn_mostrar);
        jScrollPane1.setViewportView(txta_show);

        btn_mostrar.setFont(resourceMap.getFont("btn_mostrar.font")); // NOI18N
        btn_mostrar.setText(resourceMap.getString("btn_mostrar.text")); // NOI18N
        btn_mostrar.setName("btn_mostrar"); // NOI18N
        btn_mostrar.setNextFocusableComponent(txt_nif);
        btn_mostrar.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                btn_mostrarMouseClicked(evt);
            }
        });

        javax.swing.GroupLayout mainPanelLayout = new javax.swing.GroupLayout(mainPanel);
        mainPanel.setLayout(mainPanelLayout);
        mainPanelLayout.setHorizontalGroup(
            mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(mainPanelLayout.createSequentialGroup()
                .addGroup(mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(mainPanelLayout.createSequentialGroup()
                        .addGroup(mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(mainPanelLayout.createSequentialGroup()
                                .addGap(35, 35, 35)
                                .addComponent(lbl_medico))
                            .addGroup(mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                .addGroup(javax.swing.GroupLayout.Alignment.LEADING, mainPanelLayout.createSequentialGroup()
                                    .addGap(97, 97, 97)
                                    .addGroup(mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                        .addGroup(mainPanelLayout.createSequentialGroup()
                                            .addComponent(lbl_nombre)
                                            .addGap(18, 18, 18)
                                            .addComponent(txt_nombre, javax.swing.GroupLayout.PREFERRED_SIZE, 119, javax.swing.GroupLayout.PREFERRED_SIZE))
                                        .addGroup(mainPanelLayout.createSequentialGroup()
                                            .addComponent(lbl_nif)
                                            .addGap(18, 18, 18)
                                            .addComponent(txt_nif, javax.swing.GroupLayout.PREFERRED_SIZE, 119, javax.swing.GroupLayout.PREFERRED_SIZE))
                                        .addGroup(mainPanelLayout.createSequentialGroup()
                                            .addComponent(lbl_nif2)
                                            .addGap(18, 18, 18)
                                            .addComponent(txt_apellidos, javax.swing.GroupLayout.PREFERRED_SIZE, 119, javax.swing.GroupLayout.PREFERRED_SIZE))
                                        .addGroup(mainPanelLayout.createSequentialGroup()
                                            .addComponent(lbl_nif3)
                                            .addGap(18, 18, 18)
                                            .addComponent(txt_especialidad, javax.swing.GroupLayout.PREFERRED_SIZE, 119, javax.swing.GroupLayout.PREFERRED_SIZE)))
                                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(btn_nuevo))
                                .addGroup(javax.swing.GroupLayout.Alignment.LEADING, mainPanelLayout.createSequentialGroup()
                                    .addGap(22, 22, 22)
                                    .addComponent(sep_top, javax.swing.GroupLayout.PREFERRED_SIZE, 425, javax.swing.GroupLayout.PREFERRED_SIZE))))
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, mainPanelLayout.createSequentialGroup()
                        .addGap(0, 0, Short.MAX_VALUE)
                        .addGroup(mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(sep_bot, javax.swing.GroupLayout.PREFERRED_SIZE, 425, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(mainPanelLayout.createSequentialGroup()
                                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 325, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(18, 18, 18)
                                .addComponent(btn_mostrar)))))
                .addContainerGap())
        );
        mainPanelLayout.setVerticalGroup(
            mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(mainPanelLayout.createSequentialGroup()
                .addGap(26, 26, 26)
                .addComponent(lbl_medico)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(sep_top, javax.swing.GroupLayout.PREFERRED_SIZE, 10, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGroup(mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(mainPanelLayout.createSequentialGroup()
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(txt_nif, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(lbl_nif)))
                    .addGroup(mainPanelLayout.createSequentialGroup()
                        .addGap(14, 14, 14)
                        .addComponent(btn_nuevo)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_nombre, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_nombre))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_apellidos, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_nif2))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_especialidad, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_nif3))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(sep_bot, javax.swing.GroupLayout.PREFERRED_SIZE, 10, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGroup(mainPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(btn_mostrar))
                .addContainerGap())
        );

        setComponent(mainPanel);
    }// </editor-fold>//GEN-END:initComponents

    private void txt_apellidosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_apellidosActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_apellidosActionPerformed

    private void btn_nuevoMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_btn_nuevoMouseClicked
        Medico medico = new Medico();
        int validate = 0;
        if(meth.checkNIF(txt_nif.getText())!=null){
            medico.setNif(txt_nif.getText());
            validate++;
        }
        if(meth.checkPersData(txt_nombre.getText())!=null){
            medico.setNombre(txt_nombre.getText());
            validate++;
        }
        if(meth.checkPersData(txt_apellidos.getText())!=null){
            medico.setApellidos(txt_apellidos.getText());
            validate++;
        }
        if(meth.checkPersData(txt_especialidad.getText())!=null){
            medico.setEspecialidad(txt_especialidad.getText());
            validate++;
        }
        if(validate==4){
            if(meth.medico_exists(medico.getNif(), Medicos)){
                JOptionPane.showMessageDialog(lbl_nombre, "El médico ya está agregado");
            }else{
                Medicos.add(medico);
                JOptionPane.showMessageDialog(lbl_nombre, "Médico agregado correctamente");
                clear_texts();
            }
        }else{
            JOptionPane.showMessageDialog(lbl_nombre, "Los datos requeridos no son adecuados, por favor revise.");
        }
    }//GEN-LAST:event_btn_nuevoMouseClicked
    public void clear_texts(){
        txt_nif.setText("");
        txt_nombre.setText("");
        txt_apellidos.setText("");
        txt_especialidad.setText("");
        txta_show.setText("");
                
    }
    private void btn_mostrarMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_btn_mostrarMouseClicked
        // TODO add your handling code here:
        for(Medico med: Medicos){
            txta_show.append(med.toString());
        }
    }//GEN-LAST:event_btn_mostrarMouseClicked

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_mostrar;
    private javax.swing.JButton btn_nuevo;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JLabel lbl_medico;
    private javax.swing.JLabel lbl_nif;
    private javax.swing.JLabel lbl_nif2;
    private javax.swing.JLabel lbl_nif3;
    private javax.swing.JLabel lbl_nombre;
    private javax.swing.JPanel mainPanel;
    private javax.swing.JSeparator sep_bot;
    private javax.swing.JSeparator sep_top;
    private javax.swing.JTextField txt_apellidos;
    private javax.swing.JTextField txt_especialidad;
    private javax.swing.JTextField txt_nif;
    private javax.swing.JTextField txt_nombre;
    private javax.swing.JTextArea txta_show;
    // End of variables declaration//GEN-END:variables

    private JDialog aboutBox;
}
