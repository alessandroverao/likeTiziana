<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todos los clientes</title>
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
	<h1><big><strong><font color="#333333">TODOS LOS CLIENTES</strong></big></h1>
	<hr>
	<ul>
		<li><form><button onclick="javascript:reportePDF();" class="btn btn-danger">Exportar a PDF</button></form></li>
		<li><form><button id="volver" class="btn btn-primary"  onclick="history.back()">Volver</button></form></li>
	</ul>
	<div class="registros" id="venta">
        <table class="table table-striped table-condensed table-hover">
            <tr>
            	<th width="20">ID</th>
                <th width="250">Nombre</th>
                <th width="200">Tipo</th>
                <th width="250">Dirección</th>
                <th width="150">Celular</th>
                <th width="150">Fecha Reg.</th>
                <th width="100">CUIL</th>
                <th width="130">EMAIL</th>
                
            </tr>
	<?php
		include('../../php/conexion.php');

        $registro = mysql_query("SELECT * FROM clientes, tipoclientes WHERE tipo_clien = id_tipo_client ORDER BY nomb_clien ASC");
        if(!empty($registro)){
	        while($registro2 = mysql_fetch_array($registro)){
	        	echo '<tr>
	        				<td>'.$registro2['id_clien'].'</td>
							<td>'.$registro2['nomb_clien'].'</td>
	                        <td>'.$registro2['tipo_cliente_tipo'].'</td>
	                        <td>'.$registro2['direccion_clien'].'</td>
	                        <td>'.$registro2['celular_clien'].'</td>
	                        <td>'.$registro2['fecha_reg_clien'].'</td>
	                        <td>'.$registro2['cuil_clien'].'</td>
	                        <td>'.$registro2['email_clien'].'</td>
	                </tr>'; 
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
			window.open('todosLosClientesPDF.php');
			history.back();
		}
 	</script>
</body>
</html>