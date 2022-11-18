
<?php
include('conexion.php');
$codigo = $_POST["Codigo"];
$Descripcion = $_POST["Descripcion"];
$Cantidad = $_POST["cantidad"];
$fecha = $_POST["Fecha"];

/*
$sql = "INSERT INTO TBL_KARDEX (Id_Usuario,fecha, detalle, id_product, proname, cant_entrada) VALUES (1,'$fecha','ENTRADA','$codigo','$Descripcion',$cantidad)";
$con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$exito = mysqli_query($con,$sql);
*/


$sql3 = "INSERT INTO product (proname,amount) VALUES ('$Descripcion','$Cantidad')";
$con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$exito = mysqli_query($con,$sql3);

echo "<script>alert('Su Factura ha sido registrada con exito');window.location= 'index.php'</script>";
?>

