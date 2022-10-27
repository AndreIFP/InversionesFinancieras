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
<body>
<section  style=" background-color:rgb(240,248,255);
    padding: 15px;
    color:black;
    font-size: 25px; " >
<script>
function multiplicar(){
	m1 = document.getElementById("multiplicando").value;
	m2 = document.getElementById("multiplicador").value;
	r = m1*m2;
	document.getElementById("resultado").value = r;
	}
</script>

              <CENTER>
                <b><h1>FACTURA</h1></b>
                <b><h3>Barrio el centro edificio el centro 3er nivel cubículo 308</h3></b>
                <b><h3>RTN: 08015896135674</h3></b>
                <b><h3>Telefono: +(504) 8839-8891</h3></b>
              </CENTER>


<form method="post" action="factura.php">

<CENTER>

<br><br>

<table class="default">
 <tr>
    <td>ID de factura:</td>
    <td><input type="text" name="id_factura" value="" placeholder="Ingrese el numero de su factura" size="30" maxlength="20" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required></td> 
   </tr>
 <tr>
    <td>Fecha emisión de factura:</td>
    <td><input type="date" name="fecha_factura"
       value=""
       min="<?php $hoy=date("d-m-Y"); echo $hoy;?>" required></td>
 </tr>
    <td><hr></td>
    <td><hr></td>
 </tr>

 <tr>
    <td>Id Cliente:</td>
    <td><input type="text" name="id_cliente" value="" placeholder="Ingrese ID" size="10" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/,'')" required></td> 
 </tr>
 <tr>
    <td>Cliente:</td>
    <td><input type="text" name="nombre_cliente" placeholder="Nombre Cliente" maxlength="24" value="" size="25" oninput="this.value = this.value.replace(/[^a-zA-Z]/,'')" required></td>
 </tr>
 <tr>
    <td>Dirección del cliente:</td>
    <td><input type="text" name="direccion_cliente" placeholder="INgrese su dirección" value="" size="71" maxlength="70" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')" required></td>
 </tr>
 <tr>
    <td>RTN de cliente:</td>
    <td><input type="text" name="identificacion_fiscal_cliente" placeholder="Ingrese RTN" value="" maxlength="12" size="13" oninput="this.value = this.value.replace(/[^0-9]/,'')" required></td></td>
 </tr>
</table>

<center>
<br>
<h1>Descripción de servicios</h1>

<br>

<form id="multiplicar">
<table cellpadding="" border="5">
 <tr>
    <td>Descripción:</td>
    <td><input type="text" name="Descripcion" placeholder="Ingrese una descripcion para su factura" maxlength="49" size="50" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')" required></td>
 </tr>
 <tr><br>
    <td>Gravado:</td>
  <td><input type="text" name="gravado" id="multiplicando" onkeyup="multiplicar();" maxlength="9" step="0.001" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required onkeyup="sumar();"></td>
  </tr>
 <tr>
    <td>Impuesto():</td>
    <td><input type="text" name="impuesto" id="multiplicador" placeholder="Ej.(0.15, 0.18, 0.21)" onkeyup="multiplicar();" maxlength="9" step="0.001" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required onkeyup="sumar();"></td>
    </tr>
 <tr>
    <td>Total impuesto:</td>
    <td><input type="text" readonly name="impto" id="resultado" step="0.001"  required>
    </tr>
    <tr>
</table>
</form>

<br><br>

<button type="submit" class="btn btn-success btn-lg">PRESIONE PARA GENERAR SU FACTURA TOTAL</button>
</section>
</body>
<?php include 'barralateralfinal.php';?>