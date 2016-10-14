<!DOCTYPE html>    <!--Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao-->
<html LANG="en">
	<?php include("../php/seguridad.php"); ?>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Herramientas</title>
		<LINK rel="icon" href="../favicon.ico" />
		<LINK rel="stylesheet" href="../css/estilosmenu.css"/>
		<LINK rel="stylesheet" href="../css/fonts.css"/>
		<LINK rel="stylesheet" href="../css/slides/fonts.css"/>
		<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700&subset=latin-ext" rel="stylesheet"> 

		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="../js/jquery.js"></script>
		
	</head>
	<body>
		<header class="header2">
			<div class="wrapper">
				<div class="logo">likeTiziana</div>
				<nav>
					<a href="../php/menu.php">Atras</a> 
					<a href="../php/productos.php">Productos</a>
					<a href="../php/clientes.php">Clientes</a> 
					<a href="../php/proveedores.php">Proveedores</a> 
					<a href="../php/importarProductos.php">Importar</a>
					<a href="../php/notas_rapidas.php">Notas</a> 
				</nav>
			</div>
		</header>
			<div class="social">
				<ul>
					<li><a href="https://www.facebook.com/liketiziana" class="icon-facebook" target="_blank"></a></li>
					<li><a href="https://twitter.com/likeTizianaOK" class="icon-twitter" target="_blank"></a></li>
					<li><a href="https://plus.google.com/109771097617580548455" class="icon-google-plus" target="_blank"></a></li>
					<li><a href="mailto:liketiziana@gmail.com" class="icon-mail3"></a></li>
				</ul>
			</div>
			<div class="wrap">
				<div class="widget">
					<div class="fecha">
						<p id="diaSemana" class="diaSemana"></p>
						<p id="dia" class="dia"></p>
						<p>de</p>
						<p id="mes" class="mes"></p>
						<p>de</p>
						<p id="year" class="year"></p>
					</div>
					<div class="reloj">
						<p id="horas" class="horas"></p>
						<p>:</p>
						<p id="minutos" class="minutos"></p>
						<p>:</p>
						<p id="segundos" class="segundos"></p>
						<p id="ampm" class="ampm"></p>
						

					</div>
				</div>
			</div>
			<script src="../js/reloj.js"></script>
	</body>
</html>