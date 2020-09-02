<?php
/**************************************************************************
	Muestra un select para la selección de una fecha de una venta, junto
	con los select realizados en pasos previos.
	Los valores por defecto de los campos se recogen de variables que
	previamente han debido ser declaradas en el archivo principal.
**************************************************************************/

?>
<div class='contenedor_formulario'>
	<div class='formulario_venta'>
		<form action='index.php' method='post'>	
			<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Seleccionar fecha de la venta para <?php echo $operacion; ?></span><br>					
			<label for="codigo">Comercial:</label>
			<?php 
				echo dbHtmlSelect("comerciales WHERE codigo='$codComercial'",
					              "codigo",
					              "CONCAT(codigo, ' : ', nombre)", 
					              "codigo", 
					              $codComercial
					              )."<br>"; 
			?> 
			<label for="referencia">Producto:</label>
			<?php 
				echo dbHtmlSelect("productos WHERE referencia='$refProducto'",
					              "referencia", 
					              "CONCAT(nombre, ' : ', IFNULL(descripcion,''))",
					              "referencia", 
					              $refProducto
					              )."<br>"; 

			?>
			<label for="fecha">Fecha:</label>
			<?php 
				echo dbHtmlSelect("ventas WHERE codComercial='$codComercial' 
					                        AND refProducto='$refProducto'", 
					                "fecha", 
					                "fecha"
					                )."<br>"; 

			?>
			<input type="hidden" name="nivelSelect"  value="3" />
			<input type="hidden" name="codComercial"  value="<?php echo $codComercial; ?>" />
			<input type="hidden" name="refProducto"  value="<?php echo $refProducto; ?>" />
			<input type="hidden" name="operacion"  value="<?php echo $operacion; ?>" />
			<input type="hidden" name="tabla"  value="<?php echo $tabla; ?>" />
			<br><br><br><br>
			<div class='botonera'>
				<input type="submit" name="accion" value="Seleccionar" />
				<input type="submit" name="accion" value="Cancelar" />
			</div>
			<br><br>
		</form>	
	</div>	
</div>