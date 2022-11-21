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
                <b><h1>SELECCIONE TIPO DE FACTURA</h1></b>
              </CENTER>

<br><br>


    <td>FACTURA POR HONORARIOS</td>
    <br>
    <a href="factura/Validacion_Factura.php" type="submit" class="btn btn-success btn-lg">GENERAR FACTURA</a>
    <br><br>

    <td>FACTURA POR HONORARIOS</td>
    <br>
    <a href="factura/Facturacion_H.html" type="submit" class="btn btn-success btn-lg">GENERAR FACTURA</a>
    

<br><br>


</section>
</body>
<?php include 'barralateralfinal.php';?>