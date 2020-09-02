/*******************************************************************************
Retorna la hora en formato de 24 horas o sea: 18:00 y no 06:00.
*******************************************************************************/
function getHoraMinutos() {
     var date = new Date();
     var hh = date.getHours();
     var mm = date.getMinutes();
     // completamos con los ceros necesarios para obtener horas con 2 digitos
     if (hh<10) {
     	hh='0'+hh;
     }
     // completamos con los ceros necesarios para obtener minutos con 2 digitos
     if (mm<10) {
     	mm='0'+mm;
     }	
     var texto = hh + ":" + mm;
     return texto;
}


/******************************************************************************
 Envía el resultado para mostrar a la página mediante
     document.getElementById("resultado").innerHTML = strResultado;
******************************************************************************/
function muestraEjercicio() {
     var strResultado = "<p>Ahora son las " + getHoraMinutos() + "</p>";     
     document.getElementById("resultado").innerHTML = strResultado;
}

