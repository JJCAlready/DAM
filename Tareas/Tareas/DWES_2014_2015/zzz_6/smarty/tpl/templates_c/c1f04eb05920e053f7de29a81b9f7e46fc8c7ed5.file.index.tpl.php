<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-10 08:55:07
         compiled from ".\smarty_tpl\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194954fea35bada099-95506697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1f04eb05920e053f7de29a81b9f7e46fc8c7ed5' => 
    array (
      0 => '.\\smarty_tpl\\templates\\index.tpl',
      1 => 1425973954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194954fea35bada099-95506697',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54fea35bb17124_96122892',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fea35bb17124_96122892')) {function content_54fea35bb17124_96122892($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
<div class='contenedor_formulario'>
    <?php echo '<?php'; ?>
 echo $textoIdentificar <?php echo '?>'; ?>
<br><br>
    <div class='formulario'>
        <form action='index.php' method='post'> 
            <span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Login </span>
            <label for="usuario">* Usuario:</label>
            <input type="text" style="width: 180px;" name="usuario" value="<?php echo '<?php'; ?>
 echo $usuario <?php echo '?>'; ?>
" /><br>
            <label for="password">* Password:</label>
            <input type="password" style="width: 180px;"name="password" value="<?php echo '<?php'; ?>
 echo $password <?php echo '?>'; ?>
" /><br>
            <br>
            <div class='botonera'>
                <input type="submit" name="accion" value="Conectar" />
                <input type="submit" name="accion" value="Cancelar" />
            </div>
            <div class='error'>
                <?php echo '<?php'; ?>

                    //Mostrar errores
                    if ($errores!="") {
                        echo $errores;
                    }
                    
                <?php echo '?>'; ?>

            </div>  
        </form>         
    </div>  
</div>
<div class="<?php echo '<?php'; ?>
 echo $visible <?php echo '?>'; ?>
">
    <div class='contenedor_formulario'>
    O también puede:<br><br>
        <div class='formulario'>
                <form action='index.php' method='post'>
                    <span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Entrar como invitado </span>    
                    <div class='botonera'>
                        <input type="submit" name="accion" value="Entrar" />
                        <br><br><br>
                    </div>
                </form>         
        </div>  
    </div>
</div>  

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
