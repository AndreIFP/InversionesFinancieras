<?php
	
	require ('../conexion.php');
	
	$id_municipio = $_POST['id_municipio'];
	
	$queryS = "SELECT CODIGO_CUENTA, CUENTA FROM tbl_catalago_cuentas WHERE MAYOR = '$id_municipio'";
	$resultadoS = $mysqli->query($queryS);
	
	$html= "<option value='0'>Seleccionar $id_municipio</option>";
	
	while($rowS = $resultadoS->fetch_assoc())
	{
		$html.= "<option value='".$rowS['CODIGO_CUENTA']."'>".$rowS['CODIGO_CUENTA']." - ".$rowS['CUENTA']."</option>";
	}
	
	echo $html;
?>		