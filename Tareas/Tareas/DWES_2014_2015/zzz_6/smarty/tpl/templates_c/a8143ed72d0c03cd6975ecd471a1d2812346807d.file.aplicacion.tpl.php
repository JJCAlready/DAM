<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-15 20:55:04
         compiled from ".\templates\aplicacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2208854ff3350d9bd40-58764679%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8143ed72d0c03cd6975ecd471a1d2812346807d' => 
    array (
      0 => '.\\templates\\aplicacion.tpl',
      1 => 1426241062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2208854ff3350d9bd40-58764679',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54ff3350e7a7f7_98851581',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ff3350e7a7f7_98851581')) {function content_54ff3350e7a7f7_98851581($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class='contenido'>
	<br><br><br><br>   
	<h1>Autor: Fernando Arnedo Ayensa</h1>
	<br><br><br><br>  
	<h3>Acceso exclusivo a usuarios autenticados</h3>
	<br><br><br><br> 	
	<div class='contenedor_formulario centrado'>
	    <form action='index.php' method='post'> 
	        <div class='botonera'>
	            <input type="submit" style='width:180px' name="accion" value="Ir a página de inicio" />
	        </div>  
	    </form>          
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
