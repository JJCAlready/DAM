<?php
	/**************************************************************************
		Muestra un formulario informando al usuario de que la acción que 
		intentaba realizar no se puede llevar a cabo, mostrando un mensaje
		con los errores encontrados.
		Aunque en principio se supone que solo se comunicará un tipo de error
		(distinto de ERROR_NULL), dejamos el código que pueda mostrar varios 
		errores, por si se diera el caso en alguna situación.

	**************************************************************************/
?>
<div class='formulario'>
	<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Error encontrado</span><br>
	<div class='error'>
		<?php
			//Mostrar errores
			$errores = getMsgError($error);
			foreach( $errores as $err) {
				echo $err."</br>";
			}
		?>
		<br/><br/>
		<input type="submit" name="accion" value="Aceptar" />
	</div>		
</div>	
