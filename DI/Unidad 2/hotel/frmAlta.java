/********************************************************************************
 ** Form generated from reading ui file 'frmAlta.jui'
 **
 ** Created by: Qt User Interface Compiler version 4.7.0
 **
 ** WARNING! All changes made in this file will be lost when recompiling ui file!
 ********************************************************************************/
package hotel;

import com.trolltech.qt.core.*;
import com.trolltech.qt.gui.*;

public class frmAlta implements com.trolltech.qt.QUiForm<QDialog>
{
    public QWidget widget;
    public QGridLayout gridLayout_4;
    public QLabel label;
    public QGridLayout gridLayout;
    public QLabel label_2;
    public QLineEdit lineEdit_DNI;
    public QLabel label_5;
    public QLineEdit lineEdit_Nombre;
    public QLabel label_3;
    public QLineEdit lineEdit_Direccion;
    public QSpacerItem horizontalSpacer;
    public QLabel label_4;
    public QLineEdit lineEdit_Localidad;
    public QLabel label_6;
    public QLineEdit lineEdit_Provincia;
    public QLabel label_7;
    public QGridLayout gridLayout_2;
    public QLabel label_9;
    public QCalendarWidget calendarWidget_Llegada;
    public QCalendarWidget calendarWidget_Salida;
    public QLabel label_8;
    public QHBoxLayout horizontalLayout;
    public QLabel label_10;
    public QSpinBox spinBox_NHabitaciones;
    public QLabel label_11;
    public QComboBox comboBox_Tipo;
    public QCheckBox checkBox_Fumador;
    public QGridLayout gridLayout_3;
    public QGroupBox groupBox;
    public QRadioButton radioButton_AD;
    public QRadioButton radioButton_MP;
    public QRadioButton radioButton_PC;
    public QSpacerItem verticalSpacer;
    public QLabel label_Norma;
    public QHBoxLayout horizontalLayout_3;
    public QPushButton pushButton_Limpiar;
    public QSpacerItem horizontalSpacer_2;
    public QDialogButtonBox buttonBox;

    public frmAlta() { super(); }

    void cambiar(){
        //si se ha activado la casilla de verificacion mostraremos el mensaje
        label_Norma.setVisible(checkBox_Fumador.isChecked());
    }

    public void setupUi(QDialog Dialog)
    {
        Dialog.setObjectName("Dialog");
        Dialog.resize(new QSize(679, 592).expandedTo(Dialog.minimumSizeHint()));
        widget = new QWidget(Dialog);
        widget.setObjectName("widget");
        widget.setGeometry(new QRect(10, 10, 655, 558));
        gridLayout_4 = new QGridLayout(widget);
        gridLayout_4.setObjectName("gridLayout_4");
        label = new QLabel(widget);
        label.setObjectName("label");
        QFont font = new QFont();
        font.setPointSize(16);
        font.setBold(true);
        font.setUnderline(true);
        font.setWeight(75);
        label.setFont(font);

        gridLayout_4.addWidget(label, 0, 0, 1, 1);

        gridLayout = new QGridLayout();
        gridLayout.setObjectName("gridLayout");
        label_2 = new QLabel(widget);
        label_2.setObjectName("label_2");

        gridLayout.addWidget(label_2, 0, 0, 1, 1);

        lineEdit_DNI = new QLineEdit(widget);
        lineEdit_DNI.setObjectName("lineEdit_DNI");

        gridLayout.addWidget(lineEdit_DNI, 0, 1, 1, 2);

        label_5 = new QLabel(widget);
        label_5.setObjectName("label_5");

        gridLayout.addWidget(label_5, 0, 3, 1, 1);

        lineEdit_Nombre = new QLineEdit(widget);
        lineEdit_Nombre.setObjectName("lineEdit_Nombre");

        gridLayout.addWidget(lineEdit_Nombre, 0, 4, 1, 3);

        label_3 = new QLabel(widget);
        label_3.setObjectName("label_3");

        gridLayout.addWidget(label_3, 1, 0, 1, 1);

        lineEdit_Direccion = new QLineEdit(widget);
        lineEdit_Direccion.setObjectName("lineEdit_Direccion");

        gridLayout.addWidget(lineEdit_Direccion, 1, 1, 1, 6);

        horizontalSpacer = new QSpacerItem(148, 20, com.trolltech.qt.gui.QSizePolicy.Policy.Expanding, com.trolltech.qt.gui.QSizePolicy.Policy.Minimum);

        gridLayout.addItem(horizontalSpacer, 2, 0, 1, 2);

        label_4 = new QLabel(widget);
        label_4.setObjectName("label_4");

        gridLayout.addWidget(label_4, 2, 2, 1, 1);

        lineEdit_Localidad = new QLineEdit(widget);
        lineEdit_Localidad.setObjectName("lineEdit_Localidad");

        gridLayout.addWidget(lineEdit_Localidad, 2, 3, 1, 2);

        label_6 = new QLabel(widget);
        label_6.setObjectName("label_6");

        gridLayout.addWidget(label_6, 2, 5, 1, 1);

        lineEdit_Provincia = new QLineEdit(widget);
        lineEdit_Provincia.setObjectName("lineEdit_Provincia");

        gridLayout.addWidget(lineEdit_Provincia, 2, 6, 1, 1);


        gridLayout_4.addLayout(gridLayout, 1, 0, 1, 1);

        label_7 = new QLabel(widget);
        label_7.setObjectName("label_7");
        QFont font1 = new QFont();
        font1.setPointSize(16);
        font1.setBold(true);
        font1.setUnderline(true);
        font1.setWeight(75);
        label_7.setFont(font1);

        gridLayout_4.addWidget(label_7, 2, 0, 1, 1);

        gridLayout_2 = new QGridLayout();
        gridLayout_2.setObjectName("gridLayout_2");
        label_9 = new QLabel(widget);
        label_9.setObjectName("label_9");

        gridLayout_2.addWidget(label_9, 0, 1, 1, 1);

        calendarWidget_Llegada = new QCalendarWidget(widget);
        calendarWidget_Llegada.setObjectName("calendarWidget_Llegada");

        gridLayout_2.addWidget(calendarWidget_Llegada, 1, 0, 1, 1);

        calendarWidget_Salida = new QCalendarWidget(widget);
        calendarWidget_Salida.setObjectName("calendarWidget_Salida");

        gridLayout_2.addWidget(calendarWidget_Salida, 1, 1, 1, 1);

        label_8 = new QLabel(widget);
        label_8.setObjectName("label_8");

        gridLayout_2.addWidget(label_8, 0, 0, 1, 1);


        gridLayout_4.addLayout(gridLayout_2, 3, 0, 1, 1);

        horizontalLayout = new QHBoxLayout();
        horizontalLayout.setObjectName("horizontalLayout");
        label_10 = new QLabel(widget);
        label_10.setObjectName("label_10");

        horizontalLayout.addWidget(label_10);

        spinBox_NHabitaciones = new QSpinBox(widget);
        spinBox_NHabitaciones.setObjectName("spinBox_NHabitaciones");

        horizontalLayout.addWidget(spinBox_NHabitaciones);

        label_11 = new QLabel(widget);
        label_11.setObjectName("label_11");

        horizontalLayout.addWidget(label_11);

        comboBox_Tipo = new QComboBox(widget);
        comboBox_Tipo.setObjectName("comboBox_Tipo");

        horizontalLayout.addWidget(comboBox_Tipo);

        checkBox_Fumador = new QCheckBox(widget);
        checkBox_Fumador.setObjectName("checkBox_Fumador");

        horizontalLayout.addWidget(checkBox_Fumador);


        gridLayout_4.addLayout(horizontalLayout, 4, 0, 1, 1);

        gridLayout_3 = new QGridLayout();
        gridLayout_3.setObjectName("gridLayout_3");
        groupBox = new QGroupBox(widget);
        groupBox.setObjectName("groupBox");
        radioButton_AD = new QRadioButton(groupBox);
        radioButton_AD.setObjectName("radioButton_AD");
        radioButton_AD.setGeometry(new QRect(10, 30, 117, 22));
        radioButton_MP = new QRadioButton(groupBox);
        radioButton_MP.setObjectName("radioButton_MP");
        radioButton_MP.setGeometry(new QRect(10, 60, 117, 22));
        radioButton_PC = new QRadioButton(groupBox);
        radioButton_PC.setObjectName("radioButton_PC");
        radioButton_PC.setGeometry(new QRect(10, 90, 117, 22));

        gridLayout_3.addWidget(groupBox, 0, 0, 1, 1);

        verticalSpacer = new QSpacerItem(20, 118, com.trolltech.qt.gui.QSizePolicy.Policy.Minimum, com.trolltech.qt.gui.QSizePolicy.Policy.Expanding);

        gridLayout_3.addItem(verticalSpacer, 0, 1, 1, 1);

        label_Norma = new QLabel(widget);
        label_Norma.setObjectName("label_Norma");
        label_Norma.setWordWrap(true);

        gridLayout_3.addWidget(label_Norma, 0, 2, 1, 1);


        gridLayout_4.addLayout(gridLayout_3, 5, 0, 1, 1);

        horizontalLayout_3 = new QHBoxLayout();
        horizontalLayout_3.setObjectName("horizontalLayout_3");
        pushButton_Limpiar = new QPushButton(widget);
        pushButton_Limpiar.setObjectName("pushButton_Limpiar");

        horizontalLayout_3.addWidget(pushButton_Limpiar);

        horizontalSpacer_2 = new QSpacerItem(318, 20, com.trolltech.qt.gui.QSizePolicy.Policy.Expanding, com.trolltech.qt.gui.QSizePolicy.Policy.Minimum);

        horizontalLayout_3.addItem(horizontalSpacer_2);

        buttonBox = new QDialogButtonBox(widget);
        buttonBox.setObjectName("buttonBox");
        buttonBox.setOrientation(com.trolltech.qt.core.Qt.Orientation.Horizontal);
        buttonBox.setStandardButtons(com.trolltech.qt.gui.QDialogButtonBox.StandardButton.createQFlags(com.trolltech.qt.gui.QDialogButtonBox.StandardButton.Cancel,com.trolltech.qt.gui.QDialogButtonBox.StandardButton.Ok));

        horizontalLayout_3.addWidget(buttonBox);


        gridLayout_4.addLayout(horizontalLayout_3, 6, 0, 1, 1);

        label_2.setBuddy(lineEdit_DNI);
        label_5.setBuddy(lineEdit_Nombre);
        label_3.setBuddy(lineEdit_Direccion);
        label_4.setBuddy(lineEdit_Localidad);
        label_6.setBuddy(lineEdit_Provincia);
        label_10.setBuddy(spinBox_NHabitaciones);
        label_11.setBuddy(comboBox_Tipo);
        QWidget.setTabOrder(lineEdit_DNI, lineEdit_Nombre);
        QWidget.setTabOrder(lineEdit_Nombre, lineEdit_Direccion);
        QWidget.setTabOrder(lineEdit_Direccion, lineEdit_Localidad);
        QWidget.setTabOrder(lineEdit_Localidad, lineEdit_Provincia);
        QWidget.setTabOrder(lineEdit_Provincia, calendarWidget_Llegada);
        QWidget.setTabOrder(calendarWidget_Llegada, calendarWidget_Salida);
        QWidget.setTabOrder(calendarWidget_Salida, spinBox_NHabitaciones);
        QWidget.setTabOrder(spinBox_NHabitaciones, comboBox_Tipo);
        QWidget.setTabOrder(comboBox_Tipo, checkBox_Fumador);
        QWidget.setTabOrder(checkBox_Fumador, radioButton_AD);
        QWidget.setTabOrder(radioButton_AD, radioButton_MP);
        QWidget.setTabOrder(radioButton_MP, radioButton_PC);
        QWidget.setTabOrder(radioButton_PC, pushButton_Limpiar);
        QWidget.setTabOrder(pushButton_Limpiar, buttonBox);
        retranslateUi(Dialog);
        buttonBox.accepted.connect(Dialog, "accept()");
        buttonBox.rejected.connect(Dialog, "reject()");
        pushButton_Limpiar.clicked.connect(lineEdit_DNI, "clear()");
        pushButton_Limpiar.clicked.connect(lineEdit_Nombre, "clear()");
        pushButton_Limpiar.clicked.connect(lineEdit_Direccion, "clear()");
        pushButton_Limpiar.clicked.connect(lineEdit_Localidad, "clear()");
        pushButton_Limpiar.clicked.connect(lineEdit_Provincia, "clear()");
        pushButton_Limpiar.clicked.connect(spinBox_NHabitaciones, "clear()");
        pushButton_Limpiar.clicked.connect(comboBox_Tipo, "clear()");

        /**************************************************
         * Aquí añadimos la conexión signal/slot hecha por el programador.
         * Las anteriores son hechas con QT Designer.
         */

        checkBox_Fumador.clicked.connect(this, "cambiar()");

        /******************************************************/


        Dialog.connectSlotsByName();
    } // setupUi

    void retranslateUi(QDialog Dialog)
    {
        Dialog.setWindowTitle(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Dialog", null));
        label.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Datos del cliente", null));
        label_2.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "&DNI", null));
        lineEdit_DNI.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "DNI del cliente", null));
        label_5.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "&Nombre", null));
        lineEdit_Nombre.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Nombre del cliente.", null));
        label_3.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Di&recci\u00f3n", null));
        lineEdit_Direccion.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Direcci\u00f3n postal del cliente", null));
        label_4.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "&Localidad", null));
        lineEdit_Localidad.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Localidad del cliente.", null));
        label_6.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "&Provincia", null));
        lineEdit_Provincia.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Provincia del cliente.", null));
        label_7.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Datos de la reserva", null));
        label_9.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Fecha de salida", null));
        calendarWidget_Llegada.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Fecha de llegada. Recordar que la entrada es a partir de las 12 del mediodia.", null));
        calendarWidget_Salida.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Fecha de salida. La facturaci\u00f3n debe realizarse antes de las 12 del mediod\u00eda.", null));
        label_8.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Fecha de llegada", null));
        label_10.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "N\u00famero de &habitaciones", null));
        spinBox_NHabitaciones.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "N\u00famero de habitaciones que se quieren reservar.", null));
        label_11.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "&Tipo de habitaci\u00f3n", null));
        comboBox_Tipo.clear();
        comboBox_Tipo.addItem(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Doble de uso individual", null));
        comboBox_Tipo.addItem(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Doble", null));
        comboBox_Tipo.addItem(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Junior Suite", null));
        comboBox_Tipo.addItem(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Junior", null));
        comboBox_Tipo.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Tipo de habitaci\u00f3n.", null));
        checkBox_Fumador.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Recordar al cliente la prohibici\u00f3n de fumar en los espacios comunes del hotel.", null));
        checkBox_Fumador.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "&Fumador", null));
        groupBox.setTitle(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Reservas", null));
        radioButton_AD.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Alojamiento y desayuno. ", null));
        radioButton_AD.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "AD", null));
        radioButton_MP.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Media pensi\u00f3n.", null));
        radioButton_MP.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "MP", null));
        radioButton_PC.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Pensi\u00f3n completa.", null));
        radioButton_PC.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "PC", null));
        label_Norma.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "En virtud de la ley de sanidad se informa a los clientes de que solo podr\u00e1n fumar en las habitaciones reservadas para tal fin.", null));
        pushButton_Limpiar.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "&Limpiar", null));
    } // retranslateUi

}

