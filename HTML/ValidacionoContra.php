<?php
//validacion Login
include('conexion.php');

$nombre = $_POST["txtusuario"];


$query = mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Usuario = '".$nombre."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
	//header("Location: OlvidoContra.html");
	echo "<script> alert('Usuario Valido: $nombre');window.location= 'PreguntasxUsuario.php' </script>";
}
else if ($nr == 0) 
{
	//header("Location: login.php");
	echo "No ingreso"; 
	echo "<script> alert('Usuario No Valido: $nombre');window.location= 'OlvidoContra.php' </script>";
}
	
//Validacion registro



?>
