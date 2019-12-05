/********************************************************************************
 ** Form generated from reading ui file 'frmPrincipal.jui'
 **
 ** Created by: Qt User Interface Compiler version 4.8.6
 **
 ** WARNING! All changes made in this file will be lost when recompiling ui file!
 ********************************************************************************/
import com.trolltech.qt.core.*;
import com.trolltech.qt.gui.*;

public class MainWindow implements com.trolltech.qt.QUiForm<QMainWindow>
{
    public QAction actionReservas;
    public QAction actionReservas_2;
    public QWidget centralwidget;
    public QPushButton pushButton_Reservas;
    public QPushButton pushButton_Salir;
    public QLabel label;
    public QMenuBar menubar;
    public QMenu menuAplicaci_n;
    public QMenu menuGesti_n;
    public QStatusBar statusbar;

    public MainWindow() { super(); }

    public void setupUi(QMainWindow MainWindow)
    {
        MainWindow.setObjectName("MainWindow");
        MainWindow.resize(new QSize(500, 300).expandedTo(MainWindow.minimumSizeHint()));
        actionReservas = new QAction(MainWindow);
        actionReservas.setObjectName("actionReservas");
        actionReservas_2 = new QAction(MainWindow);
        actionReservas_2.setObjectName("actionReservas_2");
        centralwidget = new QWidget(MainWindow);
        centralwidget.setObjectName("centralwidget");
        pushButton_Reservas = new QPushButton(centralwidget);
        pushButton_Reservas.setObjectName("pushButton_Reservas");
        pushButton_Reservas.setGeometry(new QRect(370, 30, 98, 27));
        pushButton_Salir = new QPushButton(centralwidget);
        pushButton_Salir.setObjectName("pushButton_Salir");
        pushButton_Salir.setGeometry(new QRect(370, 60, 98, 27));
        label = new QLabel(centralwidget);
        label.setObjectName("label");
        label.setGeometry(new QRect(20, 10, 341, 231));
        label.setPixmap(new QPixmap(("recursos/hotel.jpg")));
        label.setScaledContents(true);
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
        menuAplicaci_n.addAction(actionReservas);
        menuGesti_n.addAction(actionReservas_2);
        retranslateUi(MainWindow);
        pushButton_Salir.clicked.connect(MainWindow, "close()");

        MainWindow.connectSlotsByName();
    } // setupUi

    void retranslateUi(QMainWindow MainWindow)
    {
        MainWindow.setWindowTitle(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "MainWindow", null));
        actionReservas.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Salir", null));
        actionReservas_2.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Reservas", null));
        pushButton_Reservas.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "&Reservas", null));
        pushButton_Salir.setText(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "&Salir", null));
        label.setText("");
        menuAplicaci_n.setTitle(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Aplicaci\u00f3n", null));
        menuGesti_n.setTitle(com.trolltech.qt.core.QCoreApplication.translate("MainWindow", "Gesti\u00f3n", null));
    } // retranslateUi

}

