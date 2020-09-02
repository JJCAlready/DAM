<?php
/******************************************************************************
	Muestra un formulario de introduccion o muestra de datos para un producto.
	Los valores por defecto de los campos se recogen de variables que
	previamente han debido ser declaradas en el archivo principal.
	En caso de que se vaya a mostrar el formulario tras una validación de datos
	fallida, se mostrarán los mensajes de cada uno de los errores encontrados.
    Para ello es necesario que cuando se vaya a mostrar el formulario se defina
    la variable $errores que represente los errores encontrados.
*******************************************************************************/
if($operacion=='Eliminar') {
	$disableTodo='disabled';
	$textoInformativo='';
} else {
	$disableTodo='';
	$textoInformativo="<p class='informacion'>Los campos marcados con * son obligatorios.</p>";
	if ($disableClave=='disabled') {
		$textoInformativo= "$textoInformativo\n\r<p class='aviso'>La referencia del producto no 
		            puede ser modificada, ya que existen ventas realizadas con este producto</p>";
	}
}

// guardaremos el valor inicial del código para poder saber si ha variado desde
// que se llamó por primera vez al formulario.
if($referenciaAnterior=="") {
	$referenciaAnterior=$referencia;
}

?>
<div class='contenedor_formulario'>
	<div class='formulario'>
		<form action='index.php' method='post'>	
			<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $operacion; ?> producto</span>					
			<?php echo $textoInformativo;?>
			<label for="referencia">* Referencia:</label>
			<input type="text" style="width: 60px;" name="referencia" value=<?php echo "'{$referencia}' $disableClave$disableTodo"; ?>/ ><br>
			<label for="nombre">* Nombre:</label>
			<input type="text" style="width: 180px;"name="nombre" value=<?php echo "'{$nombre}' $disableTodo"; ?> /><br>
			<label for="descripcion">Descripción:</label> 
			<input type="text" style="width: 180px;" name="descripcion" value=<?php echo "'{$descripcion}' $disableTodo"; ?> /><br>		
			<label for="precio">* Precio:</label> 	
			<input type="text" style="width: 90px;" name="precio" value=<?php echo "'{$precio}' $disableTodo"; ?> /><br>
			<label for="descuento">* Descuento:</label> 	
			<input type="text" style="width: 60px;" name="descuento"   value=<?php echo "'{$descuento}' $disableTodo"; ?> /><br>
			<input type="hidden" name="referenciaAnterior" value="<?php echo $referenciaAnterior; ?>" />
			<input type="hidden" name="disableClave" value="<?php echo $disableClave; ?>" />
			<input type="hidden" name="operacion" value="<?php echo $operacion; ?>" />
			<!--input type="hidden" name="mensage" value="<?php echo $mensaje; ?>" />
			<input type="hidden" name="classMsg" value="<?php echo $classMsg; ?>" /-->
			<input type="hidden" name="tabla" value="<?php echo $tabla; ?>" />
			<br><br><br><br>
			<?php if ($textoInformativo=='') echo "<br><br><br>"; ?>			
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
	