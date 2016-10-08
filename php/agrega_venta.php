<?php
include('../php/conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM productos WHERE id_prod = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['id_prod'], 
                1 => $valores2['nomb_prod'], 
                2 => $valores2['precio_unit'],
                );
echo json_encode($datos);
?>