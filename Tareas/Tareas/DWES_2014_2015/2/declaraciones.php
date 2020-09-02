<?php
	/*************************************************************************
		Definimos las constantes que representarán a cada uno de los posibles
		errores que pueden encontrarse al interactuar con la página.
		Cada una de las constantes ha de ser un potencia de 2 única, de forma
		que se puedan realizar una suma de varios errores que posteriormete 
		puedan extraerse uno a uno.

	*************************************************************************/
	define ('ERROR_NULL',      0);
	define ('ERROR_NO_REG',    1);
	define ('ERROR_DEL_LV',    2);		
	define ('ERROR_MOD_LV',    4);
	define ('ERROR_NOM_VACIO', 8);
	define ('ERROR_CTD_NEG',   16);
	define ('ERROR_PRC_NEG',   32);
	define ('ERROR_CTD_NAN',   64);
	define ('ERROR_PRC_NAN',   128);
	define ('ERROR_DEL_REG',    256);
	define ('MSG_BORRADO',     512);



	/*************************************************************************
		Declaramos el array de textos con cada uno de los posibles errores que
		pueden encontrarse al interactuar con la página.
		
	*************************************************************************/
	$strError = array(
		ERROR_NULL		 => '',
		ERROR_NO_REG 	 =>	'No se ha seleccionado ningún registro',
		ERROR_DEL_LV	 =>	'Imposible borrar, la lista de la compra está vacia',
		ERROR_MOD_LV	 =>	'Imposible modificar, la lista de la compra está vacia',
		ERROR_NOM_VACIO	 =>	'El campo nombre es obligatorio',
		ERROR_CTD_NEG	 =>	'El campo cantidad no puede ser negativo',
		ERROR_PRC_NEG	 =>	'El campo precio no puede ser negativo',
		ERROR_CTD_NAN	 =>	'El campo cantidad debe ser numérico',
		ERROR_PRC_NAN	 =>	'El campo precio debe ser numérico',
		ERROR_DEL_REG	 =>	'El registro no pudo ser borrado',
		// aunque no se trate realmente de un error, lo incluimos aquí por simplicidad
		MSG_BORRADO	     =>	'Se ha borrado correctamente la compra',

		);



	/*************************************************************************
		Declaramos un array cuyas claves representan a cada uno de los elementos
		que deseamos mostrar u ocultar. Cada clave se debe corresponder con el
		nombre dado al archivo que contiene el elemento a mostrar.
		Inicializamos los valores a false para cada uno de los elementos, 
		excepto el menú, que por indicaciones leidas en el foro de la tarea
		deberá estar presente en todo momento.
		
	*************************************************************************/
	$mostrar = array(
		'form_confirmar_borrado'	=>	false,
		'form_compra'	            =>	false,
		'menu'			            =>	true,
		'error'			            =>	false,

		);

?>