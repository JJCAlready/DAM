// cada vez que se carge la página, llamar a la función iniciar
window.onload=iniciar;
// declaramos la variables globales que harán referencia a los campos del formulario
var enviar, nombre, apellidos, password1, password2, fecha_nac;

/**
 * Almacena cada uno de los elementos del formulario en variables globales cuyo
 * nombre coincide con el identificador del elemento.
 * Añade la escucha de eventos en los elementos del formulario que lo requieren.
 */
function iniciar() {
	 //cacheamos los id de los elementos del formulario
	formulario =  document.getElementById('formulario');
	nombre     =  document.getElementById('nombre');
	apellidos  =  document.getElementById('apellidos');
	password1  =  document.getElementById('password1');
	password2  =  document.getElementById('password2');
	fecha_nac  =  document.getElementById('fecha_nac');
	/********************************************************************************************************
	 *
	element.addEventListener(event, function, useCapture)

	event	    Required. A String that specifies the name of the event.
		        Note: Do not use the "on" prefix. For example, use "click" instead of "onclick".

	function	Required. Specifies the function to run when the event occurs.
	                                   -------------------------------------------------------------------- 
	            When the event occurs, | an event object is passed to the function as the first parameter.|
	                                   -------------------------------------------------------------------- 
	            The type of the event object depends on the specified event. For example, the "click" event
	            belongs to the MouseEvent object.
	useCapture	Optional. A Boolean value that specifies whether the event should be executed in the capturing or in the bubbling phase. 
				Possible values:
					true - The event handler is executed in the capturing phase
					false- Default. The event handler is executed in the bubbling phase
	*
	*
	***********************************************************************************************************/
    // Añadimos la escucha del evento submit al formulario
    formulario.addEventListener('submit', mostrarResultado, false);
    // Añadimos la escucha del evento reset al formulario
    formulario.addEventListener('reset', ocultarErrores, false);
    // Añadimos la escucha del evento pérdida de foco a los campos nombre y apellidos
    nombre.addEventListener('blur', cambiaMinusculas, false);
    apellidos.addEventListener('blur', cambiaMinusculas, false);
}


/**
 * Llama a la función validarFormulario y tras ello muestra los errores
 * encontrados durante la validación o en caso de no existir errores 
 * muestra los valores introducidos en los campos.
 */
function mostrarResultado(evt) {
	var errores = validarFormulario();
	var str;
	// si hay errores de validación, mostramos la información en el formulario
	// con los errores encontrados. No realizaremos el submit (evt.preventDefault())
	if (errores.length>0) {
		str ="El formulario contiene los siguientes errores:<ul>";
		for(var i=0, l=errores.length; i<l; i++) {
			str += '<li>' + errores[i];
		}
		str += '<ul>';
	 //-------------------------//
		evt.preventDefault();   //
	 //-------------------------//
		document.getElementById("errores").innerHTML = str;
	// si no hubo errores los mostraremos en un alert antes de enviar el formulario	
	} else {
		str ="Todos los datos del formulario son correctos:";
		str += "\n\t" + "Nombre: " + nombre.value;
		str += "\n\t" + "Apellidos: " + apellidos.value;
		str += "\n\t" + "Constraseña: " + password1.value;
		str += "\n\t" + "Fecha de nacimiento: " + fecha_nac.value;
		alert(str);
	}
	
}


/**
 * Limpia el contenido del div id='errores'
 */
function ocultarErrores() {
	document.getElementById("errores").innerHTML = '';
}


/**
 *  Valida cada uno de los campos del formulario, retornando un array de
 *  string con los errores encontrados en cada uno de los campos.
 */
function validarFormulario() {
	var errores = [];
	var i = -1;
	if (!validaNomApell(nombre.value)) {
		errores[++i] = 'El campo nombre es obligatorio y no contiene un valor válido.' +
					   '<br>El nombre solo puede contener caracteres del alfabeto (tíldes incluidas)';
	}
	if (!validaNomApell(apellidos.value)) {
		errores[++i] = 'El campo apellidos es obligatorio y no contiene un valor válido.' +
						'<br>Los apellidos solo pueden contener caracteres del alfabeto (tíldes incluidas)';
	}
	if (!validaPwd(password1.value)) {
		errores[++i] = 'El campo contraseña es obligatorio y no contiene un valor válido.' +
						'<br>Una contraseña debe contener:' +
		                '<ul> '+		              
			               '<li>Al menos una mayúscula.</li>' + 
						   '<li>Al menos una minúscula.</li>' +
						   '<li>Al menos un dígito decimal.</li>' +
						   '<li>Al menos uno de estos caracteres ; , .  -</li>' +
						   '<li>Ningún otro carácter distinto a los anteriores.</li>' +
					    '</ul>';
	}
	if (password1.value != password2.value) {
		errores[++i] = 'Las contraseñas no coinciden';
	}
	if (!validaFecha(fecha_nac.value)) {
		errores[++i] = 'El campo fecha de nacimiento es obligatorio y no contiene un valor válido' +
						'<br>Las fechas deben tener el formato dd/mm/aaaa';
	}
    return errores;
}


/**
 * Valida que el string pasado como parámetro cumple los requisitos solicitados
 * para un campo nombre o apellidos.
 * Retorna true si el string cumple los requisitos, o false en caso contrario.  
 */
function validaNomApell(str) {
	// definimos el patrón que debe seguir un nombre o unos apellidos
	// admitimos la aparición una o mas veces de cualquiera de los caracteres 
	// encerrados entre [], incluyendo espacios \s 
	// Incorporando ^ y $ nos aseguramos que no se reconozca el patrón si aparece
	// un caracter que no sea uno de los encerrados entre []
	var patron = /^[a-zA-ZçñáéíóúÇÑÁÉÍÓÚüÜ\s]+$/;
	// Eliminamos caracteres en blanco al principio y final
	str = str.trim()
	// verificamos que no se trata de una cadena vacía
	// y que sigue el patrón definido
	return str.length>0 && str.match(patron);
}

/**
 * Valida que el string pasado como parámetro cumple los requisitos solicitados
 * para el campo contraseña:
 *   - Al menos una mayúscula.
 *   - Al menos una minúscula.
 *   - Obligatoriamente al menos un dígito decimal.
 *   - Obligatoriamente al menos uno de estos caracteres ; , . -
 *   - No se admite ningún caracter distinto a los indicados anteriormente
 *
 * Retorna true en caso de que los string cumplan con los requisitos.
 */
function validaPwd(str) {
    // definimos el patrón que debe seguir una contraseña.
    // [a-zA-Z0-9;,\.\-] estos son los caracteres permitidos, en adelante []
    // la cadena debera tener al menos una minúscula (?=[]*[a-z])
    // la cadena debera tener al menos una mayúscula (?=[]*[A-Z])
    // la cadena debera tener al menos un digito (?=[]*\d)
    // la cadena debera tener al menos uno de estos caracteres: "; , . -" (?=[]*[;,\.\-])
    // Una vez cumplidos los requisitos anteriores, cualquier cadena que contenga los caracteres permitidos [a-zA-Z0-9;,\.\-]* 
    var patron=/^(?=[a-zA-Z0-9;,\.\-]*[a-z])(?=[a-zA-Z0-9;,\.\-]*[A-Z])(?=[a-zA-Z0-9;,\.\-]*\d)(?=[a-zA-Z0-9;,\.\-]*[;,\.\-])[a-zA-Z0-9;,\.\-]*$/;
	// verificamos que no se trata de una cadena vacía
	// y que sigue el patrón definido
	return str.length>0 && str.match(patron);
}

/**
 * Valida que el string pasado como parámetro cumple los requisitos solicitados
 * para el campo fecha.
 * Retorna true en caso de que los string cumplan con los requisitos,o false en
 * caso contrario.
 * Se utiliza una expresión regular básica para validar que la entrada tiene un formáto 
 * de dd/mm/yyyy y seguidamente una comprobación de fecha válida.
 *
 */
function validaFecha(str) {
	var valido = false;
    // definimos el patrón que debe seguir una fecha
    //
    // ^(0[1-9]|[12]\d|3[01]) números desde 01 hasta 31 al principio del string
    // \/ separador de día y mes
    // (0[1-9]|1[012]) números desde 01 hasta 12
    // \/ separador de mes y año
    // 0[1-9]\d{2}|[1-9]\d{3}$ números desde 0100 hasta 9999 al final del string
    //
    // 
    var patron = /^(0[1-9]|[12]\d|3[01])\/(0[1-9]|1[012])\/0[1-9]\d{2}|[1-9]\d{3}$/;
	// verificamos que no se trata de una cadena vacía
	// y que sigue el patrón definido
	if (str.length>0 && str.match(patron)) {
		// en cuyo caso comprobaremos que se trata de una fecha válida
		var partes = str.split('/')
		// creamos una fecha con los valores obtenidos y comparamos su mes dia y año
	    // con los originales. Si es una fecha válida, deberían coincidir.
	    // Necesitamos validar años mayores de 0099 con el patrón para que funcione 
	    // la comparación f.getFullYear() == partes[2], ya que para valores menores 
	    // new Date(partes[2], partes[1]-1, partes[0]) genera fechas con años de 19XX
		var f = new Date(partes[2], partes[1]-1, partes[0]);
		if (f.getDate() == partes[0] && f.getMonth()+1 == partes[1] && f.getFullYear() == partes[2]) {
			// damos por correcta cualquier fecha bien formada, aunque podríamos
			// restringir aquí la validez a un rango de fechas.
			valido = true;
		}
	}
	return valido;
}



/**
 * Cambia la primera letra de cada palabra a mayuscula y el resto a minuscula
 * para el valor del objeto para el que es llamada la función
 */
function cambiaMinusculas() {
	var str = this.value;
	var len = str.length;
	var str2='';
	var cAnt=' ';
	var c;
	// Comparamos cada caracter de la entrada por su predecesor
	for(i=0; i<len; i++) {
		c = str.substring(i,i+1);
		// si el predecesor era un espacio
		if(cAnt==' ') {
			// construimos la nueva cadena con el caracter en mayuscula
			str2 += c.toUpperCase();
		} else {
			// en caso contrario construimos la nueva cadena con este caracter
			// en minusculas
			str2 += c.toLowerCase();	
		}
		cAnt = c;
	}
	// modificamos el valor del elemento con el de la nueva cadena
	this.value=str2;
    return true;
}



