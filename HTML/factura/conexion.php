<?php 
try{
$dbhost = "localhost:3307";
$dbuser = "root";
$dbpass = "3214";
$dbname = "2w4GSUinHO";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

}catch(Exception $e){
	echo "<script> alert('ERR-001: Revise las credenciales de conexion hacia la base de datos. LINEA DEL ERROR: ".$e->getline()."');window.location= 'login.php' </script>";
}
if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

?>