<?php
////////////////// CONEXION A LA BASE DE DATOS //////////////////
session_start();
$host = '142.44.161.115';
$basededatos = '2w4GSUinHO';
$usuario = 'CALAPAL';
$contraseña = 'Calapal##567';



$conexion = new mysqli($host, $usuario, $contraseña, $basededatos);
if ($conexion->connect_errno) {
  die("Fallo la conexión : (" . $conexion->mysqli_connect_errno()
    . ") " . $conexion->mysqli_connect_error());
}
///////////////////CONSULTA DE LOS ALUMNOS///////////////////////

$alumnos = "SELECT * FROM product order by id_product";
$queryAlumnos = $conexion->query($alumnos);

include 'barralateralinicial.php';
?>

<head>
  <meta charset="UTF-8">
  <title>Nuevo Producto</title>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
  <link rel="stylesheet" href="assets/css/main.css">
  <script>
    $(function() {
      // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
      $("#newRow").on('click', function() {
        $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
      });

      // Evento que selecciona la fila y la elimina 
    });
  </script>
</head>

<body>

  <!--.container-->
  <p></p>
  <section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 20px; ">

    <a class="btn btn-primary" href="../gestiones/Gestion_inventario.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
    <hr>
    <form method="post">
      <div>
        <div>
          <div>
            <h1 align="center">Facturación Insumos</h1>
          </div>
          <!--.col-->
        </div>
        <!--.me-->
      </div>



      <div>
        <hr>
        <h5><strong>Datos</strong></h5>
        <div class="form-group" style="width:250px" ;>

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input type="text" class="form-control pull-right" name="fech" readonly value="<?php
                                                                                            date_default_timezone_set('America/Tegucigalpa');
                                                                                            $DateAndTime2 = date('m-d-Y h:i:s a', time());
                                                                                            echo $DateAndTime2;
                                                                                            ?>">
          </div>

        </div>
        </p>
      </div>
      <!--.col-->


      <hr>

      <div class="row section" style="margin-top:-1rem">
        <div class="col-1">
          <table style='width:100%'>
            <thead>
              <tr class="invoice_detail">
                <th width="25%">
                  <center>Proveedor</center>
                </th>
                <th width="30%">
                  <center>Forma de pago</center>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr class="invoice_detail">
                <td width="25%">
                  <center><input type="text" name="proveedor" style="width:350px;height:20px;border:0" maxlength="50" placeholder="Nombre de proveedor" size="30" oninput="this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/,'')" value="" required /></center>
                </td>
                <td width="30%">
                  <center><input type="text" name="Terminos" style="width:200px;height:20px;border:0" maxlength="30" placeholder="Forma de pago" size="30" oninput="this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/,'')" value="" required /></center>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!--.row-->
      <center>
        <div class="invoicelist-footer">
          <br>
          <hr>

          <center><button type="submit" name="insertar" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Registrar Productos</button></center>
        </div>
    </form>


    <?php
    //////////////////////// PRESIONAR EL BOTÓN //////////////////////////
    if (isset($_POST['insertar'])) {


      $_SESSION['productos']['Fecha'] = $_POST['fech'];
      $_SESSION['productos']['proveedor'] = $_POST['proveedor'];
      $_SESSION['productos']['Terminos'] = $_POST['Terminos'];
      echo '<script type="text/javascript">window.location.href = "FacturacionProductos.php";</script>';
    }
    ?>

  </section>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')
  </script>
  <script src="assets/js/main.js"></script>
</body>
<?php include 'barralateralfinal.php'; ?>