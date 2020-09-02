/**
 *  Rellena los elementos del formulario con los valores contenidos
 *  en la fila de la tabla de comerciales cuyo id coincide con el
 *  valor del parámetro cod
 */
function rellenaForm(cod) {
	// asignamos a cada elemento del formulario el valor
	// de la columna que en la que se encuentra cada campo
	// del comercial
	$("#"+cod+" td").each(function(indice){
 		switch (indice) {
 			case 0:
 				$("#codigo").val($(this).text());//
 				$("#codigoAnterior").val($(this).text());
 				break;
 			case 1:
 				$("#nombre").val($(this).text());
 				break;
 			case 2:
 				$("#salario").val($(this).text());
 				break;
 			case 3:
 				$("#hijos").val($(this).text());
 				break;
 			case 4:
 				$("#fNacimiento").val($(this).text());
 				break;
 			default:
 				break;
 		}
    })
}

/**
 * Muestra los errores recibidos de la pàgina ajaxResponse.php o,
 * si todo fue correcto, actualiza el contenido de la tabla de
 * comerciales, oculta el formulario y muestra el mensaje informativo 
 * del resultado antes de volver a mostrar la tabla y la imagen de
 * insertar nuevo comercial.
 */
function procesarRespuestaAjax(respuesta) {
	if(respuesta.errores) {
		$("#erroresForm").html(respuesta.errores);
	} else if(respuesta.datos) {
		$("#erroresForm").html('');
		$("#formComercial").hide();
		$("#tabla_listado").html(respuesta.datos);
		alert(respuesta.mensaje);
		$("#tabla_listado").show();
		$("#nuevo_comercial").show();
	} else {
		alert("respuesta inesperada" + respuesta);
	}
}