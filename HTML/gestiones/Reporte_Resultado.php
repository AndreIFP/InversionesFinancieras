<?php 

session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['temporada']="10";




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
    $this->Cell(65);
    $this->Cell(10,60, utf8_decode('Reporte Estado de Resultado' ),0,7);
    $this->Ln(-53);

    
    $this->SetFont('Arial','',14);
    $this->Cell(68);
    $this->Cell(10,60, utf8_decode('La empresa' ),0,7);
    $this->Ln(-30);

    $this->SetFont('Arial','',14);
    $this->Cell(96);
    $this->Cell(8,0, utf8_decode($empresa=$_SESSION['empresa'] ),0,7);
    $this->Ln(2);
       
    $this->Ln(5);
    
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


//  if ($guardar=="si") {

  
// Creación del objeto de la clase heredada
$sql = "SELECT * from libro2 where id_cliente='$cliente' and fecha >='$fechai' and fecha <='$fechaf'; ";
$resultado = mysqli_query($conn,$sql);


  
    
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetMargins(10,10,10);
$pdf->AddPage();


$pdf->SetFont('Times','B',8);
$pdf->setX(25);



$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(40,5, utf8_decode('Fecha'),1,0,'C',1);
$pdf->Cell(50,5, utf8_decode('Cuenta'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Descripcion'),1,0,'C',1);
$pdf->Cell(30,5, utf8_decode('Monto'),1,1,'C',1);



while ($fila = $resultado->fetch_assoc()) {
    
    $pdf->setX(25);
    $pdf->Cell(40, 5, utf8_decode($fila['fecha']), 1, 0, "C",0);
    $pdf->Cell(50, 5, utf8_decode($fila['cuenta']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($fila['descripcion']), 1, 0, "C",0);
    $pdf->Cell(30, 5, utf8_decode( $fila['monto']), 1, 1, "C",0);

}





$pdf->Output();
?>
