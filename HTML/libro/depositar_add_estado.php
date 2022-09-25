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

$caja=0;

$consultas=mysqli_query($con,"SELECT CUENTA FROM TBL_CATALAGO_ESTADO where CODIGO_CUENTA='$idcuenta' ;");
while($row=mysqli_fetch_array($consultas)){
 $idpreg=$row['CUENTA'];
}
$consultas2=mysqli_query($con,"SELECT Deuda_Cuenta_Total FROM CUENTAS_POR_COBRAR  where Id_Cliente='$cliente ';");
while($row=mysqli_fetch_array($consultas2)){
 $deudacuent=$row['Deuda_Cuenta_Total'];
}

$deudaactual=$deudacuent - $monto;
$queryregistro = "UPDATE CUENTAS_POR_COBRAR SET  Cuentas='$idpreg',Descripcion='$descripcion', Deposito='$monto',Deuda_Actual='$deudaactual' where Id_Cliente='$cliente';";
    
    if(mysqli_query($con,$queryregistro))
    {

    } 

		mysqli_query($con,"INSERT INTO libro2(fecha,cuenta,descripcion,monto,id_cliente,temporada,id_usuario)
				VALUES('$fecha','$idpreg','$descripcion','$monto','$cliente','$temporada','$id_usuario')")or die(mysqli_error($con));

			

	echo "<script>document.location='../libro/estado.php'</script>";	

?>
