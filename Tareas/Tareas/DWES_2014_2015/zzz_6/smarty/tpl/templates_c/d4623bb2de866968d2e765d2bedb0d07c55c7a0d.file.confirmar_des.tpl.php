<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-15 20:55:12
         compiled from ".\templates\confirmar_des.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18950550085e6a7b1c9-07664524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4623bb2de866968d2e765d2bedb0d07c55c7a0d' => 
    array (
      0 => '.\\templates\\confirmar_des.tpl',
      1 => 1426249333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18950550085e6a7b1c9-07664524',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_550085e6de2400_45556716',
  'variables' => 
  array (
    'pagina' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550085e6de2400_45556716')) {function content_550085e6de2400_45556716($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
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
