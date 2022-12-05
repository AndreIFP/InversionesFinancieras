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
    $this->Ln(3);

    $this->SetFont('Arial','',14);
    $this->Cell(64);
    $this->Cell(10,60, utf8_decode('Reporte Estado De Resultado' ),0,7);
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

$Venta = 0;
$sql="SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Venta';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $Venta = $fila['Monto'];
  if(empty($Venta)){
    $Venta = $fila['0'];
  }
  $pdf->setX(40); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->Ln(5);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Ventas"), 1, 0, "L",0);
$pdf->Cell(30, 5, utf8_decode($Venta), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);

$costo = 0;
$sql="SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Costo de venta';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $costo = $fila['Monto'];
  if(empty($costo)){
    $costo = $fila['0'];
  }
  $pdf->setX(40); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Costo de ventas"), 1, 0, "L",0);
$pdf->Cell(30, 5, utf8_decode($costo), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);

$Utilidad_Bruta = 0;
$Utilidad_Bruta = $Venta- $costo ;
$pdf->SetFont('Arial','',14);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Utilidad Bruta"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Utilidad_Bruta), 1, 1, "C",1);


$pdf->SetFont('Arial','','14');
$pdf->Ln(0);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Gastos De Operacion"), 1, 0, "L",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
$pdf->setX(40); 


$GV = 0;
$sql="SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Gastos de venta';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $GV = $fila['Monto'];
  if(empty($GV)){
    $GV = $GV['0'];
  }
  $pdf->setX(40); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Gasto de ventas"), 1, 0, "L",0);
$pdf->Cell(30, 5, utf8_decode($GV), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);

$GA = 0;
$sql="SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Gastos de administracion';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $GA = $fila['Monto'];
  if(empty($GA)){
    $GA = $GA['0'];
  }
  $pdf->setX(40); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Gastos De Administración"), 1, 0, "L",0);
$pdf->Cell(30, 5, utf8_decode($GA), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);

$GF = 0;
$sql="SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Gastos financieros';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $GF = $fila['Monto'];
  if(empty($GF)){
    $GF = $GF['0'];
  }
  $pdf->setX(40); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Gastos Financieros"), 1, 0, "L",0);
$pdf->Cell(30, 5, utf8_decode($GF), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);

$Total_Gastos = 0;
$Total_Gastos= $GV + $GA + $GF;
$pdf->SetFont('Arial','',14);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Total Gastos Operación"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Gastos), 1, 1, "C",1);


$Utilidad_Op = 0;
$Utilidad_Op= $Utilidad_Bruta - $Total_Gastos;
$pdf->SetFont('Arial','',14);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Utilidad Operación"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Utilidad_Op), 1, 1, "C",1);


$OI = 0;
$sql="SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Otros ingresos';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $OI = $fila['Monto'];
  if(empty($OI)){
    $OI = $OI['0'];
  }
  $pdf->setX(40); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Otros Ingresos"), 1, 0, "L",0);
$pdf->Cell(30, 5, utf8_decode($OI), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);


$OG = 0;
$sql="SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Otros Gastos';";
$resultado = mysqli_query($conn,$sql);
while ($fila = $resultado->fetch_assoc()) {
  $OG = $fila['Monto'];
  if(empty($OG)){
    $OG = $OG['0'];
  }
  $pdf->setX(40); 
  }
  $pdf->SetFont('Arial','',14);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Otros Gastos"), 1, 0, "L",0);
$pdf->Cell(30, 5, utf8_decode($OG), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);


$UAI = 0;
$UAI = $Utilidad_Op - $OG +$OI;
$pdf->SetFont('Arial','',14);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Utilidad Antes De Impuesto"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($UAI), 1, 1, "C",1);

 // Llamado del parametro correo
 $Imp = 0;
 $sqlISR = "SELECT * FROM TBL_PARAMETROS WHERE Id_Parametro = '5'";
 $resultadoISR = mysqli_query($conn,$sqlISR);
 while ($fila = $resultadoISR->fetch_assoc()) {
     $ISR = $fila["Valor"];
     $Imp = ($ISR/100);
 }
 $pdf->setX(40); 
 $ImpT = 0;
 $ImpT = $Imp * $UAI;


$pdf->SetFont('Arial','',14);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Impuestos"), 1, 0, "L",0);
$pdf->Cell(30, 5, utf8_decode($ImpT), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);


$Utilidad_Neta = 0;
$Utilidad_Neta = $UAI - $ImpT;
$pdf->SetFont('Arial','',14);
$pdf->setX(40);
$pdf->Cell(70, 5, utf8_decode("Utilidad Neta"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Utilidad_Neta), 1, 1, "C",1);

$pdf->Output();
?>
