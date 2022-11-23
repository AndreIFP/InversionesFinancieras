<?php
	
	require ('../conexion.php');
	
	$id_casa = $_POST['id_casa'];
	
	$queryl = "SELECT CODIGO_CUENTA, CUENTA FROM tbl_catalago_cuentas WHERE CODIGO_CUENTA like '%$id_casa%'";
	$resultadol = $mysqli->query($queryl);
	
	$html= "<option value='0'>Seleccionar</option>";
	
	while($rowl = $resultadol->fetch_assoc())
	{
		$html.= "<option value='".$rowl['CODIGO_CUENTA']."'>".$rowl['CUENTA']."</option>";
	}
	
	echo $html;