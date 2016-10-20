<!DOCTYPE html>    <!--Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php include("../php/seguridad.php"); ?>
	<head>
		<meta charset="UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Menu</title>
		<LINK rel="icon" href="../favicon.ico" />
		<LINK rel="stylesheet" href="../css/estilosmenu.css"/>
		<LINK rel="stylesheet" href="../css/fonts.css"/>
		<LINK rel="stylesheet" href="../css/slides/fonts.css"/>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="../js/jquery.js"></script>
	</head>
	<body>
		<header class="header2">
			<div class="wrapper">
				<div class="logo" onclick="pagina();">likeTiziana</div>
				<nav>
					<a href="../php/ventas.php">Ventas</a>
					<a href="../php/compras.php">Compras</a>
					<a href="../php/reportes.php">Reportes</a>
					<a href="../php/herramientas.php">Herramientas</a>
					<a href="../php/notas_rapidas.php">Notas</a> 
					<a href="../php/salir.php">Salir</a>
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
		
		<section class="contenido wrapper">
			<br></br><br></br><br>
			<!--<p>
				<big><strong><font color="#333333">Gestión Comercial, Facturación e Inventario</strong></big> <br></br>

				Este programa ayuda a crear un negocio estable, rentable de por vida y sobre todo, generar mejores ganancias, disminuyendo el esfuerzo humano y evitando pérdidas de tiempo en aquellas pesadas tareas como la administración de inventarios, clientes, proveedores y ventas, de manera ordenada y eficaz. Permite administrar el inventario de productos y ventas. <br></br> <br></br><br></br>

			</p>-->
		</section>
		<div class="main">
			<div class="slides">
				<img src="../images/1.png" alt="">
				<img src="../images/3.png" alt="">
				<img src="../images/4.png" alt="">
				<img src="../images/2.png" alt="">
				<img src="../images/5.png" alt="">
			</div>
		</div>
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script src="../js/jquery.slides.js"></script>
		<script>

		$(function(){
		  	$(".slides").slidesjs({
			    play: {
			      active: true,
			        // [boolean]  Generar la reproducción y parada botones.
			        //  No puede utilizar sus propios botones. Lo siento.
			      effect: "slide",
			        // [string] puede ser de "diapositivas" o "fade".
			      interval: 5000,
			        // [number] Tiempo de permanencia en cada diapositiva en milisegundos.
			      auto: true,
			        // [boolean] Comience a reproducir la presentación de la carga.
			      swap: true,
			        // [boolean] Botones de mostrar / ocultar stop and play
			      pauseOnHover: false,
			        // [boolean] interrumpir presentación jugando en vuelo estacionario
			      restartDelay: 3500
			        // [number] retraso de reinicio en la presentación inactiva
			    }
	  		});
		});
		</script>
		<script>
			function pagina(){
				window.open(href= '../liketiziana/liketiziana.html');
			}
		</script>
	</body>
</html>