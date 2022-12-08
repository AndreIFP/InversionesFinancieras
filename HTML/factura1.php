
<?php

include('conexion.php');

$codigo = $_POST["Codigo"];
$Descripcion = $_POST["Descripcion"];
$Cantidad = $_POST["cantidad"];
$fecha = $_POST["Fecha"];
$factur = $_POST["factura"];
$proveedo = $_POST["proveedor"];


$sql = "INSERT INTO tbl_kardex (Id_Usuario,fecha, detalle, id_product, proname, cant_entrada, total_cante, cant_salida,total_cants) VALUES (1,'$fecha','ENTRADA',1,'$Descripcion','$Cantidad',null,null,null)";
$con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$exito = mysqli_query($con,$sql);


$sql3 = "INSERT INTO product (Nfactura,Proveedor,proname,amount) VALUES ('$factur','$proveedo','$Descripcion','$Cantidad')";
$con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$exito = mysqli_query($con,$sql3);

echo "<script>alert('Su Factura ha sido registrada con exito');window.location= 'index.php'</script>";
?>
