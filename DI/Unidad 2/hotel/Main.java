/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package hotel;
import com.trolltech.qt.gui.*;
/**
 *
 * @author usuario
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        QApplication.initialize(args);
                QMainWindow mw = new QMainWindow();
                frmPrincipal principal = new frmPrincipal();
                principal.setupUi( mw );
                mw.show();
        QApplication.exec();
    }

}
