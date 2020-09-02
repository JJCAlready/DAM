<?php
require('/smarty/lib/Smarty.class.php');

// instanciamos y configuramos smarty
$smarty = new Smarty;
$smarty_dir = dirname(__FILE__).DIRECTORY_SEPARATOR .'smarty'.DIRECTORY_SEPARATOR.'tpl'.DIRECTORY_SEPARATOR;
var_dump($smarty_dir);
$smarty->template_dir = $smarty_dir.'templates';
$smarty->compile_dir = $smarty_dir.'templates_c';


// 
// 
// obtenemos el valor del parámetro location a utilizar, teniendo en cuenta que
// suponemos que tanto cliente.php como servicio.php se encuentran en la misma
// ruta a la hora de probar el correcto funcionamiento de la tarea.
// 
// No obstante, los script han sido probados en servidores separados, adaptando
// estos valores a los valores de dichos servidores.
// 
// 
$urlCliente = "http://".$_SERVER['SERVER_ADDR'].$_SERVER['PHP_SELF'];
$partes = explode('/', $urlCliente);
// quitamos del array $partes el último elemento, que se corresponde 
// con el nombre del archivo que contiene el servicio
array_pop($partes);
$urlServicio = implode('/', $partes).'/servicio.php';


// Creamos el cliente soap 
$cliente = new SoapClient(null, array('location' => $urlServicio, 'uri'	=> '' ));

// recuperamos los datos relativos a los comerciales y los pasamos a la vista
$comerciales = $cliente->getComerciales();
$smarty->assign("comerciales", $comerciales);

// recuperamos los datos relativos a los productos y los pasamos a la vista
$productos = $cliente->getProductos();
$smarty->assign("productos", $productos);

// reconocer como hemos llegado a la página y actuar en consecuencia
$accion ='';
if(isset($_POST['accion'])) {
	$accion = $_POST['accion'];
}

switch ($accion) {
	// la página es llamada por GET
	case '':
		// no mostraremos ninguna venta
		$smarty->assign('visibleVentasConercial', 'oculto');
		$smarty->assign('visibleVentasProducto', 'oculto');
		$smarty->assign("tituloVentas", ""); 
		break;

	// el usuario pulsó la consulta por producto
	case 'Producto':
		// Recuperar datos del producto indicado
		$producto = $_POST['refProducto'];
		$datosProducto = datosRegistro($producto, $productos, 'referencia');
		// Si el código del producto solicitado no existe
		if (is_null($datosProducto)) {
			// Solo podemos pasar array vacios
			$smarty->assign("ventasProducto", array());
			$smarty->assign("ventasComercial", array());
			// Pasar a la vista el título para las ventas a mostrar
			if($producto=='') {
				$smarty->assign("tituloVentas", "No se ha introducido ninguna referencia de producto");
			} else {
				$smarty->assign("tituloVentas", "No existe ningún producto con la referencia ".$producto);
			}
			// Indicar a la vista que apartado de ventas mostrar
			$smarty->assign('visibleVentasConercial', 'oculto');
			$smarty->assign('visibleVentasProducto', 'oculto');
		// Si la referencia del producto solicitado existe
		} else {
			$ventas = $cliente->getConsultaVentasProducto($producto);
			// Pasar los registros devueltos por el servidor a la vista
			$smarty->assign("ventasProducto", $ventas);
			$smarty->assign("ventasComercial", array());
			// Pasar a la vista el título para las ventas a mostrar
			$smarty->assign("tituloVentas", "Ventas del producto ".$producto.":");
			// Indicar a la vista que apartado de ventas mostrar
			$smarty->assign('visibleVentasConercial', 'oculto');
			$smarty->assign('visibleVentasProducto', 'visible'); 
		}		
		
		break;

	// el usuario pulsó la consulta por comercial
	case 'Comercial':
		// Recuperar datos del comercial indicado
		$comercial = $_POST['codComercial'];
		$datosComercial = datosRegistro($comercial, $comerciales, 'codigo');
		// Si el código del comercial solicitado no existe
		if (is_null($datosComercial)) {
			// Solo podemos pasar array vacios
			$smarty->assign("ventasProducto", array());
			$smarty->assign("ventasComercial", array());
			// Pasar a la vista el título para las ventas a mostrar
			if($comercial=='') {
				$smarty->assign("tituloVentas", "No se ha introducido ningún código de comercial");
			} else {
				$smarty->assign("tituloVentas", "No existe ningún comercial con el código ".$comercial);
			}
			// Indicar a la vista que apartado de ventas mostrar
			$smarty->assign('visibleVentasConercial', 'oculto');
			$smarty->assign('visibleVentasProducto', 'oculto');
	    // Si el código del comercial solicitado existe		
		} else {
			$ventas = $cliente->getConsultaVentasComercial($comercial);
			// Pasar los registros devueltos por el servidor a la vista
			$smarty->assign("ventasComercial", $ventas);
			$smarty->assign("ventasProducto", array());
			// Pasar a la vista el título para las ventas a mostrar
			$smarty->assign("tituloVentas", "Ventas del comercial ".$comercial.":");
			// Indicar a la vista que apartado de ventas mostrar
			$smarty->assign('visibleVentasConercial', 'visible');
			$smarty->assign('visibleVentasProducto', 'oculto'); 
		}		
		
		break;

}

// mostrar la vista
$smarty->display("cliente.tpl");


/**
 * Busca un valor entre un array de registros, dentro de la clave solicitada
 * 
 * @param string $valor Valor a buscar
 * @param array $registros Array en el que buscar el valor
 * @param string $clave clave dentro del array en la que buscar
 * @return array asociativo con los datos del registro encontrado, o null si no
 *         se encuentra ningún registro que contenga dicho valor dentro de la 
 *         clave indicada.
 * 
 */
function datosRegistro($valor, $registros, $clave) {
	foreach ($registros as $registro) {
		if ($registro[$clave]==$valor) {
			return $registro;
		}
	}
	return null;
}


?>