<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Productos por tipo</title>
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
		form li select{
			font-size:20px;
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<h1><big><strong><font color="#333333">PRODUCTOS POR TIPO</strong></big></h1>
	<hr>	
	<h4>Seleccione una categoría</h4>
	<form action="productosPorTipo.php" method="post" id="caja">
		<?php  
    		include('../../php/conexion2.php');
     		$registro = mysql_query("SELECT tipo_pro FROM tipoproductos ORDER BY tipo_pro ASC");    
     	?>
		<li><select id="select" name="select" autofocus required>
		<?php 
            while($registro2 = mysql_fetch_array($registro)){ 
        ?>
            <option value="<?php echo $registro2['tipo_pro']?>"> <?php echo $registro2['tipo_pro'] ?></option>
        <?php } 
        ?> 
        </select></li>
		<li><input type="submit" id="buscar" class="btn btn-primary"><button id="volver" class="btn btn-primary" onclick="history.back()">Volver</button></li>
	</form>
</body>
</html>


