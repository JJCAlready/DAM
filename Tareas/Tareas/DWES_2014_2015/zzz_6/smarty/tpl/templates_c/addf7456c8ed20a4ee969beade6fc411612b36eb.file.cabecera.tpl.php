<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-18 19:49:44
         compiled from "C:\Users\Fernampa\Dropbox\tarea5_es\smarty\tpl\templates\cabecera.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1873455088ebf0ed108-74403567%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'addf7456c8ed20a4ee969beade6fc411612b36eb' => 
    array (
      0 => 'C:\\Users\\Fernampa\\Dropbox\\tarea5_es\\smarty\\tpl\\templates\\cabecera.tpl',
      1 => 1426704577,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1873455088ebf0ed108-74403567',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55088ebf104804_08219896',
  'variables' => 
  array (
    'strUsuarioConexion' => 0,
    'strHoraConexion' => 0,
    'strDesconectar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55088ebf104804_08219896')) {function content_55088ebf104804_08219896($_smarty_tpl) {?>

<!DOCTYPE html>
<html lang="es-Es">
    <head>
        <meta charset="utf-8">         
        <title>Tarea 5 - DWES</title>
        <link rel="stylesheet" href="estilos.css">        
    </head>
	<body>
		<header>
			<div id='datos_conexion'>
			<h1>Tarea 5 - DWES</h1>
			<h4>Fernando Arnedo Ayensa</h4>
				<p>&nbsp;</p>
				<p><?php echo $_smarty_tpl->tpl_vars['strUsuarioConexion']->value;?>
</p>
				<p>&nbsp;</p>
				<p><?php echo $_smarty_tpl->tpl_vars['strHoraConexion']->value;?>
</p>
				<p>&nbsp;</p>
				<p>
					<form id='form_desconectar' action='desconectar.php' method='post'>
						<?php echo $_smarty_tpl->tpl_vars['strDesconectar']->value;?>

					</form>
				</p>
			</div>
		</header><?php }} ?>
