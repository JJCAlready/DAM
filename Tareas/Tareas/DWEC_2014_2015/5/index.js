// cada vez que se carge la página, llamar a la función iniciar
window.onload=iniciar;

/**
 * Añade la escucha del evento click a los elementos del menú y actualiza el 
 * contenido del elemento num_visitas para mostrar el número de visitas a la
 * página
 */
function iniciar() {
     // Añadimos la escucha del evento click a los elementos del menú
     document.getElementById('perfil').addEventListener('click', irPagina, false);
     document.getElementById('preguntas').addEventListener('click', irPagina, false);
     
     // Recuperamos el número de visitas y actualizamos su valor     
     var idVisitas = document.getElementById('num_visitas');
     var nVisitas = actualizaVisitas();
     // mostraremos el texto personalizado en el div id=n'um_visitas' de la página.
     if(nVisitas==1) {
        idVisitas.innerHTML = "Es la primera vez que visita esta página.";
     } else {
        idVisitas.innerHTML = "Ha visitado esta página " + nVisitas + " veces.";
     }
}


/**
 * Redirigue el navegador a la página html cuyo nombre coincide con el id del
 * control para el que se llama a la función
 */
function irPagina() {          
    window.location.href = this.id+'.html';
}

/**
 * Recupera y actualiza el valor de la cookie que contiene el contador de visitas
 * a la página, bien creándola con el valor 1 y retornando 0, o bien incrementando
 * su valor en 1 y retornando el valor previo.
 */
function actualizaVisitas() {
     // recogemos el valor de la coockie de visitas
     var visitas = Cookie.get('contador');
     // si todavía no se había creado la cookie
     if( typeof visitas === "undefined") {
        //crearla para que expire en un año
        Cookie.set('contador', 1, 365*24*3600);
        visitas=1;
     // si ya existia, incrementaremos su valor en 1   
     } else {
        // incrementaremos su valor en 1, renovándola por un año.
        visitas = parseInt(visitas)+1;
        Cookie.set('contador', visitas, 365*24*3600);   
     }
     return visitas;
}



/***************************************************************************
* Clase Cookie, con todos sus métodos estáticos.
* No dispone de atributos, mas bien es una agrupación de funciones para
* el manejo de sesiones
****************************************************************************/
function Cookie() {
}

/*
W3Schools.com
==============

JavaScript can create, read, and delete cookies with the document.cookie property.

With JavaScript, a cookie can be created like this:

document.cookie="username=John Doe";
You can also add an expiry date (in UTC time). By default, the cookie is deleted when the browser is closed:

document.cookie="username=John Doe; expires=Thu, 18 Dec 2013 12:00:00 UTC";
With a path parameter, you can tell the browser what path the cookie belongs to. By default, the cookie belongs to the current page.

document.cookie="username=John Doe; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";
*/

/**
 * Crea una cookie con el nombre y valor indicados que expirará tras el número
 * de segundos pasados como parámetro.
 */
Cookie.set = function(nombre, valor, segundos) {
     var strExpires = "";
     if(segundos) {
          // incluiremos en la cadena de creación de la cockie la fecha de expiración
          var date = new Date();
          date.setTime(date.getTime()+(segundos*1000));
          strExpires =";expires="+date.toGMTString();   
     }
    // Se crea/borra la nueva cookie, en el path actual
     document.cookie = nombre+"="+valor+strExpires+";path=/";
}

/**
 * Retorna el valor de la cookie cuyo nombre se pasa como parámetro.
 * En caso de no existir una cookie con ese nombre retornará undefined.
 */
Cookie.get = function(nombre) {
    var valor;
    // partimos el contenido del fichero de cookies en segmentos separados por
    // el string 'nombre=', y en el caso de que exista mas de un segmento, el
    // valor de la cookie buscada estará en el segundo segmento, junto con 
    // los nombres y valores del resto de cookies separados por ';'
    var cadena = document.cookie.split(nombre + "=");
    if(cadena.length>1) {
       valor = cadena[1].split(';')[0];
    }        
    return valor;
}
/*
  Borra la cookie cuyo nombre se pasa como parámetro, haciéndole expirar
  en un tiempo anterior al actual (duración en segundos menor que 0).
*/
Cookie.del = function(nombre) {
    this.set(nombre,"",-1);
}



