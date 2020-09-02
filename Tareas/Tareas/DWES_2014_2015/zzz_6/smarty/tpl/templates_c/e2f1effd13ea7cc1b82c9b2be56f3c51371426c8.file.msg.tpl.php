<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-13 11:21:38
         compiled from ".\templates\msg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:243365502aa54577761-52121855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2f1effd13ea7cc1b82c9b2be56f3c51371426c8' => 
    array (
      0 => '.\\templates\\msg.tpl',
      1 => 1426241104,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243365502aa54577761-52121855',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5502aa545f1876_05383404',
  'variables' => 
  array (
    'msg' => 0,
    'errores' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5502aa545f1876_05383404')) {function content_5502aa545f1876_05383404($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
<div class='contenedor_formulario'>
	<br><br>
	<div class='formulario'>
		<form action='index.php' method='post'>	
			<span class='titulo_formulario'>Eliminación de usuario</span>
			<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<br>
			<div class='error'>
                <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['errores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
                    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<br />
                <?php } ?> 
            </div>
			<br>
			<div class='botonera'>
				<input type="submit" style='width:180px' name="accion" value="Ir a página de inicio" />
			</div>
			<br><br>
		</form>			
	</div>	
</div>	

<?php echo $_smarty_tpl->getSubTemplate ("pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
