<?php
session_start();
include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];

	$id_usuario = $_SESSION['id'];
	$cliente = $_SESSION['cliente'];
	$temporada = $_SESSION['temporada'];
	$idcuenta=$_POST['txtpregunta'];
	$cuenta = $_SESSION['cuenta'];
	// $id_usuario = $_POST['id_usuario'];
	$fecha = $_POST['fechax'];

	$debe_haber = $_POST['debe_haber'];
	$descripcion = $_POST['descripcion'];
$monto = $_POST['monto'];

$consultas=mysqli_query($con,"SELECT CUENTA FROM TBL_CATALAGO_ESTADO where CODIGO_CUENTA='$idcuenta' ;");
while($row=mysqli_fetch_array($consultas)){
 $idpreg=$row['CUENTA'];
}

		
		mysqli_query($con,"INSERT INTO libro2(fecha,cuenta,descripcion,"0",debe_haber,id_cliente,temporada,id_usuario)
				VALUES('$fecha','$idpreg','$descripcion','$monto','$debe_haber','$cliente','$temporada','$id_usuario')")or die(mysqli_error($con));

			

	echo "<script>document.location='../libro/estado.php'</script>";	

?>
