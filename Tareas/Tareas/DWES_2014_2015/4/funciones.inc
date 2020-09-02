<?php 
/**
 * Realiza la conexión a la base de datos MySQL con los parámetros de conexión:
 *     Nombre del servidor:                localhost
 *     Nombre de la base de datos:         tarea4
 * 	   Usuario de MySQL para la conexión:  usu4
 *     Contraseña para la conexión :       usu4
 * 
 * En caso de no poderse realizar la conexión se mostrará un mensaje de error
 * y terminará la aplicación.
 * Si la conexión se lleva a cabo devuelve el objeto PDOStatement correspondiente
 * a la misma 
 * @return PDOStatement
 */
function dbConectar() {
	global $errores;
	$pdo=null;
	$errores=null;
	try {
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
	    $pdo = new PDO('mysql:host=localhost;dbname=tarea4', 'usu4', 'usu4', $options);
	} catch (PDOException $e) {
	    $errores = 'Falló la conexión: ' . $e->getMessage();
	}
	return $pdo;
}	



/**
 * Comprueba si el usuario pasado como parámetro se encuentra en la base de datos,
 * en cuyo caso se verifica si la password pasada como parámetro coincide con la
 * de dicho usuario.
 * 
 * @param string $usuario usuario a autentificar
 * @param string $password clave con la que se debe autentificar el usuario
 * 
 * @return boolean true si el usuario se ha autenticado correctamente, false si
 *         el usuario no existe o la clave introducida no coincide con la almacenada 
 *         en la base de datos.
 *  
 */
function dbUsuarioValido($usuario, $password) {
	global $errores;
	$errores=null;
	$resultado = array();
	$pdo = dbConectar();
	if($errores=="") {
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {	
			// Ejecutamos una sentencia preparada pasando un array de valores
			// evitando inyecciones SQL maliciosas
			$sth = $pdo->prepare('SELECT pwd FROM usuarios WHERE usuario = ?');
			$sth->execute(array($usuario));
			$registro = $sth->fetch();
			if ($registro!=false && password_verify($password, $registro['pwd'])) {
				$resultado=true;
			} else {
				$resultado = false;
			}
		} catch (PDOException $e) {
			$errores= "Error al consultar usuario: ".$e->getMessage;
		}
	}	
	return $resultado;
}



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
 *	'fecha':             El valor del campo dev represente una fecha valida con el
 *                       formato dd-mm-aaaa
 *  'unico:tabla,clave': No debe existir en la tabla un registro con la clave dada
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
			case 'unico':
			    // verificamos que no exista un registro en la BD con la misma clave
				if($valor!=null) {
					if(dbExiste($parametros[0], $parametros[1], $valor)===true) {
						$error="Ya existe un registro en la tabla $parametros[0] con $nombreCampo = $valor";
						$fallaValidacion = true;
					} else {
						$error=dbExiste($parametros[0], $parametros[1], $valor);
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
 * Valida cada uno de los campos de un formulario form_login
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
 * Retorna true si el usuario se ha autenticado, false en caso contrario
 */
function autenticado() {	
	if(!isset( $_SESSION['autenticado'])) {
		return false;
	} else {
		return $_SESSION['autenticado'];
	}
	
}

/**
 * Retorna true si el usuario ha entrado como invitado, false en caso
 * contrario.
 */
function invitado() {
	if(!isset($_SESSION['usuario'])) {
		return false;
	} else {
		return $_SESSION['usuario']=="Invitado";
	}
	
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

/**
 * Esta función servirá de barrera para el acceso a las páginas que requieran
 * haber seleccionado como el acceso como invitado, o bien haberse autentificado
 */
function accesoInvitado() {
	if(!autenticado() && !invitado()) {
		header("Location: index.php");
	}
}

/**
 * Devuelve el valor hexadecimal del color preferido del usuario pasado
 * como parámetro, o el correspondienta al color blanco (#FFFFFF) si 
 * dicho usuario todavía no ha seleccionado un color como preferido.
 *
 * @param string $usuario usuario del que se devolverá el color
 * 
 * 
 */
function colorUsuario($usuario) {
	if(!isset($_COOKIE[$usuario."ColorTarea4"])) {
		$color = "#FFFFFF";
	} else {
		$color = $_COOKIE[$usuario."ColorTarea4"];
	}
	return $color;
}

?>