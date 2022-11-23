<?php
	
	require ('../conexion.php');
	
	$id_estado = $_POST['id_estado'];
	
	$queryM = "SELECT CODIGO_CUENTA, CUENTA FROM tbl_catalago_cuentas WHERE CLASIFICACION = '$id_estado' ";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['CODIGO_CUENTA']."'>".$rowM['CUENTA']."</option>";
	}
	
	echo $html;
?>		