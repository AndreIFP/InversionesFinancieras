<?php
session_start();
include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];
		
	$id_usuario = $_SESSION['id'];
	$cliente = $_SESSION['cliente'];
	$temporada = $_SESSION['temporada'];
	$nombre = $_POST=["btnrlogin"];
	$ISV=$_SESSION['impu'];
	$UTILIDADNETA=$_SESSION['neta'];
	// $id_usuario = $_POST['id_usuario'];
	


	$patata=mysqli_query($con, "SELECT COD_CUENTA FROM tbl_balanza WHERE Id_cliente=$cliente ;");
	while ($row = mysqli_fetch_array($patata)) {
		$condigo= $row['COD_CUENTA'];
	}

	$consulta=mysqli_query($con, "SELECT Id_asiento FROM tbl_asientos WHERE Id_cliente= '$cliente';" );
	while ($row = mysqli_fetch_array($consulta)) {
		$asiento= $row['Id_asiento'];
	}
	$consulta2=mysqli_query($con, "SELECT * FROM tbl_detallleasientos WHERE Id_asiento='$asiento '" );
	while ($row = mysqli_fetch_array($consulta2)) {
		$detalle= $row['Id_detalle'];
		
	}
 
	
	if($condigo=='2105' or $condigo=='3104'){
		mysqli_query($con,"UPDATE tbl_balanza SET SAcreedor='$ISV' WHERE Id_cliente= '$cliente' and COD_CUENTA='2105'");
		mysqli_query($con,"UPDATE tbl_balanza SET SAcreedor='$UTILIDADNETA' WHERE Id_cliente= '$cliente' and COD_CUENTA='3104'");
		echo "<script> alert('Balance Generado'); window.location='Balanzageneral.php' </script>";
	}else{
		mysqli_query($con,"INSERT INTO tbl_balanza(Id_cliente,COD_CUENTA,Mhaber,Mdebe,Sdebe,SAcreedor) VALUE ('$cliente','2105','0','0','0','$ISV')");
		mysqli_query($con,"INSERT INTO tbl_balanza(Id_cliente,COD_CUENTA,Mhaber,Mdebe,Sdebe,SAcreedor) VALUE ('$cliente','3104','0','0','0','$UTILIDADNETA')");
		echo "<script> alert('Balance pp'); window.location='Balanzageneral.php' </script>";
		
	}

	
   
?>
