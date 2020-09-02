<?php
/**************************************************************************
  Muestra los select con los valores seleccionados en pasos previos y el
  campo cantidad para modificación o eliminación del registro de unq venta
  Los valores por defecto de los campos se recogen de variables que
  previamente han debido ser declaradas en el archivo principal.
**************************************************************************/
$registro = dbRecuperarRegistros("ventas", "codComercial='$codComercial' 
					                        AND refProducto='$refProducto'
					                        AND fecha='".formatFechaBD($fecha)."'");
$cantidad=$registro['cantidad'];
$disabled = $operacion=='Modificar' ? '' : 'disabled';
$titulo = $operacion=='Modificar' ? 'Modificar venta' : 'Confirmar eliminación de la venta';
?>
<div class='contenedor_formulario'>
	<div class='formulario_venta'>
		<form action='index.php' method='post'>	

			<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $titulo; ?></span><br>					
			<span>Comercial:</span>
			<?php 
				echo dbHtmlSelect("comerciales WHERE codigo='$codComercial'",
					              "codigo", 
					              "CONCAT(codigo, ' : ', nombre)", 
					              "codigo", 
					              $codComercial
					              )."<br>"; 
			?> 
			<span>Producto:</span>
			<?php 
				echo dbHtmlSelect("productos WHERE referencia='$refProducto'",
					              "referencia", 
					              "CONCAT(nombre, ' : ', IFNULL(descripcion,''))",
					              "referencia",
					               $refProducto
					               )."<br>"; 

			?>
			<span>Fecha:</span>
			<?php 
				echo dbHtmlSelect("ventas WHERE codComercial='$codComercial' 
					                        AND refProducto='$refProducto'", 
					                "fecha",
					                "fecha",
					                "fecha", 
					                $fecha
					                )."<br>"; 

			?>
			<span>Cantidad:</span> 
			<input type="text" style="width: 160px;" name="cantidad" value="<?php echo $cantidad; ?>" <?php echo $disabled; ?> /><br><br><br><br><br><br>

			<input type="hidden" name="nivelSelect"  value="3" />
			<input type="hidden" name="codComercial"  value="<?php echo $codComercial; ?>" />
			<input type="hidden" name="refProducto"  value="<?php echo $refProducto; ?>" />
			<input type="hidden" name="operacion"  value="<?php echo $operacion; ?>" />
			<input type="hidden" name="tabla"  value="<?php echo $tabla; ?>" />
			<div class='botonera'>
				<input type="submit" name="accion" value="<?php echo $operacion; ?>" />
				<input type="submit" name="accion" value="Cancelar" />
			</div>
			<br><br>
		</form>	
	</div>	
</div>