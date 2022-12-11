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
$_SESSION['Idtemporada'];

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
$Idperiodo=$_SESSION['Idtemporada'];

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

<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1 class="table">
    <body>

      <?php
      include("../conexion.php");
      $sql = mysqli_query($conn, " select *  from tbl_eresultado te
  where te.Id_Eresultado=(select MAX(Id_Eresultado) from tbl_eresultado te2 where Id_periodo='$Idperiodo' and Id_Cliente='$cliente')");
      mysqli_close($conn);

      $result = mysqli_num_rows($sql);
      if ($result > 0) {
        while ($rows = mysqli_fetch_array($sql)) {
      ?>
          <?php
          $Ingresos = $rows["Ingresos"];
          $CostoVentas = $rows["CostoVentas"];
          $UtilidadBruta = $rows["UtilidadBruta"];
          $Gastosventas = $rows["Gastosventas"];
          $Gastosadministracion = $rows["Gastosadministracion"];
          $Gastosfinancieros = $rows["Gastosfinancieros"];
          $OtrosGastos = $rows["OtrosGastos"];
          $GastosOperacionales = $rows["GastosOperacionales"];
          $Up_capital = $rows["Up_capital"];
          $Otrosingresos = $rows["Otrosingresos"];
          $Up_isr = $rows["Up_isr"];
          $ISV = $rows["ISV"];
          $UtilidadPerdida = $rows["UtilidadPerdida"];
          ?>
          <tr>


            <td>
              <center> Ingresos <?php echo   $Ingresos ?></center>

              <center> Costo Ventas <?php echo  $CostoVentas ?></center>

              <center> Utilidad o pérdida bruta <?php echo $UtilidadBruta ?></center>

              <center> Gastos de ventas <?php echo $Gastosventas ?></center>


              <center> Gastos de administracion <?php echo $Gastosadministracion ?></center>


              <center> Gastos financieros <?php echo $Gastosfinancieros ?></center>


              <center> Otros gastos <?php echo $OtrosGastos ?></center>


              <center> Gastos operacionales <?php echo  $GastosOperacionales ?></center>

              <center> Utilidad o pérdida de operación <?php echo  $Up_capital ?></center>

              <center> Otros ingresos <?php echo   $Otrosingresos ?></center>


              <center> Utilidad o pérdida antes de impuesto <?php echo  $Up_isr ?></center>


              <center> Impuesto sobre la renta <?php echo $ISV ?></center>



              <center> Utilidad o pérdida neta <?php echo $UtilidadPerdida ?></center>
            </td>

          <?php
        }
          ?>


          </tr>
        <?php
      }

        ?>
    </tbody>
  </table>

<br>

<label>Reporte creado por: <?php echo $user=$_SESSION['user'] ?></label>
<label> <?php echo $fecha ?></strong></label>
</body>
</html>