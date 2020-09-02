<?php
/*****************************************************************************
  Esta página permite al usuario seleccionar el color de fondo con el que 
  se mostrarán todas las páginas. Estas preferencias son guardadas en una 
  cookie. En caso de que no se hayan establecido preferencias el color por
  defecto será el blanco. Esta página también ofrece la opción de restablecer
  las preferencias eliminando la cookie.

*****************************************************************************/

require_once "funciones.inc";
include_once "definiciones.inc";

// acceso restringido solo para usuarios autenticados 
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
		// Regresamos a la página anterior que muestra el menú
		header("Location: aplicacion.php");
		break;

	case 'Aceptar':
		// El usuario ha introducido un valor de color no válido, mostraremos el error
		if (!preg_match("/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/", $color)) {
		    $errores = "Debe introducir un valor hexadecimal, con el formato #XXX o #XXXXXX";
		// El valor introducido es un color válido, actualizamos la cookie y regresamos a la 
		// página que muestra el menú    
		} else {
			$_SESSION['color']=$color;
			// La validez de la cookie será de 1 año
			setcookie($_SESSION['usuario']."ColorTarea4", "$color", strtotime("+1 year"));
			header("Location: aplicacion.php");
		}
		break;

	case 'Restablecer':
		// borramos la cookie haciendola caducar en un tiempo anterior al actual
		setcookie($_SESSION['usuario']."ColorTarea4", "$color", strtotime("-1 day"));
		header("Location: aplicacion.php");
		break;
}



/*****************************************************************************
	Tras analizar y gestionar la acción pertinente, incluimos el código
	html necesario para mostrar la página.

	La página se compone de un único formulario con las opciones de selección
	de color, restablecer preferencias, o cancelar la acción.

******************************************************************************/
// incluimos la cabecera de la página
include 'cabecera.php'; 

$color = colorUsuario($_SESSION['usuario']);
// ver si funcionará el type=color
$agente = $_SERVER['HTTP_USER_AGENT'];
// Si el navegador no es Firefox ni Chrome, no funcionará el control type=color
if(stristr($agente, "Firefox") === FALSE AND stristr($agente, "Chrome") === FALSE) { 
	$texto ="Introduzca el color:";
} else {
	$texto ="Seleccione el color:";
}
// Si se utilizó Firefox o Chrome para guardar el color, se habrá guardado sin #
if(stristr($color, '#') === FALSE) {
   $color = "#".$color;
}


?>
		<div class='contenedor_formulario'>
			<br><br>
			<div class='formulario'>
				<form action='preferencias.php' method='post'>	
					<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Seleccionar color </span>
					<label for="color"><?php echo $texto; ?></label>
					<input type="color" name="color" value="<?php echo $color; ?>" />
					<br><br><br><br><br>
					<div class='botonera'>
						<input type="submit" name="accion" value="Aceptar" />
						<input type="submit" name="accion" value="Restablecer" />
						<input type="submit" name="accion" value="Cancelar" />	
					</div>
					<br>
					<div class='error'>
					<?php
						//Mostrar errores
						echo $errores;
					?>
				</div>
				</form>			
			</div>	
		</div>			
	</body>
</html>