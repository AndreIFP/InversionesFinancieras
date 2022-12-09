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
      background-color:#ECFAF4 ;
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
  $Idperiodo=$_SESSION['Idtemporada'];
  $fecha = date('Y-m-d h:i:s');

  $consulta = mysqli_query($conn, "select * from tbl_balanza
WHERE Id_cliente=$cliente");
  $nr = mysqli_num_rows($consulta);
  if ($nr == 0) {
    echo "<script> alert('No hay datos');window.location= 'BalanzaComp.php' </script>";
  }

  ?>
  <a class="btn btn-primary" href="Resultado.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <br>
  <div align="right">
    <a class="btn btn-warning" href="../gestiones/Reporte_Balance.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;"><i class="fa fa-file-pdf-o"></i> Imprimir</a>
    <a class="btn btn-success" href="../gestiones/reporte_excel_balance.php"><i class="fa fa-file-excel-o"></i> Excel</a>
  </div>
  <hr>
  <center>
    <h4><strong><?php echo $empresa  ?></strong></h4>
    <h4><strong>Balance General</strong></h4>
    <h4><strong> del <?php echo $fechai  ?> al <?php echo $fechaf  ?></strong></h4>
  </center>
  <hr>
  <?php
  include("../conexion.php");

 // Activos
 $sqlactivo = " select ifnull(sum(tb2.Sdebe),0) as Activos from tbl_balanza tb2 
 where tb2.COD_CUENTA like '1%' and tb2.Id_cliente='$cliente' and tb2.Id_periodo='$Idperiodo'";
 $resultadoactivo = mysqli_query($conn, $sqlactivo);
 while ($rows = $resultadoactivo->fetch_assoc()) {
   $activo= $rows["Activos"];
 }
 ?>

 <!-- DESPLIEGUE DE INGRESOS-->
   <table class="table">
   <thead class="table-primary">
               <tr>
                   <th>
                       Activos
                   </th>
                   <th>
                    </th>
                   <th style="width: 15%">
                       <?php echo   $activo?>
                   </th>

               </tr>
           </thead>
           <tbody>
     <?php
     $sql1 = "select tcc.CUENTA,tb2.Sdebe  from tbl_balanza tb2
     join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
     where tb2.COD_CUENTA like '1%' and tb2.Id_cliente='$cliente' and tb2.Id_periodo='$Idperiodo' and tb2.Sdebe!=0  ";
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
   // Pasivo
 $sqlpasivos = "select ifnull(sum(tb2.SAcreedor),0) as Pasivos from tbl_balanza tb2 
 where tb2.COD_CUENTA like '2%' and tb2.Id_cliente='$cliente' and tb2.Id_periodo='$Idperiodo'";
 $resultadopasivos = mysqli_query($conn, $sqlpasivos);
 while ($rows = $resultadopasivos->fetch_assoc()) {
   $pasivos= $rows["Pasivos"];
 }
 ?>

 <!-- DESPLIEGUE DE INGRESOS-->
   <table class="table">
   <thead class="table-primary">
               <tr>
                   <th>
                       Pasivos
                   </th>
                   <th>
                    </th>
                   <th style="width: 15%">
                       <?php echo   $pasivos?>
                   </th>

               </tr>
           </thead>
           <tbody>
     <?php
     $sql2 = "select tcc.CUENTA,tb2.SAcreedor from tbl_balanza tb2
     join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
     where tb2.COD_CUENTA like '2%' and tb2.Id_cliente='$cliente' and tb2.Id_periodo='$Idperiodo' and tb2.SAcreedor!=0  ";
     $resultado1 = mysqli_query($conn, $sql2);

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
   // patrimonio
 $sqlpatrimonio = "select ifnull(sum(tb2.SAcreedor),0) as Capital from tbl_balanza tb2 
 where tb2.COD_CUENTA like '3%' and tb2.Id_cliente='$cliente' and tb2.Id_periodo='$Idperiodo'";
 $resultadopatrimonio = mysqli_query($conn, $sqlpatrimonio);
 while ($rows =$resultadopatrimonio ->fetch_assoc()) {
   $patrimonio= $rows["Capital"];
 }
 ?>

 <!-- DESPLIEGUE DE INGRESOS-->
   <table class="table">
   <thead class="table-primary">
               <tr>
                   <th>
                       Patrimonio
                   </th>
                   <th>
                   </th>
                   <th style="width: 15%">
                       <?php echo  $patrimonio?>
                   </th>

               </tr>
           </thead>
           <tbody>
     <?php
     $sql2 = "select tcc.CUENTA,tb2.SAcreedor from tbl_balanza tb2
     join tbl_catalago_cuentas tcc on tb2.COD_CUENTA=tcc.CODIGO_CUENTA 
     where tb2.COD_CUENTA like '3%' and tb2.Id_cliente='$cliente' and tb2.Id_periodo='$Idperiodo' and tb2.SAcreedor!=0  ";
     $resultado1 = mysqli_query($conn, $sql2);

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