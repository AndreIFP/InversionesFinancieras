<?php 

session_start();

$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['temporada'];


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
  

    // Salto de línea
    $this->Ln(45);
    
    $this->SetFont('Arial','',14);
    $this->Cell(70);
    $this->Cell(8,0, utf8_decode('Reporte Balance General' ),0,7);
    $this->Ln(0);   
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

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetMargins(10,10,10);
$pdf->AddPage();

$id_usuario=$_SESSION['id'];
$cliente=$_SESSION['cliente'];
$fechai=$_SESSION['fechai'];
$fechaf=$_SESSION['fechaf'];
$fecha = date('Y-m-d h:i:s');

$pdf->SetFillColor(108, 250, 254 );

$pdf->SetFont('Arial','',14);
    $pdf->setX(80);
    $pdf->Write(5, utf8_decode(''),0,7);
    $pdf->Ln(7);
$Bancos = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Bancos';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $Bancos = $fila['TOTAL_CUENTA'];
  if(empty($Bancos)){
    $Bancos = $fila['0'];
  }
  $pdf->setX(25); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->Ln(5);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Bancos"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Bancos), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);

$caja = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Caja';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $caja = $fila['TOTAL_CUENTA'];
  if(empty($caja)){
    $caja = $fila['0'];
  }
  $pdf->setX(25); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Caja"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($caja), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);


$cxc = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Cuentas x Cobrar';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $cxc = $fila['TOTAL_CUENTA'];
  if(empty($cxc)){
    $cxc = $fila['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Cuentas x Cobrar"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($cxc), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);

$dxc = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Documentos por cobrar';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $dxc = $fila['TOTAL_CUENTA'];
  if(empty($dxc)){
    $dxc = $dxc['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Documentos por cobrar"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($dxc), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);

$pag_anti = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Pagos Anticipados';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $pag_anti = $fila['TOTAL_CUENTA'];
  if(empty($pag_anti)){
    $pag_anti = $fila['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Pagos Anticipados"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($pag_anti), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);

$inventario = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Inventario';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $inventario = $fila['TOTAL_CUENTA'];
  if(empty($inventario)){
    $inventario = $fila['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Inventario"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($inventario), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);


$Total_Activo_Corriente = 0;
$Total_Activo_Corriente= $Bancos + $caja + $cxc + $dxc + $pag_anti ;
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Activo Corriente"), 1, 0, "C",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Activo_Corriente), 1, 1, "C",1);


$edificio = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Edificios';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $edificio = $fila['TOTAL_CUENTA'];
  if(empty($edificio)){
    $edificio = $edificio['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Edificios"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($edificio), 1, 1, "C",0);

$mob = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Mobiliario y Equipo';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $mob = $fila['TOTAL_CUENTA'];
  if(empty($OG)){
    $mob = $mob['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Mobiliario y Equipo"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($mob), 1, 1, "C",0);


$otros_act = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Otros Activos';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $otros_act = $fila['TOTAL_CUENTA'];
  if(empty($otros_act)){
    $otros_act = $otros_act['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Otros Activos"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($otros_act), 1, 1, "C",0);

$depre = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Depreciacion Acumulada';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $depre = $fila['TOTAL_CUENTA'];
  if(empty($depre)){
    $depre = $depre['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Otros Depreciacion Acumulada"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($depre), 1, 1, "C",0);

$Total_Activo_No_Corriente = 0;
$Total_Activo_No_Corriente= $edificio + $mob + $otros_act + $depre;
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Total Activo No Corriente"), 1, 0, "C",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Activo_No_Corriente), 1, 1, "C",1);

$Total_Activo = 0;
$Total_Activo= $Total_Activo_Corriente + $Total_Activo_No_Corriente ;
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Utilidad"), 1, 0, "C",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Activo), 1, 1, "C",1);


//PASIVOS CORRIENTE


$deuda_corto = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Deuda a Corto Plazo';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $deuda_corto = $fila['TOTAL_CUENTA'];
  if(empty($deuda_corto)){
    $deuda_corto = $deuda_corto['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Deuda a Corto Plazo"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($deuda_corto), 1, 1, "C",0);


$provi = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Provisiones a Corto Plazo';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $provi = $fila['TOTAL_CUENTA'];
  if(empty($provi)){
    $provi = $provi['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Provisiones a Corto Plazo"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($provi), 1, 1, "C",0);

$provee = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Proveedores';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $provee = $fila['TOTAL_CUENTA'];
  if(empty($provee)){
    $provee = $provee['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Proveedores"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($provee), 1, 1, "C",0);


$cxp = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Cuentas por Pagar';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $cxp = $fila['TOTAL_CUENTA'];
  if(empty($cxp)){
    $cxp = $cxp['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Cuentas por Pagar"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($cxp), 1, 1, "C",0);

$Total_Pasivo_Corriente = 0;
$Total_Pasivo_Corriente= $deuda_corto + $provi + $cxp + $provee;
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Pasivo Corriente"), 1, 0, "C",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Pasivo_Corriente), 1, 1, "C",1);



//PASIVO NO CORRIENTE


$deuda_largo = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Deuda a Largo Plazo';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $deuda_largo = $fila['TOTAL_CUENTA'];
  if(empty($deuda_largo)){
    $deuda_largo = $deuda_largo['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Deuda a Largo Plazo"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($deuda_largo), 1, 1, "C",0);


$provi_largo = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Provisiones a Largo Plazo';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $provi_largo = $fila['TOTAL_CUENTA'];
  if(empty($provi_largo)){
    $provi_largo = $provi_largo['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Provisiones a Largo Plazo"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($provi_largo), 1, 1, "C",0);



$Total_Pasivo_No_Corriente = 0;
$Total_Pasivo_No_Corriente = $deuda_largo + $provi_largo;
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Pasivo No Corriente"), 1, 0, "C",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Pasivo_No_Corriente), 1, 1, "C",1);

$Total_Pasivo = 0;
$Total_Pasivo=  $deuda_largo + $provi_largo + $deuda_corto + $provi + $cxp + $provee;
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Pasivo"), 1, 0, "C",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Pasivo), 1, 1, "C",1);

//Patrimonio

$capital_social = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Capital Social';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $capital_social = $fila['TOTAL_CUENTA'];
  if(empty($capital_social)){
    $capital_social = $capital_social['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Capital Social"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($capital_social), 1, 1, "C",0);


$utilidades = 0;
$sql="SELECT TOTAL_CUENTA FROM TBL_LIBRO_MAYOR where  ID_CLIENTE = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And CUENTA = 'Utilidades Retenidas';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $utilidades = $fila['TOTAL_CUENTA'];
  if(empty($utilidades)){
    $utilidades = $utilidades['0'];
  }
  $pdf->setX(15); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Provisiones a Largo Plazo"), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($provi_largo), 1, 1, "C",0);



$Total_Patrimonio = 0;
$Total_Patrimonio = $capital_social + $utilidades;
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Patrimonio"), 1, 0, "C",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Patrimonio), 1, 1, "C",1);

$Total_Pasivo_Patrimonio = 0;
$Total_Pasivo_Patrimonio= $Total_Pasivo + $Total_Patrimonio ;
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Pasivo"), 1, 0, "C",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Pasivo_Patrimonio), 1, 1, "C",1);





$pdf->Output();
?>