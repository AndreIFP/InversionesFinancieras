<?php
	
	require ('../conexion.php');
	
	$id_municipio = $_POST['id_municipio'];
	
	//$queryl = "SELECT MAX(CODIGO_CUENTA) FROM tbl_catalago_cuentas WHERE char_length(CODIGO_CUENTA)=4 AND  CODIGO_cUENTA LIKE '".$id_municipio."%'";
	$queryl = "SELECT CODIGO_CUENTA, CUENTA FROM tbl_catalago_cuentas WHERE char_length(CODIGO_CUENTA)=4 AND CODIGO_CUENTA LIKE '".$id_municipio."%'";

	$resultadol = $mysqli->query($queryl);
	
	$html= "";

	$variable2 = $id_municipio.''. '01';

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