<?php
	
	require ('../conexion.php');
	
	$id_calle = $_POST['id_calle'];
	
	$queryC = "SELECT CODIGO_CUENTA, CUENTA FROM tbl_catalago_cuentas WHERE MAYOR = '$id_calle'";
	$resultadoC = $mysqli->query($queryC);
	
	$html= "<option value='0'>Seleccionar</option>";
	
	while($rowC = $resultadoC->fetch_assoc())
	{
		$html.= "<option value='".$rowC['CODIGO_CUENTA']."'>".$rowC['CODIGO_CUENTA']." - ".$rowC['CUENTA']."</option>";
	}
	
	echo $html;
?>		