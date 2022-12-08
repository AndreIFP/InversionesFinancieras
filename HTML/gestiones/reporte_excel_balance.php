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
$_SESSION['empresa'];
$_SESSION['temporada'] = "10";
require ('../conexion.php');

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename= Reporte Balance.xls");

$id_usuario = $_SESSION['id'];
$cliente = $_SESSION['cliente'];
$temporada = $_SESSION['temporada'];
$fechai = $_SESSION['fechai'];
$fechaf = $_SESSION['fechaf'];
$empresa = $_SESSION['empresa'];

//Llanmado de total activo
$sql = "SELECT ifnull(SUM(Sdebe),0) as Activos  FROM tbl_balanza tb 
  where Id_cliente=$cliente and COD_CUENTA like '1%';";
  $resultado = mysqli_query($conn, $sql);
  while ($rows = $resultado->fetch_assoc()) {
    $Activos  = $rows["Activos"];
}

//Llanmado de total pasivo
$sql2 = "SELECT ifnull(SUM(SAcreedor),0) AS pasivo  FROM tbl_balanza tb 
  where Id_cliente=$cliente and COD_CUENTA like '2%';";
  $resultado2 = mysqli_query($conn, $sql2);
  while ($rows = $resultado2->fetch_assoc()) {
    $Pasivo = $rows["pasivo"];
}

//Llanmado de total patrimonio
$sql3 = "SELECT ifnull(SUM(SAcreedor),0) as patrimonio  FROM tbl_balanza tb 
  where Id_cliente=$cliente  and COD_CUENTA like '3%';";
  $resultado3 = mysqli_query($conn, $sql3);
  while ($rows = $resultado3->fetch_assoc()) {
    $patrimonio  = $rows["patrimonio"];
  }

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

//Fecha
date_default_timezone_set("America/Guatemala");
$fecha = date("d-m-Y h:i:s a");

?>
  
 
</td>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
<center><a class="navbar-brand" href="#"><img src="https://static.wixstatic.com/media/a8b67e_ee38a6320bfe462ebd005a4593c49553~mv2.png" height="85" alt=""></a></center>

<h2><center><strong>Inversiones Financieras IS</strong></center></h2>
<label><center>Dirección: <?php echo $Direccion ?></center></label>
<label><center>Teléfono: <?php echo $Telefono ?></center></label>
<label><center>Email: <?php echo $Correo ?></center></label>
<label><center>Reporte Balance General</center></label>
<label><center><?php echo $empresa ?></center></label>
<label><center>Del <?php echo $fechai ?> AL <?php echo $fechaf ?></center></label>

<br>
<label>ACTIVOS</label>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<?php
      $sql1 = "SELECT tcc.CUENTA ,tb.Sdebe  FROM tbl_balanza tb 
      join tbl_catalago_cuentas tcc on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
      where Id_cliente=$cliente and COD_CUENTA like '1%'; ";
      $resultado1 = mysqli_query($conn, $sql1);

      while ($rows = $resultado1->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['Sdebe'];

      ?>
        <tr>
          <th></th>
          <th> <?php echo $Cod ?></th>
          <th> <?php echo number_format($cuen,2) ?></th>
        </tr>
      <?php
      }
      ?>
      </tr>
      <tr style="background: #B0E0E6;">
      <th></th>
      <th>Total Activos</th>
      <th><?php echo number_format($Activos,2) ?></th>
      </tr>
</table>
<br>
<label>PASIVOS</label>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<?php
      $sqlcosto = "SELECT tcc.CUENTA ,tb.SAcreedor   FROM tbl_balanza tb 
      join tbl_catalago_cuentas tcc on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
      where Id_cliente=$cliente and COD_CUENTA like '2%'; ";
      $costosv = mysqli_query($conn, $sqlcosto);

      while ($rows = $costosv->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['SAcreedor'];

      ?>
        <tr>
          <th></th>
          <th> <?php echo $Cod ?></th>
          <th> <?php echo number_format($cuen,2) ?></th>
        </tr>
      <?php
      }
      ?>
      </tr>
      <tr style="background: #B0E0E6;">
      <th></th>
      <th>Total Pasivos</th>
      <th><?php echo number_format($Pasivo,2) ?></th>
      </tr>
</table>
<br>
<label>PATRIMONIO</label>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<?php
      $sqloperativos = "SELECT tcc.CUENTA ,tb.SAcreedor as Sdebe FROM tbl_balanza tb 
      join tbl_catalago_cuentas tcc on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
      where Id_cliente=$cliente  and COD_CUENTA like '3%';";
      $coperativos = mysqli_query($conn, $sqloperativos);

      while ($rows = $coperativos->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['Sdebe'];

      ?>
        <tr>
          <th></th>
          <th> <?php echo $Cod ?></th>
          <th> <?php echo number_format($cuen,2) ?></th>
        </tr>
      <?php
      }
      ?>
      </tr>
      <tr style="background: #B0E0E6;">
      <th></th>
      <th>Total Patrimonio</th>
      <th><?php echo number_format($patrimonio,2) ?></th>
      </tr>
</table>
<br>
<label>Reporte creado por: <?php echo $user=$_SESSION['user'] ?></label>
<label> <?php echo $fecha ?></strong></label>
</body>
</html>