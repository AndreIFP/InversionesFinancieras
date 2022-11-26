<?php
	
	require ('../conexion.php');
	
	$id_calle = $_POST['id_calle'];
	
	$queryl = "SELECT CODIGO_CUENTA FROM tbl_catalago_cuentas WHERE MAYOR ='$id_calle' ORDER BY CODIGO_CUENTA desc LIMIT 1";
	$resultadol = $mysqli->query($queryl);
	
	$html= "<option value='0'>Seleccione El Codigo Disponible $id_calle</option>";

	$variable2 = $id_calle .''. '01';
	while($rowl = $resultadol->fetch_assoc())	
	{

		$variable = $rowl['CODIGO_CUENTA'] +'1';
		
	}
	if(empty($variable)){
				
		$html.= "<option value='".$variable2."'>".$variable2."</option>";
	}
	else{
		$html.= "<option value='".$variable."'>".$variable."</option>";
	}

	echo $html;