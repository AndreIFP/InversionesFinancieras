<?php

session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['empresa'];
$_SESSION['temporada'] = "10";

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .accordion {
      background-color: #eee;
      color: #444;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
      transition: 0.4s;
    }

    .active,
    .accordion:hover {
      background-color: #ccc;
    }

    .panel {
      padding: 0 18px;
      display: none;
      background-color: white;
      overflow: hidden;
    }
  </style>
  <?php include 'barralateralinicial.php'; ?>
  <p></p>
  <section style=" background-color:rgb(255, 255, 255);  padding: 15px;  color:black;  font-size: 12px; ">
</head>

<body>
  <?php
  include("../conexion.php");
  $id_usuario = $_SESSION['id'];
  $cliente = $_SESSION['cliente'];
  $temporada = $_SESSION['temporada'];
  $fechai = $_SESSION['fechai'];
  $fechaf = $_SESSION['fechaf'];
  $empresa = $_SESSION['empresa'];
  $fecha = date('Y-m-d h:i:s');

  $consulta = mysqli_query($conn, "select * from Tbl_Balanza
WHERE Id_cliente=$cliente");
  $nr = mysqli_num_rows($consulta);
  if ($nr == 0) {
    echo "<script> alert('No hay datos');window.location= 'BalanzaComp.php' </script>";
  }

  ?>
  <a class="btn btn-primary" href="BalanzaComp.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <br>

  <h2>Balanza general</h2>
  <?php
  include("../conexion.php");

  // ACTIVOS
  $sql = "SELECT ifnull(SUM(Sdebe),0) as Activos  FROM Tbl_Balanza tb 
  where Id_cliente=$cliente and COD_CUENTA like '1%';";
  $resultado = mysqli_query($conn, $sql);
  while ($rows = $resultado->fetch_assoc()) {
    $Activos  = $rows["Activos"];
  }
  ?>
  <button class="accordion"><?php echo  ' ACTIVOS  ' . $Activos  ?> </button>

  <!-- DESPLIEGUE DE ACTIVOS-->
  <div class="panel">
    <table class="table">
      <?php
      $sql1 = "SELECT tcc.CUENTA ,tb.Sdebe  FROM Tbl_Balanza tb 
      join tbl_catalago_cuentas tcc on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
      where Id_cliente=$cliente and COD_CUENTA like '1%'; ";
      $resultado1 = mysqli_query($conn, $sql1);

      while ($rows = $resultado1->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['Sdebe'];

      ?>
        <tr>
          <th> <?php echo $Cod . ' ' . $cuen ?></th>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>


  <!-- PASIVOS-->
  <?php
  $sql2 = "SELECT ifnull(SUM(SAcreedor),0) AS pasivo  FROM Tbl_Balanza tb 
  where Id_cliente=$cliente and COD_CUENTA like '2%';";
  $resultado2 = mysqli_query($conn, $sql2);
  while ($rows = $resultado2->fetch_assoc()) {
    $Pasivo = $rows["pasivo"];
  }
  ?>

  <!-- DESPLIEGUE DE  COSTOS-->
  <button class="accordion"><?php echo 'PASIVOS ' . $Pasivo ?></button>
  <div class="panel">
    <table class="table">
      <?php
      $sqlcosto = "SELECT tcc.CUENTA ,tb.SAcreedor   FROM Tbl_Balanza tb 
      join tbl_catalago_cuentas tcc on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
      where Id_cliente=$cliente and COD_CUENTA like '2%'; ";
      $costosv = mysqli_query($conn, $sqlcosto);

      while ($rows = $costosv->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['SAcreedor'];

      ?>
        <tr>
          <th> <?php echo $Cod . ' ' . $cuen ?></th>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>

  
  <!--patrimonio-->
  <?php
  $sql3 = "SELECT ifnull(SUM(SAcreedor),0) as patrimonio  FROM Tbl_Balanza tb 
  where Id_cliente=$cliente  and COD_CUENTA like '3%';";
  $resultado3 = mysqli_query($conn, $sql3);
  while ($rows = $resultado3->fetch_assoc()) {
    $patrimonio  = $rows["patrimonio"];
  }
  ?>
  <!-- DESPLIEGUE -->
  <button class="accordion"><?php echo 'PATRIMONIO ' . $patrimonio  ?></button>
  <div class="panel">
    <table class="table">
      <?php
      $sqloperativos = "SELECT tcc.CUENTA ,tb.Sdebe  FROM Tbl_Balanza tb 
      join tbl_catalago_cuentas tcc on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
      where Id_cliente=$cliente  and COD_CUENTA like '3%';";
      $coperativos = mysqli_query($conn, $sqloperativos);

      while ($rows = $coperativos->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['Sdebe'];

      ?>
        <tr>
          <th> <?php echo $Cod . ' ' . $cuen ?></th>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>





  <!-- FUNCION-->
  <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
  </script>
  </secction>
  <?php include 'barralateralfinal.php'; ?>