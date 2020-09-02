/* ----------------------------------------------------------------------------
|	Código javascript para la realización de la tarea 2 del módulo DWEC
| 
|	Se ha creado un función por cada apartado de la tarea con el fin de aportar
|   claridad más que funcionalidad. Se ha la función introducirNumero(texto)
|   para solicitad la introducción por promt de un texto numérico. 
|
|-----------------------------------------------------------------------------*/


/*
	Crea dos variables numéricas y les asigna un valor entero.
	Devuelve un texto indicando cual es el mayor de los números
*/
function ejercicio1() {
	var a = 20, b = 32;
	var resultado = a > b ? a : b;
	if(a>b) {
		texto = "El mayor de los números 20 y 32 es " + a;
	} else if(b>a) {
		texto = "El mayor de los números 20 y 32 es " + b;
	} else {
		texto = "Los números " + a + " " +  b + " son iguales";
	}	
	return texto;
}

/*
	Calcula  los números múltiplos de  5 desde el número 1 al número 100 
	incluido.
	Para el cálculos de los múltiplos se utiliza un bucle while (observaciones)
	Devuelve un texto con los múltiplos calculados, separados por  ', '.
*/
function ejercicio2(){
	var multiplo = 1;	var i = 1;	var texto="";
	// iremos calculando múltiplos mientras el último calculado 
	// sea menor al solicitado	
	while (multiplo < 100) {
		// calculamos el múltiplo
		multiplo = i*5;
		// componemos el texto
		texto = texto + ", " + multiplo;
		i++;
	} 
	// quitamos el caracter ',' del inicio antes de retornar el texto
	texto = texto.replace(/,$/,'');
	return texto;
}


/*
	Calcula los 10 primeros múltiplos de 2 y de 3.
	Para el cálculos se utiliza un bucle do while (observaciones).
	Devuelve un texto con los múltiplos calculados, separados por ', '.
*/
function ejercicio3(){
	var numeroMultiplos = 0;
	var numero = 1;
	var texto;		
	do {
		// comprobamos si el número es divisible entre 2 y entre 3
		if(numero%2===0 && numero%3===0) {
			numeroMultiplos++;	
			// componemos el texto
			texto = texto + ", " + numero;
			}
		}
		numero++;
	// seguiremos buscando múltiplos hasta que tengamos 10 
	} while (numeroMultiplos < 10)
	// quitamos el caracter ',' del inicio antes de retornar el texto
	texto = texto.replace(/,$/,'');
	return texto;
}

/*
	Pregunta por dos números y realiza una suma con ellos.
	Los números se piden con prompt y pueden tener decimales.
	Cuando se solicita introducir un número se comprueba que el
	valor introducido es correcto, volviendo a solicitar la 
	introducción del mismo hasta que el valor introducido sea válido.
	Devuelve un texto con los números introducidos y el resultado 
		de la suma.
*/
function ejercicio4(){
	var numero1, numero2, resultado;
	numero1 = introducirNumero("Por favor, introduzca el primer sumando");
	numero2 = introducirNumero("Por favor, introduzca el segundo sumando");
	texto = numero1 + " + " + numero2 + " = " + (parseFloat(numero1) + parseFloat(numero2));
	return texto;
}

/*
	Pide la introducción de un número mediante un promt, repitiendo
	la operación hasta que el valor introducido por el usuario sea 
	efectivamente un valor numérico.
	El texto a mostrar en el promt debe ser pasado como parámetro.
*/
function introducirNumero(texto) {
	var valor = "valorInicial";
	// ^[0-9]* cero mas caracteres del grupo  [0-9] 
	// (\.{1}[0-9]+){0,1}$ que puede, o no, estar seguido de un punto y uno o más caracteres del grupo [0-9] 
	var expReg = /^[0-9]*(\.{1}[0-9]+){0,1}$/;
	// solicitar la entrada de un número
	do {
		if(valor !== "valorInicial") {
			txtPromt = "El valor introducido no es un número.\n" + texto;
		} else {
			txtPromt = texto;
		}
		valor = prompt(txtPromt);
	  // mientras el valor introducido no sea un número	
	} while (!expReg.test(valor));
	// si se ha introducido un número lo devolvemos
	return parseFloat(valor);	
}


/*
	Devuelve el cálculo 80/4, realizado mediante el operador >>
*/
function ejercicio5(){
	return 80 >> 2;
}

/*
	Devuelve el cálculo 120*16 realizado mediante el operador <<
*/
function ejercicio6(){
	return 120 << 4;
}

