<?php
/**
 * Página principal y única que se muestra en la tarea 7
 */
require_once('funciones.php');
// registramos la librería jQuery4PHP
include_once 'include/YepSua/Labs/RIA/jQuery4PHP/YsJQueryAutoloader.php';
YsJQueryAutoloader::register();
?>

<!DOCTYPE html>
<html lang="es-Es">
    <head>
        <meta charset="utf-8">         
        <title>Tarea 7 - DWES</title>
        <script type="text/javascript" src="include/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="include/js/tarea7_dwes.js"></script>
        <link rel="stylesheet" href="resources/css/estilos.css">        
    </head>
	<body>
		<header>
			<h1>Tarea 7 - DWES</h1>
			<h4>Fernando Arnedo Ayensa</h4>
		</header>
		<div class='contenido'>
			<div class='centrado'>
				<p><strong>Gestión de comerciales</strong></p>
				<?php 
					// la imagen  de nuevo comercial se ocultará o mostrará según las acciones del usuario
					// sobre la página
				?>
				<img id='nuevo_comercial' src='resources/images/new.png' title='Ingresar nuevo comercial' />
				<table id='tabla_listado'>		
					<?php 
						// al cargar la página cargamos todos los comerciales. Esta información se ocultará
						// o mostrará según las acciones del usuario sobre la página
						echo htmlListadoComerciales();
					?>
				</table>

				<div id='formComercial' class='contenedor_formulario'>
					<div class='formulario'>
						<form id='form'>	
							<div >
								<span class='titulo_formulario'></span><br>					
								<label for="codigo">* Codigo:</label>
								<input type="text" style="width: 60px;" name="codigo" id="codigo"  value="" /><br>
								<label for="nombre">* Nombre:</label>
								<input type="text" style="width: 180px;"name="nombre" id="nombre"  value="" /><br>
								<label for="salario">* Salario:</label> 
								<input type="text" style="width: 90px;" name="salario" id="salario" value="" /><br>		
								<label for="hijos">* Hijos:</label> 	
								<input type="text" style="width: 60px;" name="hijos" id="hijos"  value="" /><br>
								<label for="fnacimiento">* Fecha nacimiento:</label> 	
								<input type="text" style="width: 130px;" name="fNacimiento"   id="fNacimiento" value="" /><br>
								<input type="hidden" id="codigoAnterior" name="codigoAnterior" value="" />
								<input type="hidden" id="operacion" name="operacion" value="" />								
							</div>							
							<div class='botonera'>
								<input type="button" id="aceptar" value="" />
								<input type="button" id="cancelar" value="Cancelar" />
							</div>
						</form>
						
						<div id='erroresForm' class='error'>							
						</div>	

					</div>	
				</div>
			</div>			
		</div>
	</body>
	<?php 
		// manejo de la pulsación sobre el botón aceptar del formulario, cuyo texto
		// mostrado variará en función de la operación para la que es mostrado el formulario
		echo YsJQuery::newInstance()
			 ->onClick()
			 ->in('#aceptar')
			 ->execute(
			 	// Realizaremos una llamada por post a la página de procesamiento, pasándole
			 	// la información de cada uno de los elementos del formulario.
			 	YsJQuery::post(
			      'ajaxResponse.php',
			      YsJQuery::serialize()->in('form'),
			      // Cuando recibamos la respuesta de la página, mostraremos los 
			      // errores en el formulario o la tabla, en función de la respuesta
			      // recibida
			      new YsJsFunction('procesarRespuestaAjax(respuesta)', 	'respuesta'	),
			      // recibiremos la respuesta en formato JSON
			      YsJQueryConstant::DATA_TYPE_JSON
			      )
              );
		// manejo de la pulsación sobre el botón cancelar del formulario
		echo YsJQuery::newInstance()
			 ->onClick()
			 ->in('#cancelar')
			 ->execute(
			 	// borraremos los posibles errores mostrados en el formulario
			 	YsJQuery::html()
		  	 	->in('#erroresForm')
                ->key(''),
                // mostraremos de nuevo la tabla de comerciales
			 	YsJQuery::show()
				->in('#tabla_listado')
				->duration(null),
				// y la imagen para insertar nuevo comercial
				YsJQuery::show()
				->in('#nuevo_comercial')
				->duration(null),
				// y ocultamos el formulario			        
				YsJQuery::hide()
				->in('#formComercial')
				->duration(null)
               );
		// manejo de la pulsación sobre la imagen de insertar nuevo comercial			 
		echo YsJQuery::newInstance()
		  	 ->onClick()
		  	 ->in('#nuevo_comercial')
		  	 ->execute(
		  	 	// limpiamos todas las entradas del formulario
		  	 	YsJQuery::val()
		  	 	->in('#form input[type="text"]')
                ->key(''),
                // habilitamos todas las entradas del formulario que podrían haber
                // sido deshabilitadass al mostrar el formulario para eliminación 
                YsJQuery::removeAttr()
                ->in('#form input[type="text"]')
	            ->attributeName('disabled'),
	            // asignamos valores a los elementos configurables para la operación
	            // de inserción de comercial
	            YsJQuery::val()
		  	 	->in('#codigoAnterior')
                ->key(''),

                YsJQuery::val()
		  	 	->in('#operacion')
                ->key(OP_INSERTAR),

                YsJQuery::val()
				->in('#aceptar')
                ->key('Guardar'),

                YsJQuery::html()
				->in('.titulo_formulario')
                ->key("Crear comercial"),
                // mostramos el formulario
				YsJQuery::show()
				->in('#formComercial')
				->duration(null),
				// y ocultamos tanto la tabla de comerciales como la imagen para insertar nuevo comercial			        
				YsJQuery::hide()
				->in('#tabla_listado')
				->duration(null),

				YsJQuery::hide()
				->in('#nuevo_comercial')
				->duration(null)

				);	
		
	
	 ?>
</html>