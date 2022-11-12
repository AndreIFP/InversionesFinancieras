<?php
include('../conexion.php');

session_start();
$cliente = $_SESSION['cliente'];
$ncliente = $_SESSION['ncliente'];
$empresa = $_SESSION['empresa'];
$fechai = $_SESSION['fechai'];
$fechaf = $_SESSION['fechaf'];


?>

<?php include 'barralateralinicial.php'; ?>

<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 20px;">

  <title>Verificacion - Estado de Resultado</title>

  <a class="btn btn-primary" href="validacionresultado.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <hr>
  <center>
    <H1><strong> Estado de Resultado </strong></H1>
    <h3><em>¡Verifique Los datos!</em></h3>
    <br>
    <h4> Cliente: <?php echo $ncliente ?></h4>
    <h4> Empresa: <?php echo $empresa ?> </h4>
    <h4> Fecha Inicial: <?php echo $fechai ?> </h4>
    <h4> Fecha Final: <?php echo $fechaf ?> </h4>
  </center>
  <hr>
  <div align="right">
    <a class="btn btn-success" target="_blank" href="../gestiones/Reporte_Estado_Resultado.php ">Generar Reporte <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
  </div>
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

    #pa {
      text-align: left;
      font-size: 15;
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