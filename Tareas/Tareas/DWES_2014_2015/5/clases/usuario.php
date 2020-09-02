
<?php
require_once 'modelo.php';

/**
 * Clase para el manejo de los registros de la tabla usuarios.
 * Extiende la clase Modelo en la que se definen los métodos
 * y atributos de cualquier modelo de la base de datos.
 * 
 * Se implementan métodos estaticos para el acceso a los mismos
 * sin necesidad de instanciar la clase.
 * 
 */
class Usuario extends Modelo {

	/**
	 * Si existe un registro en la base de datos con el campo usuario = $usuario
	 * y cuyo cuyo password coincide con $password, retorna un objeto Usuario 
	 * con los valores del registro de la base de datos. En caso contrario
	 * retorna null 
	 */
	public static function registrado($usuario, $password) {
		$usu = Usuario::findByUsuario($usuario);
		if (!is_null($usu) && password_verify($password, $usu->pwd)) {
			return $usu;
		} else {
			return null;
		}
		
	}	


	/**
	 * Retorna un objeto de la clase Usuario que representa al registro
	 * de la tabla usuarios cuyo campo usuario coincide con el valor del
	 * parámetro pasado.
	 */
	public static function findByUsuario($usuario) {
		$pdo = self::dbConect();
		try {	
			// Ejecutamos una sentencia preparada pasando un array de valores
			// evitando inyecciones SQL maliciosas
			$sth = $pdo->prepare('SELECT * FROM usuarios WHERE usuario = ?');
			$sth->execute(array($usuario));
			$registro = $sth->fetch(PDO::FETCH_ASSOC);
			if ($registro!=false) {
				return new Usuario($registro);
			} else {
				return null;
			}
		} catch (PDOException $e) {
			$this->errores = 'Falló el método findByUsuario de la clase '.get_class($this).': ' . $e->getMessage();
			return null;
		}			
	}


}

?>
