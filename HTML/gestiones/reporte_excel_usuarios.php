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
require ('../conexion.php');

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename= Reporte Usuarios.xls");




$sql = "select u.Id_Usuario, u.Usuario, u.Nombre_Usuario, u.Estado_Usuario, u.Correo_Electronico, u.Fecha_Ultimo_Conexion, r.Rol from TBL_USUARIO u inner join TBL_ROLES r ON u.Rol = r.Id_Rol WHERE Estado_Usuario = 'Activo' ORDER BY u.Id_Usuario DESC";
$DataPaises = mysqli_query($conn, $sql);

// Llamado del parametro dirección
$sqldireccion = "SELECT * FROM TBL_PARAMETROS WHERE Id_Parametro = '4'";
$resultadodir = mysqli_query($conn,$sqldireccion);
while ($fila = $resultadodir->fetch_assoc()) {
    $Direccion = $fila["Valor"];
}

// Llamado del parametro telefono
$sqlTelefono = "SELECT * FROM TBL_PARAMETROS WHERE Id_Parametro = '3'";
$resultadotel = mysqli_query($conn,$sqlTelefono);
while ($fila = $resultadotel->fetch_assoc()) {
    $Telefono = $fila["Valor"];
}

// Llamado del parametro correo
$sqlCorreo = "SELECT * FROM TBL_PARAMETROS WHERE Id_Parametro = '2'";
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
<label><center>Reporte Usuarios</center></label>

<br>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>



    <tr style="background: #B0E0E6;">
    <th>Id</th>
    <th>Usuario</th>
    <th>Nombre Usuario</th>
    <th>Estado</th>
    <th>Rol</th>
    <th>Fecha Ultimo Conexion</th>
    <th>Correo Electronico</th>
    </tr>
</thead>
<?php
    while ($row = mysqli_fetch_array($DataPaises)) { ?>
    <tbody>
        <tr>
        <td><?php echo $row['Id_Usuario'] ?></td>
        <td><?php echo $row['Usuario'] ?></td>
        <td><?php echo $row['Nombre_Usuario'] ?></td>
        <td><?php echo $row['Estado_Usuario'] ?></td>
        <td><?php echo $row['Rol'] ?></td>
        <td><?php echo $row['Fecha_Ultimo_Conexion'] ?></td>
        <td><?php echo $row['Correo_Electronico'] ?></td>
        </tr>
    </tbody>
    
<?php } ?>
</table>
</body>
</html>