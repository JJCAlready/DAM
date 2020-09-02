<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-10 20:11:44
         compiled from ".\templates\desconectar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:328654ff4138735dd6-22625679%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55bfe059bccd07889de2fdd5a553a6d3d2180061' => 
    array (
      0 => '.\\templates\\desconectar.tpl',
      1 => 1426014696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '328654ff4138735dd6-22625679',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54ff41387d6075_54903278',
  'variables' => 
  array (
    'pagina' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ff41387d6075_54903278')) {function content_54ff41387d6075_54903278($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
<div class='contenedor_formulario'>
	<br><br>
	<div class='formulario'>
		<form action='desconectar.php' method='post'>	
			<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Confirmar desconexión </span>
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
