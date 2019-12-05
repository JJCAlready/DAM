package di02_qtdesigner;

/********************************************************************************
 ** Form generated from reading ui file 'principal.jui'
 **
 ** Created by: Qt User Interface Compiler version 4.8.6
 **
 ** WARNING! All changes made in this file will be lost when recompiling ui file!
 ********************************************************************************/

import com.trolltech.qt.core.*;
import com.trolltech.qt.gui.*;

public class frmPrincipal implements com.trolltech.qt.QUiForm<QMainWindow>
{
    public QAction actionFormulario1;
    public QAction actionFormulario2;
    public QAction actionSalir;
    public QAction actionHep;
    public QAction actionAcerca_de;
    public QAction actionReservas;
    public QWidget centralwidget;
    public QPushButton bttnReserva;
    public QLabel lbHotel;
    public QPushButton bttnSalir;
    public QMenuBar menubar;
    public QMenu menuPrincipal;
    //public QMenu menuAyuda;
    public QStatusBar statusbar;

    public frmPrincipal() { super(); }
    
    void abrir(){

        frmAlta Alta = new frmAlta();
        QDialog dialog = new QDialog();
        Alta.setupUi(dialog);
        dialog.show();

    }
    
    

    public void setupUi(QMainWindow MainWindow)
    {
        MainWindow.setObjectName("MainWindow");
        MainWindow.resize(new QSize(500, 275).expandedTo(MainWindow.minimumSizeHint()));
      //  actionFormulario1 = new QAction(MainWindow);
      //  actionFormulario1.setObjectName("actionFormulario1");
        actionFormulario2 = new QAction(MainWindow);
        actionFormulario2.setObjectName("actionFormulario2");
       
        actionSalir = new QAction(MainWindow);
        actionSalir.setObjectName("actionSalir");
        // añadimos funcionalidad al menu
        actionSalir.triggered.connect(MainWindow, "close()");
        
        actionReservas = new QAction(MainWindow);
        actionReservas.setObjectName("actionReservas");
        /******************************************************
         * Añadimos funcionalidad al menú
         */
        actionFormulario2.triggered.connect(this, "abrir()");
        /*********************************************************/

        
        actionHep = new QAction(MainWindow);
        actionHep.setObjectName("actionHep");
        actionAcerca_de = new QAction(MainWindow);
        actionAcerca_de.setObjectName("actionAcerca_de");
        centralwidget = new QWidget(MainWindow);
        centralwidget.setObjectName("centralwidget");
        bttnReserva = new QPushButton(centralwidget);
        bttnReserva.setObjectName("bttnReserva");
        bttnReserva.setGeometry(new QRect(370, 70, 91, 41));
        lbHotel = new QLabel(centralwidget);
        lbHotel.setObjectName("lbHotel");
        lbHotel.setGeometry(new QRect(70, 20, 261, 181));
        lbHotel.setPixmap(new QPixmap(("postal-habana.png")));
        lbHotel.setPixmap(new QPixmap(("classpath:recursos/postal-habana.png")));
        bttnSalir = new QPushButton(centralwidget);
        bttnSalir.setObjectName("bttnSalir");
        bttnSalir.setGeometry(new QRect(370, 120, 91, 41));
        MainWindow.setCentralWidget(centralwidget);
        menubar = new QMenuBar(MainWindow);
        menubar.setObjectName("menubar");
        menubar.setGeometry(new QRect(0, 0, 500, 21));
        menuPrincipal = new QMenu(menubar);
        menuPrincipal.setObjectName("menuPrincipal");
     //   menuAyuda = new QMenu(menubar);
    //    menuAyuda.setObjectName("menuAyuda");
        MainWindow.setMenuBar(menubar);
        statusbar = new QStatusBar(MainWindow);
        statusbar.setObjectName("statusbar");
        MainWindow.setStatusBar(statusbar);

        menubar.addAction(menuPrincipal.menuAction());
      //  menubar.addAction(menuAyuda.menuAction());
     
       // menuPrincipal.addAction(actionReservas);
        menuPrincipal.addAction(actionFormulario2);
        
        menuPrincipal.addSeparator();
        menuPrincipal.addAction(actionSalir);
     //   menuAyuda.addAction(actionHep);
     //   menuAyuda.addAction(actionAcerca_de);
        retranslateUi(MainWindow);
        /*****************************************************************
         * Aquí pongo la conexión signal/slot de usuario
         * tanto de reservas como de salir.
         */
        bttnReserva.clicked.connect(this, "abrir()");
        bttnSalir.clicked.connect(MainWindow, "close()");
        MainWindow.connectSlotsByName();
    } // setupUi

    void retranslateUi(QMainWindow MainWindow)
    {
        MainWindow.setWindowTitle(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Men\u00fa principal", null));
       // actionFormulario1.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Formulario1", null));
       actionFormulario2.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Reservas", null));
        actionSalir.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Salir", null));
        actionHep.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Hep", null));
        actionAcerca_de.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Acerca de ...", null));
        bttnReserva.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Reservas", null));
        lbHotel.setText("");
        bttnSalir.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Salir", null));
        menuPrincipal.setTitle(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "principal", null));
      //  menuAyuda.setTitle(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Ayuda", null));
    } // retranslateUi

}

