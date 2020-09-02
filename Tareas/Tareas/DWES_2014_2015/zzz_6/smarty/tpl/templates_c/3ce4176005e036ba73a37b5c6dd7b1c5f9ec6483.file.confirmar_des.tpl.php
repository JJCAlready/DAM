<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-18 20:24:16
         compiled from "C:\Users\Fernampa\Dropbox\tarea5_es\smarty\tpl\templates\confirmar_des.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11621550890ab2648b7-83217697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ce4176005e036ba73a37b5c6dd7b1c5f9ec6483' => 
    array (
      0 => 'C:\\Users\\Fernampa\\Dropbox\\tarea5_es\\smarty\\tpl\\templates\\confirmar_des.tpl',
      1 => 1426704876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11621550890ab2648b7-83217697',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_550890ab304b55_49633490',
  'variables' => 
  array (
    'pagina' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550890ab304b55_49633490')) {function content_550890ab304b55_49633490($_smarty_tpl) {?>


<?php echo $_smarty_tpl->getSubTemplate ("cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
<div class='contenedor_formulario'>
	<br><br>
	<div class='formulario'>
		<form action='desconectar.php' method='post'>	
			<span class='titulo_formulario'>Confirmar desconexión </span>
			¿Seguro quiere desconectar?
			<br><br>
			<div class='botonera'>
				<input type="submit" name="accion" value="Aceptar" />
				<input type="submit" name="accion" value="Cancelar" />
				<input type="hidden" name="pagina" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value;?>
" />
			</div>
			<br><br>
		</form>			
	</div>	
</div>	

<?php echo $_smarty_tpl->getSubTemplate ("pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
