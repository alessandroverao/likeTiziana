<?php
include('../php/conexion.php');
$id = $_POST['id-prod'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$codbarra = $_POST['cod-barra'];
$tipo = $_POST['tipo'];
$precio_cost = $_POST['precio-cost'];
$porcentaje = $_POST['porcentaje'];
$precio_uni = $_POST['precio-uni'];
$existencia = $_POST['existencia'];
$iva = $_POST['iva'];
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO productos (nomb_prod, cod_barra, tipo_prod, precio_cost, porcentaje_prod, precio_unit, existencia_prod, fecha_reg, iva_prod)VALUES('$nombre','$codbarra','$tipo','$precio_cost','$porcentaje','$precio_uni','$existencia', '$fecha', '$iva')");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE productos SET nomb_prod = '$nombre', cod_barra = '$codbarra', tipo_prod = '$tipo', precio_cost = '$precio_cost', porcentaje_prod ='$porcentaje', precio_unit = '$precio_uni', existencia_prod = '$existencia', iva_prod = '$iva' WHERE id_prod = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM productos WHERE id_prod != 0 ORDER BY nomb_prod ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                <th width="210">Nombre</th>
                <th width="190">Código de Barras</th>
                <th width="150">Tipo</th>
                <th width="100">Precio Costo</th>
                <th width="100">Porcentaje</th>
                <th width="100">Precio Unitario</th>
                <th width="70">Existencia</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                <td>'.$registro2['nomb_prod'].'</td>
                <td>'.$registro2['cod_barra'].'</td>
                <td>'.$registro2['tipo_prod'].'</td>
                <td>$ '.$registro2['precio_cost'].'</td>
                <td>'.$registro2['porcentaje_prod'].' %</td>
                <td>$ '.$registro2['precio_unit'].'</td>
                <td>'.$registro2['existencia_prod'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>