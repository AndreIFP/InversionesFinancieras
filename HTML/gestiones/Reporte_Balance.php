<?php 

session_start();

$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$empresa=$_SESSION['empresa'];


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
  $this->Cell(89);
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
  $this->Ln(5);


    $this->SetFont('Arial','',14);
    $this->Cell(70);
    $this->Cell(10,60, utf8_decode('Reporte Balance General' ),0,7);
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

$pdf->SetFont('Arial','',14);
    $pdf->setX(80);
    $pdf->Write(5, utf8_decode(''),0,7);
    $pdf->Ln(7);
$Total_Activo_Corriente = 0;
$sqlAC = "select l.cuenta, l.total_cuenta, c.CLASIFICACION, c.CUENTA from TBL_LIBRO_MAYOR2 l inner join TBL_CATALAGO_CUENTAS c ON l.cuenta = c.CUENTA WHERE id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' and c.CLASIFICACION = 'ACTIVO CORRIENTE' ";
$resultado = mysqli_query($conn,$sqlAC);

  $pdf->SetFont('Arial','B',12);
  $pdf->Ln(5);
  $pdf->setX(15);
  $pdf->Cell (95, 5, utf8_decode("ACTIVO CORRRIENTE"), 1, 0, "C",0);
  $pdf->setX(25);
  $pdf->Ln(5);

  while ($fila = $resultado->fetch_assoc()) {
    $total_cuenta_ac = $fila['total_cuenta'];
    $pdf->setX(15);
    $pdf->Cell(95, 5, utf8_decode($fila['cuenta']), 1, 0, "B",0);
    $pdf->Cell(30, 5, utf8_decode($fila['total_cuenta']), 1, 0, "C",0);
    $pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
    $Total_Activo_Corriente = $Total_Activo_Corriente + $total_cuenta_ac;
}

$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Activo Corriente"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Activo_Corriente), 1, 0, "C",1);


//ACTIVOS NO CORRIENTES
$Total_Activo_No_Corriente = 0;
$sqlA_N_C = "select l.cuenta, l.total_cuenta, c.CLASIFICACION, c.CUENTA from TBL_LIBRO_MAYOR2 l inner join TBL_CATALAGO_CUENTAS c ON l.cuenta = c.CUENTA WHERE id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' and c.CLASIFICACION = 'ACTIVO NO CORRIENTE' ";
$resultadoa_n_c = mysqli_query($conn,$sqlA_N_C);
$pdf->SetFont('Arial','B',"12");
$pdf->Ln(9);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("ACTIVO NO CORRIENTE"), 1, 1, "C",0);
$pdf->setX(25); 

while ($fila = $resultadoa_n_c->fetch_assoc()) {
  $total_cuenta_a_n_c = $fila['total_cuenta'];
  $pdf->setX(15);
  $pdf->Cell(95, 5, utf8_decode($fila['cuenta']), 1, 0, "B",0);
  $pdf->Cell(30, 5, utf8_decode($fila['total_cuenta']), 1, 0, "C",0);
  $pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
  $Total_Activo_No_Corriente = $Total_Activo_No_Corriente + $total_cuenta_a_n_c;
}

$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Activo No Corriente"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Activo_No_Corriente), 1, 1, "C",1);

$Total_Activo = 0;
$Total_Activo= $Total_Activo_Corriente + $Total_Activo_No_Corriente ;
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Activo"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Activo), 1, 1, "C",1);


//PASIVOS CORRIENTE

$Total_Pasivo_Corriente = 0;
$sqlPC = "select l.cuenta, l.total_cuenta, c.CLASIFICACION, c.CUENTA from TBL_LIBRO_MAYOR2 l inner join TBL_CATALAGO_CUENTAS c ON l.cuenta = c.CUENTA WHERE id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' and c.CLASIFICACION = 'PASIVO CORRIENTE' ";
$resultadop_c = mysqli_query($conn,$sqlPC);
  $pdf->SetFont('Arial','B',"12");
  $pdf->Ln(5);
  $pdf->setX(15);
  $pdf->Cell(95, 5, utf8_decode("PASIVO CORRIENTE"), 1, 1, "C",0);
  $pdf->setX(25); 

  while ($fila = $resultadop_c->fetch_assoc()) {
    $total_cuenta_p_c = $fila['total_cuenta'];
    $pdf->setX(15);
    $pdf->Cell(95, 5, utf8_decode($fila['cuenta']), 1, 0, "B",0);
    $pdf->Cell(30, 5, utf8_decode($fila['total_cuenta']), 1, 0, "C",0);
    $pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
    $Total_Pasivo_Corriente = $Total_Pasivo_Corriente + $total_cuenta_p_c;
  }
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Pasivo Corriente"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Pasivo_Corriente), 1, 1, "C",1);



//PASIVO NO CORRIENTE
$Total_Pasivo_No_Corriente = 0;
$sqlP_N_C = "select l.cuenta, l.total_cuenta, c.CLASIFICACION, c.CUENTA from TBL_LIBRO_MAYOR2 l inner join TBL_CATALAGO_CUENTAS c ON l.cuenta = c.CUENTA WHERE id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' and c.CLASIFICACION = 'PASIVO NO CORRIENTE' ";
$resultadop_n_c = mysqli_query($conn,$sqlP_N_C);

  $pdf->SetFont('Arial','B',"12");
  $pdf->Ln(5);
  $pdf->setX(15);
  $pdf->Cell(95, 5, utf8_decode("PASIVO NO CORRIENTE"), 1, 1, "C",0);
  $pdf->setX(25); 

  while ($fila = $resultadop_n_c->fetch_assoc()) {
    $total_cuenta_p_n_c = $fila['total_cuenta'];
    $pdf->setX(15);
    $pdf->Cell(95, 5, utf8_decode($fila['cuenta']), 1, 0, "B",0);
    $pdf->Cell(30, 5, utf8_decode($fila['total_cuenta']), 1, 0, "C",0);
    $pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
    $Total_Pasivo_No_Corriente = $Total_Pasivo_No_Corriente + $total_cuenta_p_n_c;
  }

$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Pasivo No Corriente"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Pasivo_No_Corriente), 1, 1, "C",1);



$Total_Pasivo = 0;
$Total_Pasivo = $Total_Pasivo_Corriente + $Total_Pasivo_No_Corriente;
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Pasivo"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Pasivo), 1, 1, "C",1);


//Patrimonio
$Total_Patrimonio = 0;
$sqlP = "select l.cuenta, l.total_cuenta, c.CLASIFICACION, c.CUENTA from TBL_LIBRO_MAYOR2 l inner join TBL_CATALAGO_CUENTAS c ON l.cuenta = c.CUENTA WHERE id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' and c.CLASIFICACION = 'PATRIMONIO' ";
$resultadop = mysqli_query($conn,$sqlP);

  $pdf->SetFont('Arial','B',"12");
  $pdf->Ln(5);
  $pdf->setX(15);
  $pdf->Cell(95, 5, utf8_decode("PATRIMONIO"), 1, 1, "C",0);
  $pdf->setX(25); 

  while ($fila = $resultadop->fetch_assoc()) {
    $total_cuenta_p = $fila['total_cuenta'];
    $pdf->setX(15);
    $pdf->Cell(95, 5, utf8_decode($fila['cuenta']), 1, 0, "B",0);
    $pdf->Cell(30, 5, utf8_decode($fila['total_cuenta']), 1, 0, "C",0);
    $pdf->Cell(30, 5, utf8_decode(""), 1, 1, "C",0);
    $Total_Patrimonio = $Total_Patrimonio + $total_cuenta_p;
  }

$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Patrimonio"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Patrimonio), 1, 1, "C",1);



$Total_Pasivo_Patrimonio = 0;
$Total_Pasivo_Patrimonio= $Total_Pasivo + $Total_Patrimonio ;
$pdf->SetFont('Arial','',14);
$pdf->setX(15);
$pdf->Cell(95, 5, utf8_decode("Total Pasivo Y Patrimonio"), 1, 0, "L",1);
$pdf->Cell(30, 5, utf8_decode(""), 1, 0, "C",0);
$pdf->Cell(30, 5, utf8_decode($Total_Pasivo_Patrimonio), 1, 1, "C",1);

$pdf->Output();
?>
