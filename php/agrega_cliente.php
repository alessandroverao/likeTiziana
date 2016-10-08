<?php
include('../php/conexion.php');
$id = $_POST['id-clien'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$direccion = $_POST['direccion'];
$celular = $_POST['celular'];
$fecha = date('Y-m-d');
$cuil = $_POST['cuil'];
$email = $_POST['email'];
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO clientes (nomb_clien, tipo_clien, direccion_clien, celular_clien, fecha_reg_clien, cuil_clien, email_clien)VALUES('$nombre','$tipo','$direccion','$celular', '$fecha', '$cuil', '$email')");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE clientes SET nomb_clien = '$nombre', tipo_clien = '$tipo', direccion_clien = '$direccion', celular_clien = '$celular', cuil_clien = '$cuil', email_clien = '$email' WHERE id_clien = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM clientes ORDER BY id_clien ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Tipo</th>
                <th width="300">Direcci&oacute;n</th>
                <th width="200">Celular</th>
                <th width="150">F. Registro</th>
                <th width="200">CUIL</th>
                <th width="300">Email</th>
				<th width="50">Opciones</th>
            </tr>';
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
echo '</table>';
?>