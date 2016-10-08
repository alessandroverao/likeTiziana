<?php
include('../../php/conexion.php');

$iddetalle = $_POST['iddetalle'];
$idventa = $_POST['idventa'];


mysql_query("UPDATE detalleventa SET estadodetalle = 1 WHERE id_detalle = '$iddetalle'");



$sql = "SELECT * FROM detalleventa WHERE estadodetalle = 0 AND id_venta_detalle = '$idventa'";
$result = mysql_query($sql);
$buscar = mysql_fetch_assoc($result);


if(empty($buscar)){
	mysql_query("UPDATE ventas SET estadoventa = 1 WHERE id_venta = '$idventa'");
}



echo 1;
?>
