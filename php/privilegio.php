<?php
	@session_start(); 
	if($_SESSION["privilegio"] == 2){
		header ("Location: menu.php");
	}
?>