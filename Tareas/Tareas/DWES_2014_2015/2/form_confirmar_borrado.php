<?php
	/**************************************************************************
		Muestra un formulario informando al usuario de que un item de la compra
		ha sido borrado, mediante un mensaje concreto y una tabla con los datos
		del	item borrado.

	**************************************************************************/
?>
<div class='formulario'>
	<span class='titulo_formulario'>&nbsp;&nbsp;&nbsp;&nbsp;Borrado de producto</span><br>
	<?php echo $strError[MSG_BORRADO].':' ?> :
	</br></br>
	<table>
		<th>Nombre</th>
		<th>Cantidad</th>
		<th>Precio</th>
		<tr>
			<td><?php echo $regDel[0]['nombre'] ?></td>
			<td><?php echo $regDel[0]['cantidad'] ?></td>
			<td><?php echo $regDel[0]['precio'] ?></td>
		</tr>
	</table>
	<br/><br/>
	<input type="submit" name="accion" value="Aceptar" />		
</div>	


