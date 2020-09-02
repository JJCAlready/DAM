/**
 * Desarrollo Web en Entorno Servidor
 * Tema 8 : Aplicaciones web híbridas
 * Ejemplo Rutas de reparto: codigo.js
 */

// Indica si se está mostrando o no el diálogo de dirección / coordenadas
//  para la introducción de un nuevo envío
var estadoDialogo = false;


function nuevoEnvio(idReparto) {
    $('#idrepartoactual').val(idReparto);
    mostrarDialogo();
}

function ordenarReparto(idReparto) {
    // Utilizamos jQuery para obtener una lista con las coordenadas de los puntos intermedios que debemos ordenar
    // También se podrían haber almacenado por ejemplo en la sesión del usuario
    var paradas = $('#'+idReparto+' li').map(function() {
        return this.title;
    }).get().join('|');
    
    // Esta vez utilizamos el modo síncrono (esperamos a obtener una respuesta)
    var respuesta = xajax.request({xjxfun:"ordenarReparto"}, {mode:'synchronous', parameters: [paradas]});
    if (respuesta) {
        // Si obtuvimos una respuesta, reordenamos los envíos del reparto
        // Cogemos la URL base del documento, quitando los parámetros GET si los hay
        var url = document.location.href.replace(/\?.*/,'');
		url = url.replace(/#$/,'');
        // Añadimos el código de la lista de reparto
        url += '?accion=ordenarEnvios&reparto='+idReparto;
        // Y un array con las nuevas posiciones que deben ocupar los envíos
        for(var r in respuesta) url += '&pos[]='+respuesta[r];

        window.location = url;
    }
}

function getCoordenadas() {
    // Comprobamos que se haya introducido una dirección
    if($("#direccion").val().length < 10) {
        alert("Introduzca una dirección válida.");
        return false;
    }
    
    // Se cambia el botón de Enviar y se deshabilita
    //  hasta que llegue la respuesta
    xajax.$('obtenerCoordenadas').disabled=true;
    xajax.$('obtenerCoordenadas').value="Un momento...";
    
    // Aquí se hace la llamada a la función registrada de PHP
    xajax_obtenerCoordenadas (xajax.getFormValues("formenvio"));

    return false;    
}



function abrirMaps(coordenadas) {
    var url = "http://maps.google.com/maps?hl=es&t=h&z=17&output=embed&ll=";

    if(!coordenadas) {
        // Cogemos las coordenadas del diálogo
        url+=$("#latitud").val()+","+$("#longitud").val();
    }
    else {
        // Si hay coordenadas, las usamos
        url+=coordenadas;
    }
        
    window.open(url,'nuevaventana','width=425,height=350');
}

function mostrarDialogo() {
//Centramos en pantalla
var anchoVentana = document.documentElement.clientWidth;
var altoVentana = document.documentElement.clientHeight;
var altoDialogo = $("#dialogo").height();
var anchoDialogo = $("#dialogo").width();

    $("#dialogo").css({
        "position": "absolute",
        "top": altoVentana/2-altoDialogo/2,
        "left": anchoVentana/2-anchoDialogo/2
    });

    //Para IE6
    $("#fondonegro").css({"height": altoVentana});

    //Si no está visible el diálogo
    if(!estadoDialogo){
        // Se muestra el fondo negro
        $("#fondonegro").css({"opacity": "0.7"});
        $("#fondonegro").fadeIn("slow");
        //  y el diálogo
        $("#dialogo").fadeIn("slow");

        $("#datosenvio").hide();
        estadoDialogo = true;
    }
}

function ocultarDialogo() {
    // Si está visible
    if(estadoDialogo){
        // Se oculta el fondo y el diálogo
        $("#fondonegro").fadeOut("slow");
        $("#dialogo").fadeOut("slow");
        estadoDialogo = false;
    }
}




