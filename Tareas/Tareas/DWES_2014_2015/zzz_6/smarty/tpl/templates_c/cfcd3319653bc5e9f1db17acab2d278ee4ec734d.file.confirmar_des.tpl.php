<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-13 07:49:08
         compiled from ".\templates\confirmar_des.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171745502886498c344-71894067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfcd3319653bc5e9f1db17acab2d278ee4ec734d' => 
    array (
      0 => '.\\templates\\confirmar_des.tpl',
      1 => 1426014696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171745502886498c344-71894067',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pagina' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55028864a06468_08310028',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55028864a06468_08310028')) {function content_55028864a06468_08310028($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
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
