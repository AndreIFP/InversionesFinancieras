<?php 
include('../conexion.php');

$n_factura =$_POST["N_Factura"];
$Tipo_factura =$_POST["Tipofactura"];
$fecha =$_POST["Fecha"];
$nombrecliente = $_POST["Nombre_Cliente"];
$rtncliente = $_POST["RTN_Cliente"];
$sumaneta = $_POST["Suma_Neta"];
$concepto =$_POST["Concepto"];
$fechad =$_POST["FechaD"];
$fecham = $_POST["FechaM"];
$fechaa = $_POST["FechaA"];
$totalhonorarios = $_POST["Total_Honorarios"];
$valoresretenidos = $_POST["Valores_Retenidos"];
$totalneto = $_POST["Total_Neto"];


	mysqli_query($conn, "INSERT INTO tbl_factura_1 (N_Factura, Fecha, Nombre_Cliente, RTN_Cliente, Suma_Neta, Concepto, FechaD, FechaM, FechaA, Total_Honorarios, Valores_Retenidos, Total_Neto,Tipo_Factura) 
	values ('$n_factura','$fecha','$nombrecliente','$rtncliente','$sumaneta','$concepto','$fechad','$fecham','$fechaa','$totalhonorarios','$valoresretenidos','$totalneto','$Tipo_factura')");

		echo "<script> alert('Factura Guardada');window.location= 'Reporte_Factura_1.php' </script>";

?>
