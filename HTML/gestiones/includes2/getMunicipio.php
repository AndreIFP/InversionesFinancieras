<?php
	
	require ('../conexion.php');
	
	$id_estado = $_POST['id_estado'];
	
	$queryl = "SELECT CODIGO_CUENTA FROM tbl_catalago_cuentas WHERE CODIGO_CUENTA like '$id_estado'  ORDER BY CODIGO_CUENTA desc LIMIT 1";
	$resultadol = $mysqli->query($queryl);
	
	$html= "<option value='0'>Seleccione El Codigo Disponible </option>";

	$variable2 = $id_estado .''. '001';
	while($rowl = $resultadol->fetch_assoc())	
	{

		$variable = $rowl['CODIGO_CUENTA'] +'1';
		$html.= "<option value='".$variable."'>".$variable."</option>";
	}

				
		

	echo $html;
?>		