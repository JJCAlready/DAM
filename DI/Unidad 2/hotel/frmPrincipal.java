/********************************************************************************
 ** Form generated from reading ui file 'frmPrincipal.jui'
 **
 ** Created by: Qt User Interface Compiler version 4.7.0
 **
 ** WARNING! All changes made in this file will be lost when recompiling ui file!
 ********************************************************************************/
package hotel;

import com.trolltech.qt.core.*;
import com.trolltech.qt.gui.*;

public class frmPrincipal implements com.trolltech.qt.QUiForm<QMainWindow>
{
    public QAction actionSalir;
    public QAction actionReservas;
    public QWidget centralwidget;
    public QLabel label;
    public QWidget widget;
    public QVBoxLayout verticalLayout;
    public QPushButton pushButton_Reservas;
    public QPushButton pushButton_Salir;
    public QMenuBar menubar;
    public QMenu menuAplicaci_n;
    public QMenu menuGesti_n;
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
        MainWindow.resize(new QSize(500, 300).expandedTo(MainWindow.minimumSizeHint()));
        actionSalir = new QAction(MainWindow);
        actionSalir.setObjectName("actionSalir");
        /******************************************************
         * Añadimos funcionalidad al menú
         */
        actionSalir.triggered.connect(MainWindow, "close()");
        /*********************************************************/

        actionReservas = new QAction(MainWindow);
        actionReservas.setObjectName("actionReservas");
        /******************************************************
         * Añadimos funcionalidad al menú
         */
        actionReservas.triggered.connect(this, "abrir()");
        /*********************************************************/

        centralwidget = new QWidget(MainWindow);
        centralwidget.setObjectName("centralwidget");
        label = new QLabel(centralwidget);
        label.setObjectName("label");
        label.setGeometry(new QRect(20, 10, 341, 231));
        label.setPixmap(new QPixmap(("classpath:recursos/hotel.jpg")));
        label.setScaledContents(true);
        widget = new QWidget(centralwidget);
        widget.setObjectName("widget");
        widget.setGeometry(new QRect(370, 30, 109, 95));
        verticalLayout = new QVBoxLayout(widget);
        verticalLayout.setObjectName("verticalLayout");
        pushButton_Reservas = new QPushButton(widget);
        pushButton_Reservas.setObjectName("pushButton_Reservas");

        verticalLayout.addWidget(pushButton_Reservas);

        pushButton_Salir = new QPushButton(widget);
        pushButton_Salir.setObjectName("pushButton_Salir");

        verticalLayout.addWidget(pushButton_Salir);

        MainWindow.setCentralWidget(centralwidget);
        menubar = new QMenuBar(MainWindow);
        menubar.setObjectName("menubar");
        menubar.setGeometry(new QRect(0, 0, 500, 25));
        menuAplicaci_n = new QMenu(menubar);
        menuAplicaci_n.setObjectName("menuAplicaci_n");
        menuGesti_n = new QMenu(menubar);
        menuGesti_n.setObjectName("menuGesti_n");
        MainWindow.setMenuBar(menubar);
        statusbar = new QStatusBar(MainWindow);
        statusbar.setObjectName("statusbar");
        MainWindow.setStatusBar(statusbar);

        menubar.addAction(menuAplicaci_n.menuAction());
        menubar.addAction(menuGesti_n.menuAction());
        menuAplicaci_n.addAction(actionSalir);
        menuGesti_n.addAction(actionReservas);
        retranslateUi(MainWindow);
        pushButton_Salir.clicked.connect(MainWindow, "close()");


        /*****************************************************************
         * Aquí pongo la conexión signal/slot de usuario
         * Al hacer clic en el botón Reservas se abre el dialogo de reservas.
         */
        pushButton_Reservas.clicked.connect(this, "abrir()");

        MainWindow.connectSlotsByName();
    } // setupUi

    void retranslateUi(QMainWindow MainWindow)
    {
        MainWindow.setWindowTitle(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "MainWindow", null));
        actionSalir.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Salir", null));
        actionReservas.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Reservas", null));
        label.setText("");
        pushButton_Reservas.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "&Reservas", null));
        pushButton_Salir.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "&Salir", null));
        menuAplicaci_n.setTitle(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Aplicaci\u00f3n", null));
        menuGesti_n.setTitle(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Gesti\u00f3n", null));
    } // retranslateUi

}

