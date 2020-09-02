<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-17 21:04:41
         compiled from "C:\xampp\htdocs\tarea5_es\smarty_tpl\templates\cabecera.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27763550888d98c76d6-09901157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbbf4e2953e6aa89d8131ab0eeb4e0b4b35e34c8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tarea5_es\\smarty_tpl\\templates\\cabecera.tpl',
      1 => 1425974675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27763550888d98c76d6-09901157',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'strUsuarioConexion' => 0,
    'strHoraConexion' => 0,
    'strDesconectar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_550888d9957f72_29350409',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550888d9957f72_29350409')) {function content_550888d9957f72_29350409($_smarty_tpl) {?><!-- *****************************************************************************
Esta caberera será incluida en todas las páginas de la aplicación, ya que 
incluye el código html común a todas ellas.
Muestra una cabecera con el logo de la aplicación y, en el caso de que se
haya autenticado un usuario, la información de los datos de conexión (usuario, 
y hora de conexión).
En esta página se realiza la configuración del color de fondo, que dependerá
de si se ha autentificado o no un usuario.
***************************************************************************** -->
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
