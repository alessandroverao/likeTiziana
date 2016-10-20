<?php
include('../php/conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM productos, tipoproductos WHERE id_prod != 0 AND tipo_prod = id_tipo_pro  AND id_prod = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['nomb_prod'], 
				1 => $valores2['cod_barra'], 
				2 => $valores2['tipo_pro'], 
				3 => $valores2['precio_cost'],
				4 => $valores2['porcentaje_prod'],
				5 => $valores2['precio_unit'],
				6 => $valores2['existencia_prod'],
				7 => $valores2['iva_prod'],
				);
echo json_encode($datos);
?>