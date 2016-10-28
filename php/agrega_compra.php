<?php
include('../php/conexion.php');
$id = $_POST['id-prod'];
$proceso = $_POST['pro'];
$provee = $_POST['proveedor'];
$importe = $_POST['importe_compra'];
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

$sql  = "SELECT * FROM proveedores WHERE nomb_prove = '$provee'";
$result = mysql_query($sql);
$registro = mysql_fetch_assoc($result);
$idprovee = $registro['id_prove'];

switch($proceso){
    case 'Registro':
        mysql_query("INSERT INTO compras (importe_compra, fecha_compra, id_provee_compra)VALUES('$importe','$fecha','$idprovee')");
    break;
    
    case 'Edicion':
        mysql_query("UPDATE compras SET importe_compra = '$importe', id_provee_compra = '$idprovee' WHERE id_compra = '$id'");
    break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM compras, proveedores WHERE id_prove = id_provee_compra ORDER BY id_compra DESC"); 

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Proveedor</th>
                <th width="200">Importe</th>
                <th width="200">Fecha</th>
                <th width="50">Opciones</th>
            </tr>';
    while($registro2 = mysql_fetch_array($registro)){
        echo '<tr>
                <td>'.$registro2['nomb_prove'].'</td>
                <td>$ '.$registro2['importe_compra'].'</td>
                <td>'.fechaNormal($registro2['fecha_compra']).'</td>
                <td><a style="font-size: 20px;" href="javascript:editarCompra('.$registro2['id_compra'].');" class="glyphicon glyphicon-edit"></a> <a style="font-size: 20px;" href="javascript:eliminarCompra('.$registro2['id_compra'].');" class="glyphicon glyphicon-remove-circle"></a></td>
                </tr>';
    }
echo '</table>';
?>