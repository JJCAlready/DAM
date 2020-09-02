
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class ContarMuelles {


    public static void main(String[] args) throws IOException, NumberFormatException {
        int muelles=0;
	int tardeAcabada;
	BufferedReader teclado = new BufferedReader(new InputStreamReader(System.in));
	do{
		System.out.println("Cojo otro muelle, lo tiro por el retrete, y ya son "+muelles+" los que el retrete se ha tragado");
		System.out.println("¿Se acaba ya la tarde? introduce 1 para si");
		tardeAcabada = Integer.parseInt(teclado.readLine());
                muelles++;
	}while(tardeAcabada!=1);
	System.out.println("Se acabo la tarde, el retrete se ha tragado "+muelles+" muelles");
    }
    
}
