<?php
include('../php/conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM clientes WHERE nomb_clien LIKE '%$dato%' OR tipo_clien LIKE '%$dato%' OR celular_clien LIKE '%$dato%' OR cuil_clien LIKE '%$dato%' ORDER BY id_clien ASC");

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
                <td>'.$registro2['nomb_clien'].'</td>
                <td>'.$registro2['tipo_clien'].'</td>
                <td>'.$registro2['direccion_clien'].'</td>
                <td>'.$registro2['celular_clien'].'</td>
                <td>'.fechaNormal($registro2['fecha_reg_clien']).'</td>
                <td>'.$registro2['cuil_clien'].'</td>
                <td>'.$registro2['email_clien'].'</td>
				<td><a href="javascript:editarCliente('.$registro2['id_clien'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarCliente('.$registro2['id_clien'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>