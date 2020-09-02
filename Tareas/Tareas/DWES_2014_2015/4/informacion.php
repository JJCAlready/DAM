<?php
/*****************************************************************************
	Esta página, que tan solo muestra la información de uso de la aplicación. 
	Se ofrece un enlace para volver a la página de inicio.
	Para acceder a la página es necesario haber pulsado el botón Entrar en la
	página de inicio, siendo inaccesible de otro modo.
*****************************************************************************/

require_once "funciones.inc";
include_once "definiciones.inc";

// acceso registringido, solo si se pulsó entrar como invitado o se trata de un
// usuario autenticado.
accesoInvitado();

include 'cabecera.php'; 
?>	
	<div class='contenido'>

		<p>
			Esta es una aplicación web sencilla que permite a un usuario acceder
		    a una parte de la aplicación u otra en función de si se ha autentificado
		    o no. Esta aplicación hace uso de la base de datos "tarea4".
		</p>
		<p>
			Consta de las siguientes páginas:<br><br>
			<ul>
				<li>
					<b>index.php</b>: ofrece un formulario para que el usuario pueda introducir 
					su usuario y contraseña y poder autentificarse. También ofrece la 
					posibilidad de acceder como invitado.<br>
                    Si se accede como invitado sólo puede accederse a la página de 
                    información (<b>información.php</b>).<br>
                    En caso de que se introduzca un usuario y contraseña se comprueba 
                    que dicho usuario está dado de alta en la base de datos (en la tabla 
                    usuarios). Si el usuario y contraseña son correctos se crea una sesión
                    y se tiene acceso a la página <b>aplicación.php</b>.
				</li>
				<li>
					<b>informacion.php</b>: Esta página, que tan solo muestra la información de 
					uso de la aplicación. Se ofrece un enlace para volver a la página de 
					inicio (<b>index.php</b>).
				</li>
				<li>
					<b>aplicacion.php</b>: A esta página sólo tienen acceso los usuarios que han 
					sido autentificados. Se controla su acceso mediante sesiones (las 
					sesiones almacenan el nombre del usuario y la hora de conexión). 
					Esta página ofrece un menú que permite acceder a la página de información
					(<b>información.php</b>), a la página de preferencias (<b>preferencias.php</b>)
					 y a la desconexión del usuario.
				</li>
				<li>
					<b>preferencias.php</b>: Esta página permite al usuario seleccionar el color 
					de fondo con el que se mostrarán todas las páginas. Estas preferencias son
					guardadas en una cookie. En caso de que no se hayan establecido preferencias
					el color por defecto es el blanco. Esta página también ofrece la opción de 
					restablecer las preferencias.

				</li>
				<li>
					<b>funciones.inc</b>: página que consta de las funciones usadas en la aplicación.
				</li>
			</ul>
		</p>
		<p>
			En todas las páginas se muestra el nombre del usuario conectado y la hora a la que se
			conectó (hora en la que inició la sesión) junto a la opción de cerrar la sesión.
		</p>

		<br>
		<div class='contenedor_formulario'>
			<br><br>
			<div class='formulario_inf'>
				<form id='form_informacion' action='index.php' method='post'>
					<input type="submit" name="accion" value="Ir al inicio" />
				</form>		
			</div>	
		</div>	
	</div>		
	</body>
</html>