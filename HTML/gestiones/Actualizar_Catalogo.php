<?php 
	include ("../conexion.php");

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['CUENTA']) || empty($_POST['CLASIFICACION']) || empty($_POST['TIPO_CUENTA']))
		{ 
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
            $CODIGO_CUENTA   = $_POST['CODIGO_CUENTA'];
			$CUENTA       = $_POST['CUENTA'];
			$CLASIFICACION          = $_POST['CLASIFICACION'];
			$TIPO_CUENTA    = $_POST['TIPO_CUENTA'];

			if(!!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$CUENTA)){
				$alert='<p class="msg_error">La Cuenta Solo Recibe Letas.</p>';                
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$CLASIFICACION)){
				$alert='<p class="msg_error"> La Clasificación de La Cuenta Solo Recibe Letras.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$TIPO_CUENTA)){
				$alert='<p class="msg_error"> El Tipo de Cuenta Solo Recibe Letras.</p>';
			}else{
                
			  $query = mysqli_query($conn,"UPDATE TBL_CATALAGO_CUENTAS SET CODIGO_CUENTA='$CODIGO_CUENTA', CUENTA ='$CUENTA', CLASIFICACION ='$CLASIFICACION', TIPO_CUENTA ='$TIPO_CUENTA' WHERE CODIGO_CUENTA ='$CODIGO_CUENTA'");

				if($query){
					echo "<script> alert('Catalogo Cuenta Actualizado Exitosamente');window.location= 'Gestion_CatalogoCuenta.php' </script>";
				}else{
					$alert='<p class="msg_error">Error al actualizar el Catalogo Cuenta.</p>';
				}
			}
		}
	}

	//Mostrar Datos
	if(empty($_REQUEST['Id']))
	{
		header('Location: Gestion_CatalogoCuenta.php');
	}
	$Id = $_REQUEST['Id'];

	$sql= mysqli_query($conn,"SELECT *	FROM TBL_CATALAGO_CUENTAS WHERE CODIGO_CUENTA = $Id");
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: Gestion_CatalogoCuenta.php');
	}else{
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$CODIGO_CUENTA   = $data['CODIGO_CUENTA'];
			$CUENTA       = $data['CUENTA'];
			$CLASIFICACION  = $data['CLASIFICACION'];
			$TIPO_CUENTA    = $data['TIPO_CUENTA'];
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ACTUALIZAR CATALAGO CUENTA</title>
</head>
<body>
	<section id="container">
		<div class="form_register">
			<h1>Actualizar Catalogo Cuenta</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
			<form action="" method="post">
                <input type="hidden" name="CODIGO_CUENTA" value="<?php echo $CODIGO_CUENTA  ?>">
				<label for="CUENTA">Cuenta</label>
				<input type="text" name="CUENTA" maxlength="50" id="CUENTA" placeholder="Cuenta" pattern = "[a-z A-Z]+" value ="<?php echo $CUENTA ?>">
				<label for="CLASIFICACION">Clasificación</label>
				<input type="text" name="CLASIFICACION" maxlength="50" id="CLASIFICACION" placeholder="Clasificación" pattern = "[a-z A-Z]+" value ="<?php echo $CLASIFICACION ?>">
				<label for="TIPO_CUENTA">Tipo Cuenta</label>
				<input type="text" name="TIPO_CUENTA" maxlength="60" id="TIPO_CUENTA" placeholder="Tipo Cuenta" pattern = "[a-z A-Z]+" value ="<?php echo $TIPO_CUENTA ?>">
				
				<br>
				<input type="submit" value="Actualizar Catalogo Cuenta" class="btn_save">
			</form>
		</div>
	</section>
</body>
</html>
<style type="text/css">
.form_register{
	width: 450px;
	margin: auto;
}
.form_register h1{
	color: #3c93b0;
}
hr{
	border: 0;
	background: #CCC;
	height: 1px;
	margin: 10px 0;
	display: block;
}
form{
	background: #FFF;
	margin: auto;
	padding: 20px 50px;
	border: 1px solid #d1d1d1;
}
label{
	display: block;
	font-size: 12pt;
	font-family: 'GothamBook';
	margin: 15px auto 5px auto;
}
.btn_save{
	font-size: 12pt;
	background: #12a4c6;
	padding: 10px;
	color: #FFF;
	letter-spacing: 1px;
	border: 0;
	cursor: pointer;
	margin: 15px auto;
}
.alert{
	width: 100%;
	background: #66e07d66;
	border-radius: 6px;
	margin: 20px auto;
}
.msg_error{
	color: #e65656;
}
.msg_save{
	color: #126e00;
}
.alert p{
	padding: 10px;
}
</style>
<?php include 'barralateralfinal.php';?>