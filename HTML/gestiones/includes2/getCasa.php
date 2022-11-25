<?php
	
	require ('../conexion.php');
	
	$id_municipio = $_POST['id_municipio'];
	
	$queryl = "SELECT CODIGO_CUENTA FROM tbl_catalago_cuentas WHERE MAYOR ='$id_municipio' ORDER BY CODIGO_CUENTA desc LIMIT 1";
	$resultadol = $mysqli->query($queryl);
	
	$html= "<option value='0'>Seleccione El Codigo Disponible $id_municipio</option>";

	$variable2 = $id_municipio .''. '001';
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