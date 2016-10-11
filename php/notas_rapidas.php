<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<LINK rel="icon" href="../favicon.ico" />
	<link href="../css/notas/estilos.css" rel="stylesheet" >
	<link href="../css/normalize.css" rel="stylesheet" >
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<title>Notas</title>
</head>
<body>
	<div class="principal">
		<div class="wrap">
			<form class="formulario" action="agrega_nota.php" method="post">
				<input type="text" id="tareaInput"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Agrega una nota" onkeypress="return runScript(event)" autofocus>
				<input type="button" class="boton" id="btn-agregar" value="Agregar nota" onclick="javascript:enviarNota();">
				<input type="button" class="boton" id="btn-borrar" value="Borrar notas" onclick="javascript:borrarNotas();">
				<input type="button" class="boton" id="btn-volver" value="Volver" onclick="history.back()">
			</form>
		</div>
	</div>
	<div class="tareas">
		<div class="wrap">
			<ul class="lista" id="lista" onclick="return false">
			<?php
            include('../php/conexion.php');
            $registro = mysql_query("SELECT contenido FROM notas ORDER BY cod_notas ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
				 echo '<li><a href="#">'.$registro2['contenido'].'</a></li>';      
            }
       		?>
			</ul>
		</div>
	</div>
	<script src="../js/nota.js"></script>
</body>
</html>