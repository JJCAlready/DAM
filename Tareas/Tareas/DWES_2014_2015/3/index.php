<?php
/*****************************************************************************
	La aplicación se ha implementado como una sola página, en la que se 
	presentarán o no los diferentes elementos de interacción con el usuario,
	dependiendo de la acción que el usuario haya seleccionado, y que nos 
	vendrá dada por la variable global $_POST['accion']. Para mostrar un
	elemento, se debe realizar según el ejemplo $mostrar['menu'] = true
	sustituyendo 'menu' por el elemento correspondiente (para más detalles,
	ver los archivos declaraciones.php y funciones.php) 

	Cada uno de los controles que pueda desencadenar una acción ha de tener
	el atributo name='accion'.

*****************************************************************************/
require_once 'declaraciones.php';
require_once 'funciones.inc';

// recogemos las variables que nos puedan llegar por post
foreach ($_POST as $variable => $valor) { 
	$$variable = $valor;
	$post=true;
}

// recogemos las variables que nos puedan llegar por get
foreach ($_GET as $variable => $valor) { 
	$$variable = $valor;
	$get=true;
}


//
// venimos al formulario desde el propio formulario, el usuario ha pulsado 
// un botón
// 
if($post) {
	// para simplificar el código uniremos la tabla sobre la que actuar
	// y la operación a llevar a cabo sobre la misma para interrogar 
	// sobre las mismas
	$accion_tabla = $accion."_".$tabla;
	switch ($accion_tabla) {
		case 'Cancelar_comerciales':
		case 'Cancelar_productos':
		case 'Cancelar_ventas':
			// ajustamos el texto a mostrar para mostrarlo en minusculas y singular
		    $strOp = strtolower($operacion);
		    $strTb = str_replace("es", "", $tabla);
		    $strTb = str_replace("s", "", $strTb);
			// Mostrar el mensaje informando de la operación cancelada
			$mensaje = "La operación de $strOp $strTb ha sido cancelada.";
			$classMsg = "informacion";
			$mostrar['form_mensaje'] = true;
			break;

		case 'Seleccionar_comerciales':	
			///////////////////////////////////////////////////////////////////////
			//			 OJO, LOS 2 PRIMEROS IF PUEDEN PRODUCIR UN BREAK         //
			///////////////////////////////////////////////////////////////////////
			// Si no se ha seleccionado un registro válido, volveremos a mostrar
			// el formulario para seleccionar registro
			if($codigo=="") {
				$mostrar['form_select']=true;
				break;
			}	
			// recuperar el registro seleccionado
			$valores = dbRecuperarRegistros('comerciales', "codigo='$codigo'");
			// si no fue posible recuperar el registro, mostrar el error producido
			if(!is_array ($valores)) {
				$mensaje = $valores;
				$classMsg = "error";
				$mostrar['form_mensaje'] = true;
				break;
			}
			// el registro ha sido recuperado correctamente
			$nombre = $valores['nombre'];
			$salario = $valores['salario'];
			$hijos = $valores['hijos'];
			$fNacimiento = formatFechaES($valores['fNacimiento']);
			// mostraremos el registro, con el formulario para realizar la 
			// operación para la que fue seleccionado
			switch ($operacion) {
				case 'Modificar':
					// Si el comercial tiene ventas, impedir la modificación del código
					if(count(dbVentasComercial($codigo))>0) {
						$disableClave="disabled";
					}	
					$mostrar['form_comercial'] = true;
				break;

				case 'Eliminar':
					// Si el comercial tiene ventas, impedir la eliminación del comercial
					if(count(dbVentasComercial($codigo))>0) {
						$mensaje = "La operación de $operacion el comercial con código
					            	$codigo no puede llevarse a cabo. El comercial se
					            	encuentra en algunos registros de ventas. Si desea eliminar
					            	el comercial debe eliminar primero todas sus ventas.";
						$classMsg = "aviso";
						$mostrar['form_mensaje'] = true;	
					} else {
						$mostrar['form_comercial'] = true;
					}	
					
				break;
			}
			break;

		case 'Seleccionar_productos':
			///////////////////////////////////////////////////////////////////////
			//			 OJO, LOS 2 PRIMEROS IF PUEDEN PRODUCIR UN BREAK         //
			///////////////////////////////////////////////////////////////////////
			// Si no se ha seleccionado ningún registro, seguiremos mostrando
			//  el formulario de selección
			if($referencia=="") {
				$mostrar['form_select']=true;
				break;
			}
			// recuperar el registro seleccionado
			$valores = dbRecuperarRegistros('productos', "referencia='$referencia'");	
			if(!is_array ($valores)) {
				$mensaje = $valores;
				$classMsg = "error";
				$mostrar['form_mensaje'] = true;
				break;
			}		
			$nombre = $valores['nombre'];
			$descripcion = $valores['descripcion'];
			$precio = $valores['precio'];
			$descuento = $valores['descuento'];
			// mostraremos el registro, con el formulario para realizar la 
			// operación para la que fue seleccionado
			switch ($operacion) {
				case 'Modificar':
					// Si el comercial tiene ventas, impedir la modificación del código
					if(count(dbVentasProducto($referencia))>0) {
						$disableClave="disabled";
					}	
					$mostrar['form_producto'] = true;
				break;

				case 'Eliminar':
					// Si el producto tiene ventas, impedir la eliminación del producto
					if(count(dbVentasProducto($referencia))>0) {
						$mensaje = "La operación de $operacion el producto con referencia
					            	$referencia no puede llevarse a cabo. El producto se
					            	encuentra en algunos registros de ventas. Si desea eliminar
					            	el producto debe eliminar primero todas sus ventas.";
						$classMsg = "aviso";
						$mostrar['form_mensaje'] = true;	
					} else {
						$mostrar['form_producto'] = true;
					}	
					
				break;
			}
			break;

		// La selección de una venta se lleva a cabo mostrando tres formularios
		// distintos y dependientes entre si. 
		// Dichos formularios se identifican por la variable $nivelSelect
		case 'Seleccionar_ventas':
			switch ($nivelSelect) {
				case 1:
					$campos=array('codComercial' =>	$codComercial);
					break;
				case 2:
					$campos=array('refProducto' =>	$refProducto);
					break;
				case 3:
					$campos=array('fecha' => $fecha);
					break;
			}
			// validamos el formulario de selección
			$errores = validarSelectVenta($campos);
			// si es correcto, mostraremos el siguiente nivel
			if (empty($errores)) {	
				$mostrar['form_select_ventas_'.($nivelSelect+1)] = true;
			// si la seleccion no es correcta volveremos a mostrar el mismo formulario	
			} else {
				$mostrar['form_select_ventas_'.$nivelSelect] = true;
			}
	
			break;

		case 'Seleccionar_ventas_comerciales':
			// Si no se ha seleccionado un registro válido, volveremos a mostrar
			// el formulario para seleccionar registro
			if($codigo=="") {
				$mostrar['form_select']=true;
				break;
			}
			// Hemos seleccionado un comercial para mostrar sus ventas
			$mostrar['listado'] = true;		
			break;
		
		case 'Insertar_comerciales':
		case 'Modificar_comerciales':
			// en principio se asumen errores de validación, 
			// mostrándolos en el propio formulario
			$mostrar['form_comercial'] = true;
			// Si hemos desactivado el control código, para impedir 
			// modificaciones el valor del código será nulo.
			// Tomaremos el valor del guardado anteriormente
			if($disableClave=='disabled') {
				$codigo = $codigoAnterior;
			}
			$campos = array(
					'codigo'      		=>	$codigo,
					'nombre'      		=>	$nombre,
					'salario'     		=>	$salario,
					'hijos'       		=>	$hijos,
					'fNacimiento' 		=>	$fNacimiento,
					);
			// validamos los valores introducidos en el formulario
			$errores = validarComercial($campos, $disableClave, $codigoAnterior);
			// si todos los valores introducidos son correctos no volvemos a 
			// mostrar el formulario de introducción de datos. En su lugar
			// mostraremos el resultado de la operación llevada a cabo
			if (empty($errores)) {		
				$mostrar['form_comercial'] = false;				
				$mostrar['form_mensaje'] = true;	
				
				if ($accion=="Insertar") {
					$error=dbInsertar($tabla, $campos);	
				} else {
					$error=dbActualizar($tabla, $campos, "codigo='$codigoAnterior'");	
				}
				
				// No debería haber errores, pues se han validado todos los datos,
				// pero podría producirse algo inesperado, como una desconexión del
				// servidor o un error no controlado
				if($error!==ERROR_NULL) {
					$mensaje = $error;
					$classMsg = "error";	
				} else {
					$op = strtolower($operacion);
					$mensaje = "La operación de $op el comercial con código
					            $codigo ha sido realizada correctamente";
					$classMsg = "informacion";	
				} 
			}	
					 		
			break;

		case 'Insertar_productos':
		case 'Modificar_productos':
			// en principio se asumen errores de validación, 
			// mostrándolos en el propio formulario
			$mostrar['form_producto'] = true;
			// Si hemos desactivado el control referencia, para impedir 
			// modificaciones el valor de la referencia será nulo.
			// Tomaremos el valor del guardado anteriormente
			if($disableClave=='disabled') {
				$referencia = $referenciaAnterior;
			}
			$campos = array(
					'referencia'  =>	$referencia,
					'nombre'      =>	$nombre,
					'descripcion' =>	$descripcion,
					'precio'      =>	$precio,
					'descuento'   =>	$descuento,
					);
			// validamos los valores introducidos en el formulario
			$errores = validarProducto($campos, $disableClave, $referenciaAnterior);
			// si todos los valores introducidos son correctos no volvemos a 
			// mostrar el formulario de introducción de datos. En su lugar
			// mostraremos el resultado de la operación llevada a cabo
			if (empty($errores)) {		
				$mostrar['form_producto'] = false;				
				$mostrar['form_mensaje'] = true;			
				if ($accion=="Insertar") {
					$error=dbInsertar($tabla, $campos);	
				} else {
					$error=dbActualizar($tabla, $campos, "referencia='$referenciaAnterior'");	
				}
				// No debería haber errores, pues se han validado todos los datos,
				// pero podría producirse algo inesperado, como una desconexión del
				// servidor o un error no controlado
				if($error!==ERROR_NULL) {
					$mensaje = $error;
					$classMsg = "error";	
				} else {
					$mensaje = "La operación de $operacion el producto con referencia
					            $referencia ha sido realizada correctamente";
					$classMsg = "informacion";	
				} 	
			} 		
			break;
				
		case 'Insertar_ventas':
		case 'Modificar_ventas':
			// en principio se asumen errores de validación, 
			// mostrándolos en el propio formulario
			$mostrar['form_venta'] = true;
			$campos = array(
					'codComercial'  =>	$codComercial,
					'refProducto'   =>	$refProducto,
					'cantidad' 		=>	$cantidad,
					'fecha'      	=>	$fecha,					
					);
			// validamos los valores introducidos en el formulario
			$errores = validarVenta($campos);
			// si todos los valores introducidos son correctos no volvemos a 
			// mostrar el formulario de introducción de datos. En su lugar
			// mostraremos el resultado de la operación llevada a cabo
			if (empty($errores)) {		
				$mostrar['form_venta'] = false;				
				$mostrar['form_mensaje'] = true;			

				if ($accion=="Insertar") {
					$error=dbInsertar($tabla, $campos);	
				} else {
					$error=dbActualizar($tabla, $campos, 
						"codComercial='$codComercial' AND 
						 refProducto ='$refProducto' AND
						 fecha = '".formatFechaBD($fecha)."'");	
				}
				// No debería haber errores, pues se han validado todos los datos,
				// pero podría producirse algo inesperado, como una desconexión del
				// servidor o un error no controlado
				if($error!==ERROR_NULL) {
					$mensaje = $error;
					$classMsg = "error";	
				} else {
					$mensaje = "La operación de $operacion venta ha sido realizada correctamente";
					$classMsg = "informacion";	
				} 	
			} 
			break;

		case 'Eliminar_comerciales':
			// puesto que se han deshabilitado los controles del formulario
			// $codigo valdrá '', por lo tanto utilizamos $codigoAnterior
			$error = dbEliminar('comerciales', "codigo='$codigoAnterior'");
			// No debería haber errores, pues se han validado todos los datos,
			// pero podría producirse algo inesperado, como una desconexión del
			// servidor o un error no controlado
			if($error!==ERROR_NULL) {
				$mensaje = $error;
				$classMsg = "error";	
			} else {
				$mensaje = "El comercial con codigo $codigoAnterior 
				            ha sido borrado correctamente";
				$classMsg = "informacion";	
			} 	
			$mostrar['form_mensaje']=true;
			break;

		case 'Eliminar_productos':
			// puesto que se han deshabilitado los controles del formulario
			// $referencia valdrá '', por lo tanto utilizamos $referenciaAnterior	
			$error = dbEliminar('productos', "referencia='$referenciaAnterior'");
			// No debería haber errores, pues se han validado todos los datos,
			// pero podría producirse algo inesperado, como una desconexión del
			// servidor o un error no controlado
			if($error!==ERROR_NULL) {
				$mensaje = $error;
				$classMsg = "error";	
			} else {
				$mensaje = "El producto con referencia $referenciaAnterior
				            ha sido borrado correctamente";
				$classMsg = "informacion";	
			}
			$mostrar['form_mensaje']=true;
			break;
		
		case 'Eliminar_ventas':	
			$error = dbEliminar('ventas', "codComercial='$codComercial' 
				              AND refProducto='$refProducto' 
				              AND fecha='".formatFechaBD($fecha)."'");
			// No debería haber errores, pues se han validado todos los datos,
			// pero podría producirse algo inesperado, como una desconexión del
			// servidor o un error no controlado
			if($error!==ERROR_NULL) {
				$mensaje = $error;
				$classMsg = "error";	
			} else {
				$mensaje = "La venta del producto con referencia $refProducto
				            realizada por el comercial $codComercial el día $fecha
				            ha sido borrada correctamente";
				$classMsg = "informacion";	
			}
			$mostrar['form_mensaje']=true;
			break;
	} // switch accion_tabla
} // fin por post


// Llegamos al formulario desde una opción del menu
if ($get) {
	$operacion_tabla=$operacion."_".$tabla;
	switch ($operacion_tabla) {
		case 'Listado_ventas_comerciales':
		case 'Modificar_comerciales':
		case 'Modificar_productos':
		case 'Eliminar_comerciales':
		case 'Eliminar_productos':
			// Mostraremos el formulario para seleccionar el registro sobre
			// el que se quiere operar
			$mostrar['form_select'] = true;
			break;

		case 'Listado_comerciales':	
		case 'Listado_productos':	
		case 'Listado_ventas':
			// Mostraremos el listado de la tabla correspondiente	
			$mostrar['listado'] = true;		
			break;
		
		case 'Insertar_comerciales':
			// Mostraremos el formulario para introducir los datos del comercial
			$mostrar['form_comercial'] = true;				
			break;
		
		case 'Insertar_productos':
			// Mostraremos el formulario para introducir los datos del producto	
			$mostrar['form_producto'] = true;				
			break;
		
		case 'Insertar_ventas':
			// Mostraremos el formulario para introducir los datos de la venta
			$mostrar['form_venta'] = true;				
			break;

		case 'Modificar_ventas':
		case 'Eliminar_ventas':
			// La selección de los datos de una venta para modificar o eliminar
			// se realiza a traves de tres formulario dependientes entre si y 
			// que se identifican por la variable $nivelSelect.
			// Mostramos el formulario del nivel 1
			$mostrar['form_select_ventas_1'] = true;				
			break;

		default:
			break;
	} // switch accion

}

/*****************************************************************************
	Tras analizar y gestionar la acción pertinente, incluimos el código
	html necesario para mostrar la página.

	La página se compone de un único formulario, con difentes elementos
	a mostrar, cada uno de ellos con los controles necesarios para que
	el usuario interacture según la acción seleccionada.

******************************************************************************/
		// incluimos la cabecera de la página
		include 'cabecera.html'; 		
?>
		
		<form action="index.php" method="post">
			<?php 
				// incluimos los elementos a mostrar
				foreach($mostrar as $elemento => $muestra) {
					if ($muestra) {
						include $elemento.".php";
					}
				}
			?>
		</form>
	</body>
</html>