<?php
/*****************************************************************************
A esta página se llegará cuando un usuario autentificado pulse el botón de
desconectar.
Muestra un formulario de confirmación de desconexión con las opciones aceptar
y cancelar. Si el usuario pulsa el botón cancelar se realiza una redirección
a la página desde la que fue invocada. En caso de que el usuario pulse el
botón aceptar, se liberan las variables de sesión y se redirige
a la página de inicio (index.php)
*****************************************************************************/

require_once "funciones.inc";
include_once "define_variables.inc";
require('/smarty/lib/Smarty.class.php');

//limitamos el acceso a la página a usuarios autenticados
accesoAutenticado();

// instanciamos y configuramos smarty
$smarty = new Smarty;
$smarty_dir = dirname(__FILE__).DIRECTORY_SEPARATOR .'smarty/tpl'.DIRECTORY_SEPARATOR;
$smarty->template_dir = $smarty_dir.'templates';
$smarty->compile_dir = $smarty_dir.'templates_c';

// pasamos las variables para la cabecera
$smarty->assign("strUsuarioConexion", $strUsuarioConexion);
$smarty->assign("strDesconectar", "&nbsp;");
$smarty->assign("strHoraConexion", $strHoraConexion);


//
// Si venimos al formulario desde el propio formulario, el usuario ha pulsado 
// un botón y analizaremos la opción seleccionada
//
switch ($accion) {

	case '':
	case 'Desconectar';
		// venimos de una página distinta a esta, mostraremos formulario 
		// de confirmación de desconexión, pasándole la página de origen
		$smarty->assign('pagina', $_SERVER["HTTP_REFERER"]);
		$smarty->display('confirmar_des.tpl');		
		break;

	case 'Cancelar':
		// el usuario ha pulsado el botón cancelar, redirigimos a la
		// página desde la que se llamó a la desconexión
		header("Location: ".$pagina);
		break;
	case 'Aceptar':
		// Liberamos todas las variables de sesión
		$_SESSION = array();
		// Y rediriguimos a la página de inicio.
		header("Location: index.php");
		break;
}
	
?>
