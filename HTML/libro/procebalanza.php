<?php
session_start();
include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];
		
	$id_usuario = $_SESSION['id'];
	$cliente = $_SESSION['cliente'];
	$temporada = $_SESSION['temporada'];
	$nombre = $_POST=["btnrlogin"];
	// $id_usuario = $_POST['id_usuario'];
	

	$queryregistro=("CALL Balanza('$cliente')"); 

	if(mysqli_query($con,$queryregistro))
    {
		echo "<script> alert('Se Ingreso el  procedure correctamente');document.location='../libro/BalanzaComp.php'</script>";	
    } else{
		echo "<script> alert('No se Ingreso el procedure ');document.location='../libro/libro.php'</script>";
	}



		
				

	

?>
