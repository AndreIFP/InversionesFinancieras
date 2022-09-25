<?php 

session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['empresa'];

$empresa=$_SESSION['empresa'];

?>

<?php include 'barralateralinicial.php';?>



  <style>
    body {
  background-color: #89adf0;
}

table {
  background: white;
  width: 50%;
  margin: 0 auto;
  margin-top: 2%;
  border-collapse: collapse;
  text-align: center;
}

th {

  height: 35px;
  border-bottom: 1px solid rgb(210, 220, 250);
  color: rgb(120, 120, 120);
}

td {
  color: rgba(100, 100, 100, 60);
  height: 30px;
  border: 0.5px solid rgba(240, 240, 240, 10);
}

/* Estililos de clases*/
.PrecioTotal:hover,
.CantidadTotal:hover {
  color: rgb(50, 173, 230);
}

.Cabecera {
  background-color:rgb(44, 148, 134);
  border-radius: 4px;
  height: 30px;
  padding: 2em;
  margin: 0 25%;
  text-align: center;
  color: rgb(221, 207, 207);
}

a{
  text-decoration: none;
  color: white;
  font-size: 14pt;
}

footer {
  margin-top: 40px;
  text-align: center;
}
  </style>
<!-- partial:index.partial.html -->
<header class="Cabecera">
 <h1> <center>Libro Mayor - Cuentas T</center></h1>

</header>

<header class="Cabecera">
 

<center><h4><label class="box-title">Empresa <?php echo $empresa  ?> </label></h4></center>
  
 </header>



 <section align="right">
 <a  class="btn btn-primary" href="../gestiones/Reporte_Balance.php" target="_blank" role="button">Generar Balance</a>
 <section align="left">
 <a class="btn btn-primary" href="libro.php" role="button">Atras</a></section>
</section>
<a class = "btn btn-success btn-print" href = "../gestiones/Reporte_libro_mayor.php"><i class ="glyphicon glyphicon-print"></i> Imprimir</a>
 

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Banco</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];

            $suma_debe = 0;
            $suma_haber = 0;
            $sumabanco = 0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Bancos';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
              if($debe_haber=="debe"){
                $monto_debe=$row['monto'];
                $suma_debe = $suma_debe + $monto_debe;
                  }
              if($debe_haber=="haber"){
                $monto_haber=$row['monto'];
                $suma_haber = $suma_haber + $monto_haber;
                  }
                $sumabanco = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $banco=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }

            ?>
            <?php
            include('../conexion.php');
            if (empty($banco)) {

            }else{
              $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
              VALUES('$cliente','$fechai','$banco','$sumabanco')");
            }
            ?>
</tr>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumabanco?></td></tr>
</table>
<form class="login-form" action="Balance.php" method="post">
<table id="caja" class="gridview">
  <tr class="title_row">
  <h1> <center>Caja</center></h1>
          <thead>
              <th> Cuenta </th>
              <th> Debe </th>
              <th> Haber </th>
         </thead>
         
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumacaja = 0;
            $suma_debe = 0;
            $suma_haber = 0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf'  And cuenta = 'Caja';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
              if($debe_haber=="debe"){
                $monto_debe=$row['monto'];
                $suma_debe = $suma_debe + $monto_debe;
                  }
              if($debe_haber=="haber"){
                $monto_haber=$row['monto'];
                $suma_haber = $suma_haber + $monto_haber;
                  }
                $sumacaja = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $caja=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
             }
            ?>
            <?php
            include('../conexion.php');
            if (empty($caja)) {
               
            }else{
              $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
              VALUES('$cliente','$fechai','$caja','$sumacaja')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td name = "total" ><?php echo $sumacaja?></td></tr>
</table>
</form>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Cuentas Por Cobrar</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumacxc = 0;
            $suma_debe = 0;
            $suma_haber = 0;
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Cuentas x Cobrar';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
              if($debe_haber=="debe"){
                $monto_debe=$row['monto'];
                $suma_debe = $suma_debe + $monto_debe;
                  }
              if($debe_haber=="haber"){
                $monto_haber=$row['monto'];
                $suma_haber = $suma_haber + $monto_haber;
                  }
                  $sumacxc = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $cxc=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
            <?php
            include('../conexion.php');
            if (empty($cxc)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$cxc','$sumacxc')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumacxc?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Documentos Por Cobrar</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumadxc = 0;
            $suma_debe = 0;
            $suma_haber = 0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Documentos por cobrar';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                    }
                if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                    }
                    $sumadxc = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $dxc=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($dxc)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$dxc','$sumadxc')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumadxc?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Pagos Anticipados</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumapag = 0;
            $suma_debe = 0;
            $suma_haber = 0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf'And cuenta = 'Pagos Anticipados';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                    }
                if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                    }
                    $sumapag = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $pag=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($pag)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$pag','$sumapag')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><th> </th><th> </th><td><?php echo $sumapag?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Inventario</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumainv = 0;
            $suma_debe = 0;
            $suma_haber = 0;
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Inventario';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                    }
                if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                    }
                    $sumainv = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $inv=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($inv)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$inv','$sumainv')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumainv?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Edificio</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumaedi = 0;
            $suma_debe = 0;
            $suma_haber = 0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Edificios';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                    }
                if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                    }
                    $sumaedi = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $edi=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($edi)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$edi','$sumaedi')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumaedi?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Mobiliario Y Equipo</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $suma_debe = 0;
            $suma_haber = 0;
            $sumamob = 0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Mobiliario y Equipo';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                    }
                if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                    }
                    $sumamob = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $mob=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($mob)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$mob','$sumamob')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumamob?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Otros Activos</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumaotrosactivos=0;
            $suma_debe=0;
            $suma_haber=0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Otros Activos';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                    }
                if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                    }
                    $sumaotrosactivos = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $otros_activos=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($otros_activos)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$otros_activos','$sumaotrosactivos')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumaotrosactivos?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Depreciación Acumulada</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumadep=0;
            $suma_debe=0;
            $suma_haber=0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Depreciacion Acumulada';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                    }
                if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                    }
                    $sumadep = -($suma_debe - $suma_haber);
           ?>
               <tr>
               <th><?php echo $dep=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($dep)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$dep','$sumadep')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumadep?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Deuda A Corto Plazo</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumadeuda=0;
            $suma_debe=0;
            $suma_haber=0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Deuda a Corto Plazo';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                  }
                  if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                  }
                  $sumadeuda = $suma_debe -  $suma_haber;
           ?>
               <tr>
               <th><?php echo $deuda=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($deuda)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$deuda','$sumadeuda')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumadeuda?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Provisiones A Corto Plazo</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumapro=0;
            $suma_debe=0;
            $suma_haber=0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Provisiones a Corto Plazo';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                  }
                  if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                  }
                  $sumapro = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $pro=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($pro)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$pro','$sumapro')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumapro?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Proveedores</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumaprovee=0;
            $suma_debe=0;
            $suma_haber=0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Proveedores';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                  }
                  if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                  }
                  $sumaprovee = $suma_debe - $suma_haber;
                  
           ?>
               <tr>
               <th><?php echo $provee=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($provee)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$provee','$sumaprovee')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumaprovee?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Cuentas Por Pagar</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumacxp=0;
            $suma_debe=0;
            $suma_haber=0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Cuentas por Pagar';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                  }
                  if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                  }
                  $sumacxp = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $cxp=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($cxp)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$cxp','$sumacxp')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumacxp?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Deuda A Largo Plazo</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumadeudalargo=0;
            $suma_debe=0;
            $suma_haber=0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Deuda a Largo Plazo';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                  }
                  if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                  }
                  $sumadeudalargo = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $deudalargo=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($deudalargo)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$deudalargo','$sumadeudalargo')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumadeudalargo?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Provisiones A Largo Plazo</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumaproviciones_largo=0;
            $suma_debe=0;
            $suma_haber=0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Provisiones a Largo Plazo';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                  }
                  if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                  }
                  $sumaproviciones_largo = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $proviciones_largo=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($proviciones_largo)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$proviciones_largo','$sumaproviciones_largo')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumaproviciones_largo?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Capital Social</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumacapitalsocial=0;
            $suma_debe=0;
            $suma_haber=0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Capital Social';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                  }
                  if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                  }
                  $sumacapitalsocial = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $capital_social=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($capital_social)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$capital_social','$sumacapitalsocial')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumacapitalsocial?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Utilidades Retenidas</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumautilidades=0;
            $suma_debe=0;
            $suma_haber=0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Utilidades Retenidas';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                  }
                  if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                  }
                  $sumautilidades = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $utilidades=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($utilidades)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$utilidades','$sumautilidades')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumautilidades?></td></tr>
</table>

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Reservas</center></h1>
          <thead>
                  <th> Cuenta </th>
                  <th> Debe </th>
                  <th> Haber </th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $sumareservas=0;
            $suma_debe=0;
            $suma_haber=0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And cuenta = 'Reservas';" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
                if($debe_haber=="debe"){
                  $monto_debe=$row['monto'];
                  $suma_debe = $suma_debe + $monto_debe;
                  }
                  if($debe_haber=="haber"){
                  $monto_haber=$row['monto'];
                  $suma_haber = $suma_haber + $monto_haber;
                  }
                  $sumareservas = $suma_debe - $suma_haber;
           ?>
               <tr>
               <th><?php echo $reservas=$row['cuenta']?></th>
               <th><?php echo $monto_debe;?></th>
               <th><?php echo $monto_haber;?></th>
               </tr>
            <?php
              }
            ?>
             <?php
            include('../conexion.php');
            if (empty($reservas)) {
               
            }else{
            $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBRO_MAYOR(ID_CLIENTE,FECHA,CUENTA,TOTAL_CUENTA)
            VALUES('$cliente','$fechai','$reservas','$sumareservas')");
            }
            ?>
</tr>
<tr><th> Total </th><td><?php echo $suma_debe?></td><td><?php echo $suma_haber?></td></tr>
<tr><th> Total Cuenta </th><th> </th><th> </th><td><?php echo $sumareservas?></td></tr>
</table>

</body>
<?php include 'barralateralfinal.php';?>