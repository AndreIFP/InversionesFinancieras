<?php

session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['empresa'];
$_SESSION['temporada'] = "10";
$_SESSION['detalle'];

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

  <h2>Estado De Resultado</h2>
  <?php
  include("../conexion.php");

  // INGRESOS
  $sql = "SELECT ifnull(sum(tb.SAcreedor),0) as Ingresos  FROM tbl_catalago_cuentas tcc 
JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE '6401%'; ";
  $resultado = mysqli_query($conn, $sql);
  while ($rows = $resultado->fetch_assoc()) {
    $ingresos = $rows["Ingresos"];
  }
  ?>
  <button class="accordion"><?php echo  ' INGRESOS  ' . $ingresos ?> </button>

  <!-- DESPLIEGUE DE INGRESOS-->
  <div class="panel">
    <table class="table">
      <?php
      $sql1 = "SELECT tcc.CUENTA,tb2.SAcreedor  from Tbl_Balanza tb2  
      join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
      where COD_CUENTA like '6401%' and Id_cliente=$cliente and tb2.SAcreedor!=0;";
      $resultado1 = mysqli_query($conn, $sql1);

      while ($rows = $resultado1->fetch_assoc()) {
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


  <!-- COSTO DE VENTAS-->
  <?php
  $sql2 = "SELECT ifnull(sum(tb.Sdebe),0) AS costos   FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6501%'";
  $resultado2 = mysqli_query($conn, $sql2);
  while ($rows = $resultado2->fetch_assoc()) {
    $Costos = $rows["costos"];
  }
  ?>

  <!-- DESPLIEGUE DE  COSTOS-->
  <button class="accordion"><?php echo 'COSTOS DE VENTAS ' . $Costos ?></button>
  <div class="panel">
    <table class="table">
      <?php
      $sqlcosto = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join Tbl_Balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6501%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
      $costosv = mysqli_query($conn, $sqlcosto);

      while ($rows = $costosv->fetch_assoc()) {
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

  <!--UTILIDAD BRUTA-->
  <button class="accordion"><?php echo 'UTILIDAD BRUTA ' . ($ingresos - $Costos) ?></button>
  <div class="panel">
  </div>

  <!--gastos operativos-->
  <?php
  $sql3 = "SELECT ifnull(sum(tb.Sdebe),0) AS operativos   FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6502%'";
  $resultado3 = mysqli_query($conn, $sql3);
  while ($rows = $resultado3->fetch_assoc()) {
    $operativos  = $rows["operativos"];
  }
  ?>
  <!-- DESPLIEGUE -->
  <button class="accordion"><?php echo 'GASTOS OPERATIVOS ' . $operativos  ?></button>
  <div class="panel">
    <table class="table">
      <?php
      $sqloperativos = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join Tbl_Balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6502%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
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

  <!--gastos ventas-->
  <?php
  $sql4 = "SELECT ifnull(sum(tb.Sdebe),0) AS ventas  FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6503%'";
  $resultado4 = mysqli_query($conn, $sql4);
  while ($rows = $resultado4->fetch_assoc()) {
    $ventas  = $rows["ventas"];
  }
  ?>
  <!-- DESPLIEGUE -->
  <button class="accordion"><?php echo 'GASTOS DE VENTAS ' . $ventas  ?></button>
  <div class="panel">
    <table class="table">
      <?php
      $sqlventas = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join Tbl_Balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6503%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
      $cventas = mysqli_query($conn, $sqlventas);

      while ($rows = $cventas->fetch_assoc()) {
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

  <!--gastos financieros-->
  <?php
  $sql5 = "SELECT ifnull(sum(tb.Sdebe),0) AS financieros   FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6504%'";
  $resultado5 = mysqli_query($conn, $sql5);
  while ($rows = $resultado5->fetch_assoc()) {
    $financieros = $rows["financieros"];
  }
  ?>

  <!-- DESPLIEGUE -->
  <button class="accordion"><?php echo 'GASTOS FINANCIEROS ' . $financieros ?></button>
  <div class="panel">
    <table class="table">
      <?php
      $sqlfinancieros = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join Tbl_Balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6504%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
      $cfinancieros= mysqli_query($conn, $sqlfinancieros);

      while ($rows =$cfinancieros->fetch_assoc()) {
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

  <!--Otros gastos-->
  <?php
  $sql6 = "SELECT ifnull(sum(tb.Sdebe),0) AS gastos  FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6505%' ";
  $resultado6 = mysqli_query($conn, $sql6);
  while ($rows = $resultado6->fetch_assoc()) {
    $gastos = $rows["gastos"];
  }
  ?>
  <!-- DESPLIEGUE -->
  <button class="accordion"><?php echo 'OTROS GASTOS ' . $gastos ?></button>
  <div class="panel">
    <table class="table">
      <?php
      $sqlotros = " SELECT tcc.CUENTA ,tb.Sdebe  from tbl_detallleasientos td 
      join tbl_asientos ta on td.Id_asiento =ta.Id_asiento 
      join tbl_catalago_cuentas tcc on tcc.CODIGO_CUENTA =td.descripcion 
      join Tbl_Balanza tb  on tb.Id_detalle=td.Id_detalle 
      where tcc.CODIGO_CUENTA  LIKE '6505%' and tb.Id_cliente=$cliente and tb.Sdebe!=0;";
      $cotros= mysqli_query($conn, $sqlotros);

      while ($rows =$cotros->fetch_assoc()) {
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

   <!--Otros INGRESOS-->
   <?php
  $sqloingresos = "SELECT ifnull(sum(tb.SAcreedor),0) AS OINGRESOS  FROM tbl_catalago_cuentas tcc 
  JOIN Tbl_Balanza tb on tb.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb.Id_cliente=$cliente and  tcc.CODIGO_CUENTA LIKE  '6402%' ";
  $resultadooingresos = mysqli_query($conn, $sqloingresos);
  while ($rows = $resultadooingresos->fetch_assoc()) {
    $OINGRESOS = $rows["OINGRESOS"];
  }
  ?>
  <!-- DESPLIEGUE -->
  <button class="accordion"><?php echo 'OTROS INGRESOS ' . $OINGRESOS ?></button>
  <div class="panel">
    <table class="table">
      <?php
      $sqlotros = " SELECT tcc.CUENTA,tb2.SAcreedor  from Tbl_Balanza tb2  
      join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
      where COD_CUENTA like '6402%' and Id_cliente=$cliente and tb2.SAcreedor!=0;";
      $cotros= mysqli_query($conn, $sqlotros);

      while ($rows =$cotros->fetch_assoc()) {
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


  <!--UTILIDAD-->

  <?php $UTILIDADANTESISV = ($ingresos+$OINGRESOS) - ($Costos + $operativos + $ventas + $financieros + $gastos) ?>

  <button class="accordion"><?php echo  'UTILIDAD ANTES DE IMPUESTO ' . $UTILIDADANTESISV ?></button>
  <div class="panel">
  </div>



  <?php
  $sql7 = " SELECT valor as isv FROM tbl_parametros tp 
  WHERE Parametro='Impuesto'";
  $resultado7 = mysqli_query($conn, $sql7);
  while ($rows = $resultado7->fetch_assoc()) {
    $isv = $rows["isv"];
  }
  $ISV = $UTILIDADANTESISV  * ($isv / 100);
  
  



  ?>
  <button class="accordion"><?php echo 'IMPUESTO ' . $ISV ?></button>
  <div class="panel">
  </div>


  <!--UTILIDAD-->

  <button class="accordion"><?php echo 'UTILIDAD NETA ' . ($UTILIDADANTESISV - $ISV) ?></button>
  <div class="panel">
  </div>



<?php
$UTILIDADNETA=$UTILIDADANTESISV - $ISV;
$_SESSION['impu']=$ISV;
$_SESSION['neta']=$UTILIDADNETA;
?>



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