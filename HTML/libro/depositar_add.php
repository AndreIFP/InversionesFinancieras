<?php
session_start();
include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];
		
	$id_usuario = $_SESSION['id'];
	$cliente = $_SESSION['cliente'];
	$temporada = $_SESSION['temporada'];
	// $id_usuario = $_POST['id_usuario'];
	$fecha = $_POST['fechax'];
	$idcuenta=$_POST['txtpregunta'];
	$debe_haber = $_POST['debe_haber'];

	$descripcion = $_POST['descripcion'];
    $monto = $_POST['monto'];





$consultas=mysqli_query($con,"SELECT CUENTA FROM tbl_catalago_cuentas where CODIGO_CUENTA='$idcuenta' ;");
while($row=mysqli_fetch_array($consultas)){
 $idpreg=$row['CUENTA'];
}



$consultas2=mysqli_query($con,"SELECT Deuda_Cuenta_Total FROM CUENTAS_POR_COBRAR  where Id_Cliente='$cliente ';");
while($row=mysqli_fetch_array($consultas2)){
 $deudacuent=$row['Deuda_Cuenta_Total'];
}

//$deudaactual=$deudacuent - $monto;
$queryregistro = "UPDATE CUENTAS_POR_COBRAR SET  Cuentas='$idpreg',Descripcion='$descripcion', Deposito='$monto',Deuda_Actual='$deudaactual' where Id_Cliente='$cliente';";
    
    if(mysqli_query($con,$queryregistro))
    {

    } 


		$update=mysqli_query($con,"update tbl_libros set caja=caja+'$monto' where Id_cliente='$cliente' and Id_Libro=$temporada ");

		
				mysqli_query($con, "CALL validar('$idpreg','$descripcion','$monto','$debe_haber','$cliente','$fecha','$id_usuario')"); 

	echo "<script> alert('Se Ingreso el deposito correctamente');document.location='../libro/libro.php'</script>";	

?>
