<?php
include('../php/conexion.php');
$nota = $_POST['tareaInput'];

mysql_query("INSERT INTO notas (contenido)VALUES('$nota')");
?>