<?php
/*****************************************************************************
Esta página verifica que la cookie, creada para probar su admisión por el
navegador, existe. Si la cookie existe se devuelve el control a la página 
index.php, en caso contrario se mostrará el correspondiente aviso al usuario
en esta misma página.	
*****************************************************************************/
require_once "funciones.inc";
include_once "definiciones.inc";

// Si podemos leer correctamente la cookie devolvemos el control a la página index.php
if(isset($_COOKIE["verificaAdmCokiesTarea4"])) {
	header("Location: index.php");
}
	

/*****************************************************************************
	Si el navegador no admite coockies mostraremos el aviso al usuario
******************************************************************************/
		// incluimos la cabecera de la página
		include 'cabecera.php'; 	
	
?>
		<div class='contenedor_formulario'>
			<div class='formulario'>
				<div class='aviso'>
					<?php
						echo "Su navegador está configurado para no admitir cookies.<br>".
						     "Es preciso que configure la admisión de cookies para ".
						     " poder utilizar la aplicación.";
					?>
				</div>			
			</div>	
		</div>
	</body>
</html>