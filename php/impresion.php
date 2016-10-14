<?php
include('../php/conexion.php');
$idclienteventa = $_POST['idclienteventa'];


mysql_query("UPDATE ventas SET impresiones = 1 ORDER BY id_venta DESC LIMIT 1");

?>