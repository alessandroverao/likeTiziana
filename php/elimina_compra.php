<?php
include('../php/conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM compras WHERE id_compra = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM compras ORDER BY id_compra DESC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                <th width="200">Proveedor</th>
                <th width="200">Importe</th>
                <th width="200">Fecha</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                <td>'.$registro2['nomb_prove'].'</td>
                <td>$ '.$registro2['importe_compra'].'</td>
                <td>'.fechaNormal($registro2['fecha_compra']).'</td>
                <td><a href="javascript:editarCompra('.$registro2['id_compra'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarCompra('.$registro2['id_compra'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>