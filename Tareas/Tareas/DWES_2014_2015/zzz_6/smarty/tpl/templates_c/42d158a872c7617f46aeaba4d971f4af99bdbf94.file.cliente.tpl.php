<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-25 23:24:48
         compiled from "C:\Users\Fernampa\Dropbox\tarea6_es\smarty\tpl\templates\cliente.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2555155131766715d35-67953881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42d158a872c7617f46aeaba4d971f4af99bdbf94' => 
    array (
      0 => 'C:\\Users\\Fernampa\\Dropbox\\tarea6_es\\smarty\\tpl\\templates\\cliente.tpl',
      1 => 1427322231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2555155131766715d35-67953881',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5513176687d391_08928420',
  'variables' => 
  array (
    'comerciales' => 0,
    'comercial' => 0,
    'productos' => 0,
    'producto' => 0,
    'tituloVentas' => 0,
    'visibleVentasConercial' => 0,
    'ventasComercial' => 0,
    'venta' => 0,
    'visibleVentasProducto' => 0,
    'ventasProducto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5513176687d391_08928420')) {function content_5513176687d391_08928420($_smarty_tpl) {?>

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
					<?php  $_smarty_tpl->tpl_vars['comercial'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comercial']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comerciales']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comercial']->key => $_smarty_tpl->tpl_vars['comercial']->value) {
$_smarty_tpl->tpl_vars['comercial']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['comercial']->value['codigo'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['comercial']->value['nombre'];?>
</td>
						</tr>
        			<?php } ?>
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
					<?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['producto']->value['referencia'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['producto']->value['nombre'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['producto']->value['descripcion'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['producto']->value['precio'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['producto']->value['descuento'];?>
</td>
						</tr>
        			<?php } ?>
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
				<?php echo $_smarty_tpl->tpl_vars['tituloVentas']->value;?>

			</div>
			<div class='dcha <?php echo $_smarty_tpl->tpl_vars['visibleVentasConercial']->value;?>
'>				
				<table>
					<th>Ref. Producto</th>
					<th>Producto</th>
					<th>Descripción</th>
					<th>Cantidad</th>
					<th>Fecha</th>
					<?php  $_smarty_tpl->tpl_vars['venta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['venta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ventasComercial']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['venta']->key => $_smarty_tpl->tpl_vars['venta']->value) {
$_smarty_tpl->tpl_vars['venta']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['venta']->value['refProducto'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['venta']->value['nomProducto'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['venta']->value['descripcion'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['venta']->value['cantidad'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['venta']->value['fecha'];?>
</td>
						</tr>
        			<?php } ?>
				</table>
			</div>
			<div class='dcha <?php echo $_smarty_tpl->tpl_vars['visibleVentasProducto']->value;?>
'>
				<table>
					<th>Cod. Comercial</th>
					<th>Nombre comercial</th>
					<th>Cantidad</th>
					<th>Fecha</th>
					<?php  $_smarty_tpl->tpl_vars['venta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['venta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ventasProducto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['venta']->key => $_smarty_tpl->tpl_vars['venta']->value) {
$_smarty_tpl->tpl_vars['venta']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['venta']->value['codComercial'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['venta']->value['nomComercial'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['venta']->value['cantidad'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['venta']->value['fecha'];?>
</td>
						</tr>
        			<?php } ?>
				</table>
			</div>
		
		
	</div>
	</body>
</html><?php }} ?>
