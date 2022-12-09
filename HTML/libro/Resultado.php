<?php

session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['empresa'];
$_SESSION['temporada'] = "10";
$_SESSION['Idtemporada'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .accordion {
      background-color:#ECFAF4  ;
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
  $Idperiodo=$_SESSION['Idtemporada'];

  $consulta = mysqli_query($conn, "select * from tbl_balanza
  WHERE Id_cliente=$cliente");
  $nr = mysqli_num_rows($consulta);
  if ($nr == 0) {
    echo "<script> alert('No hay datos');window.location= 'BalanzaComp.php' </script>";
  }

  ?>
  <a class="btn btn-primary" href="BalanzaComp.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <br>
  <br>
  <form method="post" action="proceresultado.php" enctype="multipart/form-data">
    <div align="right">
      <button type="submit" name="btnregistrarx" class="btn btn-info"><i class="fa fa-book"></i> Balance General</button>
      <a class="btn btn-warning" href="../gestiones/Reporte_Estado_Resultado.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;"><i class="fa fa-file-pdf-o"></i> Imprimir</a>
      <a class="btn btn-success" href="../gestiones/reporte_excel_resultado.php"><i class="fa fa-file-excel-o"></i> Excel</a>
    </div>
  </form>
  <hr>
  <center>
    <h2><strong>Estado De Resultado</strong></h2>
  </center>
  <hr>
  <?php
  include("../conexion.php");

  // INGRESOS
  $sql = "select tcc.CUENTA ,tb2.Sdebe as ingresos from tbl_balanza tb2
  join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
  where tb2.COD_CUENTA like '6401%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo";
  $resultado = mysqli_query($conn, $sql);
  while ($rows = $resultado->fetch_assoc()) {
    $ingresos = $rows["ingresos"];
  }
  ?>

  <!-- DESPLIEGUE DE INGRESOS-->
    <table class="table">
    <thead class="table-primary">
      <?php
      if(empty($ingresos)){
        $ingresos = 0;
      }
      ?>
                <tr>
                    <th>
                        Ingresos 
                    </th>
                    <th>
                    </th>
                    <th>
                        <?php echo  $ingresos ?>
                    </th>

                </tr>
            </thead>
            <tbody>
      <?php
      $sql1 = "select tcc.CUENTA,tb2.Sdebe from tbl_balanza tb2
      join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
      where tb2.COD_CUENTA like '6401%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo and tb2.Sdebe!=0";
      $resultado1 = mysqli_query($conn, $sql1);

      while ($rows = $resultado1->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['Sdebe'];

      ?>
        <tr>
          <th> <?php echo  $Cod ?></th>
          <th> <?php echo $cuen ?></th>
          <th></th>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
    <?php
  include("../conexion.php");

  // COSTOS
  $sqlcosto = "select ifnull(sum(tb2.SAcreedor),0) as costo from tbl_balanza tb2 
  where tb2.COD_CUENTA like '6501%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo";
  $resultadocosto = mysqli_query($conn, $sqlcosto);
  while ($rows = $resultadocosto->fetch_assoc()) {
    $costo = $rows["costo"];
  }
  ?>

  <!-- DESPLIEGUE DE INGRESOS-->
    <table class="table">
    <thead class="table-primary">
                <tr>
                    <th>
                        Costo De Venta 
                    </th>
                    <th>
                    </th>
                    <th>
                        <?php echo  $costo ?>
                    </th>

                </tr>
            </thead>
            <tbody>
      <?php
      $sql1 = "select tcc.CUENTA,tb2.SAcreedor  from tbl_balanza tb2
      join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
      where tb2.COD_CUENTA like '6501%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo and tb2.Sdebe!=0";
      $resultado1 = mysqli_query($conn, $sql1);

      while ($rows = $resultado1->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['SAcreedor'];

      ?>
        <tr>
          <th> <?php echo  $Cod ?></th>
          <th> <?php echo $cuen ?></th>
          <th></th>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>

    <!-- Utilidad-->
    <table class="table">
    <thead class="table-primary">
                <tr>
                    <th>
                        Utilidad 
                    </th>
                    <th>
                    </th>
                    <th>
                        <?php echo  ($ingresos - $costo) ?>
                    </th>

                </tr>
            </thead>
    </table>
    
    <?php
    // Gastos Operativos
  $sqlopera = "select ifnull(sum(tb2.SAcreedor),0) as costo from tbl_balanza tb2 
  where tb2.COD_CUENTA like '6502%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo";
  $resultadoopera = mysqli_query($conn, $sqlopera);
  while ($rows = $resultadoopera->fetch_assoc()) {
    $opera = $rows["costo"];
  }
  ?>

  <!-- DESPLIEGUE DE INGRESOS-->
    <table class="table">
    <thead class="table-primary">
                <tr>
                    <th>
                        Gastos Operativos 
                    </th>
                    <th>
                    </th>
                    <th>
                        <?php echo  $opera ?>
                    </th>

                </tr>
            </thead>
            <tbody>
      <?php
      $sql1 = "select tcc.CUENTA,tb2.SAcreedor  from tbl_balanza tb2
      join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
      where tb2.COD_CUENTA like '6502%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo and tb2.Sdebe!=0";
      $resultado1 = mysqli_query($conn, $sql1);

      while ($rows = $resultado1->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['SAcreedor'];

      ?>
        <tr>
          <th> <?php echo  $Cod ?></th>
          <th> <?php echo $cuen ?></th>
          <th></th>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>

    <?php
    // Gastos Venta
  $sqlGV = "select ifnull(sum(tb2.SAcreedor),0) as costo from tbl_balanza tb2 
  where tb2.COD_CUENTA like '6503%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo";
  $resultadoGV = mysqli_query($conn, $sqlGV);
  while ($rows = $resultadoGV->fetch_assoc()) {
    $GV = $rows["costo"];
  }
  ?>

  <!-- DESPLIEGUE DE INGRESOS-->
    <table class="table">
    <thead class="table-primary">
                <tr>
                    <th>
                        Gastos De Venta 
                    </th>
                    <th>
                    </th>
                    <th>
                        <?php echo  $GV ?>
                    </th>

                </tr>
            </thead>
            <tbody>
      <?php
      $sql1 = "select tcc.CUENTA,tb2.SAcreedor  from tbl_balanza tb2
      join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
      where tb2.COD_CUENTA like '6503%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo and tb2.Sdebe!=0";
      $resultado1 = mysqli_query($conn, $sql1);

      while ($rows = $resultado1->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['SAcreedor'];

      ?>
        <tr>
          <th> <?php echo  $Cod ?></th>
          <th> <?php echo $cuen ?></th>
          <th> </th>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>

    <?php
    // Gastos Administración
  $sqlGA = "select ifnull(sum(tb2.SAcreedor),0) as costo from tbl_balanza tb2 
  where tb2.COD_CUENTA like '6504%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo";
  $resultadoGA = mysqli_query($conn, $sqlGA);
  while ($rows = $resultadoGA->fetch_assoc()) {
    $GA = $rows["costo"];
  }
  ?>

  <!-- DESPLIEGUE DE INGRESOS-->
    <table class="table">
    <thead class="table-primary">
                <tr>
                    <th>
                        Gastos De Administración 
                    </th>
                    <th>
                    </th>
                    <th>
                        <?php echo  $GA ?>
                    </th>

                </tr>
            </thead>
            <tbody>
      <?php
      $sql1 = "select tcc.CUENTA,tb2.SAcreedor  from tbl_balanza tb2
      join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
      where tb2.COD_CUENTA like '6504%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo and tb2.Sdebe!=0";
      $resultado1 = mysqli_query($conn, $sql1);

      while ($rows = $resultado1->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['SAcreedor'];

      ?>
        <tr>
          <th> <?php echo $Cod ?></th>
          <th> <?php echo $cuen ?></th>
          <th> </th>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>

    <?php
    // Gastos Financieros
  $sqlGF = "select ifnull(sum(tb2.SAcreedor),0) as costo from tbl_balanza tb2 
  where tb2.COD_CUENTA like '6505%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo";
  $resultadoGF = mysqli_query($conn, $sqlGF);
  while ($rows = $resultadoGF->fetch_assoc()) {
    $GF = $rows["costo"];
  }
  ?>

  <!-- DESPLIEGUE DE INGRESOS-->
    <table class="table">
    <thead class="table-primary">
                <tr>
                    <th>
                        Gastos Financieros
                    </th>
                    <th>
                    </th>
                    <th>
                        <?php echo  $GF ?>
                    </th>

                </tr>
            </thead>
            <tbody>
      <?php
      $sql1 = "select tcc.CUENTA,tb2.SAcreedor  from tbl_balanza tb2
      join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
      where tb2.COD_CUENTA like '6505%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo and tb2.Sdebe!=0";
      $resultado1 = mysqli_query($conn, $sql1);

      while ($rows = $resultado1->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['SAcreedor'];

      ?>
        <tr>
          <th> <?php echo $Cod ?></th>
          <th> <?php echo $cuen ?></th>
          <th> </th>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>

    <?php
    // Otros Gastos
  $sqlOG = "select ifnull(sum(tb2.SAcreedor),0) as costo from tbl_balanza tb2 
  where tb2.COD_CUENTA like '6505%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo";
  $resultadoOG = mysqli_query($conn, $sqlOG);
  while ($rows = $resultadoOG->fetch_assoc()) {
    $OG = $rows["costo"];
  }
  ?>

  <!-- DESPLIEGUE DE INGRESOS-->
    <table class="table">
    <thead class="table-primary">
                <tr>
                    <th>
                        Otros Gastos
                    </th>
                    <th>
                    </th>
                    <th>
                        <?php echo  $OG ?>
                    </th>

                </tr>
            </thead>
            <tbody>
      <?php
      $sql1 = "select tcc.CUENTA,tb2.SAcreedor  from tbl_balanza tb2
      join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
      where tb2.COD_CUENTA like '6505%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo and tb2.Sdebe!=0";
      $resultado1 = mysqli_query($conn, $sql1);

      while ($rows = $resultado1->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['SAcreedor'];

      ?>
        <tr>
          <th> <?php echo $Cod ?></th>
          <th> <?php echo $cuen ?></th>
          <th> </th>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>

    <?php
    // Otros Ingresos
  $sqlOI = "select ifnull(sum(tb2.Sdebe),0) as costo from tbl_balanza tb2 
  where tb2.COD_CUENTA like '6402%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo";
  $resultadoOI = mysqli_query($conn, $sqlOI);
  while ($rows = $resultadoOI->fetch_assoc()) {
    $OI = $rows["costo"];
  }
  ?>

  <!-- DESPLIEGUE DE INGRESOS-->
    <table class="table">
    <thead class="table-primary">
                <tr>
                    <th>
                        Otros Ingresos
                    </th>
                    <th>
                    </th>
                    <th>
                        <?php echo  $OI ?>
                    </th>

                </tr>
            </thead>
            <tbody>
      <?php
      $sql1 = "select tcc.CUENTA,tb2.Sdebe  from tbl_balanza tb2
      join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
      where tb2.COD_CUENTA like '6402%' and tb2.Id_cliente=$cliente and tb2.Id_periodo=$Idperiodo and tb2.Sdebe!=0";
      $resultado1 = mysqli_query($conn, $sql1);

      while ($rows = $resultado1->fetch_assoc()) {
        $Cod = $rows["CUENTA"];
        $cuen = $rows['Sdebe'];

      ?>
        <tr>
          <th> <?php echo $Cod ?></th>
          <th> <?php echo $cuen ?></th>
          <th> </th>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>

    <!-- Utilidad Antes De Impuesto-->
    <?php $UTILIDADANTESISV = 0;
    $UTILIDADANTESISV = ($ingresos + $OI) - ($costo + $opera + $GV + $GF + $OG) ?>
    <table class="table">
    <thead class="table-primary">
                <tr>
                    <th>
                        Utilidad Antes De Impuesto 
                    </th>
                    <th>
                    </th>
                    <th>
                        <?php echo $UTILIDADANTESISV ?>
                    </th>

                </tr>
            </thead>
    </table>

    <!--Impuesto-->
    <?php
  $sql7 = " SELECT valor as isv FROM tbl_parametros tp 
  WHERE Parametro='Impuesto'";
  $resultado7 = mysqli_query($conn, $sql7);
  while ($rows = $resultado7->fetch_assoc()) {
    $isv = $rows["isv"];
  }
  $ISV = $UTILIDADANTESISV  * ($isv / 100);
?>
    <table class="table">
    <thead class="table-primary">
                <tr>
                    <th>
                        Impuesto 
                    </th>
                    <th>
                    </th>
                    <th>
                        <?php echo $ISV ?>
                    </th>

                </tr>
            </thead>
    </table>

    <!--Utilidad Neta-->
    <?php
  $UTILIDADNETA = 0;
  $UTILIDADNETA = ($UTILIDADANTESISV - $ISV);
?>
    <table class="table">
    <thead class="table-primary">
                <tr>
                    <th>
                        Impuesto 
                    </th>
                    <th>
                    </th>
                    <th>
                        <?php echo $UTILIDADNETA ?>
                    </th>

                </tr>
            </thead>
    </table>

    <?php
    $_SESSION['impu'] = $ISV;
    $_SESSION['neta'] = $UTILIDADNETA;
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