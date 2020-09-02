<?php
/*
 *
 *
 *
 *
 *
     Este archivo nos servirá para ver si se produce algún error indeseable en las llamadas al servidor
 *
 *
 *
 *
*/
require_once('funciones.php');
$funciones = new Funciones();
var_dump($funciones->getComerciales());
var_dump($funciones->getProductos());
var_dump($funciones->getConsultaVentasComercial('111'));
var_dump($funciones->getConsultaVentasProducto('PC0001'));
?>