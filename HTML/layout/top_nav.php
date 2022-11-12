<?php
include('../conexion.php');
$cliente = $_SESSION['cliente'];
$temporada = $_SESSION['temporada'];
$fechai = $_SESSION['fechai'];
$fechaf = $_SESSION['fechaf'];
$usuario = $_SESSION['user'];
$suma_debe = 0;
$suma_haber = 0;
$sumabanco = 0;

//  if ($guardar=="si") {
#consulta de todos los paises
$consulta = mysqli_query($conn, "SELECT * FROM libro where  id_cliente = $cliente and fecha >='$fechai' and fecha <='$fechaf'");
while ($row = mysqli_fetch_array($consulta)) {
  $monto_haber = "";
  $monto_debe = "";
  $monto = $row['monto'];
  $id_libro = $row['id_libro'];
  $debe_haber = $row['debe_haber'];

  if ($debe_haber == "debe") {
    $monto_debe = $row['monto'];
    $suma_debe = $suma_debe + $monto_debe;
  }
  if ($debe_haber == "haber") {
    $monto_haber = $row['monto'];
    $suma_haber = $suma_haber + $monto_haber;
  }
  $sumabanco = $suma_debe - $suma_haber;
?>

<?php
}

?>
<?php
include('../conexion.php');
$query_insert = mysqli_query($conn, "INSERT INTO TBL_LIBROS(fecha,Id_cliente,caja)
              VALUES('$fechai','$cliente','$sumabanco')");

$simbolo_moneda = "L.";
?>


<?php

?>
</div>