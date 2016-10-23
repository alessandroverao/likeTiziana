<html>
	<LINK rel="icon" href="favicon.ico" />
	<?php
	/*
	 * Validar.php
	 * Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao
	 */
	/* A continuación, realizamos la conexión con nuestra base de datos en MySQL */ 
		$link = mysql_connect("localhost","alessandroverao","blustation69"); 
		mysql_select_db("liketiziana", $link); 
		/* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función htmlentities para evitar inyecciones SQL. */ 
		$myusuario = mysql_query("select idusuario from usuarios where idusuario = '".htmlentities($_POST["usuario"])."'",$link); 
		$nmyusuario = mysql_num_rows($myusuario);  

		$privilegio = mysql_query("select privilegio from usuarios where idusuario = '".htmlentities($_POST["usuario"])."'",$link); 
		

		//Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario... 
		if($nmyusuario != 0)
		{ 
		$sql = "SELECT idusuario FROM usuarios WHERE estado = 1 and idusuario = '".htmlentities($_POST["usuario"])."' and clave = '".md5(htmlentities($_POST["clave"]))."'"; 
		$myclave = mysql_query($sql,$link); 
		$nmyclave = mysql_num_rows($myclave); 
		//Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo. 
			if($nmyclave != 0)
			{ 
				session_start(); 
			//Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueado" un usuario 
				$_SESSION["autentica"] = "SIP"; 
				$_SESSION["usuarioactual"] = mysql_result($myclave,0,0); 
				$_SESSION["privilegio"] = mysql_result($privilegio,0,0);
				
			//nombre del usuario logueado. 
			//Direccionamos a nuestra página principal del sistema. 
				header ("Location: ../php/menu.php");
			}
			else{ 
				echo"<script>alert('La contrase\u00f1a del usuario no es correcta.'); window.location.href=\"../index.php\"</script>"; 
			} 
		}
		else
		{ 
			echo"<script>alert('El usuario no existe.'); window.location.href=\"../index.php\"</script>"; 
		}
		mysql_free_result($myusuario);  //liberar resultados
		mysql_close($link);
		
	?>
</html>