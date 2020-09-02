// cada vez que se carge la página, llamar a la función iniciar
window.onload=iniciar;
// declaramos la variables globales que harán referencia a los campos del formulario
// así como otras variables auxiliares
var formulario,	 categoria,	 texto_pregunta, resp1, resp2, resp3, resp4, resp_ok = [];
var respCorrecta;


/**
 * Almacena cada uno de los elementos del formulario en variables globales cuyo
 * nombre coincide con el identificador del elemento.
 * Añade la escucha de eventos en los elementos del formulario que lo requieren.
 * 
 */
function iniciar() {
	 //cacheamos los id de los elementos del formulario
	 formulario = document.getElementById('formulario');
	 categoria =  document.getElementById('categoria');
	 texto_pregunta =  document.getElementById('texto_pregunta');
	 resp_ok =  document.getElementsByName('resp_ok');
	 resp1 =  document.getElementById('resp1');
	 resp2 =  document.getElementById('resp2');
	 resp3 =  document.getElementById('resp3');
	 resp4 =  document.getElementById('resp4');

    // Añadimos la escucha del evento submit al formulario
    formulario.addEventListener('submit', mostrarResultado, false);
    // Añadimos la escucha del evento reset al formulario
    formulario.addEventListener('reset', ocultarErrores, false);
    // Añadimos la escucha del evento keyup a los input text de las respuestas
	resp1.addEventListener('keyup', activaRadioButton, false);
	resp2.addEventListener('keyup', activaRadioButton, false);
	resp3.addEventListener('keyup', activaRadioButton, false);
	resp4.addEventListener('keyup', activaRadioButton, false);     
  }


/**
 * Llama a la función validarFormulario y tras ello muestra los errores encontrados
 * durante la validación sin enviar el formulario, o en caso de no existir errores 
 * muestra los valores introducidos en los campos mediante un alert y envia el 
 * formulario.
 */
function mostrarResultado(evt) {
	var errores = validarFormulario();
	var str;
	// si hay errores de validación, mostramos la información en el formulario
	// con los errores encontrados. No realizaremos el submit (evt.preventDefault())
	if (errores.length>0) {
		str ="El formulario contiene los siguientes errores:<ul>";
		/* esto también funcionaría
		for(i in errores) {
			str += '<li>' +errores[i];
		}
		*/
		for(var i=0, l=errores.length; i<l; i++) {
			str += '<li>' + errores[i];
		}
		str += '<ul>';
		evt.preventDefault();
		document.getElementById("errores").innerHTML = str;
	// si no hubo errores los mostraremos en un alert antes de enviar el formulario
	} else {
		str ="Pregunta añadida:";
		str += "\n\t" + "Categoría: " + categoria.options[categoria.selectedIndex].text;
		str += "\n\t" + "Texto de la pregunta: " + corrigeEspacios(texto_pregunta.value);
		str += "\n\t" + "Respuesta 1: " + resp1.value;
		str += "\n\t" + "Respuesta 2: " + resp2.value;
		str += "\n\t" + "Respuesta 3: " + resp3.value;
		str += "\n\t" + "Respuesta 4: " + resp4.value;
		str += "\n\t" + "La respuesta correcta es la " + respCorrecta;
		alert(str);
	}
}

/**
 * Limpia el contenido del div='errores' de la página
 */
function ocultarErrores() {
	document.getElementById("errores").innerHTML = '';
}

/**
* Retorna la respuesta correcta, que se corresponde con el valor del radio button
* seleccionado.
*/
function respuestaCorrecta() {
	var respOk=-1;
	// recorremos todos los radio buttons hasta encontrar el seleccionado
	// la respuesta correcta será la correspondiente al indice del radio
	// button seleccionado mas
	for (i=0, l=resp_ok.length; i<l; i++){ 
      	if (resp_ok[i].checked) {
      		respOk = resp_ok[i].value + ': ' + document.getElementById('resp'+(i+1)).value;
      		break; 
      	}          	
   	}
   	return respOk;
}


/**
* Activa el radio button asociado al input text para el que es llamada la función
*/
function activaRadioButton() {
	// obtenemos el indice del radio button que debemos activar a partir del
	// último caracter del nombre del control (resp1, resp2, resp3, resp4)
    var i = this.name.charAt(this.name.length-1)-1;
    // activamos el radio button correspondiente
    resp_ok[i].checked=true;
}


/**
 * Valida que el string pasado como parámetro cumple los requisitos solicitados
 * para un campo texto de la pregunta:
 *    - Que sólo contenga caracteres del alfabeto, espacios, interrogaciones, 
 *      exclamaciones, puntos, comas, puntos y comas.
 *    - No se pueden aceptar dígitos numéricos.
 *    - Además después de cada punto debe haber un espacio.
 *
 * Se entiende que "caracteres del alfabeto" debe incluir todos aquellos que
 * nos permitan redactar una pregunta con una ortografía correcta.
 *
 * Ya que omitir un espacio despues de escribir un punto (.) es un error 
 * bastante corriente, se aceptarán entradas con dicho error, debiendo ser 
 * corregidas posteriormente a la validación del campo.
 *
 * Retorna true si el string cumple los requisitos, o false en caso contrario.  
 */
function validaTextoPregunta(str) {
	// definimos el patrón que debe seguir el texto de la pregunta
	// admitimos la aparición una o mas veces de cualquiera de los caracteres 
	// encerrados entre [], incluyendo espacios \s
	// incorporando ^ y $ nos aseguramos que no se reconozca el patrón si aparece
	// un caracter que no sea uno de los encerrados entre []
	var patron = /^[a-zA-ZçñáéíóúÇÑÁÉÍÓÚüÜ?¿!¡,\.;\s]+$/;
	// Eliminamos caracteres en blanco al principio y final
	str = str.trim();
	// verificamos que no se trata de una cadena vacía
	// y que sigue el patrón definido
	return (str.length>0 && str.match(patron));
}


/**
 *  Valida cada uno de los campos del formulario, retornando un array de
 *  string con los errores encontrados en cada uno de los campos.
 */
function validarFormulario() {
	var errores = [];
	var i = -1;
	if (!validaTextoPregunta(texto_pregunta.value)) {
		errores[++i] = 'El texto de la pregunta no es correcto.' +
					   '<ul> ' +
			           '<li>Solo están permitidos caracteres del alfabeto, espacios,' +
			           'interrogaciones, exclamaciones, puntos, comas, puntos y comas.' +
                       '<li>No se permiten dígitos numéricos.' +
                       '<li>No se permiten cadenas vacías.' +
                       '</ul>';

	}
	if (resp1.value.trim().length<1) {
		errores[++i] = 'El campo respuesta 1 es obligatorio y no contiene un valor válido.';
	}
	if (resp2.value.trim().length<1) {
		errores[++i] = 'El campo respuesta 2 es obligatorio y no contiene un valor válido.';
	}
	if (resp3.value.trim().length<1) {
		errores[++i] = 'El campo respuesta 3 es obligatorio y no contiene un valor válido.';
	}
	if (resp4.value.trim().length<1) {
		errores[++i] = 'El campo respuesta 4 es obligatorio y no contiene un valor válido.';
	}
	respCorrecta = respuestaCorrecta();
	// esto podría ocurrir si el usuario ha completado los campos desde una lista desplegable
	// con valores recordados por el navegador, sin evento keyup.
	// El enunciado de la tarea dice expresamente 'cuando se escriba' y no 'cuando cambie'
	if (respCorrecta<0) {
		errores[++i] = 'No se ha seleccionado una respuesta correcta.';
	}
    return errores;
}


/**
 * Dado un string, lo modifica para insertar un espacio despues de cada punto
 * si no lo había.
 */
function corrigeEspacios(str) {
	var len = str.length;
	var str2='';
	var c1, c2;
	// Comparamos cada caracter para ver si es un .
	for(i=0; i<len-1; i++) {
		c1 = str.substring(i,i+1);
		c2 = str.substring(i+1,i+2);
		// si es un . y el siguiente no es un espacio
		if(c1=='.' && c2!=' ') {
			// construimos la nueva cadena introduciendo un espacio
			str2 += c1+' ';
		} else {
			// en caso contrario construimos la nueva cadena con este caracter
			str2 += c1;	
		}
	}
	str2 += c2;	
	// modificamos el valor del elemento con el de la nueva cadena
    return str2;
}	
	
	



