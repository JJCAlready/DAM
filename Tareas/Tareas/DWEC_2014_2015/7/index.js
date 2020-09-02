//
//  Variables globales
//
var txt = [];
var ultMostrado = '';
var idioma = 'es';


//
// Ejecutar cuando se termine de cargar la página
//
// Se asignan las acciones a realizar cuando se pulsen los botones del formulario
// o las imagenes de cambio de idioma. Se asigna el idioma español por defecto.
//
$(document).ready(function() {
    $('#actual').click(consultaTiempoActual);
    $('#manyana').click(consultaTiempoManyana);
    $('#idioma img').click(cargaIdioma);
    cargaIdioma('es');
});


/**
 * Consulta el tiempo actual en la localidad indicada en el formulario.
 * Se ejecuta al pulsar el botón "Tiempo actual" del formulario o una 
 * imagen de cambio de idioma.
 */
function consultaTiempoActual(e) {
   // si la función es llamada por la pulsación de un botón, hacer 
   // que se ejecute la consulta y no se recarge la página
   if(e!=null) {
      e.preventDefault();
   }
   var localidad = $('#localidad').val();
   // forzamos a que se introduzca una localidad
   if(localidad=='') {
    alert(txt.introLoc);
    return;
   }
   // url de consulta, en función de la localidad e idioma seleccionados actualmente
   var url = 'http://api.openweathermap.org/data/2.5/weather?q=' + localidad +',es&units=metric&lang=' + idioma;
   // llamamos a la página mediante ajax
   $.ajax({
           url: url,
            beforeSend: function(){
              // borrar el contenido actual del div
              $('#tiempo_actual').html('');
               // mostrar imagen de carga
               muestraImgAjax();
           },
           complete: function(datos){
               // mostrar el tiempo actual
               muestraTiempo('tiempo_actual');
           },
           success: function (datos) {
                // limpiamos el contenido anterior del div
                ocultaTodo();
                $('#tiempo_actual').html(''); 
                // si la localidad devuelta no coincide con la solicitada, mostrar mensaje de error
                if(datos.cod!==200 || datos.name.toUpperCase() != localidad.toUpperCase()) {
                    alert(txt.noEncontrada);
                } else {
                      var strTiempo ='';
                      var strUrlIcono = 'http://openweathermap.org/img/w/' + datos.weather[0].icon + '.png'; 
                      // redondearemos la temperatura para mostrar solo un decimal
                      var temperatura = datos.main.temp.toFixed(1);
                      var descripcion = datos.weather[0].description;
                      // ponemos en mayúscula el primer caracter de la descripción.
                      descripcion = descripcion.charAt(0).toUpperCase() + descripcion.slice(1);
                      // componemos el texto a mostrar con los datos obtenidos del JSON
                      strTiempo = htmlTag('div', txt.tiempoActual, {class:'cabecera_tiempo'});
                      strTiempo += htmlTag('h2', datos.name, null);
                      strTiempo += htmlTag('h3', 
                                        htmlTag('img', temperatura + ' ºC', {src:strUrlIcono}),
                                        null);
                      strTiempo += htmlTag('h4', descripcion, null);
                      strTiempo += htmlTag('div', 
                                        htmlTag('p', txt.humedad + datos.main.humidity + " %", null) +
                                        htmlTag('p', txt.viento + datos.wind.speed + " Km/h", null) +
                                        htmlTag('p', txt.nubosidad + datos.clouds.all + txt.cubierto, null) +
                                        htmlTag('p', txt.lluvia + (datos.rain==undefined?'NO':'SI'), null),
                                        {class:'derecha'});
                      // colocamos el texto en el div
                      $('#tiempo_actual').html(strTiempo); 
                }                              
           },
           // en caso de error, ocultaremos todo y mostramos mensaje de error
           error: function(errores){
               ocultaTodo();
               alert(txt.noDatos);
           }
       });   
}




/**
 * Consulta la previsión del tiempo para 2 días en la localidad indicada en el formulario.
 * Se ejecuta al pulsar el botón "Tiempo actual" del formulario o una 
 * imagen de cambio de idioma.
 */
function consultaTiempoManyana(e) {
   // si la función es llamada por la pulsación de un botón, hacer 
   // que se ejecute la consulta y no se recarge la página
   if(e!=null) {
      e.preventDefault();
   }
   
   var localidad = $('#localidad').val();
   // forzamos a que se introduzca una localidad
   if(localidad=='') {
    alert(txt.introLoc);
    return;
   }
   // url de consulta, en función de la localidad e idioma seleccionados actualmente
   var url = 'http://api.openweathermap.org/data/2.5/forecast/daily?q=' + localidad +',es&mode=json&units=metric&cnt=3&lang=' + idioma;
   // llamamos a la página mediante ajax
   $.ajax({
           url: url,
           beforeSend: function(){
              // borrar el contenido actual del div
              $('#tiempo_manyana').html('');
              // mostrar imagen de carga
              muestraImgAjax();
           },
           complete: function(datos){
              // si hay algo que mostrar, mostrarlo
              muestraTiempo('tiempo_manyana');              
           },
           success: function (datos) {
                // limpiamos el contenido anterior del div
                ocultaTodo();
                $('#tiempo_manyana').html(''); 
                // si la localidad devuelta no coincide con la solicitada, mostrar mensaje de error
                if(datos.cod != 200 || datos.city.name.toUpperCase() != localidad.toUpperCase()){
                    alert(txt.noEncontrada);
                } else {
                      var strTiempo ='';
                      var strUrlIcono = 'http://openweathermap.org/img/w/' + datos.list[1].weather[0].icon + '.png'; 
                      var tempMax = datos.list[1].temp.max.toFixed(1);
                      var tempMin = datos.list[1].temp.min.toFixed(1);
                      // componer el código html que muestre los datos
                      strTiempo =  htmlTag('div', txt.previsionManyana, {class:'cabecera_tiempo'});
                      strTiempo += htmlTag('h2', datos.city.name, null);
                      strTiempo += htmlTag('img', '', {src:strUrlIcono});
                      strTiempo += htmlTag('h4', txt.tempMax + tempMax + ' ºC', null);
                      strTiempo += htmlTag('h4', txt.tempMin + tempMin + ' ºC', null);
                      // colocamos el texto en el div
                      $('#tiempo_manyana').html(strTiempo); 
                }                               
           },
           // en caso de error, ocultaremos todo y mostramos mensaje de error
           error: function(errores){
              ocultaTodo();
              alert(txt.noDatos);
           }
   });   
}


/**
 * Carga en el array global txt el contenido del JSON cuyo nombre coincide con el código del
 * idioma pasado como parámetro.
 *
 * Es llamada al cargar la página o al pulsar sobre una imagen de selección de idioma
 */
function cargaIdioma(id) {  
    var url;
    // si la función es llamada al cargar la página
    if(this.id==undefined) {
        // obtenemos el nombre del fichero a partir del parámetro pasado
        url = id+".json";
        idioma = id;
    // si la función es llamada al pulsar en una imagen    
    } else {
        // obtenemos el nombre del fichero a partir del id de la imagen
        url = this.id+".json";
        idioma = this.id;
    }
    $.ajax({
        url: url,
        dataType: 'json',
        beforeSend: function(){
            // borrar el contenido actual de los div
            $('#tiempo_actual').html('');
            $('#tiempo_manyana').html('');
            // mostrar imagen de carga
            muestraImgAjax();
        },
        success: function (datos) {
            ocultaTodo();
            // pasamos el contenido del JSON al array de textos
            $.each(datos, function(campo, valor){
                txt[campo] = valor;
            });
        },
        complete: function(datos){
            // una vez tengamos los textos actualizados, cambiamos el texto de los elementos
            $('#actual').val(txt.tiempoActual);
            $('#manyana').val(txt.tiempoManyana);
            $('#labelLocalidad').text(txt.localidad);
            // mostrar el ultimo tiempo que se mostró en el idioma anterior
            if(ultMostrado=='tiempo_manyana') {
                consultaTiempoManyana();
            } else if(ultMostrado=='tiempo_actual') {
                consultaTiempoActual();
            }
        },
        error: function(errores){
            ocultaTodo();
            // en caso de error mostraremos el error y cargaremos los textos en español
            alert('No pudo cargarse el archivo de idiomas,\n establecido idioma español por defecto');
            txt = {
                "localidad":"Localidad: ",
                "introLoc":"Introduzca una localidad de España",
                "tiempoActual":"Tiempo actual: ",
                "tiempoManyana":"Tiempo mañana: ",
                "noEncontrada":"Localidad no encontrada",
                "previsionManyana":"Previsión para mañana: ",
                "humedad":"Humedad: ",
                "viento":"Viento: ",
                "nubosidad":"Nubosidad: ",
                "lluvia":"Luvia: ",
                "si":"Si",
                "no":"No",
                "noDatos":"Datos no disponibles, inténtelo de nuevo",
                "tempMax":"Temperatura máxima: ",
                "tempMin":"Temperatura mínima: ",
                "cubierto":" % cubierto"
            }
        }
               
    }); 
}

/**
 * Crea una cadena con el código html con la etiqueta, contenido y atributos
 * pasados como parámetros
 * 
 * @param  string  tag       etiqueta html
 * @param  string  contenido contenido a mostrar dentro de la etiqueta 
 * @param  array   atributos array asociativo con los atributos de la etiqueta
 *                           como claves y sus respectivos valores
 * @return string            cadena con el formato <tag atributos='valor' ... >contenido</tag>
 */
function htmlTag(tag, contenido, atributos) {
    strAtributos = "";
   // construimos la cadena que hace referencia a los atributos
    for (var atributo in atributos) {
        strAtributos += ", " + atributo + "='" + atributos[atributo] + "'";
    }
    // quitamos la coma del principio
    strAtributos = strAtributos.replace(/^,/,'');
    // devolvemos el texto correspondiente
    return "<" + tag + strAtributos + ">" + contenido + "</" + tag + ">";
}

/**
 * muestra la imagen de carga ajax y oculta la información del tiempo
 */
function muestraImgAjax() {
  ocultaTodo();
  $('#precarga_ajax').css('display', 'block');
}

/**
 * oculta la imagen de carga ajax y muestra la información del tiempo que 
 * se muestra en el div con id coincidente con el pasado como parámetro.
 */
function muestraTiempo(id) {
  if (id!='') {
    ultMostrado = id;
    ocultaTodo();
    // solo hacemos visible el div si realmente contiene algo, sería muy
    // feo mostrar un rectángulo vacío
    if ($('#'+id).html()!='') {
      $('#'+id).css('display', 'block');
    }  
  }
}

/**
 * Oculta todos los div que muestran información variable
 */
function ocultaTodo() {
  $('#precarga_ajax').css('display', 'none');
  $('#tiempo_actual').css('display', 'none');
  $('#tiempo_manyana').css('display', 'none');
}