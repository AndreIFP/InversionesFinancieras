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
  require ('../conexion.php');
    // Logo
    $this->Image('logO.PNG',10,10,60);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(80,10,'Inversiones Financieras IS',2,0,'C');
    $this->Ln(5);
   // Llamado del parametro dirección
    $sqldireccion = "SELECT * FROM tbl_parametros WHERE Id_Parametro = '4'";
    $resultadodir = mysqli_query($conn,$sqldireccion);
    while ($fila = $resultadodir->fetch_assoc()) {
        $Direccion = $fila["Valor"];
    }

    $this->SetFont('Arial','',10);
    $this->Cell(90);
    $this->Cell(8,10, utf8_decode($Direccion),0,7, 45);
    $this->Ln(0);
    
    // Llamado del parametro telefono
    $sqlTelefono = "SELECT * FROM tbl_parametros WHERE Id_Parametro = '3'";
    $resultadotel = mysqli_query($conn,$sqlTelefono);
    while ($fila = $resultadotel->fetch_assoc()) {
        $Telefono = $fila["Valor"];
    }

    $this->SetFont('Arial','',10);
    $this->Cell(90);
    $this->Cell(8,0, utf8_decode('Teléfono: ' .$Telefono ),0,7);
    $this->Ln(4);
    
    // Llamado del parametro correo
    $sqlCorreo = "SELECT * FROM tbl_parametros WHERE Id_Parametro = '2'";
    $resultadocorreo = mysqli_query($conn,$sqlCorreo);
    while ($fila = $resultadocorreo->fetch_assoc()) {
        $Correo = $fila["Valor"];
    }

    $this->SetFont('Arial','',10);
    $this->Cell(90);
    $this->Cell(8,0, utf8_decode('Email: '.$Correo),0,7);
    $this->Ln(15);

    $this->SetFont('Arial','',14);
    $this->Cell(100);
    $this->Cell(8,0, utf8_decode('Reporte Libro' ),0,7);
    $this->Ln(7);

    $this->SetFont('Arial','',14);
    $this->Cell(70);
    $this->Cell(8,0, utf8_decode($empresa=$_SESSION['empresa'] ),0,7);
    $this->Ln(10);
    
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


$id_usuario=$_SESSION['id'];
$cliente=$_SESSION['cliente'];
$temporada=$_SESSION['temporada'];
$fechai=$_SESSION['fechai'];
$fechaf=$_SESSION['fechaf'];
        $fecha = date('Y-m-d h:i:s');


//  if ($guardar=="si") {

  
// Creación del objeto de la clase heredada
$sql = "select a.Id_asiento, a.Fecha, a.Descripcion, a.montoTotal, c.Nombre_Cliente, u.Usuario
from tbl_asientos a 
inner join tbl_clientes c ON a.Id_Cliente = c.Id_Cliente
inner join tbl_usuario u ON a.Id_Usuario = u.Id_Usuario where a.Id_Cliente='$cliente'";
$resultado = mysqli_query($conn,$sql);


  
    
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetMargins(10,10,10);
$pdf->AddPage('LANSPACE','LETTER');


$pdf->SetFont('Times','B',8);
$pdf->setX(15);



$pdf->SetFillColor(108, 250, 254 );
$pdf->Cell(30,5, utf8_decode('No. Asiento'),1,0,'C',1);
$pdf->Cell(70,5, utf8_decode('Nombre Cliente'),1,0,'C',1);
$pdf->Cell(30,5, utf8_decode('Usuario'),1,0,'C',1);
$pdf->Cell(30,5, utf8_decode('Fecha'),1,0,'C',1);
$pdf->Cell(60,5, utf8_decode('Descripción'),1,0,'C',1);
$pdf->Cell(30,5, utf8_decode('Monto Total'),1,1,'C',1);


while ($fila = $resultado->fetch_assoc()) {
    $pdf->setX(15);
    $pdf->Cell(30, 5, utf8_decode($fila['Id_asiento']), 1, 0, "L",0);
    $pdf->Cell(70, 5, utf8_decode($fila['Nombre_Cliente']), 1, 0, "B",0);
    $pdf->Cell(30, 5, utf8_decode($fila['Usuario']), 1, 0, "B",0);
    $pdf->Cell(30, 5, utf8_decode($fila['Fecha']), 1, 0, "B",0);
    $pdf->Cell(60, 5, utf8_decode($fila['Descripcion']), 1, 0, "B",0);
    $pdf->Cell(30, 5, number_format($fila['montoTotal'],2), 1, 1, "R",0);
   
}





$pdf->Output();
?>
