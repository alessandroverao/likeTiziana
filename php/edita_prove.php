<?php
include('../php/conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM proveedores,  tipoclientes WHERE tipo_prove = id_tipo_client AND id_prove = '$id' ORDER BY nomb_prove ASC");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['nomb_prove'], 
				1 => $valores2['tipo_cliente_tipo'], 
				2 => $valores2['direccion_prove'], 
				3 => $valores2['celular_prove'],
				4 => $valores2['cuil_prove'],
				5 => $valores2['email_prove'],
				);
echo json_encode($datos);
?>