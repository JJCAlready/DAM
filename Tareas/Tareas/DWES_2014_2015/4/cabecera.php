<?php
/*****************************************************************************
Esta página será incluida en todas las páginas de la aplicación, ya que 
incluye el código html común a todas ellas.
Muestra una cabecera con el logo de la aplicación y, en el caso de que se
haya autenticado un usuario, la información de los datos de conexión (usuario, 
y hora de conexión).
En esta página se realiza la configuración del color de fondo, que dependerá
de si se ha autentificado o no un usuario.
*****************************************************************************/

// obtenemos en nombre de la página actual, para la que se incluye la cabecera
$paginas = explode("/",$_SERVER['REQUEST_URI']);
$pagActual = $paginas[count($paginas)-1];

// Si el usuario se ha autenticado, mostraremos los datos de conexión en la cabecera
if(autenticado()) {
	$strUsuarioConexion = "Usuario: ".$_SESSION['usuario'];
	$strHoraConexion= "Hora conexion: ".$_SESSION['hora_conexion'];
	$strDesconectar= "<input type='submit' name='accion' value='Desconectar' />";
	$color=colorUsuario($_SESSION['usuario']);
// Solo mostraremos el dato de acceso como invitado en la página informacion.php	
} else if (invitado() && $pagActual=="informacion.php") {
	$strUsuarioConexion = "Ha accedido usted como invitado";
	$strHoraConexion= "&nbsp;";
	$strDesconectar= "&nbsp;";
	$color="#FFFFFF";
// En el resto de páginas, si no se ha autenticado el usuario, no mostraremos datos	
} else {
	$strUsuarioConexion = "&nbsp;";
	$strHoraConexion= "&nbsp;";
	$strDesconectar= "&nbsp;";
	$color="#FFFFFF";
}
 ?>
 
<!DOCTYPE html>
<html lang="es-Es">
    <head>
        <meta charset="utf-8">         
        <title>Tarea 4 - DWES</title>
        <link rel="stylesheet" href="estilos.css">        
    </head>
	<body style="background-color:<?php echo $color ?>">
		<header>
			<div id='datos_conexion'>
			<h1>Tarea 4 - DWES</h1>
			<h4>Fernando Arnedo Ayensa</h4>
				<p>&nbsp;</p>
				<p><?php echo $strUsuarioConexion ?></p>
				<p>&nbsp;</p>
				<p><?php echo $strHoraConexion ?> </p>
				<p>&nbsp;</p>
				<p>
					<form id='form_desconectar' action='desconectar.php' method='post'>
						<?php echo $strDesconectar ?>
					</form>
				</p>
			</div>
		</header>
