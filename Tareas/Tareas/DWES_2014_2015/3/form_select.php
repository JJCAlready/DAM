<?php
/******************************************************************************
	Muestra un formulario con un campo select para la selección de un producto
	o un comercial.
*******************************************************************************/
switch ($tabla) {
	case 'comerciales':
	case 'ventas_comerciales':
		$campoValue = "codigo";
		$campoMostrado = "CONCAT(codigo, ' : ', nombre) AS valor";
		$select = dbHtmlSelect('comerciales', $campoValue, $campoMostrado);
		$etiqueta="Comercial:";
		break;
	
	case 'productos':
		$campoValue = "referencia";
		$campoMostrado = "CONCAT(nombre, ' : ', IFNULL(descripcion,'')) AS valor";
		$select = dbHtmlSelect('productos', $campoValue, $campoMostrado);
		$etiqueta="Producto:";
		break;
}

?>
<div class='contenedor_formulario'>
	<div class='formulario_venta'>
		<form action='index.php' method='post'>	
			<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Seleccionar registro para <?php echo $operacion; ?></span><br>					
			<label><?php echo $etiqueta;?></label>
			<?php 
				echo $select;				
			?>
			<br><br>
			<input type="hidden" name="operacion"  value="<?php echo $operacion; ?>" />
			<input type="hidden" name="tabla"  value="<?php echo $tabla; ?>" />
			<div class='botonera'>
				<input type="submit" name="accion" value="Seleccionar" />
				<input type="submit" name="accion" value="Cancelar" />
			</div>
			<br><br>
		</form>	
	</div>	
</div>
	