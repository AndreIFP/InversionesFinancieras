<?php 

session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['temporada']="10";




?>

<?php

require('fpdf.php');
require ('../conexion.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logO.PNG',92,32,35);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(86);
    // Título
    $this->Cell(22,10,'Inversiones Financieras IS',2,0,'C');
    $this->Ln(5);
    
    $this->SetFont('Arial','',8);
    $this->Cell(62);
    $this->Cell(8,10, utf8_decode('Barrio el centro edificio el centro 3er nivel cubículo 308' ),0,7, 45);
    $this->Ln(0);

    $this->SetFont('Arial','',8);
    $this->Cell(79);
    $this->Cell(8,0, utf8_decode('Teléfono: +(504) 8839-8891' ),0,7);
    $this->Ln(4);

    $this->SetFont('Arial','',8);
    $this->Cell(76);
    $this->Cell(8,0, utf8_decode('Email: : Edgard_issa7@yahoo.com' ),0,7);
    $this->Ln(3);

    $this->SetFont('Arial','',14);
    $this->Cell(78);
    $this->Cell(10,60, utf8_decode('Reporte Cuentas T' ),0,7);
    $this->Ln(-53);

    
    $this->SetFont('Arial','',14);
    $this->Cell(68);
    $this->Cell(10,60, utf8_decode('La empresa' ),0,7);
    $this->Ln(-30);

    $this->SetFont('Arial','',14);
    $this->Cell(96);
    $this->Cell(8,0, utf8_decode($empresa=$_SESSION['empresa'] ),0,7);
    $this->Ln(2);

    $this->Ln(3);
     $this->SetFont('Arial','',14);
    $this->Cell(86);
    $this->Cell(8,0, utf8_decode($_SESSION['fechaf'] ),0,7);
   
    $this->Ln(10);    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    $Object = new DateTime();  
    $Object->setTimezone(new DateTimeZone('America/Guatemala'));
    $DateAndTime = $Object->format("d-m-Y h:i:s a");
    $this->Cell(0,15,$DateAndTime,0,1,'R');
}
}


$id_usuario=$_SESSION['id'];
$cliente=$_SESSION['cliente'];
$temporada=$_SESSION['temporada'];
$fechai=$_SESSION['fechai'];
$fechaf=$_SESSION['fechaf'];
$fecha = date('Y-m-d h:i:s');
$suma_debe = 0;
$suma_haber = 0;
$sumabanco = 0;
//  if ($guardar=="si") {  
// Creación del objeto de la clase heredada
$sql = "SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Bancos'; ";
$resultado = mysqli_query($conn,$sql);
   
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetMargins(10,10,10);
$pdf->AddPage();

$pdf->SetFont('Arial','',14);
$pdf->Ln(5);
$pdf->setX(60);
$pdf->Write(5, utf8_decode('Banco'),0,7);
$pdf->Ln(7);

$pdf->SetFont('Times','B',8);
$pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe = $suma_debe + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber = $suma_haber + $monto_haber;
      }
  $sumabanco = $suma_debe - $suma_haber;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($sumabanco), 1, 1, "C",0);
    
    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Caja'),0,7);
    $pdf->Ln(7);
    $suma_debec = 0;
    $suma_haberc = 0;
    $sumacaja = 0;
    $sql = "SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf'  And cuenta = 'Caja';";
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debec = $suma_debec + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haberc = $suma_haberc + $monto_haber;
      }
      $sumacaja = $suma_debec - $suma_haberc;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debec), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haberc), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($sumacaja), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(50);
    $pdf->Write(5, utf8_decode('Cuentas Por Cobrar'),0,7);
    $pdf->Ln(7);
    $suma_debecxc = 0;
    $suma_habercxc = 0;
    $sumacxc = 0;
    $sql = "SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Cuentas x Cobrar';";
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debecxc = $suma_debecxc + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_habercxc = $suma_habercxc + $monto_haber;
      }
      $sumacxc = $suma_debecxc - $suma_habercxc;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debecxc), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_habercxc), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($sumacxc), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Documentos Por Cobrar'),0,7);
    $pdf->Ln(7);
    $suma_debedxc = 0;
    $suma_haberdxc = 0;
    $sumadxc = 0;
    $sql = "SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Documentos por cobrar';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debedxc = $suma_debedxc + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haberdxc = $suma_haberdxc + $monto_haber;
      }
      $sumadxc = $suma_debedxc - $suma_haberdxc;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debedxc), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haberdxc), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($sumadxc), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Pagos Anticipados'),0,7);
    $pdf->Ln(7);
    $suma_debe_pago = 0;
    $suma_haber_pago = 0;
    $suma_pago = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf'And cuenta = 'Pagos Anticipados';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_pago = $suma_debe_pago + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_pago = $suma_haber_pago + $monto_haber;
      }
      $suma_pago = $suma_debe_pago - $suma_haber_pago;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_pago), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_pago), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_pago), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Inventario'),0,7);
    $pdf->Ln(7);
    $suma_debe_inv = 0;
    $suma_haber_inv = 0;
    $suma_inv = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Inventario';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_inv = $suma_debe_inv + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_inv = $suma_haber_inv + $monto_haber;
      }
      $suma_inv = $suma_debe_inv - $suma_haber_inv;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_inv), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_inv), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_inv), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Edificios'),0,7);
    $pdf->Ln(7);
    $suma_debe_edi = 0;
    $suma_haber_edi = 0;
    $suma_edi = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Edificios';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_edi = $suma_debe_edi + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_edi = $suma_haber_edi + $monto_haber;
      }
      $suma_edi = $suma_debe_edi - $suma_haber_edi;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_edi), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_edi), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_edi), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Mobiliario Y Equipo'),0,7);
    $pdf->Ln(7);
    $suma_debe_mob = 0;
    $suma_haber_mob = 0;
    $suma_mob = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Mobiliario y Equipo';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_mob = $suma_debe_mob + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_mob = $suma_haber_mob + $monto_haber;
      }
      $suma_mob = $suma_debe_mob - $suma_haber_mob;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_mob), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_mob), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_mob), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Otros Activos'),0,7);
    $pdf->Ln(7);
    $suma_debe_otros_act = 0;
    $suma_haber_otros_act = 0;
    $suma_otros_act = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Otros Activos';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_otros_act = $suma_debe_otros_act + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_otros_act = $suma_haber_otros_act + $monto_haber;
      }
      $suma_otros_act = $suma_debe_otros_act - $suma_haber_otros_act;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_otros_act), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_otros_act), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_otros_act), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Depreciación Acumulada'),0,7);
    $pdf->Ln(7);
    $suma_debe_dep = 0;
    $suma_haber_dep = 0;
    $suma_dep = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Depreciacion Acumulada';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_dep = $suma_debe_dep + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_dep = $suma_haber_dep + $monto_haber;
      }
      $suma_dep = $suma_debe_dep - $suma_haber_dep;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_dep), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_dep), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_dep), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Deuda A Corto Plazo'),0,7);
    $pdf->Ln(7);
    $suma_debe_deuda_corto = 0;
    $suma_haber_deuda_corto = 0;
    $suma_deuda_corto = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Deuda a Corto Plazo';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_deuda_corto = $suma_debe_deuda_corto + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_deuda_corto = $suma_haber_deuda_corto + $monto_haber;
      }
      $suma_deuda_corto = $suma_debe_deuda_corto - $suma_haber_deuda_corto;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_deuda_corto), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_deuda_corto), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_deuda_corto), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Provisiones A Corto Plazo'),0,7);
    $pdf->Ln(7);
    $suma_debe_provi = 0;
    $suma_haber_provi = 0;
    $suma_provi = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Provisiones a Corto Plazo';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_provi = $suma_debe_provi + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_provi = $suma_haber_provi + $monto_haber;
      }
      $suma_provi = $suma_debe_provi - $suma_haber_provi;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_provi), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_provi), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_provi), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Proveedores'),0,7);
    $pdf->Ln(7);
    $suma_debe_provee = 0;
    $suma_haber_provee = 0;
    $suma_provee = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Proveedores';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_provee = $suma_debe_provee + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_provee = $suma_haber_provee + $monto_haber;
      }
      $suma_provee = $suma_debe_provee - $suma_haber_provee;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_provee), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_provee), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_provee), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Cuentas Por Pagar'),0,7);
    $pdf->Ln(7);
    $suma_debe_cxp = 0;
    $suma_haber_cxp = 0;
    $suma_cxp = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Cuentas por Pagar';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_cxp = $suma_debe_cxp + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_cxp = $suma_haber_cxp + $monto_haber;
      }
      $suma_cxp = $suma_debe_cxp - $suma_haber_cxp;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_cxp), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_cxp), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_cxp), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Deuda A Largo Plazo'),0,7);
    $pdf->Ln(7);
    $suma_debe_deuda_largo = 0;
    $suma_haber_deuda_largo = 0;
    $suma_deuda_largo = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Deuda a Largo Plazo';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_deuda_largo = $suma_debe_deuda_largo + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_deuda_largo = $suma_haber_deuda_largo + $monto_haber;
      }
      $suma_deuda_largo = $suma_debe_deuda_largo - $suma_haber_deuda_largo;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_deuda_largo), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_deuda_largo), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_deuda_largo), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Provisiones a Largo Plazo'),0,7);
    $pdf->Ln(7);
    $suma_debe_provi_largo = 0;
    $suma_haber_provi_largo = 0;
    $suma_provi_largo = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Provisiones a Largo Plazo';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_provi_largo = $suma_debe_provi_largo + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_provi_largo = $suma_haber_provi_largo + $monto_haber;
      }
      $suma_provi_largo = $suma_debe_provi_largo - $suma_haber_provi_largo;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_provi_largo), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_provi_largo), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_provi_largo), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Capital Social'),0,7);
    $pdf->Ln(7);
    $suma_debe_capital = 0;
    $suma_haber_capital = 0;
    $suma_capital = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Capital Social';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_capital = $suma_debe_capital + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_capital = $suma_haber_capital + $monto_haber;
      }
      $suma_capital = $suma_debe_capital - $suma_haber_capital;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_capital), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_capital), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_capital), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Utilidades Retenidas'),0,7);
    $pdf->Ln(7);
    $suma_debe_utilidades = 0;
    $suma_haber_utilidades = 0;
    $suma_utilidades = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Utilidades Retenidas';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_utilidades = $suma_debe_utilidades + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_utilidades = $suma_haber_utilidades + $monto_haber;
      }
      $suma_utilidades = $suma_debe_utilidades - $suma_haber_utilidades;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_utilidades), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_utilidades), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_utilidades), 1, 1, "C",0);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(5);
    $pdf->setX(60);
    $pdf->Write(5, utf8_decode('Reservas'),0,7);
    $pdf->Ln(7);
    $suma_debe_reservas = 0;
    $suma_haber_reservas = 0;
    $suma_reservas = 0;
    $sql ="SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Reservas';" ;
$resultado = mysqli_query($conn,$sql);
    $pdf->SetFont('Times','B',8);
    $pdf->setX(25);

$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Debe'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Haber'),1,1,'C',1);

while ($fila = $resultado->fetch_assoc()) {
  $monto_haber=0;
    $monto_debe=0;
    $monto=$fila['monto'];
    $id_libro=$fila['id_libro'];
    $debe_haber=$fila['debe_haber'];
     
  if($debe_haber=="debe"){
    $monto_debe=$fila['monto'];
    $suma_debe_reservas = $suma_debe_reservas + $monto_debe;
      }
  if($debe_haber=="haber"){
    $monto_haber=$fila['monto'];
    $suma_haber_reservas = $suma_haber_cxp + $monto_haber;
      }
      $suma_cxp = $suma_debe_reservas - $suma_haber_reservas;
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_debe), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($monto_haber), 1, 1, "C",0);
}
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode($suma_debe_reservas), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_haber_reservas), 1, 1, "C",0);
    $pdf->setX(25);
    $pdf->Cell(40,5, utf8_decode('Total Cuenta'),1,0,'C',1);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode(""), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($suma_reservas), 1, 1, "C",0);
$pdf->Output();
?>