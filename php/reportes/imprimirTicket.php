<!DOCTYPE html>
<html>
<head>
	<?php include("../../php/seguridad.php"); ?>
	<?php include("../../php/privilegio.php"); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Imprimir ticket</title>
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
			margin-top: 20px;
			display: block;
			outline:none;
			font-size:20px;
		   	border: none;
		    background-color: transparent; ;
		    padding: 5px;
		    cursor: pointer;
		}
		form li input, a{
			padding: 0 5px;
			margin-top: 10px;
			margin: 5px auto;
			margin-left: 10px;
		}
	</style>
</head>
<body>
	<h1><big><strong><font color="#333333">IMPRIMIR TICKET</strong></big></h1>
	<hr>	
	<h4>Seleccione el "ID" de la venta</h4>
	<form action="imprimirTicketBusqueda.php" method="post" id="caja">
	<?php
		include('../../php/conexion2.php');
        $registro = mysql_query("SELECT id_venta FROM ventas WHERE impresiones = 0 ORDER BY id_venta DESC");
    ?>
		<li><select required="required" name="tipo" id="tipo" autofocus>
			<?php 
               	while($registro2 = mysql_fetch_array($registro)){ ?>

               <option value="<?php echo $registro2['id_venta']?>"> <?php echo $registro2['id_venta'] 
            ?>  </option>
            <?php } ?> 
        </select></li>
		<li><input type="submit" id="buscar" class="btn btn-primary" value="IMPRIMIR"></li>
		<li><a id="volver" class="btn btn-primary" href="../reportes.php">Volver</a></li>
	</form>
</body>
</html>


