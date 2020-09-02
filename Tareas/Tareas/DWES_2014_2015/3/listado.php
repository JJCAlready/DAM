<?php 	
/******************************************************************************
	Muestra el contenido de una tabla llamando a la función dbListarTabla o
	dbListarVentas, encargadas de generar el código html correspondiente
*******************************************************************************/
?>
	
<div class='contenedor_listado'>
	<div class='listado'>
		<?php
			if(isset($_GET['tabla'])) {
				$tabla = $_GET['tabla'];
				switch ($tabla) {
					case 'comerciales':
						$cabecera = array('Cod.', 'Nombre', 'Salario', 'Hijos', 'Fecha nacimiento');
						break;
					
					case 'productos':
						$cabecera = array('Ref.', 'Nombre', 'Descripcion', 'Precio', 'Descuento');
						break;
					case 'ventas':
					$cabecera =  array('Ref. Producto', 'Producto', 'Descr. Producto',
									'Cod. Comercial', 'Comercial', 'Cantidad','Fecha venta');							break;
				}
				echo dbListarTabla($tabla, "Tabla $tabla", $cabecera);
			} else {
				echo dbListarVentas($codigo);
			}								
		?>
	</div>
</div>
