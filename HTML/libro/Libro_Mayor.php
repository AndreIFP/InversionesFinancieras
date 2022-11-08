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

table {
  background:cornflowerblue;
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

  background-color:mediumseagreen;
  height: 30px;
  width: 100%;
  padding: 40px;
  text-align: center;
  color: rgb(221, 207, 207);
}

.Cabeceraer {
background-color:red;

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


  <br>

<div class="Cabecera">
 <h1> <center>Libro Mayor </center></h1>

</div>

<div class="Cabecera">
 

<center><h4><label class="box-title">Empresa <?php echo $empresa  ?> </label></h4></center>
  
</div>


<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 20px; " >

 <section align="right">
 <a  class="btn btn-primary" href="../gestiones/Reporte_Balance.php" target="_blank" role="button">Generar Balance</a>
 <section align="left">
 <a class="btn btn-primary" href="libro.php" role="button">Atras</a></section>
</section>
<a class = "btn btn-success btn-print" href = "../gestiones/Reporte_libro_mayor.php"><i class ="glyphicon glyphicon-print"></i> Imprimir</a>
 

<table id="ejemplo" class="gridview">
  <tr class="title_row">
  <h1> <center>Mayorización</center></h1>
          <thead>
                  <th><center> Cuenta </center></th>
                  <th> <center> Total Cuenta </center></th>
         </thead>
           <?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];


        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM tbl_libro_mayor2 where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' " );
              while($row=mysqli_fetch_array($consulta)){
                ?>
                <tr>
               <td><?php echo $row['cuenta'];?></td>
               <td><?php echo $row['total_cuenta'];?></td>
              <?php 
              }
              ?>
               
               </tr>
            <?php

   ?>
</tr>

</table>
</section>
</body>
<?php include 'barralateralfinal.php';?>