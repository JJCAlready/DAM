<!DOCTYPE html>
<html lang="es-Es">
    <head>
        <meta charset="utf-8">
        <title>Examen - DWES</title>
        <script type="text/javascript" src="include/js/jquery-1.11.2.min.js"></script>
    </head>
	<body>
		<form action="">
			<input type="checkbox" name="aceptar" id='aceptar' value="">Politica de privacidad<br>

		</form>
		<div id='div1'>
		</div>

		<!--script type="text/javascript">
			$("#aceptar").click(function(){
				var strURL = document.getElementById('aceptar').checked ? 'aceptado.php' : 'noaceptado.php'

			    $.ajax({
			    	url: strURL,
			    	beforeSend: function () {
			    		alert('Voy a buscar el valor llamando por ajax a la página '+strURL);
			    		// podemos retornar false si queremos cancelar el request
			    		// return false;
			    	},
			    	success: function(result){
				        $("#div1").html(result);
				    }
			    });
			    //
			    // Si no vamos a realizar ninguna comprobación podemos utilizar simplemente:
			    //
				//$("#div1").load(strURL);
			});

		</script-->

	</body>
</html>

<?php
// registramos la librería jQuery4PHP
include_once 'include/YepSua/Labs/RIA/jQuery4PHP/YsJQueryAutoloader.php';
YsJQueryAutoloader::register();
/*
echo
YsJQuery::newInstance()
->onClick()
->in('#aceptar')
->execute(
"if(this.checked) " .
YsJQuery::load('aceptado.php')->in('#div1') .
"; else " .
YsJQuery::load('noaceptado.php')->in('#div1') .
";"
);
 */
/*
echo
YsJQuery::newInstance()
->onClick()
->in('#aceptar')
->execute(
"var url = this.checked ? 'aceptado.php' : 'noaceptado.php';
$('#div1').load(url);"
);
 */

echo
YsJQuery::newInstance()
	->onClick()
	->in('#aceptar')
	->execute(
		YsJQuery::load('aceptado.php')->in('#div1')
		                              ->condition(YsJQuery::is(':checked')->in('#aceptar'), YsJQuery::load('noaceptado.php')->in('#div1'))
	);

?>