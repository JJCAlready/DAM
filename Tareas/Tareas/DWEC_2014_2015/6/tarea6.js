
// Variables globales de la aplicación.
var colorActivo="rojo";
var colorNoActivo="blanco";

// Cuando el documento esté cargado llamamos a la función iniciar().
window.addEventListener("load",iniciar, false);



/*
	función iniciar -- hace las llamadas al dibujo del tablero
 	y además asigna los eventos de click correspondientes.
*/
function iniciar(){	
	var celdasTablero = [];
	// Dibujamos la tabla dónde pintaremos con el ratón
	dibujarTablero();

	var tablero=document.getElementById("tablero");
	// Ponemos cada celda del tablero a escuchar el evento click
	celdasTablero=tablero.getElementsByClassName("td");	
	for (var i=0;i<celdasTablero.length;i++){
		celdasTablero[i].addEventListener("click", pintarCelda, false);
	}

	//	Ponemos los botones a escuchar el evento click
	document.getElementById("rojo").addEventListener("click", activarColor, false);	
	document.getElementById("blanco").addEventListener("click", activarColor, false);
	document.getElementById("limpia").addEventListener("click", limpiar, false);
	document.getElementById("ajedrez").addEventListener("click", pintarAjedrez, false);
	document.getElementById("sumar_rojas").addEventListener("click", sumarRojas, false);
	document.getElementById("sumar_blancas").addEventListener("click", sumarBlancas, false);

}


/*
 	función dibujarTablero -- realiza el dibujo del tablero
 */

function dibujarTablero(){
	// array auxiliar para guardar las apariciones de los valores aleatorios;
	var valor1a15=[];
	var valor, texto, tablero, tabla, fila, celda;
	// Vamos creando la estructura de la tabla empleando el árbol de nodos del DOM.
	// que finalmente agregaremos al elemento contenedor del tablero.
	tablero=document.getElementById("tablero");

	// creamos la tabla
	tabla =document.createElement("div");
	tabla.setAttribute("class","table");
	
	// crearemos las filas de la tabla y las celdas dentro de cada fila.
	for (var i=0; i<=3; i++){
		fila =document.createElement("div");
	    fila.classList.add("tr");
		for (var j=0; j<=3; j++){
			// crearemos cada una de las celdas
			celda=document.createElement("div");
			// buscamos un valor entre 0 y 15 
			do {
				valor = Math.round(15*Math.random());
			// que no haya aparecido todavía	
			} while (valor1a15[valor] !== undefined);
			valor1a15[valor]=valor;
			// y crearemos con dicho valor un nodo texto
			texto=document.createTextNode(""+valor);
			// para agregarlo a la celda
			celda.appendChild(texto);
			// asignamos al div el id y class correspondiente
			celda.setAttribute('id', 4*i+j)
			celda.classList.add("blanco");
			celda.classList.add("td");	
			// metemos la celda dentro del DIV de la fila
			fila.appendChild(celda);
		}
		// metemos la fila dentro del DiV de la tabla
		tabla.appendChild(fila);
	}
	// metemos la tabla dentro del DIV tablero.
	tablero.appendChild(tabla);
}



/*
	 función pintarCelda -- pinta el div que fue pulsado con el color
	 activo, para ello cambiamos la clase del div que determina dicho color
*/
function pintarCelda(evt){
	this.classList.remove(colorNoActivo)
	this.classList.add(colorActivo);
	// limpiar el contenido del valor de la suma, si lo hubiera, para que 
	// no muestre un valor incorrecto
	document.getElementById("suma").innerHTML = '';

}

/*
	 función activarColor -- nos permite cambiar el color con el
	 que se pintarán las celdas
*/
function activarColor() {
	if (this.id=='rojo') {
		colorActivo='rojo';
		colorNoActivo='blanco';
	} else {
		colorActivo='blanco';
		colorNoActivo='rojo';
	}
	// Indicaremos al usuario cual es el color activo
	document.getElementById("color").innerHTML = 'Color activo: '+colorActivo;
}

/*
	funcion limpiar -- recorre todas las celdas del tablero pintándolas de
	color blanco.

*/
function limpiar() {
	var celda;
	for(var i=0; i<16; i++) {
		// a cada celda
		celda=document.getElementById(i);
		//le quitamos el color rojo si lo tuviera
		celda.classList.remove("rojo");
		// y le añadimos el blanco si no lo tuviera
		celda.classList.add("blanco");
	}
	// limpiar el contenido del valor de la suma, si lo hubiera para que no
	// muestre un valor incorrecto
	document.getElementById("suma").innerHTML = '';
}


/*
	funcion pintarAjedrez -- recorre todas las celdas del tablero
	pintándolas de forma alternativa para simular un tablero de ajedrez
*/
function pintarAjedrez() {
	var celda;
	// recorremos la tabla por filas y columnas
	for (var i=0; i<=3; i++){
		for (var j=0; j<=3; j++){
			// obtenemos la referencia a la celda
			celda=document.getElementById(4*i+j);
			// le quitamos el color
			celda.classList.remove("blanco", "rojo");
			// y le ponemos el que le corresponda
			if ((i+j)%2) {
				celda.classList.add("blanco");
			} else {
				celda.classList.add("rojo");
			}
		}
	}
}


/*
	funcion sumarBlancas -- recorre todas las celdas del tablero,
	sumando el valor que contiene si el color con el que está pintada 
	es blanco. Finalmente se muestra la suma en el div correspondiente
*/
function sumarBlancas() {
	var suma=0;
	var celda;
	for(var i=0; i<16; i++) {
		celda=document.getElementById(i);
		if (celda.classList.contains("blanco")) {
			// actualizar suma suma
			suma += parseInt(celda.childNodes[0].textContent);
		}
	}
	// pintar suma
	document.getElementById("suma").innerHTML = 'Las blancas suman '+suma;
}


/*
	funcion sumarRojas -- recorre todas las celdas del tablero,
	sumando el valor que contiene si el color con el que está pintada 
	es rojo. Finalmente se muestra la suma en el div correspondiente
*/
function sumarRojas() {
	var suma=0;
	var celda;
	for(var i=0; i<16; i++) {
		celda=document.getElementById(i);
		if (celda.classList.contains("rojo")) {
			// actualizar suma suma
			suma += parseInt(celda.childNodes[0].textContent);
		}
	}
	// pintar suma
	document.getElementById("suma").innerHTML = 'Las rojas suman '+suma;
}
