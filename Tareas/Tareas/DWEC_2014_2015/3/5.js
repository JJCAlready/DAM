/******************************************************************************
Recibe una cadena de texto y retorna una cadena de texto equivalente con las 
mayúsculas y minúsculas invertidas. 
Por ejemplo "Hola me llamo Antonio" sería "hOLA ME LLAMO aNTONIO".
******************************************************************************/

function invierteMayusculas(cadena) {
     var nuevaCadena ='';
     var subStr;
     cadena = cadena.toString();
     // comparamos cada porción de cadena correspondiente a un solo caracter
     // con dicha porción convertida a minusculas. Si son iguales debemos 
     // reconstruir esa porción de cadena pero en mayúsculas, y a la inversa.
     for(var i=0; i<cadena.length; i++) {
          subStr = cadena.substring(i, i+1);
          if (subStr.toLowerCase() == subStr) {          
              nuevaCadena += subStr.toUpperCase(); 
         } else {
               nuevaCadena += subStr.toLowerCase();
         }
     }
     return nuevaCadena;
}



/******************************************************************************
  Lee una cadena por teclado e invierte las mayúsculas por minúsculas. 
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
    var strResultado ="<p><b>Cadena introducida</b>: " + cadena + "</p>";
    strResultado += "<p/><b>Cadena resultante</b>: " + invierteMayusculas(cadena)+ "</p>";
    // y la incluimos su lugar dentro de la página
    document.getElementById("resultado").innerHTML = strResultado;
}


