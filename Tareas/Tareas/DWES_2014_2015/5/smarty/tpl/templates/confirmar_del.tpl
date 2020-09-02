{******************************************************************************
   Vista de confirmación de borrado. 
   Muestra un formulario solicitando confirmación para realizar la eliminación
   del usuario autenticado. 
******************************************************************************}

{include file="cabecera.tpl"}
    
<div class='contenedor_formulario'>
	<br><br>
	<div class='formulario'>
		<form action='index.php' method='post'>	
			<span class='titulo_formulario'>Confirmar eliminación </span>
			¿Seguro quiere eliminar el usuario?<br>
			<div class='informacion' style='text-align: left; padding:15px 10px 10px 50px;'>
				Usuario: {$nomUsuario}<br>
				Email: {$email}
			</div>
			<div class='botonera'>
				<input type="submit" name="accion" value="Aceptar" />
				<input type="submit" name="accion" value="Cancelar" />
			</div>
			<br><br>
		</form>			
	</div>	
</div>	

{include file="pie.tpl"}
