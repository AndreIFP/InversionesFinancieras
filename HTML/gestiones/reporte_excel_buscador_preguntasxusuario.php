<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Excel</title>
    

</head>
<body>
    
<?php
require ('../conexion.php');

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename= Reporte Preguntas por usuario.xls");

session_start();

date_default_timezone_set("America/Guatemala");
$fecha = date("d-m-Y h:i:s a");

$busqueda=$_GET['busqueda_filtro'];
// Creación del objeto de la clase heredada
$sql = mysqli_query($conn, "SELECT * from tbl_preguntas_x_usuario WHERE ( Id_Preguntas LIKE '%$busqueda%' OR
                                                                                Id_Usuario LIKE '%$busqueda%') ");

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
<label><center>Reporte Preguntas por usuario</center></label>

<br>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #B0E0E6;">
    <th>Id</th>
                        <th>Id Usuario</th>
                        <th>Preguntas</th>
                        <th>Respuesta</th>
    </tr>
</thead>
<?php
    while ($row = mysqli_fetch_array($sql)) { ?>
    <tbody>
        <tr>
        <th><?php echo $row['Id_Preguntas'] ?></th>
                                <th><?php echo $row['Id_Usuario'] ?></th>
                                <th><?php echo $row['Preguntas'] ?></th>
                                <th><?php echo $row['Respuestas'] ?></th>       
        </tr>
    </tbody>
    
<?php } ?>
</table>
<br>
<label>Reporte creado por: <?php echo $user=$_SESSION['user'] ?></label>
<label> <?php echo $fecha ?></strong></label>
</body>
</html>