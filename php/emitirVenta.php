<?php
include('../php/conexion.php');
$idclienteventa = $_POST['idclienteventa'];
$importe = $_POST['importe'];
$idprodven = $_POST['idprodven'];
$cantidadprodvent = $_POST['cantidadprodvent'];
$precioprodvent = $_POST['precioprodvent'];
$i = $_POST['e'];
$fecha = date('Y-m-d');

if($i=="1"){
	$sql = "SELECT * FROM ventas";  // sentencia sql
	$result = mysql_query($sql);
	$id_venta = mysql_num_rows($result); // el número de filas
	$id_venta += 1;
mysql_query("INSERT INTO ventas (id_venta, estadoventa, fecha_venta, id_clien_venta)VALUES('$id_venta',0,'$fecha','$idclienteventa')");
}
else{
	$sql = "SELECT * FROM ventas";  // sentencia sql
	$result = mysql_query($sql);
	$id_venta = mysql_num_rows($result); // el número de filas
}

/*$sql = "SELECT * FROM detalleventa";  // sentencia sql
$result = mysql_query($sql);
$id_detalle = mysql_num_rows($result); // número de filas
$id_detalle += 1;*/

mysql_query("INSERT INTO detalleventa (id_venta_detalle, id_prod_detalle, cantidad_detalle, importe_detalle, estadodetalle)VALUES('$id_venta','$idprodven','$cantidadprodvent','$precioprodvent', 0)");

$sql  = "SELECT * FROM productos WHERE id_prod = '$idprodven'";
$result = mysql_query($sql);
$registro = mysql_fetch_assoc($result);
$cantidad = $registro['existencia_prod'] - $cantidadprodvent;

if($idprodven != 0){
	mysql_query("UPDATE productos SET existencia_prod = '$cantidad' WHERE id_prod = '$idprodven'");
}

?>