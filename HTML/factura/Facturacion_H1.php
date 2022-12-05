<?php
   include('../conexion.php');
   ////////////////// CONEXION A LA BASE DE DATOS //////////////////
   include 'barralateralinicial.php';
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body id="body">

<section 
  style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 20px; ">

<label for="config_tax">ISV:
          <input type="checkbox" id="config_tax" />
        </label>
        <label for="config_tax_rate" class="taxrelated">Tasa:
          <input type="text" id="config_tax_rate" value="1"/>%
        </label>

        <a href="javascript:window.print()">Imprimir</a>
        
        <a href="../demo1.php"><input type="submit" class="btn btn-primary" Value="Atras"></a>

<header class="row">
  <div class="logoholder text-center" >
    <img src="log1.png">
  </div><!--.logoholder-->

  <div class="me">
      <strong>Edgard Aquiles Ortiz Maradiaga</strong><br>
      <strong>PERITO CONTABLE</strong><br>
      Barrio el Centro, Calle Principal, Casa N.308 Esquina opuesta a Pollo Campero, 
      Frente a Punto Farma Comayaguela. M.D.C. Honduras.<br>
  </div><!--.me-->

  <div class="info">
      Web: <a href="http://volkerotto.net">www.InversionesFinancieras.com</a><br>
      E-mail: <a href="edgard_issa7@yahoo.com">edgard_issa7@yahoo.com</a><br>
      Tel: 2227-9327 ; Cel: 9776-9891<br>
  </div><!-- .info -->

  <!-- <div class="bank">
    <p contenteditable>
      Datos bacarios: <br>
      Titular de la cuenta: <br>
      IBAN: <br>
      BIC:
    </p>
  </div>.bank -->

</header>


<div class="row section">
  
	<div class="col-2">
    <h1>Inversiones Financieras S.A - FACTURA POR SERVICIOS</h1>
  </div><!--.col-->

  <div class="col-2 text-left details">
    <form method="post" action="invoiceh1.php">
     
     
  </div><!--.col-->
  
  
  
  <div class="col-2">
    
    <br>
      
      Fecha: <input type="text" name="Fecha" style="width:90px;border:0" class="datePicker" readonly/><br>
     <label for="" style="width:120px;">RTN: 08011972047876</label><br>
     Factura #: <input type="text" name="N_Factura" placeholder="000-001-01-000000" maxlength="17" style="width:120px;border:0" oninput="this.value = this.value.replace(/[^0-9_-]/,'')" required/><br>
     CAI: <input type="text" name="CAI" value="" placeholder="000000-000000-000000-000000-000000-00" maxlength="37" style="width:300px;border:0" oninput="this.value = this.value.replace(/[^0-9_-]/,'')" required/><br><br>
     <strong>Recibí de:</strong><br>
      <td><input type="text"  style="width:150px;height:25px;border:0" name="Nombre_Cliente" value="" placeholder="Nombre del Cliente" size="30" maxlength="30"  required></td>
      <br>
      <td><input type="text"  style="width:150px;height:25px;border:0" name="RTN_Cliente" value="" placeholder="Numero de R.T.N." size="15" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/,'')" required></td> 
      <br>
      <input type="text" style="border:0" name="Suma_letras"  placeholder="Suma neta en letras" size="80" value="" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" required /><br><br>
      </div><!--.col-->

</div><!--.row-->

<div class="invoicelist-body">
  <table>
    <thead >
      <th width="60%">Por Concepto de:</th>
      
      <th width="10%">Servicio Unico</th>
      <th width="15%">Precio</th>
      <th class="taxrelated">ISV</th>
      <th width="10%">Total por Honorarios</th>
    </thead>
    <tbody>
      <tr>
        <td width='60%'><input type="text" name="Descripcion" style="width:350px;height:20px;border:0" maxlength="50"  placeholder="Descripción" size="30" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" value="" required/><br></td></td>
        <td class="amount"><input type="text" value="1" disabled/></td>
        <td class="rate"><input type="text" name="total" placeholder="Precio" value="" required /></td>
        <td class="tax taxrelated"></td>
        <td class="sum"></td>
      </tr>
    </tbody>
  </table>
</div><!--.invoice-body-->

<div class="invoicelist-footer">
  <table>
    <tr class="taxrelated">
      <td>ISV:</td>
      <td><label id="total_tax" name="totalr"></label><input type="hidden" id="totalRetenido" name="totalRetenido"></td>
    </tr>
    <tr>
      <td><strong>Total:</strong></td>
      <td><label  id="total_price" name="totalt"></label><input value="" type="hidden" id="montoTotal" name="montoTotal"></td>
    </tr>
  </table>
</div>

<div class="note" contenteditable>
  <h2>Nota:</h2>
</div><!--.note-->
<button type="submit" class="btn btn-success btn-lg">Registrar Factura</button>
</form>
<footer class="row">
  <div class="col-1 text-center">
    
  </div>
</footer>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')</script>
<script src="assets/js/main.js"></script>
</body>
<?php include 'barralateralfinal.php'; ?>

<?php



        
				//////////////////////// PRESIONAR EL BOTÓN //////////////////////////
				if(isset($_POST['insertar']))

				{

          

          $fecha=$_POST['Fecha'];
          $N_Factura=$_POST['N_Factura'];
          $Nombre_Cliente=$_POST['Nombre_Cliente'];
          $RTN_Cliente=$_POST['RTN_Cliente'];
          $Suma_letras=$_POST['Suma_letras'];
          $Descripcion=$_POST['Descripcion'];
          $total=$_POST['total'];
           $totalRetenido=$_POST['totalRetenido'];
          $montoTotal=$_POST['montoTotal'];


          $valores='('.$N_Factura.',"'.$fecha.'","'.$Nombre_Cliente.'","'.$RTN_Cliente.'","'.$Suma_letras.'","'.$Descripcion.'",'.$total.','.$totalRetenido.','.$montoTotal.'),';
          //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
          $valoresQ= substr($valores, 0, -1);
          ///////// QUERY DE INSERCIÓN ////////////////////////////
          $sql = "INSERT INTO tbl_factura_1 (N_Factura,Fecha,Nombre_Cliente	,RTN_Cliente,Suma_Neta,Concepto,Total_Honorarios,Valores_Retenidos,Total_Neto) VALUES $valoresQ";
         
          $pdo=Conexion::conectar();
          $consulta=$pdo->prepare($sql);

          $consulta -> execute();



        /* $factura=$_SESSION['productos']['factura'];
        $proveedor=$_SESSION['productos']['proveedor'];
        
        $idUsuario=$_SESSION['id'];


				$items1 = ($_POST['Codigo']);
				$items2 = ($_POST['Descripcion']);
				$items3 = ($_POST['cantidad']);
				$items4 = ($_POST['precio']);
 */
        
				///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
				
        echo "<script> alert('Factura por Honorarios insertados correctamente');window.location= 'Facturacion_H.php' </script>";
				}

			?>
