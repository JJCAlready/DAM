
/******************************************************************************

	EJERCICIO 1
	Crear un array donde aparezcan los primeros 15 número primos de forma 
	descendente. O sea de mayor a menor. (13,11,7,5,3,2,1). Se introducen los 
	elementos de tal forma que no se tienen que ordenar.

******************************************************************************/


/**
 * Invierte el array pasado como parámetro. 
 * A pesar de que el objeto array de javascript posee un método llamado reverse()
 * que realiza lo solicitado en la tarea, se implementa esta función para la 
 * familiarizarse con el trabajo de array y sus indices.
 * 
 * @param  {array} arrayInvertir Array que queremos invertir
 * @return {array}               Array equivalente al pasado como parámetro
 *                               pero con los elementos invertidos.
 *                               
 */
function invertirArray(arrayInvertir) {
	// leemos cada uno de los elementos del array desde el último al primero
	// y lo asignamos al array a devolver, introduciéndolos desde el primero
	// hasta el último.
	var arrayInvertido = [];
	for(var i=0, j=arrayInvertir.length; i<j; i++) {
		arrayInvertido[i] = arrayInvertir[arrayInvertir.length-i-1];
	}
	return arrayInvertido;
}

/**
 * Guarda el contenido de los elementos del array pasado como parámetro en una
 * cadena de caracteres, al igual que lo haría el método array.toString, 
 * y lo visualiza en la página mediante la función document.write.
 *
 * A pesar de que el objeto array de javascript posee un método llamado toString(),
 * se implementa esta función recorriendo el array para familiarizarse con el trabajo
 * de array y sus indices.
 * 
 * @param  {array} array array cuyos elementos queremos visualizar.
 * @return {[type]}       [description]
 */
function visualizarArray(array) {
	
	var strResultado = "";
	// El resto de los elementos los separamos con el caracter "," y un espacio
	for(var i=1, nElementos = array.length; i<nElementos; i++) {
		strResultado += ", " + array[i];
	}
	// quitamos la coma del principio
  	strResultado = strResultado.replace(/^,/,'');
	// mostramos el resultado en la página.
	document.write(strResultado);
}


/**
 * Retorna un array con los primeros 15 números primos de forma
 * descendente.
 * 
 * @return {Array}   Array que contiene los primeros 15 números primos
 *                   en orden descencente
 */
function llenarArrayPrimos() {
	var n=1, i=0;
	var array = new Array();
	// buscar primos hasta que tengamos 15 primos
	do {
		// Probar con un nuevo número hasta encontrar un nuevo primo
		do {
			n++;
		} while (!esPrimo(n));		
		i++;
		// una vez encontrado el número primo, lo introducimos en orden inverso
		// en el array.
		array[15-i]=n;
	} while (i<15);
	return array;
}


/**
 * Comprueba si un número entero es primo o no.
 * @param  {int} n número entero a comprobar
 * @return {boolean}   true si el número pasado como parámetro es primo, 
 *                     false si no lo es.
 */
function esPrimo(n) {
  // mientras no se demuestre lo contrario, el número es primo	
  var primo = true;
  // hacemos una primera criba con los números pares
  if (!(n % 2 ) && n!=2)   {
	primo = false;
  } 
  // seguimos la criba con el resto de números
  if (primo) {
	  // buscaremos divisores de n menores o iguales que su raíz cuadrada
	  // (es imposible que sea divisible por números mayores)
	  var maxDivisor = Math.sqrt(n)+1;
	  // Solo buscaremos divisores impares, ya que para se divisible por
	  // 2*K ha de ser divisible por 2 y esto ya se cribó anteriormente  
	  for (var i = 3; i <= maxDivisor; i+=2) {
		// en el momento en que encontremos un divisor, no es necesario buscar más.
		if ((n % i)==0) {
		  primo = false;
		  break;
		} 
	  }
  }
  return primo
}



/******************************************************************************

	EJERCICIO 2:
	Cree una clase llamada Identidad. Esta clase tendrá los siguientes métodos:
    GenerarLetra que recibe como entrada un DNI sin letra y obtiene una cadena 
    DNI con esa letra.
    ComprobarDNI. Comprueba si el número del DNI es correcto o no lo es. Devuelve 
    true si es correcto y devuelve false si no lo es. 

******************************************************************************/

function Identidad() {
	/**
	 * Recibe como entrada un DNI sin letra y obtiene una cadena DNI con esa letra
	 * @param {string} dni DNI sin letra
	 * @return {string} DNI con la letra correspondiente a los dígitos pasados 
	 *                  como parámetro.
	 */
	this.GenerarLetra = function(dni) {
		var indice = 23;
		// Asociaremos el resto de la división a una letra concreta
		var letra=['T','R','W','A','G','M','Y','F','P','D','X','B','N',
		           'J','Z','S','Q','V','H','L','C','K','E',undefined];
		// El dni debe ser una cadena de 8 caracteres y valor numérico
		if(dni.length==8) {
			var valorInt = parseInt(dni);
			if(!isNaN(valorInt)) {
				indice = valorInt % 23
			}
		}
		return letra[indice];
	}

	/*
		Comprueba si el número del DNI es correcto o no lo es. 
		Devuelve true si es correcto y devuelve false si no lo es.
	*/

	/**
	 * Comprueba si el número del DNI es correcto o no lo es.
	 * @param {string} dni DNI a comprobar
	 * @return {string} true si el DNI pasado como parámetro es correcto, false
	 *                  en caso contrario.
	 */
	this.comprobarDNI = function(dni) {
		var correcto = false;
		// El dni debe ser una cadena de 9 caracteres
		if(dni.length==9) {
			// recuperamos la letra del dni
			var letraDNI = dni.charAt(8);
			// recuperamos el número del dni
			var numDNI = dni.substring(0,8);
			// comparamos la letra del dni pasado con la correcta
			correcto = this.GenerarLetra(numDNI)==letraDNI;
		}
		return correcto;
	}
}



/******************************************************************************

	EJERCICIO 3: crear una clase llamada Diputado.
	
	El constructor deberá ser algo similar a: 

	      	Diputado (nombre, apellidos, dni, edad,partido)

	Va a estar compuesta por las siguientes propiedades.

			Nombre. El nombre de pila.
			Apellidos. Los apellidos.
			DNI. El DNI. Debe ser correcto.
			Edad. Debe ser mayor que 0 y menor de 200.
			Partido. Siglas del partido al que pertenece.		
	
	Dispone de métodos set y get para cada una de las propiedades, así como
	un método toString que muestra todas sus propiedades

******************************************************************************/

function Diputado(nombre, apellidos, dni, edad, partido) {
	
	// La clase Diputado va a estar compuesta por las siguientes propiedades.

	this.Nombre = nombre;
	this.Apellidos = apellidos;
	var identidad = new Identidad;
	// Si el dni no es válido, crearemos el diputado con DNI undefined
	if (identidad.comprobarDNI(dni)) {
		this.DNI = dni;
	}
	// Si la edad no es válida, crearemos el diputado con Edad undefined
	if (edad>0 && edad<200) {
		this.Edad = edad;
	}
	this.Partido = partido;

	///////////////////////////////////////////////////////////////////////////
	//                      Métodos get y set
	///////////////////////////////////////////////////////////////////////////
	this.getNombre = function() {
		return this.Nombre;
	}

	this.setNombre = function(nombre) {
		this.Nombre = nombre;
	}

	this.getApellidos = function() {
		return this.Apellidos;
	}

	this.setApellidos = function(nuevosApellidos) {
		this.Apellidos = nuevosApellidos;
	}

	this.getDNI = function() {
		return this.DNI;
	}

	/*
		Devuelve false si no se ha podido cambiar, 
		true si se ha podido cambiar porque no es correcto ese DNI
	*/
	this.setDNI = function(nuevoDNI) {
		var identidad = new Identidad;
		var retorno = false;
		// Solo si es posible cambiar el DNI, retornaremos true
		if (identidad.comprobarDNI(nuevoDNI)) {
			this.DNI = nuevoDNI;
			retorno = true;
		}
		return retorno;		
	}

	this.getEdad = function() {
		return this.Edad;
	}

	/*
	/*
		Devuelve false si no se ha podido cambiar, 
		true si se ha podido cambiar porque no es correcta esa edad
	*/
	this.setEdad = function(nuevaEdad) {
		var retorno = false;
		// Edad. Debe ser mayor que 0 y menor de 200.
		if (nuevaEdad>0 && nuevaEdad<200) {
			this.Edad = nuevaEdad;
			retorno = true;
		}
		return retorno
	}

	this.getPartido = function() {
		return this.Partido;
	}

	this.setPartido = function(nuevoPartido) {
		this.Partido = nuevoPartido;
	}
	

	///////////////////////////////////////////////////////////////////////////
	//                  FIN    Métodos get y set
	///////////////////////////////////////////////////////////////////////////



	/*
	   Método toString: Muestra todos las propiedades de Diputado.
	   Muestra una cadena de texto con el formato NombrePropiedad:ValorPropiedad, ...
	*/
	this.toString = function() {
		var str = "Nombre:"+this.Nombre;
		str += ", Apellidos:"+this.Apellidos;
		str += ", DNI:"+this.DNI;
		str += ", Edad:"+this.Edad;
		str += ", Partido:"+this.Partido;
		document.write(str);
	}
}

