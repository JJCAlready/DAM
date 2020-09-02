

/******************************************************************************
	Dado un string, retorna false si dicho string no representa una fecha 
	válida. Si el string representa una fecha válida, retorna dicha fecha.	
 *****************************************************************************/
function fechaValida(fecha) {
	var longitud = fecha.length;
	if (fecha.longitud<6 || fecha.longitud>10)
		return false;
	var dia=0, mes, anyo, inicioMes;

	// analizamos el valor introducido, caracter a caracter
	for (var i=0; i<longitud; i++) {
		var c = fecha.charCodeAt(i);
		// no es un número
		if (c>57)
			return false;
		
		// es un separador
		if(c==45) {
			// está separando dia y mes
			if (i==1 || i==2) {
				// recuperamos el día
				dia = fecha.substring(0, i);
				inicioMes = i+1;				
			// está separando mes y año		
			} else if(i<6 && dia!=0) {
				// recuperamos mes y año
				mes = fecha.substring(inicioMes, i);
				anyo = fecha.substring(i+1, longitud);
			// se encuentra en una posición no válida	
			} else {
				return false;
			}	
		// no es ni separador ni número	
		} else if (c<48) {
			return false;
		} 
	}

	// creamos una fecha con los valores obtenidos y comparamos su mes dia y año
	// con los originales. Si es una fecha válida, deberían coincidir
	var f = new Date(anyo, mes-1, dia);
	if (f.getDate() != dia || f.getMonth()+1 != mes || f.getFullYear() != anyo) {
		return false;
	}
	
	return f;
}


/******************************************************************************
	Dada una cadena de texto que representa una fecha válida, retorna el 
	signo del zodiaco al que corresponde dicha fecha.	
	El rango de fechas para cada signo ha sido establecido según la página
	http://www.horoscopo.com/indice-signo-solar.html

	Se va comparando la fecha pasada como parámetro con el rango de fechas 
	de cada signo. Cuando coincide con uno de ellos retorna el valor del mismo.
 *****************************************************************************/
function signoZodiaco(fecha) {
	var fIni, fFin;
	var anyo = fecha.getFullYear();

	// aries: 21/03 - 19/04
	fIni = new Date(anyo, 2, 21);
	fFin = new Date(anyo, 3, 19);
	if(fIni<=fecha && fecha<=fFin) 
		return 'aries';

	// tauro: 20/04 - 20/05
	fIni = new Date(anyo, 3, 20);
	fFin = new Date(anyo, 4, 20);
	//document.writeln("fIni="+fIni+" fFin=" + fFin + " fecha=" + fecha);
	if(fIni<=fecha && fecha<=fFin) 
		return 'tauro';

	// geminis: 21/05 - 20/06
	fIni = new Date(anyo, 4, 21);
	fFin = new Date(anyo, 5, 20);
	if(fIni<=fecha && fecha<=fFin) 
		return 'geminis';

	// cancer: 21/06 - 22/07
	fIni = new Date(anyo, 5, 21);
	fFin = new Date(anyo, 6, 22);
	if(fIni<=fecha && fecha<=fFin) 
		return 'cancer';

	// leo: 23/07 - 22/08
	fIni = new Date(anyo, 6, 23);
	fFin = new Date(anyo, 7, 22);
	if(fIni<=fecha && fecha<=fFin) 
		return 'aries';

	// virgo: 23/08 - 22/09
	fIni = new Date(anyo, 7, 23);
	fFin = new Date(anyo, 8, 22);
	if(fIni<=fecha && fecha<=fFin) 
		return 'virgo';

	// libra: 23/09 - 22/10
	fIni = new Date(anyo, 8, 23);
	fFin = new Date(anyo, 9, 22);
	if(fIni<=fecha && fecha<=fFin) 
		return 'libra';

	// escorpio: 23/10 - 21/11
	fIni = new Date(anyo, 9, 23);
	fFin = new Date(anyo, 10, 21);
	if(fIni<=fecha && fecha<=fFin) 
		return 'escorpio';

	// sagitario: 22/11 - 21/12
	fIni = new Date(anyo, 10, 22);
	fFin = new Date(anyo, 11, 21);
	if(fIni<=fecha && fecha<=fFin) 
		return 'sagitario';

	// capricornio: 22/12 - 19/01
	// aquí se produce un cambio de año, hemos de tenerlo en cuenta para poder comparar
	if(fecha.getMonth()==11) {
		fIni = new Date(anyo, 11, 22);
		fFin = new Date(anyo+1, 0, 19);
	}
	if(fecha.getMonth()==0) {
		fIni = new Date(anyo-1, 11, 22);
		fFin = new Date(anyo, 0, 19);
	}
	if(fIni<=fecha && fecha<=fFin) 
		return 'capricornio';

	// acuario: 20/01 - 17/02
	fIni = new Date(anyo, 0, 20);
	fFin = new Date(anyo, 1, 17);
	if(fIni<=fecha && fecha<=fFin) 
		return 'acuario';

	// piscis: 18/02 - 19/03
	fIni = new Date(anyo, 1, 18);
	fFin = new Date(anyo, 2, 19);
	if(fIni<=fecha && fecha<=fFin) 
		return 'piscis';

}


/******************************************************************************
Se pregunta por la fecha de nacimiento y le indicamos al usuario su signo del 
zodiaco. Utilizando un iframe mostramos una página que explica el signo. 
Se utiliza una página externa para mostrar la predicción.

Envía el resultado para mostrar a la página mediante
     document.getElementById("resultado").innerHTML = strResultado;
******************************************************************************/
function muestraEjercicio() {
    var fecha;
    var msg='Introduzca una fecha con el formato dd-mm-aaaa';
    var fValida = false;
    // solicitamos la fecha
    do {
       fecha = prompt(msg);
       msg = 'El valor introducido no es una fecha válida.\n\r' +
             'Introduzca una fecha con el formato dd-mm-aaaa'; 
       fValida = fechaValida(fecha); 
    // insistiendo hasta que se introduzca una fecha válida               
    } while (!fValida);
    // obtenemos el signo
    var signo = signoZodiaco(fValida);  
    // Componemos la información a mostrar en la página
    var strResultado = "<h4>El signo del zodíaco para los nacidos el "
                     + fecha + " es " + signo.toLocaleUpperCase() + "</h4>";
    strResultado += "<iframe scrolling=\'no\' src=\'"
                  + "http://www.horoscopo.com/signo-solar-personalidad-" + signo + ".html\'/>";               
    // colocamos la información a mostrar en su lugar
    document.getElementById("resultado_iframe").innerHTML = strResultado;
}
