<?php
include('../php/conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM compras, proveedores WHERE id_compra = '$id' AND id_provee_compra = id_prove");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['nomb_prove'], 
				1 => $valores2['importe_compra'], 
				);
echo json_encode($datos);
?>