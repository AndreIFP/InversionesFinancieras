<?php 

session_start();

$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$empresa=$_SESSION['empresa'];

?>

<?php

require('fpdf.php');
require ('../conexion.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
  require ('../conexion.php');
    // Logo
    $this->Image('logO.PNG',10,10,40);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(86);
    // Título
    $this->Cell(22,10,'Inversiones Financieras IS',2,0,'C');
    $this->Ln(5);

   // Llamado del parametro dirección
    $sqldireccion = "SELECT * FROM TBL_PARAMETROS WHERE Id_Parametro = '4'";
    $resultadodir = mysqli_query($conn,$sqldireccion);
    while ($fila = $resultadodir->fetch_assoc()) {
        $Direccion = $fila["Valor"];
    }
    
    $this->SetFont('Arial','',8);
    $this->Cell(90);
    $this->Cell(8,10, utf8_decode($Direccion),0,7, 45);
    $this->Ln(0);

    // Llamado del parametro telefono
    $sqlTelefono = "SELECT * FROM TBL_PARAMETROS WHERE Id_Parametro = '3'";
    $resultadotel = mysqli_query($conn,$sqlTelefono);
    while ($fila = $resultadotel->fetch_assoc()) {
        $Telefono = $fila["Valor"];
    }
    
    $this->SetFont('Arial','',8);
    $this->Cell(86);
    $this->Cell(8,0, utf8_decode('Teléfono: ' .$Telefono ),0,7);
    $this->Ln(4);

    // Llamado del parametro correo
    $sqlCorreo = "SELECT * FROM TBL_PARAMETROS WHERE Id_Parametro = '2'";
    $resultadocorreo = mysqli_query($conn,$sqlCorreo);
    while ($fila = $resultadocorreo->fetch_assoc()) {
        $Correo = $fila["Valor"];
    }

    $this->SetFont('Arial','',8);
    $this->Cell(78);
    $this->Cell(8,0, utf8_decode('Email: '.$Correo),0,7);
    $this->Ln(15);

    $this->SetFont('Arial','',14);
    $this->Cell(64);
    $this->Cell(8,0, utf8_decode('Reporte Estado De Resultado' ),0,7);
    $this->Ln(7);

    $this->SetFont('Arial','',14);
    $this->Cell(40);
    $this->Cell(8,0, utf8_decode($empresa=$_SESSION['empresa'] ),0,7);
    $this->Ln(2);

    $this->Ln(3);
     $this->SetFont('Arial','',14);
    $this->Cell(86);
    $this->Cell(8,0, utf8_decode($_SESSION['fechaf'] ),0,7);
   
    $this->Ln(); 
}

// Pie de página
function Footer()
{
    // Mostrar el usuario que impime el reporte
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    // Movernos a la derecha
    $this->Cell(0,15,utf8_decode('Reporte creado por: '.$user=$_SESSION['user']),2,0,'T');
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,15,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    $Object = new DateTime();  
    $Object->setTimezone(new DateTimeZone('America/Guatemala'));
    $DateAndTime = $Object->format("d-m-Y h:i:s a");
    $this->Cell(0,15,$DateAndTime,0,1,'R');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetMargins(10,10,10);
$pdf->AddPage();

$id_usuario=$_SESSION['id'];
$cliente=$_SESSION['cliente'];
$fechai=$_SESSION['fechai'];
$fechaf=$_SESSION['fechaf'];
$fecha = date('Y-m-d h:i:s');

$pdf->SetFillColor(161, 174, 175  );

$pdf->SetFont('Arial','',14);
    $pdf->setX(80);
    $pdf->Write(5, utf8_decode(''),0,7);
    $pdf->Ln(7);

    // INGRESOS
  $sql = "SELECT ifnull(sum(tb.SAcreedor),0) as Ingresos  FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE '6401%'; ";

    $resultado = mysqli_query($conn, $sql);
    while ($rows = $resultado->fetch_assoc()) {
      $ingresos = $rows["Ingresos"];
    }

    $sql1 = "SELECT tcc.CUENTA ,tb.SAcreedor  from tbl_detallleasientos td 
               join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
               join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
               join Tbl_Balanza tb  on tb.Id_detalle=td.Id_detalle 
               where tcc.CODIGO_CUENTA  LIKE '6401%' and tb.Id_cliente= $cliente and tb.SAcreedor!=0 ;";
      $resultado1 = mysqli_query($conn, $sql1);

      while ($fila = $resultado1->fetch_assoc()) {
        $pdf->setX(15);
        $pdf->Cell(95, 5, utf8_decode($fila['CUENTA']), 1, 0, "B",0);
        $pdf->Cell(30, 5, utf8_decode($fila['SAcreedor']), 1, 0, "C",0);
        $pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
    }

    $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Ingresos"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($ingresos), 1, 0, "C",1);
$pdf->Ln(5);

//COSTO DE VENTAS

$sql2 = "SELECT ifnull(sum(tb.Sdebe),0) AS costos   FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6501%'";
  $resultado2 = mysqli_query($conn, $sql2);
  while ($rows = $resultado2->fetch_assoc()) {
    $Costos = $rows["costos"];
  }

  $sqlcosto = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join Tbl_Balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6501%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
      $costosv = mysqli_query($conn, $sqlcosto);

      while ($fila = $costosv->fetch_assoc()) {
        $pdf->setX(15);
        $pdf->Cell(95, 5, utf8_decode($fila['CUENTA']), 1, 0, "B",0);
        $pdf->Cell(30, 5, utf8_decode($fila['Sdebe']), 1, 0, "C",0);
        $pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
    }

    $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Costos"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Costos), 1, 0, "C",1);
$pdf->Ln(5);

//--UTILIDAD BRUTA-->
  $Utilidad = 0;
  $Utilidad = $ingresos - $Costos;
  $pdf->SetFont('Arial','',14);
  $pdf->setX(15);
  $pdf->Cell(95, 5, utf8_decode("Utilidad Bruta"), 1, 0, "L",1);
  $pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
  $pdf->Cell(30, 5, utf8_decode($Utilidad), 1, 0, "C",1);
  $pdf->Ln(5);

  //gastos operativos

  $sql3 = "SELECT ifnull(sum(tb.Sdebe),0) AS operativos   FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6502%'";
  $resultado3 = mysqli_query($conn, $sql3);
  while ($rows = $resultado3->fetch_assoc()) {
    $operativos  = $rows["operativos"];
  }

$sqloperativos = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join Tbl_Balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6502%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
      $coperativos = mysqli_query($conn, $sqloperativos);

    while ($fila = $coperativos->fetch_assoc()) {
      $pdf->setX(15);
      $pdf->Cell(95, 5, utf8_decode($fila['CUENTA']), 1, 0, "B",0);
      $pdf->Cell(30, 5, utf8_decode($fila['Sdebe']), 1, 0, "C",0);
      $pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
  }

  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Gastos Operativos"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($operativos), 1, 0, "C",1);
$pdf->Ln(5);

//gastos ventas

$sql4 = "SELECT ifnull(sum(tb.Sdebe),0) AS ventas  FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6503%'";
  $resultado4 = mysqli_query($conn, $sql4);
  while ($rows = $resultado4->fetch_assoc()) {
    $ventas  = $rows["ventas"];
  }

$sqlventas = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
join Tbl_Balanza tb  on tb.Id_detalle=td.Id_detalle 
where tcc.CODIGO_CUENTA  LIKE '6503%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
$cventas = mysqli_query($conn, $sqlventas);

  while ($fila = $cventas->fetch_assoc()) {
    $pdf->setX(15);
    $pdf->Cell(95, 5, utf8_decode($fila['CUENTA']), 1, 0, "B",0);
    $pdf->Cell(30, 5, utf8_decode($fila['Sdebe']), 1, 0, "C",0);
    $pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
}

$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Gastos De Ventas"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($ventas), 1, 0, "C",1);
$pdf->Ln(5);

//gastos financieros

$sql5 = "SELECT ifnull(sum(tb.Sdebe),0) AS financieros   FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6504%'";
  $resultado5 = mysqli_query($conn, $sql5);
  while ($rows = $resultado5->fetch_assoc()) {
    $financieros = $rows["financieros"];
  }

$sqlfinancieros = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join Tbl_Balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6504%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
      $cfinancieros= mysqli_query($conn, $sqlfinancieros);

  while ($fila = $cfinancieros->fetch_assoc()) {
    $pdf->setX(15);
    $pdf->Cell(95, 5, utf8_decode($fila['CUENTA']), 1, 0, "B",0);
    $pdf->Cell(30, 5, utf8_decode($fila['Sdebe']), 1, 0, "C",0);
    $pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
}

$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Gastos Financieros"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($financieros), 1, 0, "C",1);
$pdf->Ln(5);

//gastos Gasto

$sql6 = "SELECT ifnull(sum(tb.Sdebe),0) AS gastos  FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6505%' ";
  $resultado6 = mysqli_query($conn, $sql6);
  while ($rows = $resultado6->fetch_assoc()) {
    $gastos = $rows["gastos"];
  }

$sqlotros = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
join Tbl_Balanza tb  on tb.Id_detalle=td.Id_detalle 
where tcc.CODIGO_CUENTA  LIKE '6505%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
$cotros= mysqli_query($conn, $sqlotros);

  while ($fila = $cotros->fetch_assoc()) {
    $pdf->setX(15);
    $pdf->Cell(95, 5, utf8_decode($fila['CUENTA']), 1, 0, "B",0);
    $pdf->Cell(30, 5, utf8_decode($fila['Sdebe']), 1, 0, "C",0);
    $pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
}

$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Otros Gastos"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($gastos), 1, 0, "C",1);
$pdf->Ln(5);

//otros ingresos

$sqloingresos = "SELECT ifnull(sum(tb.SAcreedor),0) AS OINGRESOS  FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6402%' ";
  $resultadooingresos = mysqli_query($conn, $sqloingresos);
  while ($rows = $resultadooingresos->fetch_assoc()) {
    $OINGRESOS = $rows["OINGRESOS"];
  }

$sqlotrosi = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join Tbl_Balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6402%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
      $cotrosi= mysqli_query($conn, $sqlotros);

  while ($fila = $cotrosi->fetch_assoc()) {
    $pdf->setX(15);
    $pdf->Cell(95, 5, utf8_decode($fila['CUENTA']), 1, 0, "B",0);
    $pdf->Cell(30, 5, utf8_decode($fila['Sdebe']), 1, 0, "C",0);
    $pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
}

$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Otros Ingresos"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($OINGRESOS), 1, 0, "C",1);
$pdf->Ln(5);

//--UTILIDAD BRUTA-->
$UTILIDADANTESISV = 0;
$UTILIDADANTESISV = ($ingresos+$OINGRESOS) - ($Costos + $operativos + $ventas + $financieros + $gastos);
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Utilidad Antes De Impuesto"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($UTILIDADANTESISV), 1, 0, "C",1);
$pdf->Ln(5);

//--Impuesto-->
$sql7 = " SELECT valor as isv FROM tbl_parametros tp 
  WHERE Parametro='Impuesto'";
  $resultado7 = mysqli_query($conn, $sql7);
  while ($rows = $resultado7->fetch_assoc()) {
    $isv = $rows["isv"];
  }
  $ISV = 0;
  $ISV = $UTILIDADANTESISV  * ($isv / 100);
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Impuesto"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($ISV), 1, 0, "C",1);
$pdf->Ln(5);

//--UTILIDAD -->
$UTILIDADDESISV = 0;
$UTILIDADDESISV = $UTILIDADANTESISV - $ISV;
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Utilidad Antes De Impuesto"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($UTILIDADDESISV), 1, 0, "C",1);
$pdf->Ln(5);


$pdf->Output();
?>
