<?php
include('../php/conexion.php');
$id = $_POST['id-prove'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$direccion = $_POST['direccion'];
$celular = $_POST['celular'];
$fecha = date('Y-m-d');
$cuil = $_POST['cuil'];
$email = $_POST['email'];
//VERIFICAMOS EL PROCESO

$sql  = "SELECT * FROM tipoclientes WHERE tipo_cliente_tipo = '$tipo'";
$result = mysql_query($sql);
$registro = mysql_fetch_assoc($result);
$idtipo = $registro['id_tipo_client'];

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO proveedores (nomb_prove, tipo_prove, direccion_prove, celular_prove, fecha_reg_prove, cuil_prove, email_prove)VALUES('$nombre','$idtipo','$direccion','$celular', '$fecha', '$cuil', '$email')");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE proveedores SET nomb_prove = '$nombre', tipo_prove = '$idtipo', direccion_prove = '$direccion', celular_prove = '$celular', cuil_prove = '$cuil', email_prove = '$email' WHERE id_prove = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM proveedores,  tipoclientes WHERE tipo_prove = id_tipo_client ORDER BY nomb_prove ASC"); 

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