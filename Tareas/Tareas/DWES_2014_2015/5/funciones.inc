<?php 
///////////////////////////////////////////////////////////////////////////
//
//  Funciones utilizadas en la tarea 5, aunque algunas de ellas fueron 
//  implementadas para las tareas 3 y 4 y reutilizadas en esta.
//
///////////////////////////////////////////////////////////////////////////




/**
 *  ESTA FUNCIÓN FUE CREADA PARA SU USO EN LA TAREA3, SIENDO REUTILIZADA EN ESTA
 * 
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
 *	'fecha':             El valor del campo debe representar una fecha valida con el
 *                       formato dd-mm-aaaa
 *   'email':            El valor del campo debe representar una dirección de email
 *                       válida. (Añadido para la tarea 5)
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

			case 'email':
				if ($valor!=null && filter_var($valor, FILTER_VALIDATE_EMAIL) ===false) {
					$error="El campo $nombreCampo no es un correo válido";
					$fallaValidacion = true;
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
 * Valida cada uno de los campos de un formulario de login
 * 
 * @param array asociativo $campos cada uno de los campos a validar
 *
 * @return array de string con los mensajes correspondientes a los
 *         errores de validación encontrados.
 */
function validarFormLogin($campos) {
	$errores=array();
	$errores[] = validaCampo($campos['usuario'], "Usario|requerido");		
	$errores[] = validaCampo($campos['password'], "Password|requerido");		
	// antes de retornar, eliminamos los mensajes de error vacios	
	return array_filter($errores, "strlen");	
}


/**
 * Valida cada uno de los campos del formulario de registro
 * 
 * @param array asociativo $campos cada uno de los campos a validar
 *
 * @return array de string con los mensajes correspondientes a los
 *         errores de validación encontrados.
 */
function validarFormReg($campos) {
	$errores=array();
	$errores[] = validaCampo($campos['usuario'], "Usario|requerido");		
	$errores[] = validaCampo($campos['password1'], "Password1|requerido");
	$errores[] = validaCampo($campos['password2'], "Password2|requerido");
	$errores[] = validaCampo($campos['email'], "Email|requerido|email");
	
	if($campos['password1']!=$campos['password2']) {
		$errores[] = 'Las contraseñas no coinciden';
	}

	// eliminamos los mensajes de error vacios	
	return array_filter($errores, "strlen");	

	//si todos los campos son correctos, ver que no exista un usuario igual
	if(count($errores)==0) {
		if(Usuario::findByUsuario($campos['usuario'])!=null) {
			$errores[] = 'Ya existe un usuario registrado con el nombre '.$campos['usuario'];
		}
	}

	// retornar los posibles errores encontrados.	
	return $errores;	
}


/**
 * Valida cada uno de los campos del formulario de modificación
 * 
 * @param array asociativo $campos cada uno de los campos a validar
 *
 * @return array de string con los mensajes correspondientes a los
 *         errores de validación encontrados.
 */
function validarFormMod($campos) {
	$errores=array();
	if($campos['email']!='') {
		$errores[] = validaCampo($campos['email'], "Email|email");
	}
	
	if($campos['password1']!='' && $campos['password1']!=$campos['password2']) {
		$errores[] = 'Las contraseñas no coinciden';
	}

	// eliminamos los mensajes de error vacios	
	return array_filter($errores, "strlen");	
}



/**
 * Retorna true si el usuario se ha autenticado, false en caso contrario
 */
function autenticado() {
	return isset( $_SESSION['usuario']);
}


/**
 * Esta función servirá de barrera para el acceso a las páginas que requieran
 * haberse autentificado para el acceso a las mismas.
 */
function accesoAutenticado() {
	if(!autenticado()) {
		header("Location: index.php");
	}
}

?>