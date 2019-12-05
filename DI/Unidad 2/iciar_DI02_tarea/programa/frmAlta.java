package di02_qtdesigner;

/********************************************************************************
 ** Form generated from reading ui file 'formulario1.jui'
 **
 ** Created by: Qt User Interface Compiler version 4.8.6
 **
 ** WARNING! All changes made in this file will be lost when recompiling ui file!
 ********************************************************************************/
import com.trolltech.qt.core.*;
import com.trolltech.qt.gui.*;

public class frmAlta implements com.trolltech.qt.QUiForm<QDialog>
{
    public QWidget widget;
    public QGridLayout gridLayout_3;
    public QGridLayout gridLayout;
    public QLabel lbDatosCliente;
    public QLabel lbNombre;
    public QLineEdit lnNombre;
    public QSpacerItem horizontalSpacer;
    public QLabel lbTelefono;
    public QLineEdit lnTelefono;
    public QLabel lbDatosReserva;
    public QHBoxLayout horizontalLayout_2;
    public QVBoxLayout verticalLayout_2;
    public QLabel lbFechaLlegada;
    public QCalendarWidget calendarWidget;
    public QSpacerItem horizontalSpacer_3;
    public QGridLayout gridLayout_2;
    public QLabel lbTipoEvento;
    public QVBoxLayout verticalLayout_3;
    public QRadioButton rbttnBanquete;
    public QRadioButton rbttnJornada;
    public QRadioButton rbttnCongreso;
    public QLabel label;
    public QSpinBox sbNumJornadas;
    public QLabel lbNumPersonas;
    public QSpinBox sbNumPersonas;
    public QLabel lbCocina;
    public QVBoxLayout verticalLayout;
    public QRadioButton rbttnBufet;
    public QRadioButton rbttnCarta;
    public QRadioButton rbttnPedirCita;
    public QLabel lbHabitaciones;
    public QLineEdit lnHabitaciones;
    public QSpacerItem verticalSpacer;
    public QHBoxLayout horizontalLayout;
    public QPushButton bttnLimpiar;
    public QSpacerItem horizontalSpacer_2;
    public QDialogButtonBox buttonBox;
    public QSpacerItem verticalSpacer_2;

    public frmAlta() { super(); }

    void cambiar(){
        //si se ha activado la casilla de verificacion mostraremos el mensaje
        label.setEnabled(rbttnCongreso.isChecked());
        sbNumJornadas.setEnabled(rbttnCongreso.isChecked());
        
         label.setDisabled(rbttnJornada.isChecked());
        sbNumJornadas.setDisabled(rbttnJornada.isChecked());
        
         label.setDisabled(rbttnBanquete.isChecked());
        sbNumJornadas.setDisabled(rbttnBanquete.isChecked());
    }

    
    
    public void setupUi(QDialog Dialog)
    {
        Dialog.setObjectName("Dialog");
        Dialog.resize(new QSize(594, 383).expandedTo(Dialog.minimumSizeHint()));
        widget = new QWidget(Dialog);
        widget.setObjectName("widget");
        widget.setGeometry(new QRect(32, 3, 547, 364));
        gridLayout_3 = new QGridLayout(widget);
        gridLayout_3.setObjectName("gridLayout_3");
        gridLayout = new QGridLayout();
        gridLayout.setObjectName("gridLayout");
        lbDatosCliente = new QLabel(widget);
        lbDatosCliente.setObjectName("lbDatosCliente");
        QFont font = new QFont();
        font.setPointSize(16);
        font.setBold(true);
        font.setUnderline(true);
        font.setWeight(75);
        lbDatosCliente.setFont(font);

        gridLayout.addWidget(lbDatosCliente, 0, 0, 1, 3);

        lbNombre = new QLabel(widget);
        lbNombre.setObjectName("lbNombre");

        gridLayout.addWidget(lbNombre, 1, 0, 1, 1);

        lnNombre = new QLineEdit(widget);
        lnNombre.setObjectName("lnNombre");

        gridLayout.addWidget(lnNombre, 1, 1, 1, 1);

        horizontalSpacer = new QSpacerItem(98, 20, com.trolltech.qt.gui.QSizePolicy.Policy.Expanding, com.trolltech.qt.gui.QSizePolicy.Policy.Minimum);

        gridLayout.addItem(horizontalSpacer, 1, 2, 1, 1);

        lbTelefono = new QLabel(widget);
        lbTelefono.setObjectName("lbTelefono");

        gridLayout.addWidget(lbTelefono, 1, 3, 1, 1);

        lnTelefono = new QLineEdit(widget);
        lnTelefono.setObjectName("lnTelefono");

        gridLayout.addWidget(lnTelefono, 1, 4, 1, 1);


        gridLayout_3.addLayout(gridLayout, 0, 0, 1, 2);

        lbDatosReserva = new QLabel(widget);
        lbDatosReserva.setObjectName("lbDatosReserva");
        QFont font1 = new QFont();
        font1.setPointSize(16);
        font1.setBold(true);
        font1.setUnderline(true);
        font1.setWeight(75);
        lbDatosReserva.setFont(font1);

        gridLayout_3.addWidget(lbDatosReserva, 1, 0, 1, 1);

        horizontalLayout_2 = new QHBoxLayout();
        horizontalLayout_2.setObjectName("horizontalLayout_2");
        verticalLayout_2 = new QVBoxLayout();
        verticalLayout_2.setObjectName("verticalLayout_2");
        lbFechaLlegada = new QLabel(widget);
        lbFechaLlegada.setObjectName("lbFechaLlegada");

        verticalLayout_2.addWidget(lbFechaLlegada);

        calendarWidget = new QCalendarWidget(widget);
        calendarWidget.setObjectName("calendarWidget");

        verticalLayout_2.addWidget(calendarWidget);


        horizontalLayout_2.addLayout(verticalLayout_2);

        horizontalSpacer_3 = new QSpacerItem(40, 20, com.trolltech.qt.gui.QSizePolicy.Policy.Expanding, com.trolltech.qt.gui.QSizePolicy.Policy.Minimum);

        horizontalLayout_2.addItem(horizontalSpacer_3);

        gridLayout_2 = new QGridLayout();
        gridLayout_2.setObjectName("gridLayout_2");
        lbTipoEvento = new QLabel(widget);
        lbTipoEvento.setObjectName("lbTipoEvento");
        QFont font2 = new QFont();
        font2.setBold(true);
        font2.setWeight(75);
        lbTipoEvento.setFont(font2);

        gridLayout_2.addWidget(lbTipoEvento, 0, 0, 1, 1);

        verticalLayout_3 = new QVBoxLayout();
        verticalLayout_3.setObjectName("verticalLayout_3");
        rbttnBanquete = new QRadioButton(widget);
        rbttnBanquete.setObjectName("rbttnBanquete");

        verticalLayout_3.addWidget(rbttnBanquete);

        rbttnJornada = new QRadioButton(widget);
        rbttnJornada.setObjectName("rbttnJornada");

        verticalLayout_3.addWidget(rbttnJornada);

        rbttnCongreso = new QRadioButton(widget);
        rbttnCongreso.setObjectName("rbttnCongreso");

        verticalLayout_3.addWidget(rbttnCongreso);


        gridLayout_2.addLayout(verticalLayout_3, 0, 2, 1, 2);

        label = new QLabel(widget);
        label.setObjectName("label");
        label.setEnabled(false);
        

        gridLayout_2.addWidget(label, 1, 0, 1, 3);

        sbNumJornadas = new QSpinBox(widget);
        sbNumJornadas.setObjectName("sbNumJornadas");
        sbNumJornadas.setEnabled(false);

        gridLayout_2.addWidget(sbNumJornadas, 1, 3, 1, 1);

        lbNumPersonas = new QLabel(widget);
        lbNumPersonas.setObjectName("lbNumPersonas");

        gridLayout_2.addWidget(lbNumPersonas, 2, 0, 1, 2);

        sbNumPersonas = new QSpinBox(widget);
        sbNumPersonas.setObjectName("sbNumPersonas");

        gridLayout_2.addWidget(sbNumPersonas, 2, 2, 1, 1);

        lbCocina = new QLabel(widget);
        lbCocina.setObjectName("lbCocina");
        QFont font3 = new QFont();
        font3.setBold(true);
        font3.setWeight(75);
        lbCocina.setFont(font3);

        gridLayout_2.addWidget(lbCocina, 3, 0, 1, 1);

        verticalLayout = new QVBoxLayout();
        verticalLayout.setObjectName("verticalLayout");
        rbttnBufet = new QRadioButton(widget);
        QButtonGroup buttonGroup = new QButtonGroup(Dialog);
        buttonGroup.addButton(rbttnBufet);
        rbttnBufet.setObjectName("rbttnBufet");

        verticalLayout.addWidget(rbttnBufet);

        rbttnCarta = new QRadioButton(widget);
        buttonGroup.addButton(rbttnCarta);
        rbttnCarta.setObjectName("rbttnCarta");

        verticalLayout.addWidget(rbttnCarta);

        rbttnPedirCita = new QRadioButton(widget);
        buttonGroup.addButton(rbttnPedirCita);
        rbttnPedirCita.setObjectName("rbttnPedirCita");

        verticalLayout.addWidget(rbttnPedirCita);


        gridLayout_2.addLayout(verticalLayout, 3, 1, 1, 3);

        lbHabitaciones = new QLabel(widget);
        lbHabitaciones.setObjectName("lbHabitaciones");

        gridLayout_2.addWidget(lbHabitaciones, 4, 0, 1, 1);

        lnHabitaciones = new QLineEdit(widget);
        lnHabitaciones.setObjectName("lnHabitaciones");

        gridLayout_2.addWidget(lnHabitaciones, 4, 1, 1, 3);


        horizontalLayout_2.addLayout(gridLayout_2);


        gridLayout_3.addLayout(horizontalLayout_2, 2, 0, 2, 2);

        verticalSpacer = new QSpacerItem(20, 17, com.trolltech.qt.gui.QSizePolicy.Policy.Minimum, com.trolltech.qt.gui.QSizePolicy.Policy.Expanding);

        gridLayout_3.addItem(verticalSpacer, 4, 0, 1, 1);

        horizontalLayout = new QHBoxLayout();
        horizontalLayout.setObjectName("horizontalLayout");
        bttnLimpiar = new QPushButton(widget);
        bttnLimpiar.setObjectName("bttnLimpiar");

        horizontalLayout.addWidget(bttnLimpiar);

        horizontalSpacer_2 = new QSpacerItem(298, 20, com.trolltech.qt.gui.QSizePolicy.Policy.Expanding, com.trolltech.qt.gui.QSizePolicy.Policy.Minimum);

        horizontalLayout.addItem(horizontalSpacer_2);

        buttonBox = new QDialogButtonBox(widget);
        buttonBox.setObjectName("buttonBox");
        buttonBox.setOrientation(com.trolltech.qt.core.Qt.Orientation.Horizontal);
        buttonBox.setStandardButtons(com.trolltech.qt.gui.QDialogButtonBox.StandardButton.createQFlags(com.trolltech.qt.gui.QDialogButtonBox.StandardButton.Cancel,com.trolltech.qt.gui.QDialogButtonBox.StandardButton.Ok));

        horizontalLayout.addWidget(buttonBox);


        gridLayout_3.addLayout(horizontalLayout, 5, 0, 1, 2);

        verticalSpacer_2 = new QSpacerItem(20, 17, com.trolltech.qt.gui.QSizePolicy.Policy.Minimum, com.trolltech.qt.gui.QSizePolicy.Policy.Expanding);

        gridLayout_3.addItem(verticalSpacer_2, 4, 1, 1, 1);

        lbNombre.setBuddy(lnNombre);
        lbTelefono.setBuddy(lnTelefono);
        lbFechaLlegada.setBuddy(calendarWidget);
        label.setBuddy(sbNumJornadas);
        lbNumPersonas.setBuddy(sbNumPersonas);
        lbHabitaciones.setBuddy(lnHabitaciones);
        QWidget.setTabOrder(lnNombre, lnTelefono);
        QWidget.setTabOrder(lnTelefono, calendarWidget);
        QWidget.setTabOrder(calendarWidget, sbNumJornadas);
        QWidget.setTabOrder(sbNumJornadas, sbNumPersonas);
        QWidget.setTabOrder(sbNumPersonas, rbttnBufet);
        QWidget.setTabOrder(rbttnBufet, rbttnCarta);
        QWidget.setTabOrder(rbttnCarta, rbttnPedirCita);
        QWidget.setTabOrder(rbttnPedirCita, lnHabitaciones);
        QWidget.setTabOrder(lnHabitaciones, bttnLimpiar);
        QWidget.setTabOrder(bttnLimpiar, buttonBox);
        retranslateUi(Dialog);
        buttonBox.accepted.connect(Dialog, "accept()");
        buttonBox.rejected.connect(Dialog, "reject()");
        bttnLimpiar.pressed.connect(lnNombre, "clear()");
        bttnLimpiar.pressed.connect(lnTelefono, "clear()");
        bttnLimpiar.pressed.connect(sbNumJornadas, "clear()");
        bttnLimpiar.pressed.connect(sbNumPersonas, "clear()");
        bttnLimpiar.pressed.connect(lnHabitaciones, "clear()");

        // conexion signal/slot del radio boutton
        
        rbttnCongreso.clicked.connect(this,"cambiar()");
        
        
        Dialog.connectSlotsByName();
    } // setupUi

    void retranslateUi(QDialog Dialog)
    {
        Dialog.setWindowTitle(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Formulario", null));
        lbDatosCliente.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "DATOS DEL CLIENTE", null));
        lbNombre.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Nombre", null));
        lnNombre.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Introduzca el nombre", null));
        lbTelefono.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Tel\u00e9fono", null));
        lnTelefono.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Introduzca un tel\u00e9fono de contacto", null));
        lbDatosReserva.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "DATOS DE LA RESERVA", null));
        lbFechaLlegada.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Fecha del evento", null));
        lbTipoEvento.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Tipo de evento", null));
        rbttnBanquete.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Banquete", null));
        rbttnJornada.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Jornada", null));
        rbttnCongreso.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Congreso", null));
        label.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "N\u00famero de jornadas del congreso", null));
        sbNumJornadas.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Indique el n\u00famero de jornadas del congreso", null));
        lbNumPersonas.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "N\u00famero de personas", null));
        sbNumPersonas.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Indique el n\u00famero de personas", null));
        lbCocina.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Tipo de cocina", null));
        rbttnBufet.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Seleccione el tipo de cocina", null));
        rbttnBufet.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Bufet", null));
        rbttnCarta.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Seleccione el tipo de cocina", null));
        rbttnCarta.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Carta", null));
        rbttnPedirCita.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Seleccione el tipo de cocina", null));
        rbttnPedirCita.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Pedir cita con el chef", null));
        lbHabitaciones.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Habitaciones", null));
        lnHabitaciones.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Indique el n\u00famero de habitaciones necesarias", null));
        bttnLimpiar.setText(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Limpiar", null));
        rbttnJornada.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Seleccione el tipo de evento", null));
        rbttnCongreso.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Seleccione el tipo de evento", null));
        rbttnBanquete.setToolTip(com.trolltech.qt.core.QCoreApplication.translate("Dialog", "Seleccione el tipo de evento", null));
    } // retranslateUi

}

