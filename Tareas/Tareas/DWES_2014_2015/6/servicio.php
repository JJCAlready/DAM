<?php
        // Incluir la funcion
        require_once('funciones.php');

        // Crear servidor de Soap
        $server = new SoapServer(null, array('uri' => ''));
 
        // Adicionar las funciones
        $server->setClass('Funciones');
 
        // Atender las llamados al webservice
        $server->handle();
?>      