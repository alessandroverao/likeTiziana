<?php
include('../php/conexion.php');
$id = $_POST['id-usu'];
$proceso = $_POST['pro'];
$usuario = $_POST['usuario'];
$clave = $_POST["clave"]; 
$estado = $_POST["estado"]; 
$pri = $_POST['pri'];

//VERIFICAMOS EL PROCESO

$sql  = "SELECT * FROM privilegios WHERE nombprivi = '$pri'";
$result = mysql_query($sql);
$registro = mysql_fetch_assoc($result);
$idpri = $registro['idprivilegios'];

$sql  = "SELECT * FROM estados WHERE nombestado = '$estado'";
$result = mysql_query($sql);
$registro = mysql_fetch_assoc($result);
$idestado = $registro['idestado'];

switch($proceso){
	case 'Registro':
		$clave = md5($clave);
		mysql_query("INSERT INTO usuarios (idusuario, clave, estado, privilegio)VALUES('$usuario','$clave','$idestado','$idpri')");
	break;
	
	case 'Edicion':
		$sql = "SELECT * FROM usuarios WHERE clave = '$clave'";
		$resultado = mysql_query($sql);
		if (mysql_num_rows($resultado) == 0){
			$clave = md5($clave);
		}

		mysql_query("UPDATE usuarios SET idusuario = '$usuario', clave = '$clave', estado = '$idestado', privilegio = '$idpri' WHERE iduso = '$id'");
	break;
}


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