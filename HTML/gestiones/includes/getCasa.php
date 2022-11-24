<?php
	
	require ('../conexion.php');
	
	$id_municipio = $_POST['id_municipio'];
	
	$queryC = "SELECT CODIGO_CUENTA, CUENTA FROM tbl_catalago_cuentas WHERE MAYOR = '$id_municipio'";
	$resultadoC = $mysqli->query($queryC);
	
	$html= "<option value='0'>Seleccionar $id_municipio</option>";
	
	while($rowC = $resultadoC->fetch_assoc())
	{
		$html.= "<option value='".$rowC['CODIGO_CUENTA']."'>".$rowC['CODIGO_CUENTA']." - ".$rowC['CUENTA']."</option>";
	}
	
	echo $html;
?>		