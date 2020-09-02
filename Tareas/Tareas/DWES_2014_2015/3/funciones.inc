<?php 

/**
 * Realiza la conexión a la base de datos MySQL con los parámetros de conexión:
 *     Nombre del servidor:                localhost
 *     Nombre de la base de datos:         ventas_comerciales
 * 	   Usuario de MySQL para la conexión:  dwes
 *     Contraseña para la conexión :       dwes
 * 
 * En caso de no poderse realizar la conexión se mostrará un mensaje de error
 * y terminará la aplicación.
 * Si la conexión se lleva a cabo devuelve el objeto PDOStatement correspondiente
 * a la misma 
 * @return PDOStatement
 */
function dbConectar() {
	try {
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
	    $pdo = new PDO('mysql:host=localhost;dbname=ventas_comerciales', 'dwes', 'dwes', $options);
	} catch (PDOException $e) {
	    echo 'Falló la conexión: ' . $e->getMessage();
	    die();
	}
	return $pdo;
}	


/**
 * Crea y devuelve el código html necesario para mostrar todos los registros de
 * de una tabla de la base de datos.
 * La tabla ventas tiene claves ajenas a las tablas productos y comerciales. 
 * Para esta tabla mostraremos junto a las claves los valores correspondientes 
 * al comercial y al producto con los que se relacionan.
 * 
 * @param string $tabla Nombre de la tabla para la que se mostrarán los registros
 * @param string $titulo Titulo para mostrar en el caption de la tabla
 * @param array de string $cabecera Textos con los nombres de los campos a mostrar
 * @return string con el código html que muestra todos los registros de la tabla
 */
function dbListarTabla($tabla, $titulo, $cabecera) {
	// conectamos a la base de datos
	$pdo = dbConectar();
	// La tabla ventas tiene claves ajenas a las tablas productos y comerciales. 
	// Mostraremos junto a las claves los valores correspondientes a las tablas
	if($tabla=="ventas") {
		$strQuery = "SELECT referencia, 
		                    productos.nombre as nomProducto,
							descripcion, 
							codComercial,
							comerciales.nombre as nomComercial,	
							cantidad,
							fecha 			    																	    						 
	        	       FROM ventas, productos, comerciales
	        		  WHERE referencia = refProducto
	        		    AND codigo = codComercial";
	} else {
		$strQuery = "SELECT * FROM ".$tabla;
	}
	// Construimos la cabecera de la tabla a partir del array pasado como parámetro
	$strCabecera ="\n\r\t\t<tr>";
	foreach($cabecera as $tit_cab) {
		$strCabecera = "$strCabecera\n\r\t\t\t<th>$tit_cab</th>";
	}
	$strCabecera ="$strCabecera\n\r\t\t</tr>";

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	try {	
		$resultado = $pdo->query($strQuery);
		// Construimos el cuerpo de la tabla
		$strCuerpo ="";
		$n=0;
		while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
			// Cada recgistro es una fila
			$strCuerpo = "$strCuerpo\n\r\t\t<tr>";
			$i=0;
			//$registro es un array asociativo con los nombres de los campos como clave
			foreach ($registro as $key => $value) {
				// ojo, esta función es esperimental, ver
				// http://php.net/manual/es/pdostatement.getcolumnmeta.php
				if($resultado->getColumnMeta($i)['native_type']=='DATE'){
					$value = formatFechaES($value);					
				}
				// Cada campo es una columna
				$strCuerpo = "$strCuerpo\n\r\t\t\t<td>$value</td>";
				$i++;
			}
			$strCuerpo = "$strCuerpo\n\r\t\t</tr>";
			$n++;
		}
		// mostraremos el número de registros que contiene la tabla
		$registros = $n==1 ? 'registro' : 'registros';
		// Construimos la tabla con el titulo, cabecera, y cuerpo
		$strTabla = "\n\r<table>\n\r\t<caption>$titulo</caption>";
		$strTabla ="$strTabla\n\r\t<theah>$strCabecera\n\r\t</theah>";		
		$strTabla ="$strTabla\n\r\t<tbody>$strCuerpo\n\r\t</tbody>";
		$strTabla = "$strTabla\n\r</table>";
		$strTabla = "$strTabla\n\r<br><p align=center>La tabla contiene un total de $n $registros</p>";
	} catch (PDOException $e) {
		$strTabla = 'Se ha producido el siguiente error mientras se intentaba listar la tabla:<br><br>'
		             . $e->getMessage();
	}	    	

	// cerramos la conexión y devolvemos el string que muestra la tabla html
	unset($pdo);
	return $strTabla;
}


/**
 * Crea y devuelve el código html necesario para mostrar todos los registros de
 * tabla ventas cuyo campo codComercial coincide con el pasado como parámetro.
 * 
 * @param string $codComercial valor del campo codigo del comercial para el que
 *        se desean mostrar las ventas
 * @return string con el código html que muestra todos los registros de la tabla
 *         ventas cuyo campo codComercial coincide con el pasado como parámetro.
 */
function dbListarVentas($codComercial) {
	$pdo = dbConectar();
	// Construimos la cabecera de la tabla
	$strCabecera ="\n\r\t\t<tr>";
	$strCabecera = "$strCabecera\n\r\t\t\t<th>Ref. Producto</th>";
	$strCabecera = "$strCabecera\n\r\t\t\t<th>Producto</th>";
	$strCabecera = "$strCabecera\n\r\t\t\t<th>Descr. Producto</th>";
	$strCabecera = "$strCabecera\n\r\t\t\t<th>Cantidad</th>";		
	$strCabecera = "$strCabecera\n\r\t\t\t<th>Fecha venta</th>";
	$strCabecera = "$strCabecera\n\r\t\t</tr>";

	// creamos el resto de la tabla, a partir de los datos de la BD
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	try {	
		// realizamos la consulta, con la que construiremos el cuerpo de la tabla
		$resultado = $pdo->query("SELECT referencia, productos.nombre as nomProducto,
										 descripcion, cantidad, fecha, 			    						
										comerciales.nombre as nomComercial		    						 
		        				    FROM ventas, productos, comerciales
		        				   WHERE referencia = refProducto
		        				   	 AND codigo = codComercial
		        				     AND codComercial ='$codComercial'");
		
		// Construimos el cuerpo de la tabla
		$strCuerpo ="";
		$nRegistros=0;
		while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
			// Cada recgistro es una fila
			$strCuerpo = "$strCuerpo\n\r\t\t<tr>";
			foreach ($registro as $key => $value) {
				// la fecha la mostraremos con el formato español dd-mm-aaaa
				if($key=='fecha'){
					$value = formatFechaES($value);					
				}
				// Cada campo es una columna, pero el nombre del comercial
				// solo lo mostraremos en el título
				if($key=='nomComercial') {					
					$nomComercial = $value;					
				} else {
					$strCuerpo = "$strCuerpo\n\r\t\t\t<td>$value</td>";	
				}
			}
			$nRegistros++;
			$strCuerpo = "$strCuerpo\n\r\t\t</tr>";
		}
		// Si no tenemos registros de ventas, el nombre del comercial lo tenemos
		// que recuperar directamente de la tabla comerciales
		if($nRegistros==0) {
			$resultado = $pdo->query("SELECT nombre FROM comerciales WHERE codigo='$codComercial'");
			$registro = $resultado->fetch(PDO::FETCH_ASSOC);
			$nomComercial =$registro['nombre'];
			$strCabecera="";
		}
		$ventas = $nRegistros==1 ? 'venta' : 'ventas';
		
		// Construimos la tabla con el titulo, cabecera, y cuerpo
		$strTabla = "\n\r<table>\n\r\t<caption>Ventas del comercial<br> <b>$nomComercial</b></caption>";
		$strTabla = "$strTabla\n\r\t<theah>$strCabecera\n\r\t</theah>";	
		$strTabla = "$strTabla\n\r\t<tbody>$strCuerpo\n\r\t</tbody>";
		$strTabla = "$strTabla\n\r\t<tfoot><tr><th colspan='5'>
		              El comercial ha realizado un total de $nRegistros $ventas</th></tr></tfoot>";			
		$strTabla = "$strTabla\n\r</table>";	
	} catch (PDOException $e) {
		$strTabla = 'Se ha producido el siguiente error mientras se intentaba listar la tabla:<br><br>'
		             . $e->getMessage();	    	
	}
	

	// cerramos la conexión y retornamos el string con el código html
	unset($pdo);
	return $strTabla;
}



/**
 * Inserta en la tabla $tabla un nuevo registro con los valores contenidos en el
 * array $campos
 * @param string $tabla nombre de la tabla en la que insertar el registro
 * @param array $campos  Array asociativo cuyas claves se corresponden a los
 *        nombres de los campos a insertar y los valores se corresponden con 
 *        los valores de dichos campos.
 * @return string con el error producido al intentar realizar la inserción o
 *         ERROR_NULL si la inserción se realizó correctamente.
 */
function dbInsertar($tabla, $campos) {
	$pdo = dbConectar();
	// construimos el string para preparar la consulta
	$strCampos ="";
	$strValores ="";
	$i = 0;
	foreach ($campos as $campo => $valor) {
		// reemplazamos los campos en blanco por nulos
		if ($valor=="") {
			$valor = "NULL";
		// preparamos los valores no nulos de los campos según el tipo de campo	
		} else {
			// Este PDOStatement nos servirá para recoger el tipo de cada columna
			$res = $pdo->query("SELECT $campo FROM $tabla");
			$tipoCampo = $res->getColumnMeta(0)['native_type'];
			switch ($tipoCampo) {
			case 'DATE':
				$valor = "'".formatFechaBD($valor)."'";
				break;			
			case 'VAR_STRING':
				$valor = "'$valor'";
				break;
			case 'FLOAT':
				$valor = floatval($valor);
				break;
			case 'LONG':
				$valor = intval($valor);
				break;
			}
		}
		// componemos los string con los campos y los valores a insertar
		if ($i==0) {
			$strCampos = $campo;
			$strValores = $valor;
		} else {
			$strCampos = $strCampos.", ".$campo;
			$strValores = $strValores.", ".$valor;
		}
		$i++;
	}
	// creamos la consulta
	$strQuery = "INSERT INTO $tabla ($strCampos) VALUES ($strValores)";
	// ejecutamos la consulta procesando los posibles errores como
	// excepciones
	$error = ERROR_NULL;
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	try {	
		$pdo->exec($strQuery);	
	} catch (PDOException $e) {
		if($e->errorInfo[1]==1062) {
			$error = ERROR_REG_DUP;
		} else {
			$error = 'Falló la inserción: ' . $e->getMessage();
		}	    	
	}
	// cerramos la conexión y retornamos el resultado de exito o fracaso
	return $error; 
	unset($pdo);
}




/**
 * Actualiza en la tabla $tabla los registros que cumplen la condición
 * establecida en el parámetro $strWhere con los valores contenidos en el
 * array $campos
 * @param string $tabla nombre de la tabla en la que actualizar.
 * @param array $campos  Array asociativo cuyas claves se corresponden a los
 *        nombres de los campos a actualizar y los valores se corresponden con 
 *        los valores de dichos campos.
 * @param string $strWhere condición que deben cumplir los registros a actualizar
 * @return string con el error producido al intentar realizar la actualización o
 *         ERROR_NULL si la actualización se realizó correctamente.
 */
function dbActualizar($tabla, $campos, $strWhere) {
	$pdo = dbConectar();
	// construimos el string para preparar la consulta
	$strSet ="";
	$i=0;
	foreach ($campos as $campo => $valor) {
		// reemplazamos los campos en blanco por nulos
		if ($valor=="") {
			$valor = "NULL";
		// preparamos los valores no nulos de los campos según el tipo de campo	
		} else {
			// Este PDOPDOStatement nos servirá para recoger el tipo de cada columna
			$res = $pdo->query("SELECT $campo FROM $tabla");
			$tipoCampo = $res->getColumnMeta(0)['native_type'];
			switch ($tipoCampo) {
			case 'DATE':
				$valor = "'".formatFechaBD($valor)."'";
				break;
			
			case 'VAR_STRING':
				$valor = "'$valor'";
				break;
			case 'FLOAT':
				$valor = floatval($valor);
				break;
			case 'LONG':
				$valor = intval($valor);
				break;
			}
		}
		// preparamos la parte SET de la consulta
		if ($i==0) {
			$strSet = $campo."=".$valor;				
		} else {
			$strSet = $strSet.", ".$campo."=".$valor;
		}	
		$i++;
	}
	$strQuery = "UPDATE $tabla SET $strSet WHERE $strWhere";
	// ejecutamos la consulta
	$error = ERROR_NULL;
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	try {	
		$pdo->exec($strQuery);		
	} catch (PDOException $e) {
		if($e->errorInfo[1]==1062) {
			$error = ERROR_REG_DUP;
		} else {
	    	$error = 'Falló la actualización: ' . $e->getMessage();
	    }
	}
	// cerramos la conexión y retornamos el resultado de exito o fracaso
	unset($pdo);
	return $error; 
}



/**
 * Borra de la tabla $tabla los registros que cumplen la condición
 * establecida en el parámetro $strWhere
 * @param string $tabla nombre de la tabla en la que actualizar.
 * @param string $strWhere condición que deben cumplir los registros a actualizar
 * @return string con el error producido al intentar realizar el borrado o
 *         ERROR_NULL si el borrado se realizó correctamente.
 */
function dbEliminar($tabla, $strWhere) {
	$pdo = dbConectar();
	// construimos el string para preparar la consulta
	$strQuery = "DELETE FROM $tabla WHERE $strWhere";
	// ejecutamos la consulta
	$error = ERROR_NULL;
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	try {	
		$pdo->exec($strQuery);		
	} catch (PDOException $e) {
		$error = 'Falló el borrado del registro: ' . $e->getMessage();
	}	
	// cerramos la conexión y retornamos los posibles errores
	unset($pdo);
	return $error; 
}


/**
 * Devuelve los registros de la tabla $tabla que cumplen la condición dada
 * por el parámetro $strWhere
 * @param string $tabla nombre de la tabla a consultar
 * @param string $strWhere condición que deben cumplir los registros
 * @return array con los registros de la tabla $tabla que cumplen la 
 *         condición dada en $strWhere. Cada elemento del array será
 *         un array asociativo con las claves correspondientes a los
 *         nombres de los campos del registro.
 */
function dbRecuperarRegistros($tabla, $strWhere) {
	$registros=array();
	// conectamos con la base de datos
	$pdo = dbConectar();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	try {	
		// recuperamos los registros y los llevamos al array
		$resultado = $pdo->query("SELECT * FROM $tabla WHERE $strWhere");
		while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
			$registros=array_merge($registros, $registro);
		}
	} catch (PDOException $e) {
		$registros = 'Error al recuperar los registros: <br><br>'
		              . $e->getMessage();
	}
	// cerramos la conexión y retornamos los registros obtenidos
	unset($pdo);
	return $registros;
}

/**
 * Devuelve los registros de la tabla ventas cuyo campo codComercial
 * tiene el valor dado en $codigo.
 * @param string $codigo valor del campo codComercial cuyos registros
 *        queremos recuperar.
 * @return array con los registros de la tabla ventas cuyo campo
 *         codComercial es igual al valor de $codigo. Cada elemento 
 *         del array será un array asociativo con las claves correspon-
 *         dientes a los nombres de los campos del registro.
 */
function dbVentasComercial($codigo) {
	return dbRecuperarRegistros('ventas', "codComercial='$codigo'");
}

/**
 * Devuelve los registros de la tabla ventas cuyo campo refProducto
 * tiene el valor dado en $referencia.
 * @param string $referencia valor del campo refProducto cuyos registros
 *        queremos recuperar.
 * @return array con los registros de la tabla ventas cuyo campo refProducto
 *         es igual al valor de $referencia. Cada elemento del array será
 *         un array asociativo con las claves correspondientes a los
 *         nombres de los campos del registro.
 */
function dbVentasProducto($referencia) {
	return dbRecuperarRegistros('ventas', "refProducto='$referencia'");
}

/**
 * Comprueba si existe algún registro en la tabla $tabla cuyo campo $clave
 * es igual a $valor
 * @param string $tabla tabla en la que consultar
 * @param string $clave  campo a comparar
 * @param string $valor valor del campo a comparar 
 * @return boolean true si hay algún registro en la tabla $tabla cuyo campo 
 *         $clave es igual a $valor, o false si no existe ningún registro,
 */
function dbExiste($tabla, $clave, $valor) {
	$registros = dbRecuperarRegistros($tabla, "$clave='$valor'");
	if(is_array ($registros)) {
		return (count($registros)>0);
	} else {
		return $registros;
	}	
}

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
 * Crea y retorna un string con el código html necesario para mostrar un campo
 * select a partir de los registros de una tabla
 * @param string $tabla tabla de la que se recuperan los valores del select. Si
 *        fuese necesario, se puede incluir junto a la tabla las condiciones 
 *        WHERE de los registros a mostrar.
 * @param string $campoValue nombre del campo de la tabla que contiene los valores
 *        a utilizar en el select para el atributo value
 * @param string $campoMostrado nombre del campo de la tabla que contiene los valores
 *        a utilizar en el select para ser mostrados al usuario en el desplegable
 * @param string $name valor del atributo name del select. Si no se indica un valor
 *        se utilizará el valor de $campoValue.
 * @param string $itemSeleccionado Si el valor de $itemSeleccionado coincide con 
 *        alguno de los valores mostrados en el select, este valor se mostrará como
 *        seleccionado por defecto en el select.  
 * @return string con el código html del select.
 */
function dbHtmlSelect($tabla, $campoValue, $campoMostrado, $name=null, $itemSeleccionado=null) {
	if($name==NULL) {
		$name=$campoValue;
	}
	// podemos utilizar una expresión del tipo CONCAT(codigo, ' : ', nombre) as valor
	// en el campo a mostrar, recuperamos en ese caso el alias de la consulta
	$valorMostrado = $campoMostrado;
	$partes = explode(" AS ", $campoMostrado);
	if (count($partes)>1) {
		$valorMostrado = trim($partes[1]);
	}
	// comenzamos a construir el select
	$str ="<select name='{$name}'>\n\r\t";
	$pdo = dbConectar();	
	$strQuery = "SELECT $campoMostrado, $campoValue FROM $tabla ORDER BY $valorMostrado";
	// en caso de no indicar un registro seleccionado, mostrar Seleccione un producto
	if($itemSeleccionado==null) {
		$str = $str."<option value=''>Seleccione registro</option>\n\r\t";
	}
	// añadir el resto de los valores del select
	$resultado = $pdo->query($strQuery);
	while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
		$seleccionado = $registro["$campoValue"]==$itemSeleccionado ? 'selected' : '';
		// si el campo a mostrar es la fecha de la tabla ventas, ponerlos en fecha española
		if($campoValue=="fecha") {
			$str = $str."<option value='".formatFechaES($registro["$campoValue"])."'$seleccionado>"
		           .formatFechaES($registro["$valorMostrado"])."</option>\n\r\t";
		} else {
			$str = $str."<option value='".$registro["$campoValue"]."'$seleccionado>"
		             .$registro["$valorMostrado"]."</option>\n\r\t";
		}
		
	}
	$str =$str."\n\r</select>";
	return $str;
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
			/*	if($valor!=null && dbExiste($parametros[0], $parametros[1], $valor)) {
					$error="Ya existe un registro en la tabla $parametros[0] con $nombreCampo = $valor";
					$fallaValidacion = true;
				}  */
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
 * Valida cada uno de los campos de un formulario form_comercial
 * @param array asociativo $campos cada uno de los campos a validar
 * @param string $disableClave. Indica si el campo clave del formulario
 *        estaba desactivo o no y si por tanto debe o no ser validado.
 * @return array de string con los mensajes correspondientes a los
 *        errores de validación encontrados.
 */
function validarComercial($campos, $disableClave, $codigoAnterior) {
	$errores=array();
	// se trata de una insercion o una modificación de código válida
	if ($disableClave=="" && $campos['codigo']!=$codigoAnterior) {
		$errores[] = validaCampo($campos['codigo'], "Codigo|requerido|maxLong:3|unico:comerciales,codigo");		
	}	
	$errores[] = validaCampo($campos['nombre'], "Nombre|requerido|maxLong:30");		
	$errores[] = validaCampo($campos['salario'], "Salario|requerido|float|minVal:0");		
	$errores[] = validaCampo($campos['hijos'], "Hijos|requerido|integer|minVal:0");		
	$errores[] = validaCampo($campos['fNacimiento'], "Fecha de nacimiento|requerido|fecha");
	// antes de retornar, eliminamos los mensajes de error vacios	
	return array_filter($errores, "strlen");	
}


/**
 * Valida cada uno de los campos de un formulario form_producto
 * @param array asociativo $campos cada uno de los campos a validar
 * @param string $disableClave. Indica si el campo clave del formulario
 *        estaba desactivo o no y si por tanto debe o no ser validado.
 * @return array de string con los mensajes correspondientes a los
 *        errores de validación encontrados.
 */
function validarProducto($campos, $disableClave, $referenciaAnterior) {
	$errores = array();
	// se trata de una insercion
	if ($disableClave=="" && $campos['referencia']!=$referenciaAnterior) {
		$errores[] = validaCampo($campos['referencia'], "Referencia|requerido|maxLong:6|unico:productos,referencia");
	}
	$errores[] = validaCampo($campos['nombre'], "Nombre|requerido|maxLong:20");
	$errores[] = validaCampo($campos['descripcion'], "Descripcion|maxLong:20");
	$errores[] = validaCampo($campos['precio'], "Precio|requerido|float|minVal:0");
	$errores[] = validaCampo($campos['descuento'], "Descuento|requerido|integer|minVal:0");
	// antes de retornar, eliminamos los mensajes de error vacios	
	return array_filter($errores, "strlen");		
}


/**
 * Valida cada uno de los campos de un formulario form_ventas
 * @param array asociativo $campos cada uno de los campos a validar
 * @return array de string con los mensajes correspondientes a los
 *        errores de validación encontrados.
 */
function validarVenta($campos) {
	$errores = array();
	$errores[] = validaCampo($campos['codComercial'], "Comercial|requerido");
	$errores[] = validaCampo($campos['refProducto'], "Producto|requerido");
	// suponemos que se pueden introducir cantidades negativas, con el significado
	// de que se trata de una devolución de un producto vendido anteriormente.
	$errores[] = validaCampo($campos['cantidad'], "Cantidad|integer");
	$errores[] = validaCampo($campos['fecha'], "Fecha|requerido|fecha");
	$errores = array_filter($errores, "strlen");
	// La verificación de registro único es especial, ya que depende de los
	// valores de tres campos, y no de un solo campo.
	if (empty($errores)) {
		$n = count(dbRecuperarRegistros('ventas', 
										"codComercial='".$campos['codComercial']."'
									 AND refProducto='".$campos['refProducto']."' 
									 AND fecha='".$campos['fecha']."'"));
		if($n>0) {
			$errores[] = "Ya existe una venta del comercial ".$campos['codComercial'].
						 " para el producto ".$campos['refProducto']." el día ".
						 $campos['fecha'];
		}
	}	
	// antes de retornar, eliminamos los mensajes de error vacios	
	return array_filter($errores, "strlen");		
}


/**
 * Valida cada uno de los campos de un formulario form_select_XXXXX_Y
 * @param array asociativo $campos cada uno de los campos a validar
 * @return array de string con los mensajes correspondientes a los
 *        errores de validación encontrados.
 */
function validarSelectVenta($campos) {
	$errores = array();
	foreach ($campos as $campo => $valor) {
		$errores[] = validaCampo($valor, "$campo|requerido");
	}
	// antes de retornar, eliminamos los mensajes de error vacios	
	$errores = array_filter($errores, "strlen");
	return $errores;
}

?>