<?php
////////////////// CONEXION A LA BASE DE DATOS //////////////////
session_start();
$host = 'localhost:3307';
$basededatos = '2w4GSUinHO';
$usuario = 'root';
$contraseña = '3214';



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
  <div class="container">
    <div class="row">
    </div>
    <!--.row-->
  </div>
  <!--.container-->
  <section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 20px; ">

    <a class="btn btn-primary" href="../gestiones/Gestion_inventario.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
    <hr>
    <header class="row">

      <form method="post">
        <div class="me">
          <div class="col-12">
            <div class="periodo">
              <h1 align="justify">Factura Inventario</h1>
            </div>
            <!--.col-->
          </div>
          <!--.me-->
        </div>
    </header>


    <div class="row section">

      <<div class="col-3">
    </div>
    <!--.col-->

    <div class="col-2 text-center details">

    </div>
    <!--.col-->



    <div class="col-2">


      <p class="client">
      <h5><strong>Datos</strong></h5>
      <b>Fecha:</b> <input type="date" name="Fecha" style="width:110px;border:0" name="Fechaini" required><br>
      <b>Factura #:</b> <input type="text" name="factura" placeholder="000-001-01-000000" maxlength="15" style="width:140px;border:0" oninput="this.value = this.value.replace(/[^0-9_-]/,'')" required /><br>
      <b>CAI:</b> <input type="text" name="CAI" value="" placeholder="000000-000000-000000-000000-000000-00" maxlength="50" style="width:300px;border:0" oninput="this.value = this.value.replace(/[^0-9_-]/,'')" required /><br>
      <b>Vence:</b> <input type="date" style="width:110px;border:0" name="Fechaven" required /><br>
      <b>Dirección:</b> <input type="text" style="width:450px;height:20px;border:0" placeholder="Dirección" size="150" value="" name="dirProveedor" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" required /><br>
      <b>Teléfono:</b> <input type="text" style="width:150px;height:20px;border:0" maxlength="10" placeholder="Telefono" size="15" name="telefono" value="" oninput="this.value = this.value.replace(/[^0-9-\s]/,'')" required /><br><br><br>
      </p>
    </div>
    <!--.col-->


    <hr>

    <div class="row section" style="margin-top:-1rem">
      <div class="col-1">
        <table style='width:100%'>
          <thead contenteditable>
            <tr class="invoice_detail">
              <th width="25%">
                <center>Proveedor</center>
              </th>
              <th width="30%">
                <center>Forma de pago</center>
              </th>
            </tr>
          </thead>
          <tbody contenteditable>
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

        <center><button type="submit" name="insertar" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i>  Registrar Productos</button></center>
      </div>
      </form>

      <center>






        </form>

        <?php

        //////////////////////// PRESIONAR EL BOTÓN //////////////////////////
        if (isset($_POST['insertar'])) {




          $_SESSION['productos']['nameProveedor'] = $_POST['nameProveedor'];
          $_SESSION['productos']['Fecha'] = $_POST['Fecha'];
          $_SESSION['productos']['factura'] = $_POST['factura'];
          $_SESSION['productos']['CAI'] = $_POST['CAI'];
          $_SESSION['productos']['Fechaven'] = $_POST['Fechaven'];
          $_SESSION['productos']['dirProveedor'] = $_POST['dirProveedor'];
          $_SESSION['productos']['telefono'] = $_POST['telefono'];
          $_SESSION['productos']['proveedor'] = $_POST['proveedor'];
          $_SESSION['productos']['Terminos'] = $_POST['Terminos'];




          echo '<script type="text/javascript">window.location.href = "FacturacionProductos.php";</script>';
          /* print_r('<pre>');
        print_r($_POST);
        print_r('</pre>');
        exit;
				$items1 = ($_POST['factura']);
				$items2 = ($_POST['proveedor']);
				$items3 = ($_POST['Descripcion']);
				$items4 = ($_POST['cantidad']);
				///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
				while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
				    $item1 = current($items1);
				    $item2 = current($items2);
				    $item3 = current($items3);
				    $item4 = current($items4);
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $nom=(( $item2 !== false) ? $item2 : ", &nbsp;");
				    $carr=(( $item3 !== false) ? $item3 : ", &nbsp;");
				    $gru=(( $item4 !== false) ? $item4 : ", &nbsp;");

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores='('.$id.',"'.$nom.'","'.$carr.'","'.$gru.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				    $valoresQ= substr($valores, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
				    $sql = "INSERT INTO product (Nfactura,Proveedor,proname,amount) 
					VALUES $valoresQ";

					
					$sqlRes=$conexion->query($sql) or mysql_error();

				    
				    // Up! Next Value
				    $item1 = next( $items1 );
				    $item2 = next( $items2 );
				    $item3 = next( $items3 );
				    $item4 = next( $items4 );
				    
				    // Check terminator
            if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
    
				} */
        }

        ?>
        <div class="note" contenteditable>
          <h2>Nota:</h2>
        </div>
        <!--.note-->
  </section>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')
  </script>
  <script src="assets/js/main.js"></script>
</body>
<?php include 'barralateralfinal.php'; ?>