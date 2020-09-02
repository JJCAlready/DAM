<?php 
/**
 *  Este archivo contiene las funciones implementadas para 
 *  el desarrollo de la tarea 7 
 */

require_once 'clases/comercial.php';
// Incluimos y registramos la libreria jQuery4PHP
include_once 'include/YepSua/Labs/RIA/jQuery4PHP/YsJQueryAutoloader.php';
YsJQueryAutoloader::register();

// definimos las constantes para identificar las operaciones a llevar a 
// cabo en un comercial
define("OP_ELIMINAR", "1");
define("OP_INSERTAR", "2");
define("OP_MODIFICAR", "3");

/**
 * Convierte un string que representa una fecha con formato aaaa-mm-dd
 *en un string que representa una fecha con formato dd-mm-aaaa
 * @param string $value en formato aaaa-mm-dd
 * @return string que representa una fecha con formato dd-mm-aaaa
 */
function formatFechaES($value){
	$partes=explode("-", $value);
	$value = $partes[2]."-".$partes[1]."-".$partes[0];
	return $value;
}


/**
 * Convierte un string que representa una fecha con formato dd-mm-aaaa en un
 * string que representa una fecha con formato aaaa-mm-dd
 * @param string $value en formato aaaa-mm-dd
 * @return string que representa una fecha con formato dd-mm-aaaa
 */
function formatFechaBD($value){
	$partes = explode("-", $value);
	$value = $partes[2]."-".$partes[1]."-".$partes[0];
	return $value;
}


/**
 * Crea una cadena con el código html con la etiqueta, contenido y atributos
 * pasados como parámetros
 * 
* @param  string  $tag       etiqueta html
* @param  string  $contenido contenido a mostrar dentro de la etiqueta 
* @param  array   $atributos array asociativo con los atributos de la etiqueta
*                            como claves y sus respectivos valores
* @return string             cadena con el formato <tag atributos='valor' ... >contenido</tag>
 */
function htmlTag($tag, $contenido, $atributos=array()) {
	$strAtributos = "";
	// construimos la cadena que hace referencia a los atributos
	foreach ($atributos as $atributo => $valor) {
		$strAtributos .= ", $atributo='$valor'";
	}
		// eliminar el primer caracter ','
	$strAtributos = trim($strAtributos, ',');
	// componemos el texto de la etiqueta y lo devolvemos
	return "<$tag $strAtributos>$contenido</$tag>";
}
 

/**
 * Crea una cadena con el código html para mostrar en la página una tabla con todos
 * los comerciales y los imagenes y el código generado por jQuery4PHP para el manejo
 * de los registros (filas).
 * 
 * @return string Código html para el contenido de la tabla
 */
function htmlListadoComerciales() {
	// recuperamos todos los registros de la tabla comerciales
	$comerciales = Comercial::all();
	// componemos la cabecera de la tabla
	$strHtml = 
		htmlTag('caption','').
	    htmlTag('th','Código').
	    htmlTag('th','Nombre').					
	    htmlTag('th','Salario').					
	    htmlTag('th','Hijos').					
	    htmlTag('th','Fecha nacimiento').					
	    htmlTag('th','').					
	    htmlTag('th','');	
	// componemos una fila por cada comercial  				
	foreach ($comerciales as $comercial) { 
		$codComercial = $comercial['codigo'];
	 	$strHtml .=	
	 		htmlTag('tr',
	 			htmlTag('td', $comercial['codigo']).
				htmlTag('td', $comercial['nombre']).
				htmlTag('td', $comercial['salario']).
				htmlTag('td', $comercial['hijos']).
				htmlTag('td', formatFechaES($comercial['fNacimiento'])).
				// asignamos a la imagen de una columna una clase e id que identificarán la operación y fila respectivamente
				htmlTag('td', htmlTag('img', '', array('class'=>'edit', 'id'=>'edit_'.$codComercial, 'src'=>'resources/images/edit.png','title'=>'Editar el comercial'))).
				htmlTag('td', htmlTag('img', '', array('class'=>'del', 'id'=>'del_'.$codComercial, 'src'=>'resources/images/delete.png','title'=>'Borrar el comercial'))),
				// cada fila se identifica con el id del comercial, que podremos recuperar del id de la imagen pulsada
				array('id'=>$comercial['codigo'])
				);
	}

	////////////////////////////////////////////////////////////////////////////
	// Añadimos el código para capturar los eventos click sobre las imágenes.
	// Podríamos añadir también este código en la página index.php pero hay
	// que tener en cuenta que la asignación de los eventos se produce en el
	// momento en el que se renderiza la información, por lo que resulta más
	// sencillo hacerlo aquí que en index.php ya que en ese caso habría que 
	// hacerlo con el método YsJQuery::live
	////////////////////////////////////////////////////////////////////////////

				 
	$strHtml .=	
		// manejo de la pulsación sobre la imagen de editar un comercial
		YsJQuery::newInstance()
		->onClick()
		->in('.edit')
		->execute(
		// capturamos el código del comercial seleccionado
		'var cod = this.id.split("_")[1]',
		// y rellenamos el formulario con los datos de la fila
		'rellenaForm(cod)',
		// asignamos valores a los elementos configurables para la operación
	        // de modifición de comercial
		YsJQuery::val()
		->in('#operacion')
        ->key(OP_MODIFICAR),

        YsJQuery::removeAttr()
        ->in('#form input[type="text"]')
	    ->attributeName('disabled'),

        YsJQuery::val()
		->in('#aceptar')
        ->key('Modificar'),

        YsJQuery::html()
		->in('.titulo_formulario')
        ->key("Modificiar comercial"),
        // mostraremos el formulario y ocultaremos el listado y el botón de nuevo comercial
		YsJQuery::show()
		->in('#formComercial')
		->duration(null),

		YsJQuery::hide()
		->in('#tabla_listado')
		->duration(null),

		YsJQuery::hide()
		->in('#nuevo_comercial')
		->duration(null)
		
		);


	$strHtml .=
		// manejo de la pulsación sobre la imagen de editar un comercial			 
		YsJQuery::newInstance()
		->onClick()
		->in('.del')
		->execute(
		// capturamos el código del comercial seleccionado
		'var cod = this.id.split("_")[1]',
		// y rellenamos el formulario con los datos de la fila
		'rellenaForm(cod)',
		// asignamos valores a los elementos configurables para la operación
		YsJQuery::val()
		->in('#operacion')
        ->key(OP_ELIMINAR),

        YsJQuery::val()
		->in('#aceptar')
        ->key('Eliminar'),

        YsJQuery::attr()
        ->in('#form input[type="text"]')
	    ->attributeName('disabled')
	    ->value('true'),

        YsJQuery::html()
		->in('.titulo_formulario')
        ->key("Eliminar comercial"),
        // mostraremos el formulario y ocultaremos el listado y el botón de nuevo comercial
		YsJQuery::show()
		->in('#formComercial')
		->duration(null),

		YsJQuery::hide()
		->in('#tabla_listado')
		->duration(null),

		YsJQuery::hide()
		->in('#nuevo_comercial')
		->duration(null)
		
		);	
	
	return $strHtml;
} 



/**
 * Verifica que el valor del parámetro $valor cumple las condiciones requeridas
 * en el parámetros $validaciones.
 * Las validaciones han de venir dadas en un string con el siguiente formato:
 *    NombreDelCampo|TipoValidación1:Parametro1, Parametro2, ...|TipoValidación2 ...
 * @param string $valor valor para el que se verificarán las validaciones
 * @param string $validaciones representando las validaciones a realizar. Estas pueden
 *        ser una o varias de los siguientes tipos:
 * 
 *  'requerido'    :     El campo no puede ser un valor null o vacio
 *	'maxLong:long' :     La longitud del campo no puede exceder el valor long
 *	'minLong:long':      La longitud del campo no puede ser inferior al valor long
 *	'maxVal:val':        El valor del campo debe ser inferior o igual al valor val
 *	'minVal:val':        El valor del campo debe ser superior o igual al valor val
 *	'integer':	         El valor del campo debe representar un valor numérico entero
 *	'float':             El valor del campo debe representar un valor numérico real
 *	'fecha':             El valor del campo dev represente una fecha valida con el
 *                       formato dd-mm-aaaa
 * 
 * IMPORTANTE: SE REALIZA UN BREAK PARA SALIR DEL BUCLE DE VALIDACIONES DE MODO QUE
 * SOLO SE MUESTRA EL PRIMER ERROR ENCONTRADO.
 *
 *  @return string con el texto correspondiente al primer error encontrado en el campo
 */			
function validaCampo($valor, $validaciones) {
	$error = "";
	// Separamos las validaciones
	$partesValidaciones = explode("|", $validaciones);
	// La primera parte de la validación debe contener el nombre el campo
	$nombreCampo = $partesValidaciones[0];
	// Dejamos solo las verdaderas validaciones
	unset($partesValidaciones[0]);
	$partesValidaciones = array_values($partesValidaciones);
	// Analizamos cada una de las validaciones, CUIDADO, se utiliza un BREAK
	// para salir del bucle foreach en el momento en que se encuentre un
	// error de validación, de modo que solo se muestre un error por campo.
	foreach($partesValidaciones as $validacion) {
		// Si una validación requiere parámetros, estos se separan del tipo
		// de validación por el caracter :
		$partesValidacion = explode(":", $validacion);
		$tipoValidacion = $partesValidacion[0];
		// Si una validación requiere más de un parámetro, estos se separan
		// por el caracter ,
		if(count($partesValidacion)>1) {
			$parametros = explode(",", $partesValidacion[1]);
		}
		
		$fallaValidacion = false;
		switch ($tipoValidacion) {
			case 'requerido':
				if ($valor==null || strlen($valor)==0) {
					$error="El valor del campo $nombreCampo no puede estar vacio";
					$fallaValidacion = true;
				}
				break;
			
			case 'maxLong':
				if ($valor!=null && strlen($valor)>$parametros[0]) {
					$error="La longitud del campo $nombreCampo no puede exceder de $parametros[0]";
					$fallaValidacion = true;
				}
				break;
			
			case 'minLong':
				if ($valor!=null && strlen($valor)<$parametros[0]) {
					$error="La longitud del campo $nombreCampo debe ser mayor de ".($parametros[0]-1);
					$fallaValidacion = true;
				}
				break;
			
			case 'maxVal':
				if ($valor!=null && $valor>$parametros[0]) {
					$error="El valor del campo $nombreCampo debe ser menor o igual que $parametros[0]";
					$fallaValidacion = true;
				}
				break;
			
			case 'minVal':
				if ($valor!=null && $valor<$parametros[0]) {
					$error="El valor del campo $nombreCampo debe ser mayor o igual que $parametros[0]";
					$fallaValidacion = true;
				}
				break;
			
			case 'integer':
				if ($valor!=null && filter_var($valor, FILTER_VALIDATE_INT) ===false) {
					$error="El campo $nombreCampo debe ser un número entero";
					$fallaValidacion = true;
				}
				break;
			
			case 'float':
				if ($valor!=null && filter_var($valor, FILTER_VALIDATE_FLOAT) ===false) {
					$error="El campo $nombreCampo debe ser un número real";
					$fallaValidacion = true;
				}
				break;
			
			case 'fecha':
				// verificamos que el formato es correcto y representa una fecha válida
				if ($valor!=null) {
					$partes = explode("-", $valor);
					if (count($partes)!=3 || !checkdate($partes[1], $partes[0], $partes[2])) {
						$error="El campo $nombreCampo debe tener el formato 
									dd-mm-aaaa y ser una fecha válida";
						$fallaValidacion = true;
					}
				}					
				break; 
			default:
				break;
		} // switch 
		///////////////////////////////////////////////////////////////
		// SOLO MOSTRAREMOS EL PRIMER ERROR DE VALIDACIÓN ENCONTRADO //
		///////////////////////////////////////////////////////////////
		if ($fallaValidacion) {
			break;
		}
	} // para cada validacion 
	return $error;
}



/**
 * Valida cada uno de los campos de un formulario form_comercial
 * @param array asociativo $campos cada uno de los campos a validar
 * @param string $operacion. Indica si el formulario se mostró para
 *        eliminar, insertar o crear un comercial.
 *        estaba desactivo o no y si por tanto debe o no ser validado.
 * @return array de string con los mensajes correspondientes a los
 *        errores de validación encontrados.
 */
function validarFormComercial($campos, $operacion, $codigoAnterior) {
	$errores=array();
	switch ($operacion) {
		case OP_ELIMINAR:
			// ver si el comercial tenía ventas 
			if(Comercial::conVentas($codigoAnterior)) {
				// tiene ventas, luego no puede ser eliminado
				$errores[] = "El comercial no puede eliminarse, el comercial tiene ventas asociadas";
			}
			// no hace falta validar nada más
			return $errores;
			break;
		
		case OP_INSERTAR:
			// validar el campo código
			$error = validaCampo($campos['codigo'], "Codigo|requerido|maxLong:3");	
			// si la validación del campo produce un error, guardarlo en el array
			if($error != "") {
				$errores[]=$error;
			} else if(Comercial::existe($campos['codigo'])) {
				$errores[] = "Ya existe un comercial con ese código";
			}
			break;
		
		case OP_MODIFICAR:
			// validar el campo código
			$error = validaCampo($campos['codigo'], "Codigo|requerido|maxLong:3");
			// si la validación del campo produce un error, guardarlo en el array
			if($error != "") {
				$errores[]=$error;
			// además de ser válido, si se ha modificado hemos de validar que 
			// realmente se podía modificar y, en caso afirmativo, que existe previamente	
			} else if ($campos['codigo']!=$codigoAnterior) {
				// tenemos un código modificado y el nuevo es válido, 
				// ver si el comercial tenía ventas 
				if(Comercial::conVentas($codigoAnterior)) {
					// tiene ventas, luego no puede ser modificado
					$errores[] = "El código del comercial no puede modificarse, \n
					              Existen ventas con el código de comercial ".$codigoAnterior;
				} else {
					// no existen ventas con el código anterior, 
					// por tanto, de momento el código es válido
					if (Comercial::existe($campos['codigo'])) {
						$errores[] = "Ya existe un comercial con ese código";
					}
				}
			}
			break;
		
		default:
			$errores[] = 'OPERACIÓN NO VÁLIDA';
			break;
	}
	// se trata de una insercion o una modificación, validar el resto de campos
	$errores[] = validaCampo($campos['nombre'], "Nombre|requerido|maxLong:30");		
	$errores[] = validaCampo($campos['salario'], "Salario|requerido|float|minVal:0");		
	$errores[] = validaCampo($campos['hijos'], "Hijos|requerido|integer|minVal:0");		
	$errores[] = validaCampo($campos['fNacimiento'], "Fecha de nacimiento|requerido|fecha");
	// antes de retornar, eliminamos los mensajes de error vacios	
	return array_filter($errores);	
}

?>