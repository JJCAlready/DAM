<?php 

require_once 'declaraciones.php';

/**
 * Calcula el valor total de un item de compra. El paso del parámetro
 * $total se hace por referencia para poder manipular dicha variable
 * 
 * @param integer $total    variable en la que se dejará el 
 *                     		resultado del cálculo
 * @param array   $producto item de compra del que se quiere
 *                          calcular el total
 */
function Calcular_Precio_Total_Producto(&$total, $producto) {
	$total = $producto['precio'] * $producto['cantidad'];
}

/**
 * Calcula el valor total de todos los items contenidos en el carro
 * de la compra
 * 
 * @param array $registros Carro de la compra.
 *                         
 */
function Calcular_Precio_Total_Compra($registros){ 
	$total = 0;
	foreach($registros as $producto) {
		$subTotal = 0;
		Calcular_Precio_Total_Producto($subTotal, $producto);
		$total += $subTotal;		
	}
	return $total;
}

/**
 * Valida un item de compra, vigilando que se cumplen las siguientes condiciones:
 * 		- El valor del campo producto no puede estar vacio
 * 		- Los campos precio y cantidad han de ser valores numéricos positivos
 * 		  (si se permiten decimales, en ambos campos).
 * El paso del parámetro $producto, se realiza por referencia, para modificarlo
 * si es necesario, ya que admitimos valores vacios en los campos precio y 
 * cantidad, asumiendo que en dicho caso el valor 0
 * 
 * @param  array $producto 		item de compra a validar
 * @return integer      		tipos de error encontrados
 * 
 */
function validarProducto(&$producto){
	// en principio, todo es correcto
	$error = ERROR_NULL;

	// validamos el campo nombre
	if (empty($producto['nombre'])) {
		$error += ERROR_NOM_VACIO;
	}

	// si los campos precio y cantidad son vacios, les asignamos el valor 0
	$precio = empty($producto['precio']) ? 0 : $producto['precio'];
	$cantidad = empty($producto['cantidad']) ? 0: $producto['cantidad'];

	// validamos el campo cantidad, que deberá ser un número.
	if (!is_numeric($cantidad)){
		$error += ERROR_CTD_NAN;
	// y no negativo			
	} elseif($cantidad<0)	{
		$error += ERROR_CTD_NEG;
	}
	
	// validamos el campo precio, que deberá ser un número
	if (!is_numeric($precio)){
		$error += ERROR_PRC_NAN;
	// y no negativo			
	} elseif($precio<0)	{
		$error += ERROR_PRC_NEG;
	}

	// solo si no hay errores, ajustamos los valores por defecto
	if ($error == ERROR_NULL) {
		$producto['cantidad'] = $cantidad;
		$producto['precio'] = $precio;
	}

	// retornamos con los errores encontrados
	return $error;
}


/**
 * Devuelve un array con el los textos de los errores que representa el parámetro pasado
 * @param  integer $error 
 * @return array   Contiene los mensajes de cada uno de los errores individuales
 *                 que representa el valor pasado como parámetro
 */
function getMsgError($error) {
	global $strError;
	$strMsg = array();
	for($i=0; $i<count($strError); $i++) {
		// La constante que representa a cada error se corresponde con una potencia de 2
		$valError = pow(2,$i);
		// si el error contiene el error evaluado, añadimos el mensaje
		if ( ($error & $valError) == $valError) {
			$strMsg[] = $strError[$valError];
		}
	}
	return $strMsg;
}

/**
 * Devuelve el indice del item de compra seleccionado en el listado de la compra
 * @return integer valor del indice seleccionado o -1 si no selecciono un registro
 */
function getIndiceListado() {
	// Si venimos del listado, recogemos el indice del item seleccionado,
	// en caso contrario no hemos podido seleccionar nada, luego $indice = -1
	$indice = isset($_POST['indice_listado']) ? intval($_POST['indice_listado']) : -1;
	return $indice;
}
?>