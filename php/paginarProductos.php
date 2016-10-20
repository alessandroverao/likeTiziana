<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysql_num_rows(mysql_query("SELECT * FROM productos, tipoproductos WHERE tipo_prod = id_tipo_pro"));
    $nroLotes = 100;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

  	$registro = mysql_query("SELECT * FROM productos, tipoproductos WHERE tipo_prod = id_tipo_pro LIMIT $limit, $nroLotes ORDER BY nomb_prod ASC");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
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
		$tabla = $tabla.'<tr>
                            <td>'.$registro2['nomb_prod'].'</td>
                            <td>'.$registro2['cod_barra'].'</td>
                            <td>'.$registro2['tipo_pro'].'</td>
                            <td>$ '.$registro2['precio_cost'].'</td>
                            <td>'.$registro2['porcentaje_prod'].' %</td>
                            <td>$ '.$registro2['precio_unit'].'</td>
                            <td>'.$registro2['existencia_prod'].'</td>
                        <td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a></td>
      						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>