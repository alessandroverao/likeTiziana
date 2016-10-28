<!DOCTYPE html>
<html>
<head>
	<?php include("../../php/seguridad.php"); ?>
	<?php include("../../php/privilegio.php"); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Productos mas vendidos</title>
	<LINK rel="icon" href="../../favicon.ico" />
	<link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
	<script src="../../bootstrap/js/bootstrap.js"></script>
	<script src="../../js/jquery.js"></script>
	<style>
		body{
			font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
			width: 1000px;
			margin: 20px auto;
		}
		h1, h4{
			color: darkgrey;
			text-align: center;
		}
		ul li{
			display: table-cell;
			padding: 0 5px;
		}
		ul li a{
			display: block;
		}
		.registros{
			margin:auto;
			width:1000px;
			margin-top:20px;
			border:1px solid #6F96DF;
			height:400px;
			overflow: auto;
			padding:10px;
			cursor: default;
		}
		section table[id=totales]{
			width:700px;
			margin:auto;
			margin-top:5px;
			border:1px solid #6F96DF;
		}
		section table[id=totales] tr td input{
			outline:none;
			font-size:40px;
			text-align: left;
			background: transparent;
		    border: none;
		    color: black;
			outline:none;
			-webkit-appearance: none;
			text-overflow: ellipsis;
		    border-width: 0;
		    box-sizing: border-box;
		    float: left;
		}
		section table[id=totales] tr td label{
			margin-left: 20px;
			width:90%;
			outline:none;
			font-size:20px;
		}
	</style>
	</head>
<body>
	<h1><big><strong><font color="#333333">PRODUCTOS MAS VENDIDOS ORDENADO POR ID</strong></big></h1>
	<hr>
	<ul>
		<li><a id="volver" class="btn btn-primary" href="../reportes.php">Volver</a></li>
	</ul>
	<div class="registros" id="venta">
        <table class="table table-striped table-condensed table-hover">
            <tr>
            	<th width="100">ID</th>
                <th width="250">Nombre</th>
                <th width="150">Código de Barras</th>
                <th width="100">Tipo</th>
                <th width="150">Precio Costo</th>
                <th width="150">Porcentaje</th>
                <th width="150">Precio Unit.</th>
                <th width="50">Existencia</th>
                <th width="130">UNIDADES VENDIDAS</th>
            </tr>
	<?php
		include('../../php/conexion.php');

        $registro = mysql_query("SELECT * FROM productos, tipoproductos WHERE tipo_prod = id_tipo_pro ORDER BY id_prod");
        if(!empty($registro)){
	        while($registro2 = mysql_fetch_array($registro)){

	        	$idproduc = $registro2['id_prod'];
	        	$resultado =  mysql_query("SELECT COUNT(*) AS `count` FROM detalleventa WHERE id_prod_detalle = '$idproduc' AND estadodetalle = 0");
				$row = mysql_fetch_assoc($resultado);
				$vendidos = $row['count'];
				if($vendidos != 0){
	        	echo '<tr>
	        				<td>'.$registro2['id_prod'].'</td>
							<td>'.$registro2['nomb_prod'].'</td>
	                        <td>'.$registro2['cod_barra'].'</td>
	                        <td>'.$registro2['tipo_pro'].'</td>
	                        <td>'.$registro2['precio_cost'].'</td>
	                        <td>'.$registro2['porcentaje_prod'].'</td>
	                        <td>'.$registro2['precio_unit'].'</td>
	                        <td>'.$registro2['existencia_prod'].'</td>
	                        <td>'.$vendidos.'</td>
	                </tr>';
	            }
	       	}
       }
    ?>
    </table>
    </div>
    <!--<section id="total">
    <table id="totales">
        <tr>
            <td><label for="totallbl">TOTAL $ </label></td>
            <td width="300"><input type="number" id="totaltxt" name="totaltxt" step="any" disabled /></td>
        </tr>
    </table>
    </section>-->
    <script>
    	function reportePDF(){
			window.open('todosLosProductosPDF.php');
			history.back();
		}
    </script>
</body>
</html>