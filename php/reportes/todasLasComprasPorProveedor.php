<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todas las compras por proveedor</title>
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
		input[type=input] {
			height: 35px;
			size: 50px;
			text-align: center;
		 	margin: 0 auto;
		  	width: 100%;
		  	font-size: 18px;
		  	font-weight: bold;
		  	text-transform: uppercase;
		  	background-color: lighten(#2f2f2f,40%);
		  	outline: none;
		  	border:1px solid #6F96DF;
		  	padding: 0 3px;
		  	color: black;
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
		        valorASumar = cells[2].innerHTML;
		        suma += parseFloat(valorASumar);
    		}
			document.getElementById("totaltxt").value = parseFloat(suma);
		})
	</script>
</head>
<body>
	<?php
		$tipo = $_POST['select'];
	?>
	<h1><big><strong><font color="#333333">TODAS LAS COMPRAS POR PROVEEDOR</strong></big></h1>
	<hr>
	<ul>
		<li><form><button onclick="javascript:reportePDF();" class="btn btn-danger">Exportar a PDF</button></form></li>
		<li><form><button id="volver" class="btn btn-primary" onclick="history.back()">Volver</button></form></li>
		<li><form><input type="input" id="tipo" value="<?php echo $tipo; ?>" disabled></form></li>
	</ul>
	<div class="registros" id="venta">
        <table class="table table-striped table-condensed table-hover">
            <tr>
            	<th width="300">Proveedor</th>
                <th width="300">Fecha compra</th>
                <th width="300">Importe compra</th>
            </tr>
	<?php
		include('../../php/conexion2.php');

        $registro = mysql_query("SELECT * FROM compras, proveedores WHERE id_provee_compra = id_prove AND nomb_prove = '$tipo'");
        if(!empty($registro)){
	        while($registro2 = mysql_fetch_array($registro)){
	        	echo '<tr>
	        				<td>'.$registro2['nomb_prove'].'</td>
							<td>'.$registro2['fecha_compra'].'</td>
	                        <td>'.$registro2['importe_compra'].'</td>
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
    		var tipo = $('#tipo').val();
			window.open('todasLasComprasPorProveedorPDF.php?tipo='+tipo);
			history.back();
		}
    </script>
</body>
</html>