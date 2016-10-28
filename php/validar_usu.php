<?php

include('conexion.php');

$usuario = $_POST['usuario'];

$sql = "SELECT * FROM usuarios WHERE idusuario = '$usuario'";
$result = mysql_query($sql);
$encontro = mysql_num_rows($result);

if($encontro != 0){
	echo 1;
}

?>