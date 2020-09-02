<?php
/**************************************************************************
	Muestra un select para la selección de un producto de una venta, junto
	con el select de comercial realizado en el paso previs.
	Los valores por defecto de los campos se recogen de variables que
	previamente han debido ser declaradas en el archivo principal.
**************************************************************************/

?>
<div class='contenedor_formulario'>
	<div class='formulario_venta'>
		<form action='index.php' method='post'>	
			<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Seleccionar producto de la venta para <?php echo $operacion; ?></span><br>					
			<label for="codigo">Comercial:</label>
			<?php 
				//recuperamos el codigo y nombre del comercial seleccionado en el paso 1
				echo dbHtmlSelect("comerciales WHERE codigo='$codComercial'",
					              "codigo", "CONCAT(codigo, ' : ', nombre)", "codigo", 
					              $codComercial)."<br>"; 
			?> 
			<label for="refProducto">Producto:</label>
			<?php
				// recuperamos los productos de la tabla ventas, es necesario el uso de DISTINCT
				// ya que podría haber varios registros para un mismo producto 
				echo dbHtmlSelect("ventas, productos WHERE codComercial='$codComercial' 
					                                   AND referencia=refProducto",
					              'refProducto', 
					              "DISTINCT CONCAT(nombre, ' : ', IFNULL(descripcion,'')) AS valor")."<br>"; 

			?>
			<input type="hidden" name="nivelSelect"  value="2" />
			<input type="hidden" name="codComercial"  value="<?php echo $codComercial; ?>" />
			<input type="hidden" name="operacion"  value="<?php echo $operacion; ?>" />
			<input type="hidden" name="tabla"  value="<?php echo $tabla; ?>" />
			<br><br><br>
			<div class='botonera'>
				<input type="submit" name="accion" value="Seleccionar" />
				<input type="submit" name="accion" value="Cancelar" />
			</div>
			<br><br>
		</form>	
	</div>	
</div>