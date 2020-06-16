package ex.augustobriga.rosa.a1920juniop1_ejer2;

import android.content.Context;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.widget.Toast;

import androidx.annotation.Nullable;

public class BaseDatos extends SQLiteOpenHelper {
    private Context contexto;

    public BaseDatos(@Nullable Context context) {
        super(context, "ListaCompra", null, 1);
        contexto = context;
    }


    @Override
    public void onCreate(SQLiteDatabase db) {

        try {
            db.execSQL("CREATE TABLE listaCompra (id INTEGER PRIMARY KEY AUTOINCREMENT, producto VARCHAR(255))");
        } catch (SQLException e) {
            // TODO Auto-generated catch block
            Toast.makeText(contexto, ""+e, Toast.LENGTH_SHORT).show();
        }

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        try {
            db.execSQL("DROP TABLE IF EXISTS listaCompra");
            onCreate(db);
        } catch (SQLException e) {
            // TODO Auto-generated catch block
            Toast.makeText(contexto, ""+e, Toast.LENGTH_SHORT).show();
        }

    }
}
