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

  <section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 20px; ">
    <br>
    <a class="btn btn-primary" href="../demo1.php"><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
    <hr>
    <div class="periodo">
      <header class="row">
        <div class="logoholder text-center">
          <img src="log1.png">
        </div>
        <!--.logoholder-->

        <div class="me">
          <strong>Edgard Aquiles Ortiz Maradiaga</strong><br>
          <strong>PERITO CONTABLE</strong><br>
          Barrio el Centro, Calle Principal, Casa N.308 Esquina opuesta a Pollo Campero,
          Frente a Punto Farma Comayaguela. M.D.C. Honduras.<br>
        </div>
        <!--.me-->

        <div class="info">
          Web: <a href="http://volkerotto.net">www.InversionesFinancieras.com</a><br>
          E-mail: <a href="edgard_issa7@yahoo.com">edgard_issa7@yahoo.com</a><br>
          Tel: 2227-9327 ; Cel: 9776-9891<br>
        </div><!-- .info -->



      </header>
    </div>
    <div class="row section">

      <div class="col-12">
        <h1 align="center">INIVERSIONES FINANCIERAS S.A - FACTURA POR SERVICIOS</h1>
      </div>
      <!--.col-->

      <div class="col-12 text-left details">
        <form method="post" action="invoiceh1.php">


      </div>
      <!--.col-->



      <div class="col-2">

        <br>

        <?php
        $sql2 = "SELECT Valor FROM tbl_parametros WHERE Id_Parametro = '10';";
        $ext = $conn->query($sql2);
        $fila = $ext->fetch_array(MYSQLI_NUM);
        $param = $fila[0];
        ?>

        <?php
        $sql3 = "SELECT Valor FROM tbl_parametros WHERE Id_Parametro = '11';";
        $extr = $conn->query($sql3);
        $fila1 = $extr->fetch_array(MYSQLI_NUM);
        $param1 = $fila1[0];
        ?>

        <?php
        $sql4 = "SELECT Valor FROM tbl_parametros WHERE Id_Parametro = '12';";
        $extra = $conn->query($sql4);
        $fila2 = $extra->fetch_array(MYSQLI_NUM);
        $param2 = $fila2[0];
        ?>

        <?php
        $sql5 = "SELECT Valor FROM tbl_parametros WHERE Id_Parametro = '13';";
        $extrac = $conn->query($sql5);
        $fila3 = $extrac->fetch_array(MYSQLI_NUM);
        $param3 = $fila3[0];
        ?>


        <?php
        $sql6 = "SELECT Valor FROM tbl_parametros WHERE Id_Parametro = '14';";
        $extracc = $conn->query($sql6);
        $fila4 = $extracc->fetch_array(MYSQLI_NUM);
        $param4 = $fila4[0];
        ?>

        <?php
        $sql6 = "SELECT Valor FROM tbl_parametros WHERE Id_Parametro = '15';";
        $extracci = $conn->query($sql6);
        $fila5 = $extracci->fetch_array(MYSQLI_NUM);
        $param5 = $fila5[0];
        ?>
        <b>Fecha :</b> <input type="Date" name="Fecha" style="width:110px;border:0" required /><br>
        <b style="width:120px;">RTN: 08011972047876</b><br>
        <b>Rango Inicial :</b> <input type="text" readonly="Readonly" name="rangoini" value="<?php echo $param1 ?> " placeholder="" maxlength="25" style="width:150px;border:0" oninput="this.value = this.value.replace(/[^0-9_-]/,'')" required /><br>
        <b>Rango Final:</b> <input type="text" readonly="Readonly" name="rangofini" value="<?php echo $param2 ?>" placeholder="" maxlength="25" style="width:150px;border:0" oninput="this.value = this.value.replace(/[^0-9_-]/,'')" required /><br>
        <b>Factura #: <input type="text" readonly="Readonly" name="N_Factura"  minlength="8" value="<?php echo $param3 ?>-<?php echo $param4 ?>-<?php echo $param5 ?>" minlength="8" maxlength="8" style="width:70px;border:0" oninput="this.value = this.value.replace(/[^0-9_-]/,'')" required />- <input type="text" name="N_Factura2" value="" minlength="8"  placeholder="00000000"  style="width:90px;border:0"  maxlength="8" oninput="this.value = this.value.replace(/[^0-9_-]/,'')" required /><br></b>
        <b>CAI:</b> <input type="text" readonly="Readonly" name="CAI" value="<?php echo $param ?>" maxlength="37" style="width:280px;border:0" oninput="this.value = this.value.replace(/[^0-9_-]/,'')" required /><br>
        <b>Fecha LImite de Emisión:</b> <input type="date" name="Fechalimite" style="width:110px;border:0" required /><br><br>
        <input type="hidden" value="Servicios" name="Tipofactura"  />
        <hr>
        <div class="form-group">

          <div class="input-group">

            <strong>Recibí de:</strong><br>
            <select class="form-control" name="Nombre_Cliente" id="Nombre_Cliente" required>
              <option value="" style="width:90px;border:0">Seleccione un cliente</option>
              <?php
              $consulta = mysqli_query($conn, "SELECT * FROM tbl_clientes ;");
              while ($row = mysqli_fetch_array($consulta)) {
                $nombrepais = $row['Nombre_Empresa'];
              ?>
                <option class="dropdown-item" style="font-size:18px" value="<?php echo $nombrepais ?>"><?php echo $nombrepais ?></option>
              <?php
              }
              ?>
            </select>

          </div>
        </div>

        <div class="form-group">

          <div class="input-group">

            <strong>RTN del cliente:</strong><br>

            <input type="text" class="form-control" style="width:150px;height:25px;border:0" name="RTN_Cliente" value="" placeholder="R.T.N." size="15" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/,'')" required>

          </div>
        </div>

        <hr>
      </div>
      <!--.col-->

    </div>
    <!--.row-->
    <div align="right">

      <label for="config_tax">ISV:
        <input type="checkbox" id="config_tax" />
      </label>
      <label for="config_tax_rate" class="taxrelated"> -> Tasa:
        <input type="text" oninput="this.value = this.value.replace(/[^0-9_.]/,'')" id="config_tax_rate" value="15" />%
      </label>

    </div>

    <div class="invoicelist-body">
      <table>
        <thead class="table-primary">
          <th width="40%">Por Concepto de:</th>

          <th width="15%">
            <center>Servicio</center>
          </th>
          <th width="25%">
            <center>Precio</center>
          </th>
          <th class="taxrelated">
            <center>ISV</center>
          </th>
          <th width="15%">
            <center>Total</center>
          </th>
        </thead>
        <tbody>
          <tr>
            <td width='60%'><input type="text" class="form-control" name="Descripcion" style="width:600px;height:40px;border:0" maxlength="50" placeholder="Descripción" size="30" oninput="this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/,'')" value="" required /><br></td>
            </td>
            <td class="amount"><input type="text" class="form-control" value="1" disabled /></td>
            <td class="rate"><input type="text" class="form-control" name="total" oninput="this.value = this.value.replace(/[^0-9_.]/,'')" placeholder="Precio" value="" required /></td>
            <td class="tax taxrelated"></td>
            <td class="sum"></td>
          </tr>
        </tbody>
      </table>
    </div>
    <!--.invoice-body-->

    <div class="invoicelist-footer">
      <table>
        <tr class="taxrelated">
          <td><strong>ISV:</strong></td>
          <td><label id="total_tax" name="totalr"></label><input type="hidden" id="totalRetenido" name="totalRetenido"></td>
        </tr>
        <tr>
          <td><strong>Total:</strong></td>
          <td><label id="total_price" name="totalt"></label><input value="" type="hidden" id="montoTotal" name="montoTotal"></td>
        </tr>
      </table>
    </div>

    <hr>
    <div class="form-group">

      <div class="input-group">

        <h5>Total en letras:</h5>
        <input type="text" class="form-control" style="border:0" name="Suma_letras" placeholder="Suma neta en letras" size="80" value="" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/,'')" required /><br><br>


      </div>
    </div>
    <!--.note-->
    <center><button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar Factura</button></center>
    </form>
    <footer class="row">
      <div class="col-1 text-center">

      </div>
    </footer>
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')
  </script>
  <script src="assets/js/main.js"></script>
  <script src="https://momentjs.com/downloads/moment.js"></script>

</body>
<?php include 'barralateralfinal.php'; ?>

<?php




//////////////////////// PRESIONAR EL BOTÓN //////////////////////////
if (isset($_POST['insertar'])) {



  $fecha = $_POST['Fecha'];
  $N_Factura = $_POST['N_Factura'];
  $Nombre_Cliente = $_POST['Nombre_Cliente'];
  $RTN_Cliente = $_POST['RTN_Cliente'];
  $Suma_letras = $_POST['Suma_letras'];
  $Descripcion = $_POST['Descripcion'];
  $total = $_POST['total'];
  $totalRetenido = $_POST['totalRetenido'];
  $montoTotal = $_POST['montoTotal'];


  $valores = '(' . $N_Factura . ',"' . $fecha . '","' . $Nombre_Cliente . '","' . $RTN_Cliente . '","' . $Suma_letras . '","' . $Descripcion . '",' . $total . ',' . $totalRetenido . ',' . $montoTotal . '),';
  //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
  $valoresQ = substr($valores, 0, -1);
  ///////// QUERY DE INSERCIÓN ////////////////////////////
  $sql = "INSERT INTO tbl_factura_1 (N_Factura,Fecha,Nombre_Cliente	,RTN_Cliente,Suma_Neta,Concepto,Total_Honorarios,Valores_Retenidos,Total_Neto) VALUES $valoresQ";

  $pdo = Conexion::conectar();
  $consulta = $pdo->prepare($sql);

  $consulta->execute();



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
