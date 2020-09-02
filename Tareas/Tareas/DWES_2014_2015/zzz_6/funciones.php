<?php 
///////////////////////////////////////////////////////////////////////////
//
//  clase Funciones utilizada para asignar sus métodos al servidor SOAP
//
///////////////////////////////////////////////////////////////////////////


class Funciones {

	/**
	 * Devuelve los nombres y códigos de los comerciales
	 * @return  array[] Array asociativo con los nombres y códigos de los 
	 *          comerciales.
	 */
	public function getComerciales() {
		$strQuery = "SELECT codigo, nombre FROM comerciales";
		return $this->dbQuery($strQuery);
	}


	/**
	 * Devuelve todos los datos de todos los productos
	 * @return  array[] Array asociativo con todos los campo de los
	 *          productos
	 */
	public function getProductos() {
		$strQuery = "SELECT * FROM productos";
		return $this->dbQuery($strQuery);
	}


	/**
	 * @param string código de un comercial
	 * @return  array[]  Array asociativo con la información de las 
	 *          ventas de ese comercial.
	 */
	public function getConsultaVentasComercial($codComercial) {
		$strQuery = "SELECT ventas.refProducto as refProducto,
			                productos.nombre as nomProducto,
			                productos.descripcion as descripcion,
			                ventas.cantidad as cantidad,
			                ventas.fecha as fecha
		               FROM ventas, productos
		              WHERE ventas.refProducto = productos.referencia
			            AND ventas.codComercial='$codComercial'";
		return $this->dbQuery($strQuery);
	}


	/**
	 * @param string código de un producto
	 * @return  array[] Array asociativo con la información de las 
	 *          ventas de ese producto.
	 */
	public function getConsultaVentasProducto($refProducto) {
		$strQuery = "SELECT ventas.codComercial as codComercial,
							comerciales.nombre as nomComercial,
			                ventas.cantidad as cantidad,
			                ventas.fecha as fecha
		               FROM ventas, comerciales
		              WHERE ventas.codComercial = comerciales.codigo
			            AND ventas.refProducto='$refProducto'";
		return $this->dbQuery($strQuery);
	}



	/**
	 * Retorna un array asociativo con los registros devueltos por la consulta
	 * que es pasada como parámetro.
	 * @param  string $strQuery String con la consulta a ejecutar
	 *@return array[] array asociativo con los registros retornados por la consulta
	 * 
	 */
	public static function dbQuery( $strQuery) {
		global $dbConfig;
		$registros = array();
		$pdo=null;
		try {
			// Configuramos y obtenemos la conexión a la base de datos
			$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
		    $pdo = new PDO('mysql:host=localhost;dbname=ventas_comerciales', 'dwes', 'dwes', $options);
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    // ejecutamos la consulta y pasamos el resultado a un array 
		    foreach ($pdo->query($strQuery, PDO::FETCH_ASSOC) as $fila) {
					$registros[] = $fila;    
			    }
			// retornamos el resultado de la consulta
			return $registros;
		} catch (PDOException $e) {
		    print "Error de conexión a la base de datos: ".$e->getMessage() . "<br/>";
    	    die();
		}
	}

}

?>