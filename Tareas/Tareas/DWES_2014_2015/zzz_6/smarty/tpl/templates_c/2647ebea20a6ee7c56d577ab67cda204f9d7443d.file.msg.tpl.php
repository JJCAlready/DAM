<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-18 20:27:01
         compiled from "C:\Users\Fernampa\Dropbox\tarea5_es\smarty\tpl\templates\msg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202885509c3bd1cdbc4-24998343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2647ebea20a6ee7c56d577ab67cda204f9d7443d' => 
    array (
      0 => 'C:\\Users\\Fernampa\\Dropbox\\tarea5_es\\smarty\\tpl\\templates\\msg.tpl',
      1 => 1426704953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202885509c3bd1cdbc4-24998343',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5509c3bd325817_59184635',
  'variables' => 
  array (
    'msg' => 0,
    'errores' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5509c3bd325817_59184635')) {function content_5509c3bd325817_59184635($_smarty_tpl) {?>


<?php echo $_smarty_tpl->getSubTemplate ("cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
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
