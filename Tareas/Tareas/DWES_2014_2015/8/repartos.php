<?php
/**
 * Desarrollo Web en Entorno Servidor
 * Tema 8 : Aplicaciones web híbridas
 * Ejemplo Rutas de reparto: repartos.php
 */

session_start();

// Incluimos la API de Google
require_once 'include/google-api-php-client/src/Google_Client.php';
require_once 'include/google-api-php-client/src/contrib/Google_TasksService.php';
////////////////////////////////////////////////////////////////////////////////////
//
//  Insertado para el desarrollo de la tarea 8
//
require_once 'include/google-api-php-client/src/contrib/Google_CalendarService.php';
//
////////////////////////////////////////////////////////////////////////////////////

// y la librería Xajax
require_once "include/xajax/xajax_core/xajax.inc.php";

// Creamos el objeto xajax
$xajax = new xajax('ajaxmaps.php');

// Configuramos la ruta en que se encuentra la carpeta xajax_js
$xajax->configure('javascript URI', 'include/xajax/');

// Y registramos las funciones que vamos a llamar desde JavaScript
$xajax->register(XAJAX_FUNCTION, "obtenerCoordenadas");
$xajax->register(XAJAX_FUNCTION, "ordenarReparto");

// Creamos el objeto de la API de Google
$cliente = new Google_Client();

// Y lo configuramos con los nuestros identificadores

//////////////////////////////////////////////////////////////////////////////////////////////////
//
// Modificado para el desarrollo de la tarea 8 punto 1
//
// Originalmente:
//
//	$cliente->setClientId('Aquí tu id de Cliente');
//	$cliente->setClientSecret('Aquí tu número secreto de Cliente');
//	$cliente->setRedirectUri('Aquí tu URI de redireccionamiento');
//	$cliente->setDeveloperKey('Aquí tu clave de la API');
//
///////////////////////////////////////////////////////////////////////////////////////////////////
//
	$cliente->setClientId('416490637594-am1jq2vqrhdu3mja9qm9cqh8lf75q1es.apps.googleusercontent.com');
	$cliente->setClientSecret('I_7EORMRCAVnZb49CgSB3O1x');
	$cliente->setRedirectUri('http://localhost/Unidad8/repartos.php');
	$cliente->setDeveloperKey('AIzaSyAtu0fsGJUU6illtQFf67Po5I55CaFszwg');
//
// fin de modificaciones 
//
//////////////////////////////////////////////////////////////////////////////////////////////////

// Creamos también un objeto para manejar las listas y sus tareas
$apitareas = new Google_TasksService($cliente);

///////////////////////////////////////////////////////////////////////////////////////
//
//  Insertado para el desarrollo de la tarea 8 punto 3
//
$apicalendar = new Google_CalendarService($cliente);
//
//  fin de inserción
//
////////////////////////////////////////////////////////////////////////////////////////

// Comprobamos o solicitamos la autorización de acceso
if (isset($_SESSION['clave_acceso'])) {
	$cliente->setAccessToken($_SESSION['clave_acceso']);
} else {
	$cliente->setAccessToken($cliente->authenticate());
	$_SESSION['clave_acceso'] = $cliente->getAccessToken();
}

// Comprobamos si se debe ejecutar alguna acción
if (isset($_GET['accion'])) {
	switch ($_GET['accion']) {
		case 'nuevalista':
			if (!empty($_GET['nuevotitulo'])) {
				///////////////////////////////////////////////////////////////////////////////////
				//
				//  Modificado para la tarea 8, punto 3
				//
				//  Originalmente:
				//		    // Crear una nueva lista de reparto
	            //    try {
	            //        $nuevalista = new Google_TaskList();
	            //        $nuevalista->setTitle($_GET['nuevotitulo']);
	            //        $apitareas->tasklists->insert($nuevalista);
	            //    }
	            //    catch (Exception $e) {
	            //        $error="Se ha producido un error al intentar crear un nuevo reparto.";
	            //    }
				//
				//////////////////////////////////////////////////////////////////////////////////
				//
				// validar que el valor introducido es una fecha
				$valor = $_GET['nuevotitulo'];
				$partes = explode("/", $valor);
				if (count($partes) != 3 || !checkdate($partes[1], $partes[0], $partes[2])) {
					$error = "Debe introducir una fecha con el formato dd/mm/aaaa y ser una fecha válida";
				} else {
					$titulo = 'Reparto ' . $valor;
					// Crear una nueva lista de reparto y evento asociado
					try {
						// Crear nuevo evento en el calendario para la lista de reparto
						$event = new Google_Event();
						$event->setSummary('Reparto diario');
						$start = new Google_EventDateTime();
						$start->setDateTime($partes[2] . '-' . $partes[1] . '-' . $partes[0] . 'T09:00:00.000+02:00');
						$event->setStart($start);
						$end = new Google_EventDateTime();
						$end->setDateTime($partes[2] . '-' . $partes[1] . '-' . $partes[0] . 'T20:00:00.000+02:00');
						$event->setEnd($end);
						$createdEvent = $apicalendar->events->insert('primary', $event);
						// Crear la nueva lista
						$nuevalista = new Google_TaskList();
						$nuevalista->setTitle($titulo);
						$listaTareas = $apitareas->tasklists->insert($nuevalista);
						// Crear la primera tarea para guardar en ella el id del evento asociado a la lista de tareas
						$nuevatarea = new Google_Task();
						$nuevatarea->setNotes('id_evento:'.$createdEvent['id']);
						// marcamos la tarea como borrada y limpiamos la lista para que no aparezca en la lista
						$nuevatarea->setDeleted(true);
					    $apitareas->tasks->insert($listaTareas['id'], $nuevatarea);
					    $apitareas->tasks->clear($listaTareas['id']);			
					} catch (Exception $e) {
						$error = "Se ha producido un error al intentar crear un nuevo reparto.";
					}
				}
				//
				//	Fin de modificaciones para la tarea 8, punto 3
				//
				///////////////////////////////////////////////////////////////////////////////////////

			}
			break;
		case 'nuevatarea':
			if (!empty($_GET['nuevotitulo']) && !empty($_GET['idreparto']) && !empty($_GET['latitud']) && !empty($_GET['longitud'])) {
				// Crear una nueva tarea de envío
				try {
					$nuevatarea = new Google_Task();
					$nuevatarea->setTitle($_GET['nuevotitulo']);
					if (isset($_GET['direccion'])) {
						$nuevatarea->setTitle($_GET['nuevotitulo'] . " - " . $_GET['direccion']);
					} else {
						$nuevatarea->setTitle($_GET['nuevotitulo']);
					}

					$nuevatarea->setNotes($_GET['latitud'] . "," . $_GET['longitud']);
					// Añadimos la nueva tarea de envío a la lista de reparto
					$apitareas->tasks->insert($_GET['idreparto'], $nuevatarea);
				} catch (Exception $e) {
					$error = "Se ha producido un error al intentar crear un nuevo envío.";
				}
			}
			break;
		case 'borrarlista':
			if (!empty($_GET['reparto'])) {
				// Borrar una lista de reparto
				try {
					///////////////////////////////////////////////////////////////////////////////////
					//
					//  Insertado para la tarea 8, punto 3
					//
					///////////////////////////////////////////////////////////////////////////////////
					//
					//
					// recuperar primero el id del evento asociado
					$envios = $apitareas->tasks->listTasks($_GET['reparto'], array('showDeleted'=>true));
					foreach ($envios['items'] as $envio) {
						if(isset($envio['notes'])) {
							$partes = explode(":", $envio['notes']);
						// una vez encontrado el id del evento, borramos el evento y salimos del bucle
							if($partes[0]=='id_evento') {
								$apicalendar->events->delete('primary', $partes[1]);
								break;
							}	
						}								
					}
					/////////////////////////////////////////////////////////////////////////////////////
					//
					//	fin de inserciones
					//
					/////////////////////////////////////////////////////////////////////////////////////

					$apitareas->tasklists->delete($_GET['reparto']);
				} catch (Exception $e) {
					$error = "Se ha producido un error al intentar borrar el reparto.";
				}
			}
			break;
		case 'borrartarea':
			if (!empty($_GET['reparto']) && !empty($_GET['envio'])) {
				// Borrar una tarea de envío
				try {
					$apitareas->tasks->delete($_GET['reparto'], $_GET['envio']);
				} catch (Exception $e) {
					$error = "Se ha producido un error al intentar borrar el envío.";
				}
			}
			break;
		case 'ordenarEnvios':
			if (!empty($_GET['reparto']) && !empty($_GET['pos'])) {
				// Reordenar las tareas de envío según el orden que se recibe en el array 'pos'
				try {
					// Primero obtenemos todas las tareas de la lista de reparto
					$tareas = $apitareas->tasks->listTasks($_GET['reparto']);

					// Y después las movemos según la posición recibida en el array 'pos'
					// El array 'pos' indica la posición que debe tener cada tarea de la lista
					// $pos[0] = 3 significa que la 1ª tarea (la de índice 0)
					// debe ponerse en la 4ª posición (la de índice 3)
					//
					// Lo convertimos en el array 'orden' que contiene las tareas que debe haber
					//  en cada posición de la lista
					// $orden[3] = 0 significa que en la 4ª posición debemos poner la 1ª tarea
					$orden = array_flip($_GET['pos']);

					// Recorremos el array en orden inverso, esto es, empezando por la tarea
					//  que debería figurar en última posición de la lista
					// En cada paso ponemos una tarea en la primera posición de la lista
					for ($i = count($orden) - 1; $i >= 0; $i--) {
						$apitareas->tasks->move($_GET['reparto'], $tareas['items'][$orden[$i]]['id']);
					}

				} catch (Exception $e) {
					$error = "Se ha producido un error al intentar ordenar los envíos del reparto.";
				}
			}
			break;
	}
}

// Obtenemos el id de la lista de tareas por defecto, para no mostrarla
$listapordefecto = $apitareas->tasklists->get('@default');
$id_defecto = $listapordefecto['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Ejemplo Tema 8: Rutas de reparto</title>
    <link href="estilos.css" rel="stylesheet" type="text/css" />
    <?php
// Le indicamos a Xajax que incluya el código JavaScript necesario
$xajax->printJavascript();
?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="codigo.js"></script>
</head>

<body>
<div id="dialogo">
    <a id="cerrarDialogo" onclick="ocultarDialogo();">x</a>
    <h1>Datos del nuevo envío</h1>
	<form id="formenvio" name="formenvio" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
    	<fieldset>
        <div id="datosDireccion">
            <p>
                <label for='direccion' >Dirección:</label>
                <input type='text' size="60" name='direccion' id='direccion' />
            </p>
            <input type='button' id='obtenerCoordenadas' value='Obtener coordenadas' onclick="getCoordenadas();"/><br />
        </div>
        <div id="datosEnvio">
            <p>
                <label for='latitud' >Latitud:</label>
                <input type='text' size="10" name='latitud' id='latitud' />
            </p>
            <p>
                <label for='longitud' >Longitud:</label>
                <input type='text' size="10" name='longitud' id='longitud' />
            </p>
            <p>
                <label for='altitud' >Altitud:</label>
                <input type='text' size="10" name='altitud' id='altitud' />
            </p>
            <p>
                <label for='nuevotitulo' >Título:</label>
                <input type='text' size="40" name='nuevotitulo' id='titulo' />
            </p>
            <input type='hidden' name='accion' value='nuevatarea' />
            <input type='hidden' name='idreparto' id='idrepartoactual' />
            <input type='submit' id='nuevoEnvio' value='Crear nuevo Envío' />
            <a href="#" onclick="abrirMaps();">Ver en Google Maps</a><br />
        </div>
        </fieldset>
    	</form>
</div>
<div id="fondonegro" onclick="ocultarDialogo();"></div>
<div class="contenedor">
  <div class="encabezado">
    <h1>Ejemplo Tema 8: Rutas de reparto</h1>
    <form id="nuevoreparto" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
    <fieldset>
        <input type='hidden' name='accion' value='nuevalista' />
        <input type='submit' id='crearnuevotitulo' value='Crear Nueva Lista de Reparto' />
        <label for='nuevotitulo' >para la fecha (dd/mm/aaaa):</label>
        <input type='text' name='nuevotitulo' id='nuevotitulo' />
    </fieldset>
    </form>
  </div>
  <div class="contenido">
<?php
$repartos = $apitareas->tasklists->listTasklists();
// Para cada lista de reparto
foreach ($repartos['items'] as $reparto) {
	// Excluyendo la lista por defecto de Google Tasks
	if ($reparto['id'] == $id_defecto) {
		continue;
	}

	print '<div id="' . $reparto['id'] . '">';
	print '<span class="titulo">' . $reparto['title'] . '</span>';
	$idreparto = "'" . $reparto['id'] . "'";
	print '<span class="accion">(<a href="#" onclick="ordenarReparto(' . $idreparto . ');">Ordenar</a>)</span>';
	print '<span class="accion">(<a href="#" onclick="nuevoEnvio(' . $idreparto . ');">Nuevo Envío</a>)</span>';
	print '<span class="accion">(<a href="' . $_SERVER['PHP_SELF'] . '?accion=borrarlista&reparto=' . $reparto['id'] . '">Borrar</a>)</span>';
	print '<ul>';
	// Cogemos de la lista de reparto las tareas de envío
	/////////////////////////////////////////////////////////////////////////////////////
	//
	//	Modificado para la tarea 8, punto 3
	//  Originalmente: 
	//		$envios = $apitareas->tasks->listTasks($reparto['id']);
	//
	/////////////////////////////////////////////////////////////////////////////////////
	//
	$envios = $apitareas->tasks->listTasks($reparto['id'], array('showDeleted'=>false));
	//
	/////////////////////////////////////////////////////////////////////////////////////

	// Por si no hay tareas de envío en la lista
	if (!empty($envios['items'])) {
		foreach ($envios['items'] as $envio) {
			// Creamos un elemento para cada una de las tareas de envío que no hayan sido borradas
			$idenvio = "'" . $envio['id'] . "'";
			print '<li title="' . $envio['notes'] . '" id="' . $idenvio . '">' . $envio['title'] . ' (' . $envio['notes'] . ')';
			$coordenadas = "'" . $envio['notes'] . "'";
			print '<span class="accion">  (<a href="#" onclick="abrirMaps(' . $coordenadas . ');">Ver mapa</a>)</span>';
			print '<span class="accion">  (<a href="' . $_SERVER['PHP_SELF'] . '?accion=borrartarea&reparto=' . $reparto['id'] . '&envio=' . $envio['id'] . '">Borrar</a>)</span>';
			print '</li>';			
		}
	}

	print '</ul>';
	print '</div>';
}
?>
  </div>
  <div class="pie">
      <?php if (isset($error)) {
	print $error;
}
?>
  </div>
</div>
</body>
</html>
