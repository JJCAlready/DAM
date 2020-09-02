<?php
/**************************************************************************
	Muestra un select para la selección de un comercial de una venta.
	Los valores por defecto de los campos se recogen de variables que
	previamente han debido ser declaradas en el archivo principal.
**************************************************************************/
?>
<div class='contenedor_formulario'>
	<div class='formulario_venta'>
		<form action='index.php' method='post'>	
			<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Seleccionar comercial de la venta para <?php echo $operacion; ?></span><br>					
			<label for="codComercial">Comercial:</label>
			<?php 
				echo dbHtmlSelect('ventas, comerciales WHERE codComercial=codigo', 
					              'codComercial', 
					              "DISTINCT CONCAT(codComercial, ' : ', nombre) AS valor", 
					              'codComercial'
					              )."<br>"; 

			?>
			<input type="hidden" name="nivelSelect"  value="1" />
			<input type="hidden" name="operacion"  value="<?php echo $operacion; ?>" />
			<input type="hidden" name="tabla"  value="<?php echo $tabla; ?>" />
			<br><br>
			<div class='botonera'>
				<input type="submit" name="accion" value="Seleccionar" />
				<input type="submit" name="accion" value="Cancelar" />
			</div>
			<br><br>
		</form>	
	</div>	
</div>