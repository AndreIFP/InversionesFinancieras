<?php

	# Incluyendo librerias necesarias #
	require "./code128.php";
	require ('../conexion.php');
	session_start();
	$host = 'localhost';
	$basededatos = '2w4GSUinHO';
	$usuario = 'root';
	$contraseña = '3214';
	const DRIVER='mysql';
	const SERVER='localhost:3307';
	const DATABASE='2w4GSUinHO';
	const USERNAME='root';
	const PASSWORD='3214';
 
	class Conexion{
 
	 public static function conectar(){
		 try {
				 $pdoOptions = array(
										 PDO::ATTR_EMULATE_PREPARES => FALSE, 
										 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
										 PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''
									 );
   
				 $link = new PDO(''.DRIVER.':host='.SERVER.';dbname='.DATABASE, USERNAME, PASSWORD, $pdoOptions);
				 return $link;
   
		 }catch(PDOException $e){
				 echo "Fallo la conexión: " . $e->getMessage();
		 }
	 }
   }

   $fecha=$_POST['Fecha'];
   $N_Factura=$_POST['N_Factura'];
   $cai = $_POST["CAI"];
   $Nombre_Cliente=$_POST['Nombre_Cliente'];
   $RTN_Cliente=$_POST['RTN_Cliente'];
   $Suma_letras=$_POST['Suma_letras'];
   $Descripcion=$_POST['Descripcion'];
   $total=$_POST['total'];
	$totalRetenido=$_POST['totalRetenido'];
   $montoTotal=$_POST['montoTotal'];


   $valores='("'.$N_Factura.'","'.$fecha.'","'.$Nombre_Cliente.'","'.$RTN_Cliente.'","'.$Suma_letras.'","'.$Descripcion.'",'.$total.','.$totalRetenido.','.$montoTotal.'),';
   //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
   $valoresQ= substr($valores, 0, -1);
   ///////// QUERY DE INSERCIÓN ////////////////////////////
   $sql = "INSERT INTO tbl_factura_1 (N_Factura,Fecha,Nombre_Cliente	,RTN_Cliente,Suma_Neta,Concepto,Total_Honorarios,Valores_Retenidos,Total_Neto) VALUES $valoresQ";
  
   $pdo=Conexion::conectar();
   $consulta=$pdo->prepare($sql);

   $consulta -> execute();

	$pdf = new PDF_Code128('P','mm','Letter');
	$pdf->SetMargins(17,17,17);
	$pdf->AddPage();


	$pdf->Ln(45);

	# Logo de la empresa formato png #
	$pdf->Image('./img/logO.png',15,12,35,35,'PNG');
	$pdf->Ln(9);

	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(26,-110,utf8_decode(""),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(123,-108,utf8_decode(("Edgard Aquiles Ortiz Maradiaga                                Web:                   ")),0,0,'C');
	$pdf->Ln(1);
	$pdf->Cell(212,-100,utf8_decode(("PERITO CONTABLE                                                 www.InversionesFinancieras.com            ")),0,0,'C');
	$pdf->Ln(4);
	$pdf->Cell(215,-100,utf8_decode(("Barrio el Centro, Calle Principal,                                E-mail: edgard_issa7@yahoo.com             ")),0,0,'C');
	$pdf->Ln(4);
	$pdf->Cell(206,-100,utf8_decode(("Casa N.308 Esquina opuesta a                                 Tel: 2227-9327 ; Cel: 9776-9891       ")),0,0,'C');
	$pdf->Ln(4);
	$pdf->Cell(116,-100,utf8_decode(("Pollo Campero, Frente a Punto")),0,0,'C');
	$pdf->Ln(4);
	$pdf->Cell(130,-100,utf8_decode(("Farma Comayaguela. M.D.C. Honduras.")),0,0,'C');

	$pdf->Ln(18);
	$pdf->SetFont('Arial','B',16);
	$pdf->SetTextColor(32,100,210);
	$pdf->Cell(180,-100,utf8_decode(("_______________________________________________________________________________________________________________")),0,0,'C');
	


	$pdf->Ln(-35);
	# Encabezado y datos de la empresa #
	$pdf->SetFont('Arial','B',16);
	$pdf->SetTextColor(32,100,210);
	$pdf->Cell(150,10,utf8_decode(strtoupper("FACTURA POR HONORARIOS")),0,0,'L');




	$pdf->Ln(9);


	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(-55,9,utf8_decode("FECHA: ".$fecha),0,0,'L');


	$pdf->Ln(5);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,utf8_decode("RTN: 08011972047876"),0,0,'L');

	$pdf->Ln(5);


	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,utf8_decode("FACTURA #: ".$N_Factura),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("CAI:  ".$cai),0,0,'L');

	$pdf->Ln(6);

	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,utf8_decode("Recibí de: "),0,0,'L');

	$pdf->Ln(6);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,utf8_decode("CLIENTE: ".$Nombre_Cliente),0,0,'L');
	
	$pdf->Ln(6);


	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,utf8_decode("RTN DE CLIENTE: ".$RTN_Cliente),0,0,'L');

	$pdf->Ln(6);
	
	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,utf8_decode("SUMA EN LETRAS: ".$Suma_letras),0,0,'L');

	$pdf->Ln(10);


	# Tabla de productos #
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(23,83,201);
	$pdf->SetDrawColor(23,83,201);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(90,8,utf8_decode("Descripción"),1,0,'C',true);
	$pdf->Cell(15,8,utf8_decode("servicio"),1,0,'C',true);
	$pdf->Cell(25,8,utf8_decode("Precio"),1,0,'C',true);
	$pdf->Cell(19,8,utf8_decode("Valor Retenido"),1,0,'C',true);
	$pdf->Cell(32,8,utf8_decode("Total por Honorarios"),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);

	
	/*----------  Detalles de la tabla  ----------*/
	$pdf->Cell(90,7,utf8_decode($Descripcion),'L',0,'C');
	$pdf->Cell(15,7,utf8_decode("1"),'L',0,'C');
	$pdf->Cell(25,7,utf8_decode($total),'L',0,'C');
	$pdf->Cell(19,7,utf8_decode($totalRetenido),'L',0,'C');
	$pdf->Cell(32,7,utf8_decode($montoTotal),'LR',0,'C');
	$pdf->Ln(7);
	/*----------  Fin Detalles de la tabla  ----------*/

	
	
	$pdf->SetFont('Arial','B',9);
	
	# Impuestos & totales #
	$pdf->Cell(98,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(32,7,utf8_decode("Precio"),'T',0,'C');
	$pdf->Cell(36,7,utf8_decode($total),'T',0,'C');



	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("Valor Retenido"),'',0,'C');
	$pdf->Cell(36,7,utf8_decode($totalRetenido),'0',0,'C');



	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');


	$pdf->Cell(32,7,utf8_decode("TOTAL A PAGAR"),'T',0,'C');
	$pdf->Cell(36,7,utf8_decode($montoTotal),'T',0,'C');

	

	$pdf->Ln(7);

	

	

	# Nombre del archivo PDF #
	$pdf->Output("I","Factura_Nro_1.pdf",true);