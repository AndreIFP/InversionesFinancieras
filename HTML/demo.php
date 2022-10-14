<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include("conexion.php");

session_start();
$_SESSION['id'];
$_SESSION['user'];


?>

<?php include 'barralateralinicial.php';?>
<title>Factura</title>
<a href="index.php"><input type="submit" class="btn btn-primary" Value=" Regresar "></a>
<br>
<body data-ng-app="validationApp">
      
      <div class="content" >
        <div class="content-header" >
            <div class="row">
              <CENTER>
                <b><h1>FACTURA</h1></b>
                <b><h3>Barrio el centro edificio el centro 3er nivel cubículo 308</h3></b>
                <b><h3>RTN: 08015896135674</h3></b>
                <b><h3>Telefono: +(504) 8839-8891</h3></b>
                <br>
                La factura es un beneficio de todos. ¡Exijala!
              </CENTER>


<form method="post" action="factura.php">

<CENTER>

<br><br>

<table class="default">
 <tr>
    <td>ID de factura:</td>
    <td><input type="number" name="id_factura" value="" size="7"></td>
 </tr>

 <tr>
    <td>Fecha emisión de factura:</td>
    <td><input type="text" name="fecha_factura" value="<?php echo date("d-m-Y"); ?>" size="10"></td>
 </tr>
    <td><hr></td>
    <td><hr></td>
 </tr>

 <tr>
    <td>Id Cliente:</td>
    <td><input type="text" name="id_cliente" placeholder="00000" value="" size="7"></td>
 </tr>
 <tr>
    <td>Cliente:</td>
    <td><input type="text" name="nombre_cliente" placeholder="Nombre Cliente" value="" size="15"></td>
 </tr>
 <tr>
    <td>Dirección del cliente:</td>
    <td><input type="text" name="direccion_cliente" placeholder="Direccion" value="" size="35"></td>
 </tr>
 <tr>
    <td>RTN de cliente:</td>
    <td><input type="text" name="identificacion_fiscal_cliente" placeholder="Ingrese RTN" value="" size="13"></td>
 </tr>
</table>

<center>
<br><br>
<h2>Descripcion de servicios</h2>

<br><br>

<table cellpadding="" border="5">
 <tr>
    <td>Descripcion:</td>
    <td><input type="text" name="Descripcion" placeholder="Ingrese una descripcion para su factura" size="50"></td>
 </tr>
 <tr>
    <td>Gravado:</td>
    <td><input type="text" name="gravado" value="" size="10"> L</td>
 </tr>
 <tr>
    <td>Impuesto(15%):</td>
    <td><input type="text" name="impto" value="" size="10"> L</td>
 </tr>
 <tr>
    <td>Total:</td>
    <td><input type="text" name="total" value="" size="10"> L</td>
 </tr>
</table>
<br><br>
<button type="submit" class="btn btn-success btn-lg">GENERAR FACTURA PDF</button>




</form>
<br><br><br><br>
</center>
                <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        </div>
    </section>
</div>


</body>
<!-- partial -->

<?php include 'barralateralfinal.php';?>
