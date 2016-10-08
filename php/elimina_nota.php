
<?php
include('../php/conexion.php');

$pregunta= $_POST['pregunta'];


if(pregunta==true){
	mysql_query("TRUNCATE TABLE notas");
}


?>

