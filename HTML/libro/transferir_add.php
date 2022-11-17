<?php
session_start();
include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];

	$id_usuario = $_SESSION['id'];
	$cliente = $_SESSION['cliente'];
	$temporada = $_SESSION['temporada'];
	$idcuenta=$_POST['txtpregunta'];

	// $id_usuario = $_POST['id_usuario'];
	$fecha = $_POST['fechax'];

	$debe_haber = $_POST['debe_haber'];
	$descripcion = $_POST['descripcion'];
$monto = $_POST['monto'];

$consultas=mysqli_query($con,"SELECT CUENTA FROM TBL_CATALAGO_CUENTAS where CODIGO_CUENTA='$idcuenta' ;");
while($row=mysqli_fetch_array($consultas)){
 $idpreg=$row['CUENTA'];
}

		$update=mysqli_query($con,"update TBL_LIBROS set caja=caja-'$monto' where Id_cliente='$cliente' and Id_Libro=$temporada ");

		
		mysqli_query($con, "CALL 	validar('$idpreg','$descripcion','$monto','$debe_haber','$cliente','$fecha','$id_usuario')"); 

			

		echo "<script> alert('Se Ingreso el Retiro correctamente');document.location='../libro/libro.php'</script>";

?>
