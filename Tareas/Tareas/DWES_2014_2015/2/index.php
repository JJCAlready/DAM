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

	Los items del carro de la compra se guardan en un array. Para guardar 
	el estado del carro de la compra tras cada llamada a la página, se
	realiza el envio del array por POST, convirtiendo el array a una cadena
	antes del envio y revertiendo la operación sobre el mismo tras la recepción.
	Esto se lleva a cabo mediante las instrucciones:
		htmlspecialchars(serialize($registros)
		unserialize(stripslashes(htmlspecialchars_decode($_POST["registros"])))
	según la documentación extraida de 
		http://php.net/manual/es/function.serialize.php#79187

*****************************************************************************/

require_once 'declaraciones.php';
require_once 'funciones.php';


// Es la primera vez que se llama a la pagina
if (!isset($_POST['accion'])) {
	// Declaramos las variables 
	$registros = array();
	$error = ERROR_NULL;
// Si se ha llamado a la página por post desde esta misma página	
} else {
	// recuperamos el array con los items de la compra y la acción que generó la llamada
	// documentado en http://php.net/manual/es/function.serialize.php#79187
	$registros = unserialize(stripslashes(htmlspecialchars_decode($_POST["registros"])));
	$accion = $_POST['accion'];
	// procesamos la acción que nos trajo hasta aquí
	switch ($accion) {
		case 'Aceptar':
		case 'Cancelar':
		case 'Mostrar lista':
			$indice = -1;
			$error = ERROR_NULL;
			$mostrar['listado'] = true;
			break;
		
		case 'Insertar':
			$mostrar['form_compra'] = true;
			$nombre = '';
			$precio = '';
			$cantidad = '';
			$indice = -1;
			$error = ERROR_NULL;
			break;

		case 'Modificar':
			$indice = getIndiceListado();
			// si el carro de la compra está vacio, preparamos el formulario de error
			// con el error de no modificaciones por estar la lista vacia
			if (empty($registros)) {
				$mostrar['error'] = true;
				$error = ERROR_MOD_LV;
		    // si el carro de la compra no está vacio, pero no se ha seleccionado un registro,
		    // preparamos el formulario de error con el error de registro no seleccionado					
			} else if ($indice == -1) {
				$mostrar['error'] = true;
				$error = ERROR_NO_REG;
			// en caso de haber seleccionado un registro, preparamos el formulario de compra	
			} else {
				$mostrar['form_compra'] = true;
				$nombre = $registros[$indice]['nombre'];
				$precio = $registros[$indice]['precio'];
				$cantidad = $registros[$indice]['cantidad'];
				$error = ERROR_NULL;
			}
			break;

		case 'Eliminar':
			$indice = getIndiceListado();
			// si el carro de la compra está vacio, preparamos el formulario de error
			// con el error de borrado por estar la lista vacia			
			if (empty($registros)) {
				$mostrar['error'] = true;
				$error = ERROR_DEL_LV;
			// si el carro de la compra no está vacio, pero no se ha seleccionado un registro,
		    // preparamos el formulario de error con el error de registro no seleccionado								
			} else if ($indice == -1) {
				$mostrar['error'] = true;
				$error = ERROR_NO_REG;
			// en caso de haber seleccionado un registro, intentamos el borrado	
			// y mostramos el mensaje de exito o fracaso
			} else {
				$regDel = array_splice($registros, $indice, 1);
				// exito
				if(count($regDel)==1) {
					$mostrar['form_confirmar_borrado'] = true;
				// fracaso	
				} else {
					$error = ERROR_DEL_REG;
					$mostrar['error'] = true;
				}
			}
			break;
		
		case 'Guardar':
			// preparamos el registro para poder validarlo y lo validamos
			$indice = $_POST['indice_compra'];
			$registro['nombre'] = $_POST['nombre'];
			$registro['precio'] = $_POST['precio'];
			$registro['cantidad'] = $_POST['cantidad'];
			$error = validarProducto($registro);
			// si pasa la validación
			if ($error == NULL) {
				$mostrar['menu'] = true;
				$mostrar['listado'] = true;
				// preparamos el indice para insertar o para modificar
				$i = ($indice == -1) ? count($registros) : $indice;
				// insertamos o modificamos el registro
				// no utilizamos los valores de post puesto que el 
				// registro ha podido ser modificado en la validación
				// para adaptar valores por defecto
				$registros[$i]['nombre'] = $registro['nombre'];
				$registros[$i]['precio'] = $registro['precio'];
				$registros[$i]['cantidad'] = $registro['cantidad'];
			// Si el registro no pasa la validacion, volvemos a mostrar
			// el formulario con los errores encontrados.	
			} else {
				$mostrar['form_compra'] = true;
				$nombre = $_POST['nombre'];
				$precio = $_POST['precio'];
				$cantidad = $_POST['cantidad'];
			}  
	
			break;

		default:
			break;
	}
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
			<input type='hidden' name='registros' value="<?php echo htmlspecialchars(serialize($registros)); ?>" >					
		</form>
	</body>
</html>