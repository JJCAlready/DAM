{*****************************************************************************
   Vista de confirmación de desconexión. 
   Muestra un formulario solicitando confirmación para realizar la desconexión
   del usuario autenticado. 
******************************************************************************}


{include file="cabecera.tpl"}
    
<div class='contenedor_formulario'>
	<br><br>
	<div class='formulario'>
		<form action='desconectar.php' method='post'>	
			<span class='titulo_formulario'>Confirmar desconexión </span>
			¿Seguro quiere desconectar?
			<br><br>
			<div class='botonera'>
				<input type="submit" name="accion" value="Aceptar" />
				<input type="submit" name="accion" value="Cancelar" />
				<input type="hidden" name="pagina" value="{$pagina}" />
			</div>
			<br><br>
		</form>			
	</div>	
</div>	

{include file="pie.tpl"}
