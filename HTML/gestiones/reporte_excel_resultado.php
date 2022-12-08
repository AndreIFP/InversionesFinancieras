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
header("Content-Disposition: attachment; filename= Reporte Esatdo De Resultado.xls");

$id_usuario = $_SESSION['id'];
$cliente = $_SESSION['cliente'];
$temporada = $_SESSION['temporada'];
$fechai = $_SESSION['fechai'];
$fechaf = $_SESSION['fechaf'];
$empresa = $_SESSION['empresa'];

//Llanmado de total ingresos
$sql = "SELECT ifnull(sum(tb.SAcreedor),0) as Ingresos  FROM tbl_catalago_cuentas tcc 
JOIN tbl_balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE '6401%'; ";
  $resultado = mysqli_query($conn, $sql);
  while ($rows = $resultado->fetch_assoc()) {
    $ingresos = $rows["Ingresos"];
  }

  //<!-- COSTO DE VENTAS-->
  $sql2 = "SELECT ifnull(sum(tb.Sdebe),0) AS costos   FROM tbl_catalago_cuentas tcc 
  JOIN tbl_balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6501%'";
  $resultado2 = mysqli_query($conn, $sql2);
  while ($rows = $resultado2->fetch_assoc()) {
    $Costos = $rows["costos"];
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
<label><center>Reporte Estado De Resultado</center></label>
<label><center><?php echo $empresa ?></center></label>
<label><center>Del <?php echo $fechai ?> AL <?php echo $fechaf ?></center></label>
<br>

<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<?php
      $sql1 = "SELECT tcc.CUENTA,tb2.SAcreedor  from tbl_balanza tb2  
      join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
      where COD_CUENTA like '6401%' and Id_cliente=$cliente and tb2.SAcreedor!=0;";
$resultado1 = mysqli_query($conn, $sql1);

while ($rows = $resultado1->fetch_assoc()) {
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
      <th>Total Ingresos</th>
      <th><?php echo number_format($ingresos,2) ?></th>
      </tr>
</table>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<?php
      $sqlcosto = "SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join tbl_balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6501%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
      $costosv = mysqli_query($conn, $sqlcosto);

      while ($rows = $costosv->fetch_assoc()) {
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
      <th>Total Costos De Ventas</th>
      <th><?php echo number_format($Costos,2) ?></th>
      </tr>
</table>

<!--UTILIDAD BRUTA-->
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
      </tr>
      <tr style="background: #B0E0E6;">
      <th></th>
      <th>UTILIDAD BRUTA</th>
      <th><?php echo number_format(($ingresos - $Costos),2) ?></th>
      </tr>
</table>

<!--gastos operativos-->
<?php
  $sql3 = "SELECT ifnull(sum(tb.Sdebe),0) AS operativos   FROM tbl_catalago_cuentas tcc 
  JOIN tbl_balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6502%'";
  $resultado3 = mysqli_query($conn, $sql3);
  while ($rows = $resultado3->fetch_assoc()) {
    $operativos  = $rows["operativos"];
  }
  ?>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<?php
      $sqloperativos = "  SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join tbl_balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6502%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
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
      <th>Total Gastos Operativos</th>
      <th><?php echo number_format($operativos,2) ?></th>
      </tr>
</table>
<!--gastos ventas-->
<?php
  $sql4 = "SELECT ifnull(sum(tb.Sdebe),0) AS ventas  FROM tbl_catalago_cuentas tcc 
  JOIN tbl_balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6503%'";
  $resultado4 = mysqli_query($conn, $sql4);
  while ($rows = $resultado4->fetch_assoc()) {
    $ventas  = $rows["ventas"];
  }
  ?>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<?php
      $sqlventas = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join tbl_balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6503%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
      $cventas = mysqli_query($conn, $sqlventas);

      while ($rows = $cventas->fetch_assoc()) {
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
      <th>Total Gastos De Ventas</th>
      <th><?php echo number_format($ventas,2) ?></th>
      </tr>
</table>

<!--gastos financieros-->
<?php
  $sql5 = "SELECT ifnull(sum(tb.Sdebe),0) AS financieros   FROM tbl_catalago_cuentas tcc 
  JOIN tbl_balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6504%'";
  $resultado5 = mysqli_query($conn, $sql5);
  while ($rows = $resultado5->fetch_assoc()) {
    $financieros = $rows["financieros"];
  }
  ?>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<?php
      $sqlfinancieros = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join tbl_balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6504%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
      $cfinancieros= mysqli_query($conn, $sqlfinancieros);

      while ($rows =$cfinancieros->fetch_assoc()) {
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
      <th>Total Gastos Financieros</th>
      <th><?php echo number_format($financieros,2) ?></th>
      </tr>
</table>

<!--Otros gastos-->
<?php
  $sql6 = "SELECT ifnull(sum(tb.Sdebe),0) AS gastos  FROM tbl_catalago_cuentas tcc 
  JOIN tbl_balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6505%' ";
  $resultado6 = mysqli_query($conn, $sql6);
  while ($rows = $resultado6->fetch_assoc()) {
    $gastos = $rows["gastos"];
  }
  ?>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<?php
      $sqlotros = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join tbl_balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6505%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
      $cotros= mysqli_query($conn, $sqlotros);

      while ($rows =$cotros->fetch_assoc()) {
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
      <th>Total Otros Gastos</th>
      <th><?php echo number_format($gastos,2) ?></th>
      </tr>
</table>

<!--Otros INGRESOS-->
<?php
  $sqloingresos = "SELECT ifnull(sum(tb.SAcreedor),0) AS OINGRESOS  FROM tbl_catalago_cuentas tcc 
  JOIN tbl_balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6402%' ";
  $resultadooingresos = mysqli_query($conn, $sqloingresos);
  while ($rows = $resultadooingresos->fetch_assoc()) {
    $OINGRESOS = $rows["OINGRESOS"];
  }
  ?>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<?php
      $sqlotros = "SELECT tcc.CUENTA,tb2.SAcreedor  from tbl_balanza tb2  
      join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
      where COD_CUENTA like '6402%' and Id_cliente=$cliente and tb2.SAcreedor!=0;";
      $cotros= mysqli_query($conn, $sqlotros);

      while ($rows =$cotros->fetch_assoc()) {
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
      <th>Total Otros Ingresos</th>
      <th><?php echo number_format($OINGRESOS,2) ?></th>
      </tr>
</table>

<!--UTILIDAD -->
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
      <?php $UTILIDADANTESISV = ($ingresos+$OINGRESOS) - ($Costos + $operativos + $ventas + $financieros + $gastos) ?>
      </tr>
      <tr style="background: #B0E0E6;">
      <th></th>
      <th>Utilidad Antes De Impuesto</th>
      <th><?php echo number_format($UTILIDADANTESISV,2) ?></th>
      </tr>
</table>

<!--IMPUESTO -->
<?php
  $sql7 = " SELECT valor as isv FROM tbl_parametros tp 
  WHERE Parametro='Impuesto'";
  $resultado7 = mysqli_query($conn, $sql7);
  while ($rows = $resultado7->fetch_assoc()) {
    $isv = $rows["isv"];
  }
  $ISV = $UTILIDADANTESISV  * ($isv / 100);
  ?>
  <table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
      <?php $UTILIDADANTESISV = ($ingresos+$OINGRESOS) - ($Costos + $operativos + $ventas + $financieros + $gastos) ?>
      </tr>
      <tr style="background: #B0E0E6;">
      <th></th>
      <th>Impuesto</th>
      <th><?php echo number_format($ISV,2) ?></th>
      </tr>
</table>

  <!--IMPUESTO -->
  <table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
      <?php $UTILIDADANTESISV = ($ingresos+$OINGRESOS) - ($Costos + $operativos + $ventas + $financieros + $gastos) ?>
      </tr>
      <tr style="background: #B0E0E6;">
      <th></th>
      <th>Utilidad Neta</th>
      <th><?php echo number_format(($UTILIDADANTESISV - $ISV),2) ?></th>
      </tr>
</table>
<br>

<label>Reporte creado por: <?php echo $user=$_SESSION['user'] ?></label>
<label> <?php echo $fecha ?></strong></label>
</body>
</html>