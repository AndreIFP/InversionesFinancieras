<?php

require('fpdf.php');
require ('../conexion.php');
session_start();

class PDF extends FPDF
{

    var $tablewidths;
    var $footerset;
    
   
// Cabecera de página
function Header()
{
    require ('../conexion.php');
    // Logo
    $this->Image('logO.PNG',10,10,40);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(119);
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
   $this->Cell(121);
   $this->Cell(8,10, utf8_decode($Direccion),0,7, 45);
   $this->Ln(0);

   // Llamado del parametro telefono
   $sqlTelefono = "SELECT * FROM tbl_parametros WHERE Id_Parametro = '3'";
   $resultadotel = mysqli_query($conn,$sqlTelefono);
   while ($fila = $resultadotel->fetch_assoc()) {
       $Telefono = $fila["Valor"];
   }

   $this->SetFont('Arial','',8);
   $this->Cell(116);
   $this->Cell(8,0, utf8_decode('Teléfono: ' .$Telefono ),0,7);
   $this->Ln(4);

   // Llamado del parametro correo
   $sqlCorreo = "SELECT * FROM tbl_parametros WHERE Id_Parametro = '2'";
   $resultadocorreo = mysqli_query($conn,$sqlCorreo);
   while ($fila = $resultadocorreo->fetch_assoc()) {
       $Correo = $fila["Valor"];
   }
   

   $this->SetFont('Arial','',8);
   $this->Cell(106);
   $this->Cell(8,0, utf8_decode('Email: '.$Correo),0,7);



    // Salto de línea
    $this->Ln(15);
    
    $this->SetFont('Arial','',14);
    $this->Cell(105);
    $this->Cell(8,0, utf8_decode('Reporte De Bitacora' ),0,7);
    $this->Ln(3);
    
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

// Creación del objeto de la clase heredada
$sql = "SELECT * FROM tbl_ms_bitacora ORDER BY Id_Bitacora DESC";
$resultado = mysqli_query($conn,$sql);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetMargins(10,10,10);
$pdf->AddPage('LANSPACE','LETTER');


$pdf->SetFont('Times','B',8);
$pdf->setX(3);


$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(10,5, utf8_decode('Id'),1,0,'C',1);
$pdf->Cell(30,5, utf8_decode('Fecha'),1,0,'C',1);
$pdf->Cell(30,5, utf8_decode('Acción'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Tabla'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Campo'),1,0,'C',1);
$pdf->Cell(50,5, utf8_decode('Valor Original'),1,0,'C',1);
$pdf->Cell(50,5, utf8_decode('Nuevo Valor'),1,0,'C',1);
$pdf->Cell(20,5, utf8_decode('Id Usuario'),1,1,'C',1);



while ($fila = $resultado->fetch_assoc()) {
    $pdf->setX(3);
    $pdf->Cell(10, 5, $fila['Id_Bitacora'], 1, 0, "L",0);
    $pdf->Cell(30, 5, utf8_decode($fila['Fecha']), 1, 0, "L",0);
    $pdf->Cell(30, 5, utf8_decode($fila['Accion']), 1, 0, "L",0);
    $pdf->Cell(40, 5, utf8_decode($fila['Tabla']), 1, 0, "L",0);
    $pdf->Cell(40, 5, utf8_decode($fila['Campo']), 1, 0, "L",0);
    $pdf->Cell(50, 5, utf8_decode($fila['Valor_Antes']), 1, 0, "L",0);
    $pdf->Cell(50, 5, utf8_decode($fila['Valor_Despues']), 1, 0, "L",0);
    $pdf->Cell(20, 5, utf8_decode($fila['Id_Usuario']), 1, 1, "L",0);
    
}





$pdf->Output();
?>
