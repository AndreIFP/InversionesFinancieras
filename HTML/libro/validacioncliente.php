<?php
$cliente = $_POST['Idcliente'];
$temporada=$_POST['Idtemporada'];


include('../conexion.php');
$consulta = mysqli_query($conn, "SELECT * FROM rangosdeperiodos where Id_periodo='$temporada'; ");
while ($row = mysqli_fetch_array($consulta)) {
	$fechai = $row['Fechainicio'];
	$fechaf = $row['Fechafinal'];
}


#consulta de todos los paises
$consulta = mysqli_query($conn, "SELECT * FROM tbl_clientes where Id_Cliente='$cliente'; ");
while ($row = mysqli_fetch_array($consulta)) {
	$nombree = $row['Nombre_Empresa'];
	$nnombre = $row['Nombre_Cliente'];
}

?>
<form method="post" action="validacionclientedos.php" name="miformulario">
	<?php
	session_start();
	$_SESSION['cliente'] = $cliente;
	$_SESSION['ncliente'] = $nnombre;
	$_SESSION['empresa'] = $nombree;
	$_SESSION['fechai'] = $fechai;
	$_SESSION['fechaf'] = $fechaf;
	$_SESSION['Idtemporada']= $temporada;
	?>

	<script>
		window.onload = function() {
			// Una vez cargada la página, el formulario se enviara automáticamente.
			document.forms["miformulario"].submit();
		}
	</script>
</form>