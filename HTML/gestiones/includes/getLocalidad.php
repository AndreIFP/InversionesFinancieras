<?php
	
	require ('../conexion.php');
	
	$id_casa = $_POST['id_casa'];
	
	$queryl = "SELECT CODIGO_CUENTA FROM tbl_catalago_cuentas WHERE MAYOR ='$id_casa' ORDER BY CODIGO_CUENTA DESC";
	$resultadol = $mysqli->query($queryl);
	
	while($rowl = $resultadol->fetch_assoc())	
	{

		$variable = $rowl['CODIGO_CUENTA'] +'1';
		$html.= "<option value='".$variable."'>".$variable."</option>";
	}
	
	echo $html;