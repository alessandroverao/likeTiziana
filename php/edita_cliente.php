<?php
include('../php/conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM clientes, tipoclientes WHERE tipo_clien = id_tipo_client AND id_clien = '$id' ORDER BY nomb_clien ASC");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['nomb_clien'], 
				1 => $valores2['tipo_cliente_tipo'], 
				2 => $valores2['direccion_clien'], 
				3 => $valores2['celular_clien'],
				4 => $valores2['cuil_clien'],
				5 => $valores2['email_clien'],
				);
echo json_encode($datos);
?>