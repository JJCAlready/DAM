<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-18 20:23:48
         compiled from "C:\Users\Fernampa\Dropbox\tarea5_es\smarty\tpl\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10475509d0c45a6d41-82924739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e9915865c622d987d4ee7d27e09b04d99349117' => 
    array (
      0 => 'C:\\Users\\Fernampa\\Dropbox\\tarea5_es\\smarty\\tpl\\templates\\index.tpl',
      1 => 1426704906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10475509d0c45a6d41-82924739',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tituloAcceso' => 0,
    'usuario' => 0,
    'password' => 0,
    'errores' => 0,
    'error' => 0,
    'inforAcceso' => 0,
    'class_eliminar' => 0,
    'tituloRegMod' => 0,
    'usuario_reg' => 0,
    'disableUsuario' => 0,
    'password1' => 0,
    'password2' => 0,
    'email' => 0,
    'botonRegMod' => 0,
    'erroresRegMod' => 0,
    'inforRegMod' => 0,
    'aviso' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5509d0c46d3a08_53303525',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5509d0c46d3a08_53303525')) {function content_5509d0c46d3a08_53303525($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate ("cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
<div class='contenedor_formulario'>
    <div class='formulario'>
        <form action='index.php' method='post'> 
            <span class='titulo_formulario'> <?php echo $_smarty_tpl->tpl_vars['tituloAcceso']->value;?>
 </span>
            <label for="usuario">* Usuario:</label>
            <input type="text" style="width: 120px;" name="usuario" value='<?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
' /><br>
            <label for="password">* Password:</label>
            <input type="password" style="width: 120px;"name="password" value='<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
' /><br>
            <div class='botonera'>
                <input type="submit" name="accion" value="Acceder" />
            </div>
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
            <div class='informacion'>
                <?php echo $_smarty_tpl->tpl_vars['inforAcceso']->value;?>

            </div>  
        </form>         
    </div>  
</div>
<br>
<center>
    <a class="<?php echo $_smarty_tpl->tpl_vars['class_eliminar']->value;?>
" href="aplicacion.php">Ir a la página de la aplicación</a>    
</center>
<br>
    <div class='formulario'>
        <form action='index.php' method='post'> 
            <span class='titulo_formulario'> <?php echo $_smarty_tpl->tpl_vars['tituloRegMod']->value;?>
 </span>
            <label for="usuario">* Usuario:</label>
            <input type="text" style="width: 120px;" name="usuario_reg" value='<?php echo $_smarty_tpl->tpl_vars['usuario_reg']->value;?>
' <?php echo $_smarty_tpl->tpl_vars['disableUsuario']->value;?>
/><br>
            <label for="password1">* Password:</label>
            <input type="password" style="width: 120px;"name="password1" value='<?php echo $_smarty_tpl->tpl_vars['password1']->value;?>
' /><br>
            <label for="password2">* Repita password:</label>
            <input type="password" style="width: 120px;"name="password2" value='<?php echo $_smarty_tpl->tpl_vars['password2']->value;?>
' /><br>
            <label for="email">* Email:</label>
            <input type="text" style="width: 120px;" name="email" value='<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
' /><br>
            <div class='botonera'>
                <input type="submit" name="accion" value="<?php echo $_smarty_tpl->tpl_vars['botonRegMod']->value;?>
" />
                <input type="submit" name="accion" value="Eliminar" class="<?php echo $_smarty_tpl->tpl_vars['class_eliminar']->value;?>
"/>
            </div>
            <div class='error'>
                <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['erroresRegMod']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
                    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<br />
                <?php } ?>
            </div>
            <div class='informacion'>
                <?php echo $_smarty_tpl->tpl_vars['inforRegMod']->value;?>

            </div>
             <div class='aviso'>
                <?php echo $_smarty_tpl->tpl_vars['aviso']->value;?>

            </div>  
        </form>         
    </div>  

<?php echo $_smarty_tpl->getSubTemplate ("pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
