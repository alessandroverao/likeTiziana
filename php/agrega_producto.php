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
$iva = $_POST['iva'];
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

$sql  = "SELECT * FROM tipoproductos WHERE tipo_pro = '$tipo'";
$result = mysql_query($sql);
$registro = mysql_fetch_assoc($result);
$idtipo = $registro['id_tipo_pro'];

switch($proceso){
	case 'Registro':
        $existencia = $_POST['existencia'];
		mysql_query("INSERT INTO productos (nomb_prod, cod_barra, tipo_prod, precio_cost, porcentaje_prod, precio_unit, existencia_prod, fecha_reg, iva_prod)VALUES('$nombre','$codbarra','$idtipo','$precio_cost','$porcentaje','$precio_uni','$existencia', '$fecha', '$iva')");
	break;
	
	case 'Edicion':
        $existenciaedt = $_POST['existenciaedt'];
		mysql_query("UPDATE productos SET nomb_prod = '$nombre', cod_barra = '$codbarra', tipo_prod = '$idtipo', precio_cost = '$precio_cost', porcentaje_prod ='$porcentaje', precio_unit = '$precio_uni', existencia_prod = existencia_prod + '$existenciaedt', iva_prod = '$iva' WHERE id_prod = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM productos, tipoproductos WHERE id_prod != 0 AND tipo_prod = id_tipo_pro AND nomb_prod != 'VARIOS' ORDER BY nomb_prod ASC"); 

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
                <td>'.$registro2['tipo_pro'].'</td>
                <td>$ '.$registro2['precio_cost'].'</td>
                <td>'.$registro2['porcentaje_prod'].' %</td>
                <td>$ '.$registro2['precio_unit'].'</td>
                <td>'.$registro2['existencia_prod'].'</td>
				<td><a style="font-size: 20px;" href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a style="font-size: 20px;" href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>