<?php
/*****************************************************************************
Página de inicio de la aplicación. 
En primer lugar se verifica que el navegador está configurado para admitir 
cookies, para ello creamos una cookie de prueba y redirigimos a una página 
en la que se comprobará si dicha cookie existe o no. Si la cookie creada aquí
sigue existiendo, retornaremos de nuevo aquí, pero si no existe, se mostrará
el correspondiente mensaje de aviso al usuario.	
*****************************************************************************/

require_once "funciones.inc";
include_once "definiciones.inc";

// Comprobaremos que el navegador permite el almacenamiento de cookies,
setcookie("verificaAdmCokiesTarea4", 1, time()+3600);
// Si acabamos de establecer la cookie, rediriguimos a la página de 
// verificación para ver si es recogida correctamente.
if(!isset($_COOKIE['verificaAdmCokiesTarea4'])){
   header("Location: tarea4_cookies.php");
 }

// Si el usuario ya se autentificó no mostraremos la opción de entrar como invitado
if(autenticado()) {
	$visible="oculto";
	$textoIdentificar = "Identifíquese para entrar en la aplicación como otro usuario:";
}else {
	$visible="visible";
	$textoIdentificar = "Identifíquese para entrar en la aplicación:";
}

//
// Si venimos al formulario desde el propio formulario, el usuario ha pulsado 
// un botón y analizaremos la opción seleccionada
// 
switch ($accion) {

	case '':
		// venimos de una página distinta a esta, no hacemos nada
		break;

	case 'Conectar':
		// validamos los campos del formulario
		$campos = array(
			'usuario' 	=>	$usuario,
			'password'	=>	$password
			);
		$errores_form = validarFormLogin($campos);
		foreach ($errores_form as  $error) {
			$errores = "$errores<br>$error";
		}
		// si los campos del formulario son válidos		
		if($errores==null) {
			// validamos el usuario y contraseña introducidos
			$usu = dbUsuarioValido($usuario, $password);
			// no se han producido errores en la validación del usuario
			if ($errores==null) {
				// usuario no válido
				if ($usu==false) {
			    	$errores = "Usuario o contraseña no válidos";
			    // usuario válido, guardamos los datos de sesión y vamos
			    // a la página de la aplicación	
				} else {
					$_SESSION['hora_conexion']=date("H:i:s");
					$_SESSION['usuario']=$usuario;
					$_SESSION['autenticado']=true;
					$_SESSION['color']=colorUsuario($usuario);
					header("Location: aplicacion.php");
				}
			}
		}		
		break;

	case 'Entrar':
		// accedemos como invitado
		$_SESSION['autenticado']=false;
		$_SESSION['usuario']="Invitado";
		header("Location: informacion.php");
		break;

	case 'Ir al inicio':
		if (invitado()) {
			// Liberamos todas las variables de sesión
			session_unset();
			$_SESSION = array();
		}
		break;
	default:
		break;
}



/*****************************************************************************
	Tras analizar y gestionar la acción pertinente, incluimos el código
	html necesario para mostrar la página.

	La página se compone de un único formulario, con difentes elementos
	a mostrar, cada uno de ellos con los controles necesarios para que
	el usuario interacture según la acción seleccionada.

******************************************************************************/
		// incluimos la cabecera de la página
		include 'cabecera.php'; 	
	
?>
		<div class='contenedor_formulario'>
			<?php echo $textoIdentificar ?><br><br>
			<div class='formulario'>
				<form action='index.php' method='post'>	
					<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Login </span>
					<label for="usuario">* Usuario:</label>
					<input type="text" style="width: 180px;" name="usuario" value="<?php echo $usuario ?>" /><br>
					<label for="password">* Password:</label>
					<input type="password" style="width: 180px;"name="password" value="<?php echo $password ?>" /><br>
					<br>
					<div class='botonera'>
						<input type="submit" name="accion" value="Conectar" />
						<input type="submit" name="accion" value="Cancelar" />
					</div>
					<div class='error'>
						<?php
							//Mostrar errores
							if ($errores!="") {
								echo $errores;
							}
							
						?>
					</div>	
				</form>			
			</div>	
		</div>
		<div class="<?php echo $visible ?>">
			<div class='contenedor_formulario'>
			O también puede:<br><br>
				<div class='formulario'>
						<form action='index.php' method='post'>
							<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Entrar como invitado </span>	
							<div class='botonera'>
								<input type="submit" name="accion" value="Entrar" />
								<br><br><br>
							</div>
						</form>			
				</div>	
			</div>
		</div>			
	</body>
</html>