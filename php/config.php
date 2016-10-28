<?php
	include("seguridad.php");
	@session_start(); 
	if($_SESSION["privilegio"] != 1){
		header ("Location: menu.php");
	}
	else{
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Configuraciones</title>
	<LINK rel="icon" href="../favicon.ico" />
	<link rel="stylesheet" href="../css/config.css">
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/config.js"></script>
</head>
<body>
	<ul></ul>
	<span class="result"></span>
	<button class="restart" onclick="restart();">Volver a jugar</button>
	<a href="herramientas.php">Atras</a> 
</body>
</html>
<?php
	}
?>