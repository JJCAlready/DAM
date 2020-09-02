{*****************************************************************************
Esta caberera será incluida en todas las páginas de la aplicación, ya que 
incluye el código html común a todas ellas.
Muestra una cabecera con el logo de la aplicación y, en el caso de que se
haya autenticado un usuario, la información de los datos de conexión (usuario, 
y hora de conexión).
En esta página se realiza la configuración del color de fondo, que dependerá
de si se ha autentificado o no un usuario.
*****************************************************************************}

<!DOCTYPE html>
<html lang="es-Es">
    <head>
        <meta charset="utf-8">         
        <title>Tarea 5 - DWES</title>
        <link rel="stylesheet" href="estilos.css">        
    </head>
	<body>
		<header>
			<div id='datos_conexion'>
			<h1>Tarea 5 - DWES</h1>
			<h4>Fernando Arnedo Ayensa</h4>
				<p>&nbsp;</p>
				<p>{$strUsuarioConexion}</p>
				<p>&nbsp;</p>
				<p>{$strHoraConexion}</p>
				<p>&nbsp;</p>
				<p>
					<form id='form_desconectar' action='desconectar.php' method='post'>
						{$strDesconectar}
					</form>
				</p>
			</div>
		</header>