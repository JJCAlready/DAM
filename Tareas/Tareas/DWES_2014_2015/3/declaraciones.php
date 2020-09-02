<?php
	/*************************************************************************
		Definimos las constantes que representarán a cada uno de los posibles
		errores devueltos al interactuar con la base de datos.
	*************************************************************************/
	define ('ERROR_NULL',      0);
	define ('ERROR_NO_REG',    'No existe el registro');
	define ('ERROR_REG_DUP',   'Ya existe un registro');



	/*************************************************************************
		Declaramos un array cuyas claves representan a cada uno de los elementos
		que deseamos mostrar u ocultar. Cada clave se debe corresponder con el
		nombre dado al archivo que contiene el elemento a mostrar.
		Inicializamos los valores a false para cada uno de los elementos
	*************************************************************************/
	$mostrar = array(
		'form_comercial'		 =>	false,
		'form_producto' 		 =>	false,
		'form_venta'    		 =>	false,
		'listado'       		 =>	false,
		'form_mensaje'			 => false,
		'form_select'			 =>	false,
		'form_select_ventas_1'	 =>	false,
		'form_select_ventas_2'	 =>	false,
		'form_select_ventas_3'	 =>	false,
		'form_select_ventas_4'	 =>	false,
		);

	$errores=array();

	
	/*************************************************************************
		Declaramos las diferentes variables a utilizar en la aplicación
	*************************************************************************/
	$post=false;
	$get=false;
	$accion="";
	$tabla="";
	$codigo="";
	$nombre="";
	$salario="";
	$hijos="";
	$fNacimiento="";
	$referencia="";
	$descripcion="";
	$precio="";
	$descuento="";
	$disableClave="";
	$codComercial="";
	$refProducto="";
	$cantidad="";
	$fecha="";
	$codigoAnterior="";
	$referenciaAnterior="";
	$codComercialAnterior="";
	$refProductoAnterior="";
	$fechaAnterior=""; 
		

?>