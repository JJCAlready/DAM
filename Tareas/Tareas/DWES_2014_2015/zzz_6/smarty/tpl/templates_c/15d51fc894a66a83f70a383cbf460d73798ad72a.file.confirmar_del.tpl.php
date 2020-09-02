<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-18 20:26:57
         compiled from "C:\Users\Fernampa\Dropbox\tarea5_es\smarty\tpl\templates\confirmar_del.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109475509c3b380bee7-45301762%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15d51fc894a66a83f70a383cbf460d73798ad72a' => 
    array (
      0 => 'C:\\Users\\Fernampa\\Dropbox\\tarea5_es\\smarty\\tpl\\templates\\confirmar_del.tpl',
      1 => 1426704825,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109475509c3b380bee7-45301762',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5509c3b3915921_33197599',
  'variables' => 
  array (
    'nomUsuario' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5509c3b3915921_33197599')) {function content_5509c3b3915921_33197599($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate ("cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
<div class='contenedor_formulario'>
	<br><br>
	<div class='formulario'>
		<form action='index.php' method='post'>	
			<span class='titulo_formulario'>Confirmar eliminación </span>
			¿Seguro quiere eliminar el usuario?<br>
			<div class='informacion' style='text-align: left; padding:15px 10px 10px 50px;'>
				Usuario: <?php echo $_smarty_tpl->tpl_vars['nomUsuario']->value;?>
<br>
				Email: <?php echo $_smarty_tpl->tpl_vars['email']->value;?>

			</div>
			<div class='botonera'>
				<input type="submit" name="accion" value="Aceptar" />
				<input type="submit" name="accion" value="Cancelar" />
			</div>
			<br><br>
		</form>			
	</div>	
</div>	

<?php echo $_smarty_tpl->getSubTemplate ("pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
