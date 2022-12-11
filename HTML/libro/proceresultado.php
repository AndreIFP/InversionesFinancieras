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
	$Idperiodo=$_SESSION['Idtemporada'];
	// $id_usuario = $_POST['id_usuario'];
	$queryregistro=("CALL Eresultados('$cliente','$Idperiodo')"); 

	if(mysqli_query($con,$queryregistro))
    {
		echo "<script> alert('Generando Estado de resultado');document.location='../libro/Resultado.php'</script>";	
    } else{
		echo "<script> alert('¡Error!');document.location='../libro/BalanzaComp.php'</script>";
	}


   
?>
