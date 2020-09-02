/******************************************************************************
Elimina los caracteres repetidos que vayan seguidos de la cadena pasada como
parámetro. Las mayúsculas y las minúsculas no son iguales.  
Por ejemplo: "Aa1aaaaa" se convertiría en "Aa1a".
******************************************************************************/
function borrarRepetidas(cadena) {
     var charAnt = 0, c;
     var nuevaCadena ='';
     // recorremos toda la cadena comparando cada carater con su predecesor
     for(var i=0; i<cadena.length; i++) {
     	c = cadena.charAt(i);
          // si el carácter en cuestión es distinto a su predecesor
     	if (c!=charAnt) {
               // lo añadimos a la nueva cadena
     		nuevaCadena += c;
     		charAnt = c;
     	}
          // si el carácter en cuestión fuese igual a su predecesor, no lo
          // incluimos en la nueva cadena.
     }
     return nuevaCadena;
}



/******************************************************************************
Lee una cadena de teclado (puede contener número y otros caracteres) y elimina 
los caracteres repetidos que vayan seguidos.
Envía el resultado para mostrar a la página mediante
     document.getElementById("resultado").innerHTML = strResultado;
******************************************************************************/
function muestraEjercicio() {
     var cadena='';
     var msg = "Introduzca una cadena de texto.";
     // solicitamos la cadena al usuario
     do {
          cadena = prompt(msg);
          cadena = cadena.trim()   
          msg = "La cadena introducida no es válida.\n\rIntroduzca una cadena de texto."
     // evitando cadenas vacías
     } while(cadena=='');

     // preparamos la información a mostrar en la página
     var strResultado = "<p><b>Cadena introducida</b>: " + cadena + "</p>";
     strResultado += "<p><b>Cadena resultante</b>: " + borrarRepetidas(cadena) + "</p>";
     // y la incluimos su lugar dentro de la página
     document.getElementById("resultado").innerHTML = strResultado;
}