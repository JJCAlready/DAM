<?php 
/**
 *  Respuesta a una petición ajax recibida por post para el procesamiento
 *  de una inserción, un borrado, o una actualización de un comercial.
 *
 *  Se responde con un JSON con los errores encontrados o bien con el código
 *  html de la tabla que contiene a todos los comerciales.
 *  
 */

require_once('funciones.php');
$operacion = $_POST['operacion'];
// validamos el formulario según la operación para la que fué mostrado
$errores = array();
if ($operacion == OP_ELIMINAR) {
	$campos = array();
} else {
	$campos = array(
		'codigo' => $_POST['codigo'],
		'nombre' => $_POST['nombre'],
		'salario' => $_POST['salario'],
		'hijos' => $_POST['hijos'],
		'fNacimiento' => $_POST['fNacimiento'],
		);
}
$errores = validarFormComercial($campos, $operacion, $_POST['codigoAnterior']);

// si el formulario es validado correctamente
if (empty($errores)) {
	// llevaremos a cabo la operación para la que fué llamado el formulario 
	switch ($operacion) {
		case OP_ELIMINAR:
			$comercial = Comercial::find($_POST['codigoAnterior']);
			$comercial->delete();
			$respuesta = array(
				'datos' => htmlListadoComerciales(),
				'mensaje' => 'El comercial con código '.$_POST['codigoAnterior'].' ha sido eliminado correctamente.'
				);
			break;

		case OP_INSERTAR:
			$comercial              = new Comercial();
			$comercial->codigo      = $_POST['codigo'];
			$comercial->nombre      = $_POST['nombre'];
			$comercial->salario     = $_POST['salario'];
			$comercial->hijos       = $_POST['hijos'];
			$comercial->fNacimiento = $_POST['fNacimiento'];
			$comercial->create();
			$respuesta = array(
				'datos' => htmlListadoComerciales(),
				'mensaje' => 'El comercial con código '.$_POST['codigo'].' ha sido insertado correctamente.'
				);
			break;

		case OP_MODIFICAR:
			$comercial = Comercial::find($_POST['codigoAnterior']);
			$comercial->codigo      = $_POST['codigo'];
			$comercial->nombre      = $_POST['nombre'];
			$comercial->salario     = $_POST['salario'];
			$comercial->hijos       = $_POST['hijos'];
			$comercial->fNacimiento = $_POST['fNacimiento'];
			$comercial->update($_POST['codigoAnterior']);
			$respuesta = array(
				'datos' => htmlListadoComerciales(),
				'mensaje' => 'El comercial con código '.$_POST['codigoAnterior'].' ha sido modificado correctamente.'
				);
	}
// si el formulario contenía errores	
} else {
	// enviaremos el html con todos los errores
	$strErrores = "";
	foreach ($errores as $error) {
		$strErrores .= $error."<br>";
	}
	$respuesta = array('errores' => $strErrores);
}
// enviamos el JSON
echo json_encode($respuesta);
?>