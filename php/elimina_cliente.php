<?php
include('../php/conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM clientes WHERE id_clien = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM clientes, tipoclientes WHERE tipo_clien = id_tipo_client ORDER BY nomb_clien ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Tipo</th>
                <th width="300">Dirección</th>
                <th width="200">Celular</th>
                <th width="150">F. Registro</th>
                <th width="200">CUIL</th>
                <th width="300">Email</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                <td>'.$registro2['nomb_clien'].'</td>
                <td>'.$registro2['tipo_cliente_tipo'].'</td>
                <td>'.$registro2['direccion_clien'].'</td>
                <td>'.$registro2['celular_clien'].'</td>
                <td>'.fechaNormal($registro2['fecha_reg_clien']).'</td>
                <td>'.$registro2['cuil_clien'].'</td>
                <td>'.$registro2['email_clien'].'</td>
				<td><a href="javascript:editarCliente('.$registro2['id_clien'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarCliente('.$registro2['id_clien'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>