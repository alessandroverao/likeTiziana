<?php
include('../php/conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM clientes WHERE id_clien = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['nomb_clien'], 
				1 => $valores2['tipo_clien'], 
				2 => $valores2['direccion_clien'], 
				3 => $valores2['celular_clien'],
				4 => $valores2['cuil_clien'],
				5 => $valores2['email_clien'],
				);
echo json_encode($datos);
?>