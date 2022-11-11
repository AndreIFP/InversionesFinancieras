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
    $this->Image('logO.PNG',92,32,35);
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
    $this->Cell(62);
    $this->Cell(8,10, utf8_decode($Direccion),0,7, 45);
    $this->Ln(0);

    // Llamado del parametro telefono
    $sqlTelefono = "SELECT * FROM TBL_PARAMETROS WHERE Id_Parametro = '3'";
    $resultadotel = mysqli_query($conn,$sqlTelefono);
    while ($fila = $resultadotel->fetch_assoc()) {
        $Telefono = $fila["Valor"];
    }

    $this->SetFont('Arial','',8);
    $this->Cell(79);
    $this->Cell(8,0, utf8_decode('Teléfono: ' .$Telefono ),0,7);
    $this->Ln(4);

    // Llamado del parametro correo
    $sqlCorreo = "SELECT * FROM TBL_PARAMETROS WHERE Id_Parametro = '2'";
    $resultadocorreo = mysqli_query($conn,$sqlCorreo);
    while ($fila = $resultadocorreo->fetch_assoc()) {
        $Correo = $fila["Valor"];
    }

    $this->SetFont('Arial','',8);
    $this->Cell(76);
    $this->Cell(8,0, utf8_decode('Email: '.$Correo),0,7);

    // Salto de línea
    $this->Ln(50);
    
    $this->SetFont('Arial','',14);
    $this->Cell(80);
    $this->Cell(8,0, utf8_decode('Reporte De Objetos' ),0,7);
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

$Objetosx=$_GET['variable'];
// Creación del objeto de la clase heredada
$sql = "SELECT * FROM TBL_OBJETOS where Objetos LIKE '%$Objetosx%'";
$resultado = mysqli_query($conn,$sql);



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetMargins(10,10,10);
$pdf->AddPage();


$pdf->SetFont('Times','B',8);
$pdf->setX(28);


$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(18,5, utf8_decode('Id Objetos'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Objetos'),1,0,'C',1);
$pdf->Cell(60,5, utf8_decode('Descripcion'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Tipo'),1,1,'C',1);


while ($fila = $resultado->fetch_assoc()) {
    $pdf->setX(28);
    $pdf->Cell(18, 5, utf8_decode($fila['Id_Objetos']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($fila['Objetos']), 1, 0, "C",0);
    $pdf->Cell(60, 5, utf8_decode($fila['Descripcion']), 1, 0, "C",0);
    $pdf->Cell(40, 5, utf8_decode($fila['Tipo_Objeto']), 1, 1, "C",0);
 
    
}





$pdf->Output();
?>