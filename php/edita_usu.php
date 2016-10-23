<?php
include('../php/conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM usuarios, privilegios, estados WHERE privilegio = idprivilegios AND estado = idestado AND iduso = '$id' ORDER BY privilegio ASC");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['idusuario'], 
				1 => $valores2['clave'], 
				2 => $valores2['nombestado'], 
				3 => $valores2['nombprivi'], 
				);
echo json_encode($datos);
?>