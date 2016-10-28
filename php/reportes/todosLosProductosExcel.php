<?php
include("../../php/seguridad.php");
include("../../php/privilegio.php");
//Base de datos
$mysqli = new mysqli('localhost','alessandroverao','blustation69','liketiziana');

//fecha de la exportación
$fecha = date("d-m-Y");
$consulta= "SELECT * FROM productos, tipoproductos WHERE id_tipo_pro = tipo_prod ORDER BY nomb_prod ASC";
$resultado= $mysqli->query($consulta);

//Inicio de la instancia para la exportación en Excel
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Listado_$fecha.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "<table border=1> ";
echo "<tr> ";
echo     "<th>ID</th> ";
echo 	"<th>NOMBRE</th> ";
echo 	"<th>CODIGO DE BARRA</th> ";
echo 	"<th>TIPO PRODUCTO</th> ";
echo 	"<th>PRECIO COSTO</th> ";
echo 	"<th>PORCENTAJE</th> ";
echo 	"<th>PRECIO VENTA</th> ";
echo 	"<th>EXISTENCIA</th> ";
echo 	"<th>FECHA REGISTRADO</th> ";
echo 	"<th>IVA</th> ";
echo "</tr> ";

while($row = mysqli_fetch_array($resultado)){	

	$idprod = $row['id_prod'];
	$nombprod = $row['nomb_prod'];
	$codprod = $row['cod_barra'];
	$tipoprod = $row['tipo_pro'];
	$preciocostprod = $row['precio_cost'];
	$procentajeprod = $row['porcentaje_prod'];
	$precioventaprod = $row['precio_unit'];
	$exitenciaprod = $row['existencia_prod'];
	$fecharegprod = $row['fecha_reg'];
	$ivaprod = $row['iva_prod'];

	echo "<tr> ";
	echo 	"<td>".$idprod."</td> "; 
	echo 	"<td>".$nombprod."</td> "; 
	echo 	"<td>".$codprod."</td> "; 
	echo 	"<td>".$tipoprod."</td> "; 
	echo 	"<td>".$preciocostprod."</td> "; 
	echo 	"<td>".$procentajeprod."</td> "; 
	echo 	"<td>".$precioventaprod."</td> "; 
	echo 	"<td>".$exitenciaprod."</td> "; 
	echo 	"<td>".$fecharegprod."</td> "; 
	echo 	"<td>".$ivaprod."</td> ";  
	echo "</tr> ";

}
echo "</table> ";
?>