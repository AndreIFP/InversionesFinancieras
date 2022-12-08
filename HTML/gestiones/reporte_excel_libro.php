<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar</title>
    

</head>
<body>
    
<?php
session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['temporada']="10";
require ('../conexion.php');

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename= Reporte.xls");

$id_usuario=$_SESSION['id'];
$cliente=$_SESSION['cliente'];
$temporada=$_SESSION['temporada'];
$fechai=$_SESSION['fechai'];
$fechaf=$_SESSION['fechaf'];
$fecha = date('Y-m-d h:i:s');

$sql = "select a.Id_asiento, a.Fecha, a.Descripcion, a.montoTotal, c.Nombre_Cliente, u.Usuario
from tbl_asientos a 
inner join tbl_clientes c ON a.Id_Cliente = c.Id_Cliente
inner join tbl_usuario u ON a.Id_Usuario = u.Id_Usuario where a.Id_Cliente='$cliente'";
$DataPaises = mysqli_query($conn, $sql);

// Llamado del parametro dirección
$sqldireccion = "SELECT * FROM tbl_parametros WHERE Id_Parametro = '4'";
$resultadodir = mysqli_query($conn,$sqldireccion);
while ($fila = $resultadodir->fetch_assoc()) {
    $Direccion = $fila["Valor"];
}

// Llamado del parametro telefono
$sqlTelefono = "SELECT * FROM tbl_parametros WHERE Id_Parametro = '3'";
$resultadotel = mysqli_query($conn,$sqlTelefono);
while ($fila = $resultadotel->fetch_assoc()) {
    $Telefono = $fila["Valor"];
}

// Llamado del parametro correo
$sqlCorreo = "SELECT * FROM tbl_parametros WHERE Id_Parametro = '2'";
$resultadocorreo = mysqli_query($conn,$sqlCorreo);
while ($fila = $resultadocorreo->fetch_assoc()) {
    $Correo = $fila["Valor"];
}

?>
  
 
</td>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
<center><a class="navbar-brand" href="#"><img src="https://static.wixstatic.com/media/a8b67e_ee38a6320bfe462ebd005a4593c49553~mv2.png" height="85" alt=""></a></center>

<h2><center><strong>Inversiones Financieras IS</strong></center></h2>
<label><center>Dirección: <?php echo $Direccion ?></center></label>
<label><center>Teléfono: <?php echo $Telefono ?></center></label>
<label><center>Email: <?php echo $Correo ?></strong></center></label>
<label><center>Reporte</center></label>

<br>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #B0E0E6;">
    <th>No. Asiento</th>
    <th>Nombre Cliente</th>
    <th>Usuario</th>
    <th>Fecha</th>
    <th>Descripción</th>
    <th>Monto Total</th>
    </tr>
</thead>
<?php
    while ($row = mysqli_fetch_array($DataPaises)) { ?>
    <tbody>
        <tr>
        <td><?php echo $row['Id_asiento'] ?></td>
        <td><?php echo $row['Nombre_Cliente'] ?></td>
        <td><?php echo $row['Usuario'] ?></td>
        <td><?php echo $row['Fecha'] ?></td>
        <td><?php echo $row['Descripcion'] ?></td>
        <td><?php echo $row['montoTotal'] ?></td>
        </tr>
    </tbody>
    
<?php } ?>
</table>
<br>
<label>Reporte creado por: <?php echo $user=$_SESSION['user'] ?></label>
<label> <?php echo $fecha ?></strong></label>
</body>
</html>