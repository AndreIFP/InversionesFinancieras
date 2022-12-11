<?php 

session_start();

$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$empresa=$_SESSION['empresa'];
$_SESSION['Idtemporada'];


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
   $sqldireccion = "SELECT * FROM tbl_parametros WHERE Id_Parametro = '4'";
   $resultadodir = mysqli_query($conn,$sqldireccion);
   while ($fila = $resultadodir->fetch_assoc()) {
       $Direccion = $fila["Valor"];
   }
  
  $this->SetFont('Arial','',8);
  $this->Cell(89);
  $this->Cell(8,10, utf8_decode($Direccion),0,7, 45);
  $this->Ln(0);

  // Llamado del parametro telefono
  $sqlTelefono = "SELECT * FROM tbl_parametros WHERE Id_Parametro = '3'";
  $resultadotel = mysqli_query($conn,$sqlTelefono);
  while ($fila = $resultadotel->fetch_assoc()) {
      $Telefono = $fila["Valor"];
  }

  $this->SetFont('Arial','',8);
  $this->Cell(86);
  $this->Cell(8,0, utf8_decode('Teléfono: ' .$Telefono ),0,7);
  $this->Ln(4);

  // Llamado del parametro correo
  $sqlCorreo = "SELECT * FROM tbl_parametros WHERE Id_Parametro = '2'";
  $resultadocorreo = mysqli_query($conn,$sqlCorreo);
  while ($fila = $resultadocorreo->fetch_assoc()) {
      $Correo = $fila["Valor"];
  }  
  

  $this->SetFont('Arial','',8);
  $this->Cell(78);
  $this->Cell(8,0, utf8_decode('Email: '.$Correo),0,7);
  $this->Ln(15);


    $this->SetFont('Arial','',14);
    $this->Cell(70);
    $this->Cell(8,0, utf8_decode('Reporte Balance General' ),0,7);
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
$Idperiodo=$_SESSION['Idtemporada'];
$fecha = date('Y-m-d h:i:s');

$pdf->SetFillColor(161, 174, 175  );

$pdf->SetFont('Arial','',14);
    $pdf->setX(80);
    $pdf->Write(5, utf8_decode(''),0,7);
    $pdf->Ln(7);

  $sql1 = "select *  from tbl_balanzageneral tb 
  where tb.IdBalanzaG =(select MAX(IdBalanzaG) from tbl_balanzageneral te2 where te2.Id_periodo='$Idperiodo' and te2.Id_Cliente='$cliente')";
  $resultado1 = mysqli_query($conn, $sql1);

  $pdf->SetFillColor(108, 250, 254 );
  $pdf->SetFont('Arial','B',12);
  $pdf->Ln(5);
  $pdf->setX(60);
  $pdf->Cell (50, 5, utf8_decode(""), 1, 0, "C",1);
  $pdf->Cell (50, 5, utf8_decode("Total"), 1, 1, "C",1);

  while ($fila = $resultado1->fetch_assoc()) {
    $pdf->setX(60);
    $pdf->Cell(50, 5, utf8_decode("Activo"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['Activo']), 1, 1, "B",0);
    $pdf->setX(60);
    $pdf->Cell(50, 5, utf8_decode("Pasivo"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['Pasivo']), 1, 1, "B",0);
    $pdf->setX(60);
    $pdf->Cell(50, 5, utf8_decode("Patrimonio"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['Patrimonio']), 1, 1, "B",0);
}


$pdf->Output();
?>
