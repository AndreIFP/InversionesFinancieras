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
    <section  style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 20px; " >
      
      <div class="content" >
        <div class="content-header" >
            <div class="row">
              <CENTER>
                <b><h2>FACTURA</h2></b>
              </CENTER> 


<form method="post" action="factura.php">

<CENTER>
<button type="submit" class="btn btn-success btn-lg">GENERAR FACTURA PDF</button>

<br><br>

<table class="default">
 <tr>
    <td>ID de factura:</td>
    <td><input type="text" name="id_factura" value="" size="7"></td>
 </tr>

 <tr>
    <td>Fecha emisión de factura:</td>
    <td><input type="text" name="fecha_factura" value="<?php echo date("d-m-Y"); ?>" size="10"></td>
 </tr>

 <tr>
    <td>Empresa emisora:</td>
    <td><input type="text" name="nombre_empresa" value="INVERSIONES FINANCIERAS S.A" size="30"></td>
 </tr>
 <tr>
    <td>Dirección de la empresa:</td>
    <td><input type="text" name="direccion_empresa" value="Barrio el centro edificio el centro 3er nivel cubículo 308" size="50"></td>
 </tr>
 <tr>
    <td>Teléfono de la empresa:</td>
    <td><input type="text" name="telefono_empresa" value=" +(504) 8839-8891" size="16"></td>
 </tr>
 <tr>
    <td>RTN de la empresa emisora:</td>
    <td><input type="text" name="identificacion_fiscal" value="08015896135674" size="13"></td>
 </tr>
 <tr>
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

<h3>Descripcion de servicios</h3>

<?php
$mysqli = mysqli_connect("LOCALHOST:3307","root","3214","2w4GSUinHO");
$query = mysqli_query($mysqli,"SELECT CODIGO_CUENTA, CUENTA FROM TBL_CATALAGO_CUENTAS ORDER BY FIELD (CLASIFICACION, 'ACTIVO', 'PASIVO', 'CAPITAL', 'INGRESOS','COSTOS','GASTOS') ASC, CODIGO_CUENTA, CLASIFICACION");
?>
<table>
   <tr>
      <th>Cuenta</th>
   </tr>
   <tr>
     <td>
      <select name ="Cuenta" >
         <?php
         while ($fila = $query->fetch_assoc()):
         $id = $fila['CODIGO_CUENTA'];
         $nombre = $fila['CUENTA'];
         echo "<option value='$nombre                              '>$id,   $nombre</option>";
         endwhile;
         ?>
         </select>
     </td>
   </tr>
        </center>
</table>
<br><br>

<table cellpadding="" border="5">
 <tr>
    <td>Descripcion:</td>
    <td><input type="text" name="Descripcion" value="Servicios contables para el mes de Julio" size="50"></td>
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
<button type="submit" class="btn btn-primary btn-lg" name="Contado">CONTADO</button>  
<button type="submit" class="btn btn-primary btn-lg" name="Credito">CREDITO</button>
  



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
