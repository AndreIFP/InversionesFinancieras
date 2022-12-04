<?php
	
	require ('../conexion.php');
	
	$id_calle = $_POST['id_calle'];
	

	$queryl = "SELECT CODIGO_CUENTA FROM tbl_catalago_cuentas WHERE char_length(CODIGO_CUENTA)=6 AND CODIGO_CUENTA LIKE '".$id_calle."%'";

	$resultadol = $mysqli->query($queryl);
	
	$html= "";

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