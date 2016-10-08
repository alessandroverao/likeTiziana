<?php
include('../php/conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM proveedores WHERE id_prove = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['nomb_prove'], 
				1 => $valores2['tipo_prove'], 
				2 => $valores2['direccion_prove'], 
				3 => $valores2['celular_prove'],
				4 => $valores2['cuil_prove'],
				5 => $valores2['email_prove'],
				);
echo json_encode($datos);
?>