<?php
/******************************************************************************
	Muestra un formulario con un texto informativo, advertencia, o error .
*******************************************************************************/
?>
<div class='contenedor_formulario'>
	<div class='formulario'>		
		<div class="<?php echo $classMsg; ?>">
		<?php			
			echo "<br>$mensaje<br>";
		?>
		<br/>
		</div>		
	</div>	
</div>
	