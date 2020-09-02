{*****************************************************************************
	
	Vista para mostrar los datos recogidos por el cliente SOAP

*****************************************************************************}

<!DOCTYPE html>
<html lang="es-Es">
    <head>
        <meta charset="utf-8">         
        <title>Tarea 6 - DWES</title>
        <link rel="stylesheet" href="estilos.css">        
    </head>
	<body>
		<header>
			<h1>Tarea 6 - DWES</h1>
			<h4>Fernando Arnedo Ayensa</h4>
		</header>
		<div class='contenido'>
			<div class='izq'>
				<table>
					<caption>
						Comerciales en plantilla:
					</caption>
					<th>Código</th>
					<th>Nombre</th>
					{foreach from=$comerciales item=comercial}
						<tr>
							<td>{$comercial['codigo']}</td>
							<td>{$comercial['nombre']}</td>
						</tr>
        			{/foreach}
				</table>
			</div>
			<div class='dcha'>
				<table>
					<caption>
						Productos:
					</caption>
					<th>Referencia</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Descuento</th>
					{foreach from=$productos item=producto}
						<tr>
							<td>{$producto['referencia']}</td>
							<td>{$producto['nombre']}</td>
							<td>{$producto['descripcion']}</td>
							<td>{$producto['precio']}</td>
							<td>{$producto['descuento']}</td>
						</tr>
        			{/foreach}
				</table>
			</div>
			<div style='clear:both;'></div>
			<div class='izq'>
				<div class='contenedor_formulario'>
				<div class='formulario'>
					<form action='cliente.php' method='post'>	
						<span class='titulo_formulario'>Consultar ventas por ...</span>

						<input type="submit" name="accion" value="Comercial" />
						<input type='text' id='codComercial' name='codComercial' value=''>
						<br><br>
						<input type="submit" name="accion" value="Producto" />
						<input type='text' id='refProducto' name='refProducto' value=''>
						<br><br><br>
					</form>			
				</div>
				</div>
			</div>
			<br><br>
			<div class='dcha centrado'>
				{$tituloVentas}
			</div>
			<div class='dcha {$visibleVentasConercial}'>				
				<table>
					<th>Ref. Producto</th>
					<th>Producto</th>
					<th>Descripción</th>
					<th>Cantidad</th>
					<th>Fecha</th>
					{foreach from=$ventasComercial item=venta}
						<tr>
							<td>{$venta['refProducto']}</td>
							<td>{$venta['nomProducto']}</td>
							<td>{$venta['descripcion']}</td>
							<td>{$venta['cantidad']}</td>
							<td>{$venta['fecha']}</td>
						</tr>
        			{/foreach}
				</table>
			</div>
			<div class='dcha {$visibleVentasProducto}'>
				<table>
					<th>Cod. Comercial</th>
					<th>Nombre comercial</th>
					<th>Cantidad</th>
					<th>Fecha</th>
					{foreach from=$ventasProducto item=venta}
						<tr>
							<td>{$venta['codComercial']}</td>
							<td>{$venta['nomComercial']}</td>
							<td>{$venta['cantidad']}</td>
							<td>{$venta['fecha']}</td>
						</tr>
        			{/foreach}
				</table>
			</div>
		
		
	</div>
	</body>
</html>