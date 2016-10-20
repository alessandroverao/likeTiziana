<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todas las compras entre fechas</title>
	<LINK rel="icon" href="../../favicon.ico" />
	<link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
	<script src="../../bootstrap/js/bootstrap.js"></script>
	<script src="../../js/jquery.js"></script>
	<!--<script>
	function desabilita(){
		var fecha1 = document.getElementById('fecha1').value;
		var	fecha2 = document.getElementById('fecha2').value;
		if(fecha1 > fecha2 || fecha1 == fecha2){
			location.reload();
		}
		
	}
</script>-->
	<style>
		body{
			font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
			width: 700px;
			margin: 20px auto;
			text-align: center;
		}
		h1, h4{
			color: darkgrey;
			text-align: center;
		}
		form li{
			padding: 0 5px;
			margin-top: 10px;
			display: block;
		}
		form li input, button{
			padding: 0 5px;
			margin-top: 10px;
			margin: 5px auto;
			margin-left: 10px;
		}
	</style>
</head>
<body>
	<h1><big><strong><font color="#333333">TODAS LAS COMPRAS ENTRE FECHAS</strong></big></h1>
	<hr>	
	<h4>Seleccione las fechas de búsqueda</h4>
	<form action="todasLasComprasEntreFechas.php" method="post" id="caja">
		<li><input type="date" id="fecha1" name="fecha1" max="<?php echo date("Y-m-d"); ?>" autofocus required></li>
		<li><input type="date" id="fecha2" name="fecha2"  max="<?php echo date("Y-m-d"); ?>" required></li>
		<li><input type="submit" id="buscar" class="btn btn-primary"><button id="volver" class="btn btn-primary" onclick="history.back()">Volver</button></li>
	</form>
</body>
</html>


