<?php
include('../php/conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM productos, tipoproductos WHERE nomb_prod LIKE '%$dato%' AND tipo_prod = id_tipo_pro AND nomb_prod != 'VARIOS' OR tipo_pro LIKE '%$dato%' AND tipo_prod = id_tipo_pro AND id_prod != 0 AND nomb_prod != 'VARIOS' OR cod_barra LIKE '%$dato%' AND tipo_prod = id_tipo_pro ORDER BY nomb_prod ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                <th width="210">PRODUCTO</th>
                <th width="190">C. BARRAS</th>
                <th width="100">PRECIO</th>
                <th width="70">STOCK</th>
                <th width="50"></th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr id="prod" onDblClick="dobleclicktabla();">
                <td>'.$registro2['nomb_prod'].'</td>
                <td>'.$registro2['cod_barra'].'</td>
                <td>$ '.$registro2['precio_unit'].'</td>
                <td>'.$registro2['existencia_prod'].'</td>
                <td><a style="font-size: 20px;" onclick="agregaVenta('.$registro2['id_prod'].','.$registro2['existencia_prod'].');" class="glyphicon glyphicon-chevron-right"></a> </td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>