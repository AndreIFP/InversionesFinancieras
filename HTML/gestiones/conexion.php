<?php
	
	$mysqli = new mysqli("142.44.161.115","CALAPAL","Calapal##567","2w4GSUinHO"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	
?>