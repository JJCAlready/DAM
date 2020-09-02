<?php
/**************************************************************************
	Muestra un formulario de introduccion o muestra de datos para una venta,
	Los valores por defecto de los campos se recogen de variables que
	previamente han debido ser declaradas en el archivo principal.
	En caso de que se vaya a mostrar el formulario tras una validación
	de datos fallida, se mostrarán los mensajes de cada uno de los errores
	encontrados. Para ello es necesario que cuando se vaya a mostrar el
	formulario se defina la variable $errores que represente los errores
	encontrados.
**************************************************************************/
?>
<div class='contenedor_formulario'>
	<div class='formulario_venta'>
		<form action='index.php' method='post'>	
			<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $operacion; ?> venta</span><br>								
			<label for="refProducto">Producto:</label>
			<?php 
				echo dbHtmlSelect('productos', 'referencia', 
					"CONCAT(nombre, ' : ', IFNULL(descripcion,'')) AS valor",
					  'refProducto', $refProducto)."<br>"; 
			?> 
			<label for="codComercial">Comercial:</label>
			<?php 
				echo dbHtmlSelect('comerciales', 'codigo', 
					"CONCAT(codigo, ' : ', nombre) AS valor",
					 'codComercial', $codComercial)."<br>"; 
			?> 
			<label for="cantidad">Cantidad:</label> 
			<input type="text" style="width: 160px;" name="cantidad" value="<?php echo $cantidad; ?>" /><br>
			<label for="fecha">Fecha:</label> 	
			<input type="text" style="width: 90px;" name="fecha"   value="<?php echo $fecha; ?>" /><br>
			<input type="hidden" name="codComercialAnterior" value="<?php echo $codComercial; ?>" />
			<input type="hidden" name="refProductoAnterior" value="<?php echo $refProducto; ?>" />
			<input type="hidden" name="fechaAnterior" value="<?php echo $fecha; ?>" />
			<input type="hidden" name="operacion" value="<?php echo $operacion; ?>" />
			<input type="hidden" name="mensage" value="<?php echo $mensaje; ?>" />
			<input type="hidden" name="classMsg" value="<?php echo $classMsg; ?>" />
			<input type="hidden" name="tabla" value="<?php echo $tabla; ?>" />
			<br><br><br><br>
			<div class='botonera'>
				<input type="submit" name="accion" value="<?php echo $operacion; ?>" />
				<input type="submit" name="accion" value="Cancelar" />
			</div>
		</form>
		
		<div class='error'>
		<?php
			//Mostrar errores
			foreach( $errores as $error) {
					echo $error."<br>";
			}
			
		?>
		<br>
		</div>		
	</div>	
</div>
	