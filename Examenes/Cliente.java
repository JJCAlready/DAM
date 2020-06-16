import java.io.DataInputStream;
import java.io.DataOutputStream; 
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.Socket;
import java.util.Scanner;

public class Cliente {
    static final String HOST = "localhost";
    static final int Puerto=4000;
       
    public Cliente( ) throws IOException {
      Scanner scanner = new Scanner(System.in);
      Socket sCliente = new Socket( HOST , Puerto );
        
      DataInputStream dataIS=new DataInputStream(sCliente.getInputStream());
      DataOutputStream dataOS= new DataOutputStream(sCliente.getOutputStream());
        
      String respuesta ="", retorno="";
      boolean fin = false;
        
      while(!respuesta.equals("Felicidades")){
            respuesta = dataIS.readUTF();
            System.out.println(respuesta);              
                
            retorno = scanner.nextLine();
            dataOS.writeUTF(retorno); 
                
            respuesta = dataIS.readUTF();
            System.out.println(respuesta);
        }  //FIN
        sCliente.close();
        }
    public static void main( String[] arg ) throws IOException {
        new Cliente();
    }
}