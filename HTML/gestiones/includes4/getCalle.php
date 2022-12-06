<?php
	
	require ('../conexion.php');
	
	$id_municipio = $_POST['id_municipio'];
	
	//$queryS = "SELECT CODIGO_CUENTA, CUENTA FROM tbl_catalago_cuentas WHERE char_length(CODIGO_CUENTA)=4 AND CODIGO_CUENTA LIKE '".$id_municipio."%'";
	$queryS = "SELECT CODIGO_CUENTA, CUENTA FROM tbl_catalago_cuentas WHERE char_length(CODIGO_CUENTA)=4 AND CODIGO_CUENTA LIKE '".$id_municipio."%'";

	$resultadoS = $mysqli->query($queryS);
	
	$html= "<option value='0'>Seleccionar</option>";
	
	while($rowS = $resultadoS->fetch_assoc())
	{
		$html.= "<option value='".$rowS['CODIGO_CUENTA']."'>".$rowS['CODIGO_CUENTA']." - ".$rowS['CUENTA']."</option>";
	}
	
	echo $html;
?>		