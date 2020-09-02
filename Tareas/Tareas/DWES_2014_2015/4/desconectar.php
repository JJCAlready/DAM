<?php
/*****************************************************************************
A esta página se llegará cuando un usuario autentificado pulse el botón de
desconectar o seleccione la opción de menu desconectar en la página
aplicación.php
Muestra un formulario de confirmación de desconexión con las opciones aceptar
y cancelar. Si el usuario pulsa el botón cancelar se realiza una redirección
a la página desde la que fue invocada. En caso de que el usuario pulse el
botón aceptar, se liberan las variables de sesión y se borra la cookie de la
sesión, rediriguiendo a la página de inicio (index.php)
*****************************************************************************/

require_once "funciones.inc";
include_once "definiciones.inc";

accesoAutenticado();

//
// Si venimos al formulario desde el propio formulario, el usuario ha pulsado 
// un botón y analizaremos la opción seleccionada
//
switch ($accion) {

	case '':
		// venimos de una página distinta a esta, no hacemos nada
		break;

	case 'Cancelar':
		header("Location: ".$pagina);
		break;

	case 'Aceptar':
		// Liberamos todas las variables de sesión
		session_unset();
		$_SESSION = array();
		// Borramos la cookie que almacena la sesión 
		if(isset($_COOKIE[session_name()])) { 
		   setcookie(session_name(), '', time() - 42000, '/'); 
		} 
		// Destruimos la sesión 
		session_destroy(); 
		// Y rediriguimos a la página de inicio.
		header("Location: index.php");
		break;
}

// obtenemos la página desde la que hemos llegado aquí
$pagina=$_SERVER["HTTP_REFERER"];

/*****************************************************************************
	Tras analizar y gestionar la acción pertinente, incluimos el código
	html necesario para mostrar la página.

	La página se compone de un único formulario para confirmar la desconexión.
******************************************************************************/
// incluimos la cabecera de la página
include 'cabecera.php'; 	
?>
		<div class='contenedor_formulario'>
			<br><br>
			<div class='formulario'>
				<form action='desconectar.php' method='post'>	
					<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Confirmar desconexión </span>
					¿Seguro quiere desconectar?
					<br><br>
					<div class='botonera'>
						<input type="submit" name="accion" value="Aceptar" />
						<input type="submit" name="accion" value="Cancelar" />
						<input type="hidden" name="pagina" value="<?php echo $pagina ?>" />
					</div>
					<br><br>
				</form>			
			</div>	
		</div>			
	</body>
</html>