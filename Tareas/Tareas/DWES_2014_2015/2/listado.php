<?php
	/**************************************************************************
		Muestra una tabla que contiene todos y cada uno de los items del 
		carro de la compra con una columna de radio buttons que permitan
		la selección de uno y solo uno de los items, con el fin de poder
		ser eliminado o modificado. Asimismo, la tabla tiene una columna 
		con el valor total de cada uno de los items, y una fila final 
		con el valor total de la compra.
		El cálculo de los totales se realiza mediante la llamada a las
		funciones requeridas en el enunciado de la tarea.

	**************************************************************************/
?>
<div  id='contenedor_listado'>
		<?php
		// Si no hay nada que mostrar se debe avisar al usuario.
		if (empty($registros)) {
			echo "<div class='listado centrado'>";
			echo "El carro de la compra está vacio";
			echo "<input type='hidden' name='indice_listado' value='-1'>";
		// si hay registros, los mostramos	
		} else {
			echo "<div class='listado'>";			
			echo "<table>";
			// columna para el radio button de selección. Mejor ocultamos los bordes.
			echo "<th style='border: 0px;'></th>";
			echo "<th>Nombre</th>";
			echo "<th>Cantidad</th>";
			echo "<th>Precio</th>";
			echo "<th>Total</th>";
			// esta columna la añadimos simplemente por estética, para compensar
			// la columna del radio button,  y así poder centrar mejor la tabla
			echo "<th style='border: 0px;'></th>";
			// generamos una fila por cada registro guardado
			foreach($registros as $i => $registro) {
				Calcular_Precio_Total_Producto($totalFila, $registro);
				echo "<tr>";
					// radio button para poder seleccionar uno y solo un registro
					echo "<td style='border: 0px;'>
					        <input type='radio' name='indice_listado' value='$i'>
					        </td>";
					echo "<td style='text-align: left'>".$registro['nombre']."</td>";
					echo "<td>".$registro['cantidad']."</td>";
					echo "<td>".$registro['precio']."</td>";
					echo "<td>".$totalFila."</td>";
					// esta columna la añadimos simplemente por estética, para compensar
					// la columna del radio button,  y así poder centrar mejor la tabla
					echo "<td style='border: 0px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";					
				echo "</tr>";
			}
			// generamos la fila del total de la compra
			echo "<tr class='total'>";
				echo "<td  style='border: 0px;'></td>";
				echo "<td colspan='3'>Total compra</td>";
				echo "<td>".Calcular_Precio_Total_Compra($registros)."</td>";
			echo "</tr>";
			echo "</table>";			
		}	
		?>
	</div>	
</div>	
