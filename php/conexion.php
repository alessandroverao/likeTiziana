<?php
$conexion = mysql_connect('localhost', 'alessandroverao', 'blustation69');
mysql_select_db('liketiziana', $conexion);

function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
?>