<?php
include("../../php/seguridad.php");
include("../../php/privilegio.php");
include('../../php/conexion.php');

$iddetalle = $_POST['iddetalle'];
$idventa = $_POST['idventa'];


mysql_query("UPDATE detalleventa SET estadodetalle = 0 WHERE id_detalle = '$iddetalle'");
$sql = "SELECT * FROM detalleventa WHERE id_detalle = '$iddetalle'";
$result = mysql_query($sql);
$buscar = mysql_fetch_assoc($result);
$idprod = $buscar['id_prod_detalle'];
$cantidade = $buscar['cantidad_detalle'];

if($idprod != 0){
	mysql_query("UPDATE productos SET existencia_prod = existencia_prod - '$cantidade' WHERE id_prod = '$idprod'");
}

$sql = "SELECT * FROM detalleventa WHERE estadodetalle = 0 AND id_venta_detalle = '$idventa'";
$result = mysql_query($sql);
$buscar1 = mysql_num_rows($result);

$sql = "SELECT * FROM detalleventa WHERE estadodetalle = 1 AND id_venta_detalle = '$idventa'";
$result = mysql_query($sql);
$buscar2 = mysql_num_rows($result);

if($buscar1 = 0){
	mysql_query("UPDATE ventas SET estadoventa = 1 WHERE id_venta = '$idventa'");
}
else{
	mysql_query("UPDATE ventas SET estadoventa = 0 WHERE id_venta = '$idventa'");
}



echo 1;
?>
