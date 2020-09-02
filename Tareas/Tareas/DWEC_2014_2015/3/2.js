
/******************************************************************************
Devuelve la fecha actual en formato español. Por ejemplo 15 de enero de 2015.
******************************************************************************/
function getFechaActual() {
    var meses = ["enero", "febrero", "marzo","abril", "mayo","junio", 
         "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
     var date = new Date();
     var anyo = date.getFullYear();
     var imes = date.getMonth();
     var dia = date.getDate();
     var fechaActual = dia + " de " + meses[imes] + " de " + anyo;
     return fechaActual;
}


/******************************************************************************
 Envía el resultado para mostrar a la página mediante
     document.getElementById("resultado").innerHTML = strResultado;
******************************************************************************/
function muestraEjercicio() {
     var strResultado = "<p>Hoy es " + getFechaActual() + "</p>";
     
     document.getElementById("resultado").innerHTML = strResultado;
}
