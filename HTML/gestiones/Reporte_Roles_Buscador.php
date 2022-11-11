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
  

    // Salto de línea
    $this->Ln(50);
    
    $this->SetFont('Arial','',14);
    $this->Cell(80);
    $this->Cell(8,0, utf8_decode('Reporte De Roles' ),0,7);
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

$rolx=$_GET['variable'];
// Creación del objeto de la clase heredada
$sql = "SELECT * FROM TBL_ROLES where Rol LIKE '%$rolx%'";
$resultado = mysqli_query($conn,$sql);



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetMargins(10,10,10);
$pdf->AddPage();


$pdf->SetFont('Times','B',8);
$pdf->setX(28);


$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(18,5, utf8_decode('Id Rol'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Rol'),1,0,'C',1);
$pdf->Cell(100,5, utf8_decode('Descripcion'),1,1,'C',1);


while ($fila = $resultado->fetch_assoc()) {
    $pdf->setX(28);
    $pdf->Cell(18, 5, utf8_decode($fila['Id_Rol']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($fila['Rol']), 1, 0, "C",0);
    $pdf->Cell(100, 5, utf8_decode($fila['Descripcion']), 1, 1, "C",0);
 
    
}





$pdf->Output();
?>