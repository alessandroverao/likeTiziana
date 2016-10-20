<?php
include('../php/conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM proveedores, tipoclientes WHERE nomb_prove LIKE '%$dato%' AND tipo_prove = id_tipo_client OR tipo_cliente_tipo LIKE '%$dato%' AND tipo_prove = id_tipo_client OR celular_prove LIKE '%$dato%' AND tipo_prove = id_tipo_client OR cuil_prove LIKE '%$dato%' AND tipo_prove = id_tipo_client ORDER BY nomb_prove ASC");

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
if(mysql_num_rows($registro)>0){
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
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>