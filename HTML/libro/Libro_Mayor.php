<?php

session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['empresa'];

$empresa = $_SESSION['empresa'];

?>

<?php include 'barralateralinicial.php'; ?>
<p></p>

<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 20px; ">
  <h2><strong>    <center> Libro Mayor  de la empresa <?php echo $empresa  ?></center></strong>

</h2>


  <div class="reportes">
    <a class="btn btn-primary" href="libro.php" role="button"> <i class="fa fa-arrow-circle-left"></i> Atras</a>
    <a class="btn btn-warning" href="../gestiones/Reporte_Balance.php" target="_blank" role="button"> <i class="fa fa-book" aria-hidden="true"></i> Generar Balance</a>
    <a class="btn btn-success btn-print" href="../gestiones/Reporte_libro_mayor.php"><i class="glyphicon glyphicon-print"></i> Imprimir</a>

</div><br>


<table class="table table-bordered">
  <tr  class=" btn-success">
    <thead class=" table-primary">
      <th>
        <center> Cuenta </center>
      </th>
      <th>
        <center> Total Cuenta </center>
      </th>
    </thead>
    <?php
    include('../conexion.php');
    $cliente = $_SESSION['cliente'];
    $fechai = $_SESSION['fechai'];
    $fechaf = $_SESSION['fechaf'];


    //  if ($guardar=="si") {
    #consulta de todos los paises
    $consulta = mysqli_query($conn, "SELECT * FROM tbl_libro_mayor2 where  id_cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' ");
    while ($row = mysqli_fetch_array($consulta)) {
    ?>
  <tr>
    <td><center><?php echo $row['cuenta']; ?></center></td>
    <td><center><?php echo   " L. " . number_format($row['total_cuenta'], 2); ?></center></td>
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
<?php include 'barralateralfinal.php'; ?>
<style>
  

  /* Estililos de clases*/
  .PrecioTotal:hover,
  .CantidadTotal:hover {
    color: rgb(50, 173, 230);
  }

  .Cabecera {

    background-color: mediumseagreen;
    height: 30px;
    width: 100%;
    padding: 40px;
    text-align: center;
    color: rgb(221, 207, 207);
  }

  .Cabeceraer {
    background-color: red;

  }

  a {
    text-decoration: none;
    color: white;
    font-size: 14pt;
  }

  footer {
    margin-top: 40px;
    text-align: center;
  }
</style>