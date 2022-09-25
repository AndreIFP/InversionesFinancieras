<?php 
$dbhost = "localhost:3307";
$dbuser = "root";
$dbpass = "3214";
$dbname = "2w4GSUinHO";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

?>