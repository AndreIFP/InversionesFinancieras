<?php
session_start();
include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];
		
	$id_usuario = $_SESSION['id'];
	$cliente = $_SESSION['cliente'];
	$temporada = $_SESSION['temporada'];
	$nombre = $_POST=["btnrlogin"];
	$Idperiodo=$_SESSION['Idtemporada'];
	// $id_usuario = $_POST['id_usuario'];
	

	$queryregistro=("CALL INSERTARBALANZA('$Idperiodo','$cliente')"); 

	if(mysqli_query($con,$queryregistro))
    {
		echo "<script> alert('Generando Balanza De Comprobación');document.location='../libro/BalanzaComp.php'</script>";	
    } else{
		echo "<script> alert('¡Error!');document.location='../libro/libro.php'</script>";
	}



		
				

	

?>
