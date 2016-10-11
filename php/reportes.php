<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reportes</title>
	<LINK rel="icon" href="../favicon.ico" />
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mixitup.min.js"></script>
	<style>
		body{
			font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
			width: 700px;
			margin: 20px auto;
			text-align: center;
		}
		h1, h4{
			color: darkgrey;
		}
		ul{
			display: table;
			padding: 0;
			width: 100%;
		}
		ul li{
			display: table-cell;
			padding: 0 5px;
		}
		ul li a{
			display: block;
		}
		#container{
			background: #252932;
			padding: 15px;
			border: 1px solid lightgray;
			margin-top: 20px;
		}
		#container a{
			color: white;
		}
		#container a:link{
			text-decoration:none;  
		}
		.mix{
			display: none;
		}
		.mix{
			padding: 20px;
			width: auto;
			background:rgba(0,0,0,0.5);
			margin-bottom: 10px;
		}
		.mix:hover{
			background:#f56f3a;
			cursor:pointer;
		}
	</style>
	<script>
		$(document).on('ready', function(){
			$('#container').mixItUp();
		})
	</script>
</head>
<body>
	<h1><big><strong><font color="#333333">REPORTES</strong></big></h1>
	<hr>
	<h4>Seleccione una categoría de reporte</h4>
	<ul>
		<li><a class="btn btn-default filter" data-filter="all">Todos</a></li>
		<li><a class="btn btn-primary filter" data-filter=".productos">Productos</a></li>
		<li><a class="btn btn-primary filter" data-filter=".ventas">Ventas</a></li>
		<li><a class="btn btn-primary filter" data-filter=".clientes">Clientes</a></li>
		<li><a class="btn btn-primary filter" data-filter=".proveedores">Proveedores</a></li>
		<!--<li><a href="#" class="btn btn-default sort" data-sort="random"><span>Aleatorio</span></a></li>-->
		<li><form><button id="volver" class="btn btn-primary"  onclick="history.back()">Volver</button></form></li>
	</ul>
	<div id="container">
		<a class="mix ventas" href="../php/reportes/cajaDelDia.php">Caja del día</a>
		<a class="mix ventas" href="../php/reportes/cajaEntreFecha.php">Caja entre fechas</a>
		<a class="mix ventas" href="../php/reportes/ventasEntreFecha.php">Ventas entre fechas</a>
		<a class="mix ventas" href="../php/reportes/ventasDeldia.php">Ventas del día</a>
		<a class="mix productos" href="../php/reportes/todosLosProductos.php">Todos los productos</a>
		<a class="mix productos" href="../php/reportes/productoPorTipo.php">Productos por tipo</a>
		<a class="mix clientes" href="../php/reportes/todosLosClientes.php">Todos los clientes</a>
		<a class="mix clientes" href="../php/reportes/clientePorTipo.php">Clientes por tipo</a>
		<a class="mix proveedores" href="../php/reportes/todosLosProveedores.php">Todos los proveedores</a>
		<a class="mix proveedores" href="../php/reportes/proveedorePorTipo.php">Proveedores por tipo</a>
		<a class="mix productos" href="../php/reportes/valorStockPrecioCosto.php">Valor stock precio costo</a>
		<a class="mix productos" href="../php/reportes/valorStockPrecioVenta.php">Valor stock precio venta sin IVA</a>
		<a class="mix ventas" href="../php/reportes/ventasAnuladas.php">Ventas anuladas</a>
		<a class="mix ventas" href="../php/reportes/detallesAnulados.php">Detalles anulados</a>
	</div>
</body>
</html>