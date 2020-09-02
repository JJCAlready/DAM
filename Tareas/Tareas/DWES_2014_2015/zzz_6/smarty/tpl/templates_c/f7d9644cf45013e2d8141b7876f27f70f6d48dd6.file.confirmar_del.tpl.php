<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-13 09:22:00
         compiled from ".\templates\confirmar_del.tpl" */ ?>
<?php /*%%SmartyHeaderCode:711755029c9e30d835-47743568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7d9644cf45013e2d8141b7876f27f70f6d48dd6' => 
    array (
      0 => '.\\templates\\confirmar_del.tpl',
      1 => 1426234915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '711755029c9e30d835-47743568',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55029c9e387951_12659345',
  'variables' => 
  array (
    'nomUsuario' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55029c9e387951_12659345')) {function content_55029c9e387951_12659345($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
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
