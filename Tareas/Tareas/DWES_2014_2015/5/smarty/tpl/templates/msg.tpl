{*******************************************************************************
    Vista para mostrar el resultado de la acción de eliminar usuario y un botón
 	para ir a la página de inicio.
 	Si el resultado de la operación ha devuelto algún error estos se motrarán
 	debajo del mensaje.
*******************************************************************************}


{include file="cabecera.tpl"}
    
<div class='contenedor_formulario'>
	<br><br>
	<div class='formulario'>
		<form action='index.php' method='post'>	
			<span class='titulo_formulario'>Eliminación de usuario</span>
			{$msg}<br>
			<div class='error'>
                {foreach from=$errores item=error}
                    {$error}<br />
                {/foreach} 
            </div>
			<br>
			<div class='botonera'>
				<input type="submit" style='width:180px' name="accion" value="Ir a página de inicio" />
			</div>
			<br><br>
		</form>			
	</div>	
</div>	

{include file="pie.tpl"}
