<!DOCTYPE html>
<html>
<head>
	<?php include("../../php/seguridad.php"); ?>
	<?php include("../../php/privilegio.php"); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Caja del día</title>
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
	<script>
		$(document).on('ready', function(){
			var valorASumar
		    suma = 0;		
		    var table = document.getElementById('venta'), rows = table.getElementsByTagName('tr'), i, j, cells;
		    for (i = 0, j = rows.length; i < j; ++i) {
		        cells = rows[i].getElementsByTagName('td');
		        if (!cells.length) {
		            continue;
		        }
		        valorASumar = cells[4].innerHTML;
		        suma += parseFloat(valorASumar);
    		}
			document.getElementById("totaltxt").value = parseFloat(suma);
		})
	</script>
</head>
<body>
	<h1><big><strong><font color="#333333">CAJA DEL DÍA</strong></big></h1>
	<hr>
	<ul>
		<li><form><button onclick="javascript:reportePDF();" class="btn btn-danger">Exportar a PDF</button></form></li>
		<li><a id="volver" class="btn btn-primary" href="../reportes.php">Volver</a></li>
	</ul>
	<div class="registros" id="venta">
        <table class="table table-striped table-condensed table-hover">
            <tr>
            	<th width="100">Venta</th>
                <th width="250">Nombre</th>
                <th width="150">Código de Barras</th>
                <th width="100">Tipo</th>
                <th width="150">Precio Unitario</th>
                <th width="150">Cliente</th>
            </tr>
	<?php
		include('../../php/conexion.php');
		$fecha = date('Y-m-d');
        $registro = mysql_query("SELECT * FROM productos, tipoproductos, clientes, ventas, detalleventa WHERE id_venta = id_venta_detalle AND id_prod = id_prod_detalle AND fecha_venta = '$fecha' AND id_clien_venta = id_clien AND estadodetalle = 0 AND tipo_prod = id_tipo_pro");
        if(!empty($registro)){
	        while($registro2 = mysql_fetch_array($registro)){
	        	echo '<tr>
	        				<td>'.$registro2['id_venta'].'</td>
							<td>'.$registro2['nomb_prod'].'</td>
	                        <td>'.$registro2['cod_barra'].'</td>
	                        <td>'.$registro2['tipo_pro'].'</td>
	                        <td>'.$registro2['importe_detalle'].'</td>
	                        <td>'.$registro2['nomb_clien'].'</td>
	                </tr>'; 
	       	}
       }
    ?>
    </table>
    </div>
    <section id="total">
    <table id="totales">
        <tr>
            <td><label for="totallbl">TOTAL $ </label></td>
            <td width="300"><input type="number" id="totaltxt" name="totaltxt" step="0.01" disabled /></td>
        </tr>
    </table>
    </section>
    <script>
    	function reportePDF(){
			window.open('cajaDelDiaPDF.php');
			history.back();
		}
    </script>
</body>
</html>