<!-- -----------------------------------------------------------------------
	    Universidad Nacional Autonoma de Honduras (UNAH)
		           Facultad de Ciencias Economicas
	        Departamento de Informatica administrativa
        Analisis, Programacion y Evaluacion de Sistemas
                    Primer Periodo 2022


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

Programa:          salida1
Fecha:             16-jul-2022
Programador:       Sara
descripcion:       Pantalla 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
José	          01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Fanny 	       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Esperanza	    01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->
<?php

//incluir las funciones de helpers
include_once("../helpers/helpers.php");

//iniciar las sesiones
session_start();
$usuarios=$_SESSION['id'];
// si no existe la variable rol, el usuario no esta logueado y redirige al Login
if (!isset($_SESSION['rol'])) {
  header("Location: ../login.php");
  die();
} else {
  //actualiza los permisos
  updatePermisos($_SESSION['rol']);

  //si no tiene permiso de visualización redirige al index
  if ($_SESSION['permisos'][M_INVENTARIOS]['u'] == 0 or !isset($_SESSION['permisos'][M_INVENTARIOS]['u'])) {
    header("Location: ../index.php");
    die();
  }
}

?>


<?php include 'barralateralinicial.php';


$url = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
//echo $url;

$id = substr($url, 45, 5);

$sql2 = "SELECT proname FROM product WHERE id_product = $id;";
$ext = $conn->query($sql2);
$fila = $ext->fetch_array(MYSQLI_NUM);
$param = $fila[0];

if (!empty($_POST)) {
  include('conexion.php');
  $sql2 = "Select * from product where id_product = $id";
  $esperancita = mysqli_query($conn,$sql2);
  while ($fila = $esperancita->fetch_assoc()) {
    $cantidad = $fila["amount"];
}
 $rest = $_POST['cant'];
 $fecha = $_POST['fech'];

  if($rest <= $cantidad){
    $resta = $cantidad - $rest;
    $sql5 = "UPDATE product SET amount=$resta where id_product='$id'";
    $exito = mysqli_query($conn,$sql5);

    $sqlre = "INSERT INTO tbl_kardex (Id_Usuario, fecha, detalle, id_product, proname, cant_salida, total_cants) VALUES ($usuarios,'$fecha','SALIDA',$id,'$param',$rest,$resta)";
    $exito2 = mysqli_query($conn,$sqlre);


    echo "<script> alert('EL ARTÍCULO HA SIDO RETIRADO CON ÉXITO!!');window.location= '../gestiones/Gestion_Inventario.php' </script>";
 }else{    
    echo "<script> alert('ERROR NO TIENE LA CANTIDAD SUFICICIENTE PARA RETIRAR ESTE ARTICULO ¡REVISE EXISTENCIAS!');window.location= '../gestiones/Gestion_Inventario.php' </script>";
}
}
  ?>

<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 16px; ">

  <title>Retirar producto</title>
  <a class="btn btn-primary" href="../gestiones/Gestion_inventario.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <center>
    <h2> <strong> RETIRAR PRODUCTO</strong></h2>
  </center>

  <br>

  <form method="post" action="">
    <div class="row">
      <div class="col-xs-14 pull-right">

        <table class="table">
          <thead>
            <tr>
              <th>
                <center>Seleccione un Artículo</center>
              </th>
              <th>
                <center>Cantidad a retirar</center>
              </th>
              <th>
                <center>Fecha de retiro</center>
              </th>

            </tr>
          </thead>

          <tbody>
            <tr>
              <?php
              include('conexion.php');
              $sql2 = "Select * from product where id_product = $id";
              $esperancita = mysqli_query($conn,$sql2);
              while ($fila = $esperancita->fetch_assoc()) {
                $Direccion = $fila["amount"];
            }

              ?>
              <!--Cliente-->
              <td style="width: 40%">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>

                  <input type="text" readonly="readonly" class="form-control pull-right" value="<?php echo $param; ?>" name="product" required>

                </div>

              </td>
              <!--Fecha Inicial-->
              <td style="width: 30%">
                <div class="input-group">
                <input type="text" class="form-control pull-right" name="cant" oninput="this.value = this.value.replace(/[^0-9]/,'')" required>
                </div>
              </td>

              <!--Fecha Final-->
              <td style="width: 30%">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control pull-right" name="fech" readonly value="<?php
                                                                                        date_default_timezone_set('America/Tegucigalpa');
                                                                                        $DateAndTime2 = date('m-d-Y h:i:s a', time());
                                                                                        echo $DateAndTime2;
                                                                                        ?>" size="20">
                </div>
              </td>

            </tr>

          </tbody>
        </table>

      </div>
      <div class="col-md-12" align="right">
        <button type="submit" class="btn btn-lg btn-success btn-print" name="">Continuar </button>
      </div>
    </div>
  </form>
  </secction>
  </div>

  <!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="/JS/Java.js"></script>

  <!--Estilos Css-->
  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .login-page {
      width: 360px;
      padding: 8% 0 0;
      margin: auto;
    }



    #pp {
      text-align: left;
      font-size: 18;
    }

    .per {
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      background: rgb(117, 209, 174) 50%;
      width: 100% 100px;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 14px;
      -webkit-transition: all 0.3 ease;
      transition: all 0.3 ease;

    }

    .form {
      position: relative;
      z-index: 1;
      background: #FFFFFF;
      max-width: 360px;
      margin: 0 auto 100px;
      padding: 45px;
      text-align: center;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .form input {
      font-family: "Roboto", sans-serif;
      outline: 0;
      background: #f2f2f2;
      width: 100%;
      border: 0;
      margin: 0 0 15px;
      padding: 15px;
      box-sizing: border-box;
      font-size: 14px;
    }

    .form button {
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      background: rgb(82, 184, 125) 50%;
      width: 100%;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 14px;
      -webkit-transition: all 0.3 ease;
      transition: all 0.3 ease;
      cursor: pointer;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
      background: rgb(111, 126, 194);
    }

    .form .message {
      margin: 15px 0 0;
      color: #b3b3b3;
      font-size: 12px;
    }

    .form .message a {
      color: rgb(111, 126, 194);
      text-decoration: none;
    }

    .form .register-form {
      align-items: center;
      display: none;
    }

    .form img {
      margin: 15px auto;
      text-align: center;
      width: 50%;
      display: block;
      align-items: center;
      z-index: 2;


    }

    .container {
      position: relative;
      z-index: 1;
      max-width: 300px;
      margin: 0 auto;
    }

    .container:before,
    .container:after {
      content: "";
      display: block;
      clear: both;
    }

    .container .info {
      margin: 50px auto;
      text-align: center;
    }

    .container .info h1 {
      margin: 0 0 15px;
      padding: 0;
      font-size: 36px;
      font-weight: 300;
      color: #1a1a1a;
    }

    .container .info span {
      color: #4d4d4d;
      font-size: 12px;
    }

    .container .info span a {
      color: #000000;
      text-decoration: none;
    }

    .container .info span .fa {
      color: #EF3B3A;
    }

    .form label {
      font-family: "Roboto", sans-serif;
      font-size: 25px;
      letter-spacing: 1px;
      text-align: center;
      text-transform: uppercase;
      padding: 12px;
      text-decoration: none;
      -moz-osx-font-smoothing: grayscale;
      color: #4d4d4d;
      display: block;
      top: 20px;
      margin: 15px auto;
    }
  </style>


  </body>

  <?php include 'barralateralfinal.php'; ?>