<?php
include('../php/conexion2.php');

if ($_FILES['csv']['size'] > 0) {

	$csv = $_FILES['csv']['tmp_name'];

	$handle = fopen($csv,'r');

	while ($data = fgetcsv($handle,1000,",","'")){  /*LIMITE DE 1000 REGISTROS A IMPORTAR*/

		if ($data[0]) { 

	        mysql_query("INSERT INTO productos (id_prod, nomb_prod, cod_barra, tipo_prod, precio_cost, porcentaje_prod, precio_unit, existencia_prod, fecha_reg, iva_prod) VALUES('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."','".$data[8]."','".$data[9]."') ");
		
		}

	}

	echo 'OK';

}
?>