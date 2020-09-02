<?php
/*****************************************************************************
Página de inicio de la aplicación. 
En primer lugar se instancia la clase Smarty para el uso de plantillas smarty
para la implementación de las vista a mostrar al usuario. Seguidamente se
ajustan las variables que serán utilizadas por las vistas, y cuyo valores 
dependerán de si previamente se había autenticado o no un usuario. Finalmente,
se decide la acción a realizar y la vista a mostrar en función del botón pulsado
por el usuario en la vista anteriory  que nos llega por $_POST['accion'] siendo 
asignada a la variable $accion dentro de define_variables.inc
*******************************************************************************/

require_once "funciones.inc";
include_once "define_variables.inc";
require('/smarty/lib/Smarty.class.php');

// instanciamos y configuramos smarty
$smarty = new Smarty;
$smarty_dir = dirname(__FILE__).DIRECTORY_SEPARATOR .'smarty/tpl'.DIRECTORY_SEPARATOR;
$smarty->template_dir = $smarty_dir.'templates';
$smarty->compile_dir = $smarty_dir.'templates_c';


// Si el usuario ya se autentificó
if(autenticado()) {
	// Datos para mostrar en los formularios
	$class_eliminar="visible";
	$tituloRegMod = "Modificar o eliminar usuario";
	$tituloAcceso = "Acceder con otro usuario";
	$botonRegMod="Modificar";
	$disableUsuario="disabled";
	$usuario_reg = $_SESSION['usuario']->usuario;
	$inforRegMod = 'Rellene solo los campos que desee modificar<br>'.
	               'Email registrado :'.$_SESSION['usuario']->email;
	$horaConexion = $_SESSION['hora_conexion'];
// si el usuario todavía no se autentificó	
} else {
	// Datos para mostrar en los formularios
	$class_eliminar="oculto";
	$tituloRegMod = "Registrarse";
	$tituloAcceso = "Acceder";
	$botonRegMod="Registrar";
	$disableUsuario="";
	$inforRegMod="Los campos marcados con * son obligatorios";
	$usuAut = false;
	$horaConexion = false;
}

// pasamos las variables para la cabecera
$smarty->assign("strUsuarioConexion", $strUsuarioConexion);
$smarty->assign("strDesconectar", $strDesconectar);
$smarty->assign("strHoraConexion", $strHoraConexion);
// pasamos el resto de variables a la vista, que podremos
// volver a reasignar según la acción recibida de la
// última vista que se mostró.
$smarty->assign("usuario", $usuario);
$smarty->assign("password", $password);
$smarty->assign("usuario_reg", $usuario_reg);
$smarty->assign("password1", $password1);
$smarty->assign("password2", $password2);
$smarty->assign("email", $email);
$smarty->assign("erroresRegMod", $erroresRegMod);
$smarty->assign("errores", $errores);
$smarty->assign("inforRegMod", $inforRegMod);
$smarty->assign("inforAcceso", 'Los campos marcados con * son obligatorios');
$smarty->assign("aviso", $aviso);
$smarty->assign("class_eliminar", $class_eliminar);
$smarty->assign("tituloRegMod", $tituloRegMod);
$smarty->assign("tituloAcceso", $tituloAcceso);
$smarty->assign("botonRegMod", $botonRegMod);
$smarty->assign("disableUsuario", $disableUsuario);

//
// actuaremos en función del botón pulsado por el usuario en el formulario
// anterior (o bien si la página fue llamada por get)
// 
switch ($accion) {
	// se ha llamado a la página por método get
	case '':
	// se ha llamada a la página pulsando el botón cancelar en la vista
	// de confirmación de borrado.
	case 'Cancelar':
	// se ha llamdo a la página desde la vista de usuario borrado.
	case 'Ir a página de inicio':	
		// mostramos la vista con los valores por defecto
		$smarty->display("index.tpl");
		break;

	case 'Acceder':
		// validamos los campos del formulario de acceso
		$campos = array(
			'usuario' 	=>	$usuario,
			'password'	=>	$password
			);
		$errores = validarFormLogin($campos);
		// si los campos del formulario son válidos		
		if($errores==null) {
			// validamos el usuario y contraseña introducidos
			$usu = Usuario::registrado($usuario, $password);
			// usuario no válido, volvemos a mostrar el index con el error
			if (is_null($usu)) {
				$errores = array("Usuario o contraseña no válidos");
			    $smarty->assign("errores", $errores);  
				$smarty->display("index.tpl"); 
				break;
			// usuario logado correctmente, guardamos datos de conexión
			// y vamos a la página aplicacion.php	
			} else {
				$_SESSION['usuario']=$usu;
				$_SESSION['hora_conexion'] = date("H:i:s");
				header("Location: aplicacion.php");
			}			
		}
		// si los campos del formulario no son correctos
		// pasamos a la vista los errores encontrados
		$smarty->assign("errores", $errores);
		$smarty->display("index.tpl");
		break;

	case 'Registrar':
		// validamos los campos del formulario de registro/modificación-borrado
		$campos = array(
			'usuario' 	=>	$usuario_reg,
			'password1'	=>	$password1,
			'password2'	=>	$password2,
			'email'		=>	$email
			);
		$erroresRegMod = validarFormReg($campos);
		// si los campos del formulario son válidos		
		if($erroresRegMod==null) {
			// creamos el usuario con los datos introducidos
			$usu = new Usuario(array(
				'usuario'	=> $usuario_reg,
				'pwd'		=> password_hash($password1, PASSWORD_DEFAULT),
				'email'		=> $email
				));
			$todoOK = $usu->create();
			// el usuario se ha creado correctamente, guardamos datos de conexión
			// y vamos a la página aplicacion.php
			if ($todoOK) {
				$_SESSION['usuario']=$usu;
				$_SESSION['hora_conexion'] = date("H:i:s");
				header("Location: aplicacion.php");	
			// si no se pudo crear, recuperamos los errores producidos					
			} else {
				if($usu->errores=='registro duplicado') {
					$erroresRegMod = array('Ya existe un usuario registrado con ese nombre');
				} else {
					$erroresRegMod = array($usu->errores);
				}			
			}
		}
		// pasamos a la vista los errores encontrados y mostramos la vista
		$smarty->assign("erroresRegMod", $erroresRegMod);  
		$smarty->display("index.tpl");
		break;

	case 'Modificar':
		// si no hay nada que modificar
		if($email=='' && $password1=='' && $password2=='') {
			$aviso = "No se modificó ningún dato.";
			$smarty->assign('aviso', $aviso);
			$smarty->display('index.tpl');
			break;
		}
		// Si hay algo que modificar
		// validamos los campos del formulario
		$campos = array(
			'usuario' 	=>	$usuario_reg,
			'password1'	=>	$password1,
			'password2'	=>	$password2,
			'email'		=>	$email
			);
		$erroresRegMod = validarFormMod($campos);
		// si los campos del formulario son válidos		
		if($erroresRegMod==null) {
			// modificamos el usuario con los datos introducidos
			$usuario = $_SESSION['usuario'];
			if($password1!='') {
				$usuario->pwd = password_hash($password1, PASSWORD_DEFAULT);
			}
			if($email!='') {
				$usuario->email = $email;
			}
			$usuario->update();	
			$todoOK = $usuario->update();
			// el usuario se ha modificado correctamente
			if ($todoOK) {
				$_SESSION['usuario']=$usuario;
				$inforRegMod = 'Rellene solo los campos que desee modificar<br>'.
	                           'email registrado: '.$_SESSION['usuario']->email;
				$aviso ='Usuario modificado correctamente';	

			// si el usuario no se pudo crear, pasar los errores encontrados	
			} else {
				$erroresRegMod = array($usuario->errores);
			}		
		} 
		// Mostrar formulario con los errores encontrados.
		$smarty->assign('erroresRegMod', $erroresRegMod);
		$smarty->assign('inforRegMod', $inforRegMod);
		$smarty->assign('aviso', $aviso);
		$smarty->display('index.tpl');
		break;

	// se ha llamado a la página pulsando sobre el botón de eliminar usuario
	case 'Eliminar':
		// mostrar formulario de confirmación de borrado
		$smarty->assign("strDesconectar", "&nbsp;");
		$smarty->assign('nomUsuario', $_SESSION['usuario']->usuario);
		$smarty->assign('email', $_SESSION['usuario']->email);
		$smarty->display('confirmar_del.tpl');
		break;

	// se ha llamado a la página desde la vista de confirmación de borrado
	case 'Aceptar':
		// borrar el usuario
		$usuario = $_SESSION['usuario'];
		$todoOK = $usuario->delete();
		// el usuario se ha borrado correctamente
		if ($todoOK) {
			$msg ='Usuario eliminado correctamente';
			// eliminamos datos de sesion
			session_unset();
			$_SESSION = array();
			// quitamos información de conexión en la cabecera
			$smarty->assign('strUsuarioConexion', "&nbsp;");
			$smarty->assign('strHoraConexion', "&nbsp;");
			$smarty->assign('strDesconectar', "&nbsp;");
		// si el usuario no se pudo borrar, pasar los errores encontrados	
		} else {
			$msg = 'El usuario no pudo ser borrado';
			$errores = array($usu->errores);
		}
		// mostrar el resultado de la operación.
		$smarty->assign('msg', $msg);
		$smarty->display('msg.tpl');
		break;
		
	default:
		break;
}


?>