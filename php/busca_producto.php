<?php
include('../php/conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM productos WHERE nomb_prod LIKE '%$dato%' OR tipo_prod LIKE '%$dato%' OR cod_barra LIKE '%$dato%' ORDER BY nomb_prod ASC");

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
if(mysql_num_rows($registro)>0){
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
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>