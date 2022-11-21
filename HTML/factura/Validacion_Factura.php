<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include("../conexion.php");

session_start();
$_SESSION['id'];
$_SESSION['user'];


?>

<?php include 'barralateralinicial.php';?>
<title>Factura</title>
<a href="../demo.php"><input type="submit" class="btn btn-primary" Value=" Regresar "></a>
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
                <b><h1>FACTURA POR HONORARIOS - Edgard Aquiles Ortiz Maradiaga</h1></b>
                <b><h2>PERITO CONTABLE</h2></b>
                <b><h3>Telefono: 2227-9327 - Cel: 9776-9891</h3></b>
                <b><h3>Barrio el Centro, Calle Principal, Casa N. 308</h3></b>
                <b><h3>Esquina opuesta a Pollo Campero, Frente a Punto Farma</h3></b>
                <b><h3>Comayaguela. M.D.C. Honduras. C.A.</h3></b>
                <b><h3>Email: edgard_issa7@yahoo.com</h3></b>
                <!-- <b><h3>RTN: 08011972047875</h3></b> -->
                
              </CENTER>


<form method="post" action="Generar_Factura_H.php">



<br>
    <input type="text" name="Fecha" value="<?php date_default_timezone_set("America/Tegucigalpa"); echo date("d-m-Y - h:i"); ?>" >
    <br>
    <tr>
    <td>Recibi de:‍‍‍‍‍ㅤ‍‍‍‍‍ㅤ‍‍‍‍‍ㅤ‍‍‍‍‍‍‍‍‍‍ㅤ‍‍‍‍‍ㅤ</td>
    <td><input type="text" name="Nombre_Cliente" value="" placeholder="Nombre del Cliente" size="30" maxlength="30"  required></td>
   </tr>
   <br>
 <tr>
     <td>R.T.N.:‍‍‍‍‍ㅤ‍‍‍‍‍‍‍‍‍‍ㅤ‍‍‍‍‍ㅤ‍‍‍‍‍ㅤ‍‍‍‍‍ㅤ‍‍‍‍‍ㅤ‍‍‍‍‍ㅤ</td>
    <td><input type="text" name="RTN_Cliente" value="" placeholder="Numero de R.T.N." size="15" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/,'')" required></td> 
 </tr>
 <br>
 <tr>
    <td>La Suma Neta de:‍‍‍‍‍ㅤ</td>
    <td><input type="text" name="Suma_Neta" placeholder="Cantidad" maxlength="24" value="" size="24"  required></td>
 </tr>
 <br>
 <tr>
    <td>Por Concepto de:‍‍‍‍‍ㅤ</td>
    <td><input type="text" name="Concepto" placeholder="Servicio" value="" size="75" maxlength="75" required></td>
 </tr>
 <br>
 <tr>
    <td>Fecha:‍‍‍‍‍ㅤ</td>
    <td><input type="text" name="FechaD" placeholder="Dia" value="" maxlength="2" size="2" oninput="this.value = this.value.replace(/[^0-9]/,'')" required></td></td>
 </tr>
 <td>de</td>
    <td><input type="text" name="FechaM" placeholder="Mes" value="" maxlength="10" size="10" oninput="this.value = this.value.replace(/[^a-zA-Z]/,'')" required></td></td>
 </tr>
 <td>del</td>
    <td><input type="text" name="FechaA" placeholder="Año" value="" maxlength="4" size="4" oninput="this.value = this.value.replace(/[^0-9]/,'')" required></td></td>
 </tr>
 <br>
 <br>
 <br>
 <tr>
    <td>Total por Honorarios:‍‍‍‍‍ㅤ</td>
    <td><input type="text" name="Total_Honorarios" placeholder="Ingrese el Total" value="" size="20" maxlength="20" oninput="this.value = this.value.replace(/[^0-9]/,'')" required></td>
 </tr>
 <br>
 <tr>
    <td>Valores Retenidos:‍‍‍‍‍ㅤ</td>
    <td><input type="text" name="Valores_Retenidos" placeholder="Ingrese la Cantidad" value="" size="20" maxlength="20" oninput="this.value = this.value.replace(/[^0-9]/,'')" required></td>
 </tr>
 <br>
 <tr>
    <td>Total Neto Recibido:‍‍‍‍‍ㅤ</td>
    <td><input type="text" name="Total_Neto" placeholder="Ingrese su Total" value="" size="20" maxlength="20" oninput="this.value = this.value.replace(/[^0-9]/,'')" required></td>
 </tr>
 <br><br>
<button type="submit" class="btn btn-success btn-lg">Guardar y Generar Factura</button>
</section>
</body>
<?php include 'barralateralfinal.php';?>