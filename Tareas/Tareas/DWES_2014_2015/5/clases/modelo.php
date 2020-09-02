
<?php
include_once 'config_db.php';

/*
 * Clase abstracta que permite el acceso a los registros de una tabla de la 
 * base de datos cuya configuración viene dada por los valores definidos en
 * el fichero config_db.php.
 * El acceso a las columnas de la tabla para un registro podrá realizarse de
 * la forma:  regitro->nombre_columna
 *
 */
abstract class Modelo {
	protected $atributos;
	protected $columnas;
	protected $tabla;
	protected $id;
	public $errores;

	/**
	 * Constructor de la clase
	 * @param array $atributos nombre de cada una de las columnas de la tabla
	 *        a la que representa la clase.
	 */
	public function __construct($atributos=array()) {
		$this->atributos = $atributos;		
		if(is_null($this->tabla)) {
			// si no se asigna un valor al atributo $tabla asumimos que será
			// igual al nombre de la clase pero en minúsculas y terminado en s
			$this->tabla =  strtolower(get_class($this)).'s';
		}

		if(is_null($this->id)) {
			// si no se asigna un valor al atributo $id asumimos que será id
			$this->id =  'id';
		}
		
		$pdo = $this->dbConect();
		if($pdo!=null) {
			$sth = $pdo->prepare("SHOW COLUMNS FROM $this->tabla");
			$sth->execute();
			$this->columnas = $sth->fetchAll();
		} else {
			throw new Exception($this->errores);
		}
	}

	// 
	// Utlizaremos los métodos mágicos __get y __set para poder acceder y
	// guardar valores de un registro como si se tratasen de atributos de
	// la clase
	//
	public function __get($atributo) {
		return $this->atributos[$atributo];
	}


	public function __set($atributo, $valor) {
		$this->atributos[$atributo]=$valor;
	}


	/**
	 * @return el nombre de la tabla que representa la clase
	 */
	public function getTabla() {
		return $this->tabla;
	}

	/**
	 * @return el nombre del campo clave de la tabla que representa la clase
	 */
	public function getId() {
		return $this->id;
	}



	/**
	 * Conecta a la base de datos con los parámetros indicados en el array $configDB
	 * @return objeto PDO resultante de la conexión a la base de datos
	 */
	protected function dbConect() {
		global $dbConfig;
		$pdo=null;
		try {
			$strCon = $dbConfig['driver'].':host='.$dbConfig['host'].';dbname='.$dbConfig['dbname'];
			$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
		    $pdo = new PDO($strCon, $dbConfig['usuario'], $dbConfig['password'], $options);
		} catch (PDOException $e) {
		   print "Error de conexión a la base de datos: ".$e->getMessage() . "<br/>";
    	   die();
		}
		return $pdo;
	}



	/**
	 * Inserta un registro en la tabla que representa a la clase con los valores
	 * actuales de los atributos del objeto instanciado.
	 * @return true si la operación se realizó correctamente, false en caso contrario
	 */
	public function create() {
		$todoOK = true;
		$pdo = $this->dbConect();
		// construimos el string para preparar la consulta
		$strCampos ="";
		$strValores ="";
		$i = 0;
		foreach ($this->atributos as $campo => $valor) {
			// reemplazamos los campos en blanco por nulos
			if ($valor=="") {
				$valor = "NULL";
			// preparamos los valores no nulos de los campos según el tipo de campo	
			} else {				
				$tipoColumna = $this->getTipoColumna($campo);
				switch ($tipoColumna) {
				case 'date':
					$valor = "'".formatFechaBD($valor)."'";
					break;			
				case 'varchar':
				case 'char':
					$valor = "'$valor'";
					break;
				case 'float':
					$valor = floatval($valor);
					break;
				case 'int':
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
		$strQuery = "INSERT INTO $this->tabla ($strCampos) VALUES ($strValores)";
		// ejecutamos la consulta procesando los posibles errores como
		// excepciones
		$this->errores = null;
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {	
			$pdo->exec($strQuery);
			// si realiza correctamente la inserción, recuperar el id del registro
			$this->atributos["$this->id"]=$pdo->lastInsertId($this->id); 
		} catch (PDOException $e) {
			$todoOK=false;
			if($e->errorInfo[1]==1062) {
				$this->errores = 'registro duplicado';
			} else {
				$this->errores = 'Falló la inserción: ' . $e->getMessage();
			}	    	
		}
		// cerramos la conexión y retornamos el resultado de exito o fracaso
		unset($pdo);
		return $todoOK; 		
	}


	/**
	 * Actualiza la tabla que representa a la clase modificando el registro
	 * cuyo id corresponde con el id del objeto instanciado, asignandole los
	 * valores actuales de los atributos.
	 * @return true si la operación se realizó correctamente, false en caso contrario
	 */
	public function update() {
		$todoOK = true;
		$pdo = $this->dbConect();
		// construimos el string para preparar la consulta
		$strSet ="";
		$i = 0;
		//var_dump($this->atributos);
		foreach ($this->atributos as $campo => $valor) {
			// reemplazamos los campos en blanco por nulos
			if ($valor=="") {
				$valor = "NULL";
			// preparamos los valores no nulos de los campos según el tipo de campo	
			} else {				
				$tipoColumna = $this->getTipoColumna($campo);
				switch ($tipoColumna) {
				case 'date':
					$valor = "'".formatFechaBD($valor)."'";
					break;			
				case 'varchar':
				case 'char':
					$valor = "'$valor'";
					break;
				case 'float':
					$valor = floatval($valor);
					break;
				case 'int':
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
		// creamos la consulta
		$strQuery = "UPDATE $this->tabla SET $strSet WHERE $this->id=".$this->atributos["$this->id"];
		// ejecutamos la consulta procesando los posibles errores como
		// excepciones
		$this->errores = null;
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {	
			$pdo->exec($strQuery);	
		} catch (PDOException $e) {
			$todoOK=false;
			$this->errores = 'Falló la inserción: ' . $e->getMessage();    	
		}
		// cerramos la conexión y retornamos el resultado de exito o fracaso
		unset($pdo);
		return $todoOK; 
	}


	/**
	 * Actualiza la tabla que representa a la clase eliminando el registro
	 * cuyo id corresponde con el id del objeto instanciado.
	 * @return true si la operación se realizó correctamente, false en caso contrario
	 */
	public function delete() {
		$todoOK = true;
		$pdo = $this->dbConect();
		// creamos la consulta
		$strQuery = "DELETE FROM $this->tabla WHERE $this->id=".$this->atributos['id'];
		// ejecutamos la consulta procesando los posibles errores como
		// excepciones
		$this->errores = null;
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {	
			$pdo->exec($strQuery);	
		} catch (PDOException $e) {
			$todoOK=false;
			$this->errores = 'Falló la inserción: ' . $e->getMessage();    	
		}
		// cerramos la conexión y retornamos el resultado de exito o fracaso
		unset($pdo);
		return $todoOK; 
	}



	/**
	 * Retorna el registro de la tabla cuyo campo clave es $id o null si
	 * no existe ningún registro con ese id
	 * @param  int $id id del registro a devolver
	 * @return mixed Campo cuyo id es igual a $id, o null si no existe nínguno.
	 */
	public static function find($id) {
		// crearemos un objeto de la clase para la que es llamada la función 
		// y así poder recuperar la tabla a la que hace referencia la clase.
		$c = get_called_class();
		$registro = new $c();
		$tabla = $registro->getTabla();
		$pdo = self::dbConect();
		if(!is_null($pdo)) {
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {	
				// Ejecutamos una sentencia preparada pasando un array de valores
				// evitando inyecciones SQL maliciosas
				$sth = $pdo->prepare("SELECT * FROM $tabla WHERE ".$registro->getId()." = ?");
				$sth->execute(array($id));
				$encontrado = $sth->fetch(PDO::FETCH_ASSOC);
				// Si no hay registro con ese id en la tabla, retornaremos null
				if($encontrado==false) {
					return null;
				// En caso contrario retornamos un objeto con los valores del registro.	
				} else {
					$registro = new $c($encontrado);
					return $registro;
				}
			} catch (PDOException $e) {
				$this->errores = 'Falló el método find de la clase '.get_class($this).': ' . $e->getMessage();
			}
		}	
		return null;
	}


	/**
	 * devuelte el tipo de campo correspondiente a la columna $nombreCampo de 
	 * la tabla a la que representa la clase.
	 * @param  string $nombreCampo nombre de la columna 
	 * @return string Tipo de datos correspondiente a la columna $nombreCampo de la tabla
	 */
	private function getTipoColumna($nombreColumna) {
   		foreach ($this->columnas as $i => $valor) {
	       if ($valor['Field'] === $nombreColumna) {
	          return explode('(', $this->columnas[$i]['Type'])[0];
	       }
	   }
	   return null;
	}




	
}


?>
