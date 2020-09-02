<?php
	/**************************************************************************
		Muestra un formulario de introduccion de datos para un item de compra.
		Los valores por defecto de los campos se recogen de variables que
		previamente han debido ser declaradas en el archivo principal.
		En caso de que se vaya a mostrar el formulario tras una validación
		de datos fallida, se mostrarán los mensajes de cada uno de los errores
		encontrados. Para ello es necesario que cuando se vaya a mostrar el
		formulario se defina la variable $error que represente los errores
		encontrados.

	**************************************************************************/
?>
<div id='contenedor_formulario'>
	<div class='formulario'>	
		<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Introducir datos de compra</span><br>					
		<span>Nombre:</span>
		<input type="text" name="nombre"   value="<?php echo $nombre; ?>" ><br/>
		<span>Cantidad:</span> 
		<input type="text" name="cantidad" value="<?php echo $cantidad; ?>" ><br/>		
		<span>Precio:</span> 	
		<input type="text" name="precio"   value="<?php echo $precio; ?>" ><br/>
		<input type="submit" name="accion" value="Guardar" />
		<input type="submit" name="accion" value="Cancelar" />
		<input type='hidden' name='indice_compra'    value="<?php echo $indice; ?>" >
		<div class=error>
		<?php
			// Si no hay errores no es necesario que se fuerce a buscar posibles
			// errores. Hay que tener en cuenta que la función getMsgError($error)
			// realiza un bucle for de todos los posibles errores
			if ($error != ERROR_NULL) {
				//Mostrar errores
				foreach( getMsgError($error) as $msgError) {
					echo $msgError."</br>";
				}
			}
			
		?>
		<br/>
		</div>		
	</div>	
</div>
