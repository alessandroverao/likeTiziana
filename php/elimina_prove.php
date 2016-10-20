<?php
include('../php/conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM proveedores WHERE id_prove = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM proveedores,  tipoclientes WHERE tipo_prove = id_tipo_client ORDER BY nomb_prove ASC");

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
                <td>'.$registro2['nomb_prove'].'</td>
                <td>'.$registro2['tipo_cliente_tipo'].'</td>
                <td>'.$registro2['direccion_prove'].'</td>
                <td>'.$registro2['celular_prove'].'</td>
                <td>'.fechaNormal($registro2['fecha_reg_prove']).'</td>
                <td>'.$registro2['cuil_prove'].'</td>
                <td>'.$registro2['email_prove'].'</td>
				<td><a href="javascript:editarProve('.$registro2['id_prove'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProve('.$registro2['id_prove'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>