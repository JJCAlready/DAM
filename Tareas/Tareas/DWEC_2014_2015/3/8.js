/******************************************************************************
	Solicita la entrada por teclado de un número, reiterando la misma mientras
	el valor introducido no sea un valor númerico válido.
 *****************************************************************************/
function pedirNumero(strLado) {
	var numero;
	var valido = false;
	var msg = 'Introducir el valor para el ' + strLado;
    do {
       numero = prompt(msg); 
       msg = 'El valor introducido no es válido.\n\rIntroducir el valor para el ' + strLado;
       valido = numeroValido(numero)                 
    } while (!valido);
    return numero;
}


/******************************************************************************
	Dado un string, retorna true si dicho string representa un valor numérico
	válido, en caso contrario retorna false.
 *****************************************************************************/
function numeroValido(numero) {
	var nPuntos = 0;
	for(var i=0; i<numero.length; i++) {
		var c=numero.charCodeAt(i);
		// el caracter no es un número 
		if(c<48 || c>57) {
			// el carácter no es un número, pero si un punto 
			if(c==46) {
				nPuntos++;
				// solo puede haber un punto en la entrada como máximo
				if(nPuntos>1) {
					return false;
				}
			// el carácter no es un número y tampoco un punto	
			} else {
				return false;
			}
		} 
	}
	// la cadena pasada representa un número válido.
	return true;
}



/******************************************************************************
	Calcula el área de un triángulo cuyos lados miden los valores pasados 
	como parámetros, utilizando para ello la fórmula de Herón.
 *****************************************************************************/
function calculaAreaTriangulo(a, b, c) {
	var s = 0.5*(a+b+c);
	var area = Math.sqrt(s*(s-a)*(s-b)*(s-c));
	return area;
}


/******************************************************************************
	Solicita tres números por prompt que representan las medidas de los lados
	de un triángulo y calcula el área del mismo.
	El resultado se mostrará en la página html mediante la instrucción
	document.getElementById("resultado").innerHTML = strResultado.
 *****************************************************************************/
function muestraEjercicio() {
	var a=pedirNumero('primer lado');
	var b=pedirNumero('segundo lado');
	var c=pedirNumero('tercer lado');
	a = parseFloat(a);
	b = parseFloat(b);
	c = parseFloat(c);
	var area=calculaAreaTriangulo(a, b, c);
	var resultado;
	// El resultado del cálculo del área no es un número real o es 0
	if (isNaN(area) || area==0) {
		strResultado = "<p>No existe un triángulo cuyos lados midan " +
		               a + ", " + b + ", " + c + "</p>";
	// Si el cálculo del área es un resultado válido, lo mostraremos
	} else {
		strResultado = "<p>El área del triángulo cuyos lados miden " + 
	      	           a + ", " + b + ", " + c + " vale: " + area + "</p>" +
					   "<p>El perímetro del triángulo cuyos lados miden " + 
	      	           a + ", " + b + ", " + c + " vale: " + (a+b+c) + "</p>";	
	}
	// enviamos la información a mostrar a la página
	document.getElementById("resultado").innerHTML = strResultado;
}