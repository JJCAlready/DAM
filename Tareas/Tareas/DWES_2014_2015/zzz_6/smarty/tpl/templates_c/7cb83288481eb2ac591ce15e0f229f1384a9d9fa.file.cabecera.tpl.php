<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-10 09:04:38
         compiled from ".\templates\cabecera.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1021154fea3c001a707-22140415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cb83288481eb2ac591ce15e0f229f1384a9d9fa' => 
    array (
      0 => '.\\templates\\cabecera.tpl',
      1 => 1425974675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1021154fea3c001a707-22140415',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54fea3c0057799_01290830',
  'variables' => 
  array (
    'strUsuarioConexion' => 0,
    'strHoraConexion' => 0,
    'strDesconectar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fea3c0057799_01290830')) {function content_54fea3c0057799_01290830($_smarty_tpl) {?><!-- *****************************************************************************
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
