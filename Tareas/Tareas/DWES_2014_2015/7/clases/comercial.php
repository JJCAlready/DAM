
<?php
require_once 'modelo.php';

/**
 * Clase para el manejo de los registros de la tabla comerciales.
 * Extiende la clase Modelo en la que se definen los métodos
 * y atributos de cualquier modelo de la base de datos.
 * 
 * Se implementan métodos estaticos para el acceso a los mismos
 * sin necesidad de instanciar la clase.
 * 
 */
class Comercial extends Modelo {
	protected $tabla='comerciales';
	protected $id='codigo';
	protected $idAutoIncrementable = false;

	/**
	 * Verifica si existe o no un comercial con el códgio pasado como parámetro
	 * @param  string $codigo código del comercial a verificar
	 * @return boolean True si exite un comercial con el código pasado
	 */
	public static function existe($codigo) {
		return !is_null(Comercial::find($codigo));
	}	


	
	/**
	 * Comprueba si un comercial tiene ventas asociadas
	 * @param  string  $codigo código del comercial a verificar
	 * @return mixed   true si existe algún registro en la tabla ventas
	 *                 para el comercial, false si no existe ningún registro
	 *                 En caso de error devuelve null y guarda la descripción
	 *                 del error en la propiedad errores del objeto.
	 */
	public static function conVentas($codigo) {
		$pdo = self::dbConect();
		try {	
			// Ejecutamos una sentencia preparada pasando un array de valores
			$sth = $pdo->prepare('SELECT count(*) as r FROM ventas WHERE codComercial = ?');
			$sth->execute(array($codigo));
			$registro = $sth->fetch(PDO::FETCH_ASSOC);
			// en caso de error retornaremos null
			if ($registro==false) {
				return null;
			// y si no hubo errores	
			} else {
				// retornamos true si existe alguna venta, o false si no la hay
				return $registro['r'] > 0;
			}
		} catch (PDOException $e) {
			$this->errores = 'Falló el método conVentas de la clase '.get_class($this).': ' . $e->getMessage();
			return null;
		}			
	} 

}

?>
