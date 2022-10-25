<?php 
	
	include("../conexion.php");

			$CUENTA       = $_POST['CUENTA'];
			$CLASIFICACION          = $_POST['CLASIFICACION'];
			$TIPO_CUENTA    = $_POST['TIPO_CUENTA'];

			$query_insert = mysqli_query($conn,"INSERT INTO TBL_CATALAGO_CUENTAS (CODIGO_CUENTA,CUENTA,CLASIFICACION)
																	VALUES('$CUENTA','$CLASIFICACION','$TIPO_CUENTA')");
			if($query_insert){
				echo "<script> alert('Cuenta Registrado Exitosamente');window.location= 'Gestion_CatalogoCuenta.php' </script>";
			}else{
				$alert='<p class="msg_error">Error al registrar la Cuenta.</p>';
			}
	
 ?>