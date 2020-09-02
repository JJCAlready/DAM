<?php 
/******************************************************************************
 Inicia la sesión, inicializa las variables utilizadas en cada una de las 
 páginas de la aplicación y se recogen los valores de las que puedan llegar
 por POST
******************************************************************************/
session_start(); 	
$usuario="";
$password="";
$accion="";
$invitado="";
$pagina="";
$color="";
global $errores;
// recogemos las variables que nos puedan llegar por post
$post=false;
foreach ($_POST as $variable => $valor) { 
	$$variable = $valor;
	$post=true;
}

?>