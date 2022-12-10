<!-- -----------------------------------------------------------------------
	    Universidad Nacional Autonoma de Honduras (UNAH)
		           Facultad de Ciencias Economicas
	        Departamento de Informatica administrativa
        Analisis, Programacion y Evaluacion de Sistemas
                    Primer Periodo 2016


Equipo:
Allan Mauricio Hernández ...... (mauricio.galindo@unah.hn)
Andrés Isaías Flores .......... (aifloresp@unah.hn)
Esperanza Lisseth Cartagena ... (esperanza.cartagena@unah.hn)
Fanny Merari Ventura .......... (fmventura@unah.hn
José David García ............. (jdgarciad@unah.hn)
José Luis Martínez ............ (jlmartinezo@unah.hn)
Luis Steven Vásquez ........... (Lsvasquez@unah.hn)
Sara Raquel Ortiz ............. (Sortizm@unah.hn)

Catedratico:
LIC. CLAUDIA REGINA NUÑEZ GALINDO
Lic. GIANCARLO MARTINI SCALICI AGUILAR
Lic. KARLA MELISA GARCIA PINEDA 

----------------------------------------------------------------------

Programa:          entrada
Fecha:             16-jul-2022
Programador:       Fanny
descripcion:       producto entrada 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Fanny	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
David 	       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Allan		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->
<?php
include('conexion.php');
////////////////// CONEXION A LA BASE DE DATOS //////////////////
session_start();
$host = '142.44.161.115';
$basededatos = '2w4GSUinHO';
$usuario = 'CALAPAL';
$contraseña = 'Calapal##567';
const DRIVER = 'mysql';
const SERVER = '142.44.161.115';
const DATABASE = '2w4GSUinHO';
const USERNAME = 'CALAPAL';
const PASSWORD = 'Calapal##567';

class Conexion
{

  public static function conectar()
  {
    try {
      $pdoOptions = array(
        PDO::ATTR_EMULATE_PREPARES => FALSE,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''
      );

      $link = new PDO('' . DRIVER . ':host=' . SERVER . ';dbname=' . DATABASE, USERNAME, PASSWORD, $pdoOptions);
      return $link;
    } catch (PDOException $e) {
      echo "Fallo la conexión: " . $e->getMessage();
    }
  }
}


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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Nuevo Producto</title>
  <link rel="stylesheet" href="assets/css/main.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
  <script src="html2pdf.bundle.min.js"></script>
  <script src="script.js"></script>
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
<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 20px; ">

  <body id="body">
    <div class="row">
    </div>
    <!--.row-->
    <a class="btn btn-primary" href="../gestiones/Gestion_inventario.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>

    <hr>
    <header class="row">


      <div>
       
        
          <h1 align="center"><strong>Factura Inventario</strong> </h1>
       
        <!--.col-->
      </div>
      <!--.me-->
    </header>

    
    <div class="row section">
      <div class="col-2">
       
        <div class="form-group" style="width:250px" ;>

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input type="text" class="form-control pull-right" name="fech" readonly value="<?= $_SESSION['productos']['Fecha']  ?>">
          </div>

        </div>

      </div>
    </div>
    <!--.row-->


    <br>
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
                <center><input disabled type="text" name="proveedor" value="<?= $_SESSION['productos']['proveedor']  ?>" style="width:350px;height:20px;border:0" maxlength="50" placeholder="Nombre de proveedor" size="30" oninput="this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/,'')" value="" required /></center>
              </td>
              <td width="30%">
                <center><input disabled type="text" name="Terminos" value="<?= $_SESSION['productos']['Terminos']  ?>" style="width:200px;height:20px;border:0" maxlength="30" placeholder="Terminos y condiciones" size="30" oninput="this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/,'')" value="" required />
                  <center>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
    <!--.row-->



    <div class="invoicelist-body">
      <table class="table table-primary">
        <thead>
          <th width="80%">
            <h5><center><strong>Descripción</strong></center></h5>
          </th>
          <th width="20%">
            <h5><center><strong>Cantidad</strong></center></h5>
          </th>
        </thead>
      </table>
      <form id="form" method="post">
        <table id="tabla">

          <tr class="fila-fija">
            <td width='80%'><a class="control removeRow" href="#">x</a>
              <center><input type="text" class="form-control" name="Descripcion[]" maxlength="50" placeholder="Descripción" size="30" oninput="this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/,'')" value="" required /></center>
            </td>

            <td width='20%' class="amount">
              <center><input type="text" class="form-control" name="cantidad[]" style="width:60px;height:40px;border:0" oninput="this.value = this.value.replace(/[^0-9]/,'')" value="1" required /></center>
            </td>

          </tr>

        </table>
        <a class="control newRow" id="newRow" href="#">+ Nueva Producto</a>
    </div>
    <!--.invoice-body-->
    <center>
      <br>
      <hr>
      <button type="submit" name="insertar" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Registrar</button>
      </form>

      <?php

      //////////////////////// PRESIONAR EL BOTÓN //////////////////////////
      if (isset($_POST['insertar'])) {

        $proveedor = $_SESSION['productos']['proveedor'];

        $idUsuario = $_SESSION['id'];
        $fecha =  $_SESSION['productos']['Fecha'];



        $items2 = ($_POST['Descripcion']);
        $items3 = ($_POST['cantidad']);

        ///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
        while (true) {

          //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////

          $item2 = current($items2);
          $item3 = current($items3);


          ////// ASIGNARLOS A VARIABLES ///////////////////

          $nom = (($item2 !== false) ? $item2 : ", &nbsp;");
          $can = (($item3 !== false) ? $item3 : ", &nbsp;");





          $sql5 = mysqli_query($conn, "SELECT * FROM product WHERE proname = '" . $nom . "'");
          $result_register = mysqli_fetch_all($sql5, 1);
          $Result = $result_register;

          if (empty($Result)) {

            $valores = '("' . $proveedor . '","' . $nom . '","' . $can . '"),';
            //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
            $valoresQ = substr($valores, 0, -1);
            ///////// QUERY DE INSERCIÓN ////////////////////////////
            $sql = "INSERT INTO product (Proveedor,proname,amount) 
                VALUES $valoresQ";

            //$sqlRes=$conexion->query($sql) or mysql_error();

            $pdo = Conexion::conectar();
            $consulta = $pdo->prepare($sql);

            $consulta->execute();
            $idProducto = $pdo->lastInsertId();
          } else {

            $request = $Result[0];

            $canActual = $request['amount'];

            $cantitadTotal = $canActual + $can;

            $idProducto = $request['id_product'];

            $query = mysqli_query($conn, "UPDATE `product` SET `amount`=$cantitadTotal WHERE proname='" . $nom . "'");
            //$result_register = mysqli_fetch_all($sql5,1);
          }
          //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////




          //insertar en Kardex
          $valores2 = '("' . $idUsuario . '","' . $fecha . '","ENTRADA","' . $idProducto . '","' . $nom . '","' . $can . '"),';

          //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
          $valoresQuery = substr($valores2, 0, -1);
          ///////// QUERY DE INSERCIÓN ////////////////////////////


          $sql2 = "INSERT INTO tbl_kardex (Id_Usuario, fecha, detalle, id_product, proname, cant_entrada) VALUES $valoresQuery";
          $sqlRes2 = $conexion->query($sql2);


          // Up! Next Value

          $item2 = next($items2);
          $item3 = next($items3);


          // Check terminator
          if ($item2 === false && $item3 === false) break;
        }
        echo "<script> alert('Productos insertados correctamente');window.location= '../gestiones/Gestion_Inventario.php' </script>";
      }

      ?>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script>
        window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')
      </script>
      <script src="assets/js/main.js"></script>
      
  </body>
  <?php include 'barralateralfinal.php'; ?>
