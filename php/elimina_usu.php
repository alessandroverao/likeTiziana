<?php
include('../php/conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM usuarios WHERE iduso = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM usuarios, estados, privilegios WHERE estado = idestado AND privilegio = idprivilegios AND iduso > 1 ORDER BY privilegio ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                <th width="300">Usuario</th>
                <th width="300">Estado</th>
                <th width="300">Privilegio</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                <td>'.$registro2['idusuario'].'</td>
                <td>'.$registro2['nombestado'].'</td>
                <td>'.$registro2['nombprivi'].'</td>
                <td><a href="javascript:editarUsu('.$registro2['iduso'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarUsu('.$registro2['iduso'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>