<?php 
/******************************************************************************
 Inicia la sesión, inicializa las variables utilizadas en cada una de las 
 páginas de la aplicación y se recogen los valores de las que puedan llegar
 por POST
******************************************************************************/
require_once('clases/usuario.php');

session_start(); 

//
// asignamos los valores por defecto a pasar a las vistas
//
 
// variables para las vistas, modificables según la acción y resultado de la misma
$errores="";
$erroresRegMod="";
$inforRegMod="";
$inforAcceso="";
$aviso="";

// variables que nos pueden llegar por post	
$accion="";
$usuario="";
$password="";
$password1="";
$password2="";
$usuario_reg="";
$email="";
$pagina="";
// recogemos las variables que nos puedan llegar por post y sus valores
$post=false;
foreach ($_POST as $variable => $valor) { 
	$$variable = $valor;
}


// si el usuario se autenticó
if(autenticado()) {
	// Datos para mostrar en la cabecera
	$strUsuarioConexion = "Usuario: ".$_SESSION['usuario']->usuario;
	$strHoraConexion= "Hora conexion: ".$_SESSION['hora_conexion'];
	$strDesconectar= "<input type='submit' name='accion' value='Desconectar' />";
// si el usuario no se autenticó
} else {
	// Datos para mostrar en la cabecera
	$strUsuarioConexion = "&nbsp;";
	$strDesconectar = "&nbsp;";
	$strHoraConexion ="&nbsp;";
}

?>