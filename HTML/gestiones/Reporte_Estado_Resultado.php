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
    $sqldireccion = "SELECT * FROM tbl_parametros WHERE Id_Parametro = '4'";
    $resultadodir = mysqli_query($conn,$sqldireccion);
    while ($fila = $resultadodir->fetch_assoc()) {
        $Direccion = $fila["Valor"];
    }
    
    $this->SetFont('Arial','',8);
    $this->Cell(90);
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
$Idperiodo=$_SESSION['Idtemporada'];
$fecha = date('Y-m-d h:i:s');

$pdf->SetFillColor(161, 174, 175  );

$pdf->SetFont('Arial','',14);
    $pdf->setX(80);
    $pdf->Write(5, utf8_decode(''),0,7);
    $pdf->Ln(7);

    $sql = " select *  from tbl_eresultado te
    where te.Id_Eresultado=(select MAX(Id_Eresultado) from tbl_eresultado te2 where Id_periodo='$Idperiodo' and Id_Cliente='$cliente')";
  $resultado1 = mysqli_query($conn, $sql);

  $pdf->SetFillColor(108, 250, 254 );
  $pdf->SetFont('Arial','B',12);
  $pdf->Ln(5);
  $pdf->setX(15);
  $pdf->Cell (80, 5, utf8_decode(""), 1, 0, "C",1);
  $pdf->Cell (50, 5, utf8_decode(" "), 1, 0, "C",1);
  $pdf->Cell (50, 5, utf8_decode("Total"), 1, 1, "C",1);

  while ($fila = $resultado1->fetch_assoc()) {
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Ingresos"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['Ingresos']), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 1, "B",0);
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Costo Ventas"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['CostoVentas']), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 1, "B",0);
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Utilidad o pérdida bruta"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['UtilidadBruta']), 1, 1, "B",0);
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Gastos de ventas"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['Gastosventas']), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 1, "B",0);
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Gastos de administracion"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['Gastosadministracion']), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 1, "B",0);
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Gastos financieros"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['Gastosfinancieros']), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 1, "B",0);
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Otros gastos"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['OtrosGastos']), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 1, "B",0);
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Gastos operacionales"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['GastosOperacionales']), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 1, "B",0);
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Utilidad o pérdida de operación"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['Up_capital']), 1, 1, "B",0);
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Otros ingresos"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['Otrosingresos']), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 1, "B",0);
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Utilidad o pérdida antes de impuesto"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['Up_isr']), 1, 1, "B",0);
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Impuesto sobre la renta"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['ISV']), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 1, "B",0);
    $pdf->setX(15);
    $pdf->Cell(80, 5, utf8_decode("Utilidad o pérdida neta"), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode(" "), 1, 0, "B",0);
    $pdf->Cell(50, 5, utf8_decode($fila['UtilidadPerdida']), 1, 1, "B",0);
    
}


$pdf->Output();
?>
