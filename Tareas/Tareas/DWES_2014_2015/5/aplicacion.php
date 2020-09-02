<?php
/*****************************************************************************
Pàgina aplicacion.php. 
Solo si el usuario se ha autenticado le permitimos el paso a la vista, en caso
contrario será redirigido a la página establecida en la función 
accesoAutenticado()
*****************************************************************************/

require_once "funciones.inc";
include_once "define_variables.inc";
require('/smarty/lib/Smarty.class.php');

// solo permitimos el acceso a los usuarios que se hab autenticado
accesoAutenticado();


$smarty = new Smarty;
$smarty_dir = dirname(__FILE__).DIRECTORY_SEPARATOR .'smarty/tpl'.DIRECTORY_SEPARATOR;
$smarty->template_dir = $smarty_dir.'templates';
$smarty->compile_dir = $smarty_dir.'templates_c';

// pasamos las variables para la cabecera
$smarty->assign("strUsuarioConexion", $strUsuarioConexion);
$smarty->assign("strDesconectar", $strDesconectar);
$smarty->assign("strHoraConexion", $strHoraConexion);
$smarty->display('aplicacion.tpl');

?>
