<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-18 20:23:52
         compiled from "C:\Users\Fernampa\Dropbox\tarea5_es\smarty\tpl\templates\aplicacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1801255088f27940d59-18488853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '395e61ccd166e7a91e55852d8ff9189479cb0c01' => 
    array (
      0 => 'C:\\Users\\Fernampa\\Dropbox\\tarea5_es\\smarty\\tpl\\templates\\aplicacion.tpl',
      1 => 1426704832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1801255088f27940d59-18488853',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55088f279d15f7_11271743',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55088f279d15f7_11271743')) {function content_55088f279d15f7_11271743($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate ("cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class='contenido'>
	<br><br><br><br>   
	<h1>Autor: Fernando Arnedo Ayensa</h1>
	<br><br><br><br>  
	<h3>Acceso exclusivo a usuarios autenticados</h3>
	<br><br><br><br> 
	<center>
		<a href="index.php">Ir a página de inicio</a>   
	</center>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
