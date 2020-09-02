/******************************************************************************
 Muestra la plataforma (Linux, Windows, etc.) del navegador y si está en modo
 offline, y si tiene Oracle Java activado o no.
******************************************************************************/

function muestraEjercicio() {
    var online =  navigator.onLine ? 'activado' : 'desactivado' ;
    var javaActivado = navigator.javaEnabled() ? 'activado' : 'desactivado';
    var strResultado = "<p><b>Plataforma</b>: " + navigator.platform + "</p>";
    // preparamos la información a mostrar
    strResultado += "<p><b>Modo offline</b>: " + online + "</p>";
    strResultado += "<p><b>Estado Oracle Java</b>: " + javaActivado + "</p>";
    // enviamos la información a la página para que sea mostrada.
    document.getElementById("resultado").innerHTML = strResultado;
}
