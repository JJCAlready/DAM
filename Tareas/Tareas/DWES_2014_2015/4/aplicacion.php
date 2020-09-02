<?php
/*****************************************************************************
A esta página sólo tienen acceso los usuarios que han sido autentificados. 
Se controla su acceso mediante sesiones (las sesiones almacenan el nombre del 
usuario y la hora de conexión). 
Ofrece un menú que permite acceder a la página informacion.php, a la página 
preferencias.php y a la desconexión del usuario.	
*****************************************************************************/

require_once "funciones.inc";
include_once "definiciones.inc";

// acceso restringido solo para usuarios autenticados
accesoAutenticado();
include 'cabecera.php'; 

?>	
	<br><br>
	<div id="menu">
		    <ul>
		      <li class="nivel1"><a href="#" class="nivel1">Ir a</a>
		    	<ul>
		    		<li><a href="informacion.php">Información</a></li>
		    		<li><a href="preferencias.php">Preferencias</a></li>
		    		<li><a href="desconectar.php">Desconectar</a></li>
		    	</ul>
		      </li>
		    </ul>
	    </div>		
	</body>
</html>