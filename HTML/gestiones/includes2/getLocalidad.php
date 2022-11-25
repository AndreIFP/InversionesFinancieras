<?php
	
	require ('../conexion.php');
	
	$id_casa = $_POST['id_casa'];
	
	$queryl = "SELECT CODIGO_CUENTA FROM tbl_catalago_cuentas WHERE MAYOR ='$id_casa' ORDER BY CODIGO_CUENTA desc LIMIT 1";
	$resultadol = $mysqli->query($queryl);
	
	$html= "<option value='0'>Seleccione El Codigo Disponible</option>";

	while($rowl = $resultadol->fetch_assoc())	
	{

		$variable = $rowl['CODIGO_CUENTA'] + '1';
		$html.= "<option value='".$variable."'>".$variable."</option>";
	}
	
	echo $html;