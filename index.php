<!--
   Principal.html
   Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<LINK rel="icon" href="favicon.ico" />
	<style type="text/css">
	*{
		margin:0; 
		padding:0;
	}
	#caja {
		background:#252932;
		width:200px;
		/*border:1px solid black;*/
		margin:200px auto;
		padding:1em;
		border-radius:6px;
	}
	h1{
		text-align:center;
		font-weight:bold;
		color:#f2f2f2; 
		padding:6px;
	}
	input[type=text],input[type=password]{
		margin: 0 0 1em 0;
		width:200px;
		height:25px;
		border:0px;
		padding-left:5px;
		border-radius:13px;
		text-align: left;
		outline:none;
	}
	input[type=submit], form a{
		display:inline-block;
		padding:1em;
		width:200px;
		margin: 0 0 1em 0;
		background:#000;
		border:none;
		color:#f2f2f2;
		line-height:normal;
		font-size:15px;
		font-weight:bold;
		-webkit-transition:all 500ms ease;
		-o-transition:all 500ms ease;
		transition:all 500ms ease;
		border-radius:50px;
		text-decoration:none;
		outline:none;
	}
	input[type=submit]:hover, from a:hover{
		background:#f56f3a;
		cursor:pointer;
	}
	/*input[type=submit]:active{
		transform:scale(0.90);
	}*/
	#caja{
		-webkit-transition:height 0.3s;
		-moz-transition:height 0.3s;
		-ms-transition:height 0.3s;
		-o-transition:height 0.3s;
		transition:height 0.3s;
	}

	body{
			background: #252932;
;
	</style>
	<head>
		<title>Iniciar Sesión</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="generator" content="Geany 1.27" />
	</head>

	<body>
		<div id="caja">
			<h1>Iniciar Sesión</h1>
			<form action="php/validar.php" method="post">
				<input type="text" placeholder="&#128272; Usuario" name="usuario" required autofocus/>
				<input type="password" placeholder="&#128272; Contraseña" name="clave" required/>
				<input type="submit" name="boton" value="Ingresar"/>
			</form>
		</div>
	</body>

</html>
