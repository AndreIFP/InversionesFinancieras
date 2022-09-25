<?php 
	include ("../conexion.php");

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['Parametro']) || empty($_POST['Valor']))
		{ 
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
            $Id_Parametro = $_POST['Id_Parametro'];
			$nombre       = $_POST['Parametro'];
			$Valor        = $_POST['Valor'];
			if(!is_numeric($Valor)){
				$alert='<p class="msg_error">Error El Valor Solo Números.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$nombre)){
				$alert='<p class="msg_error"> El Nombre Del Parametro Solo Recibe Letras.</p>';
			}else{
				$query = mysqli_query($conn,"UPDATE TBL_PARAMETROS SET Parametro='$nombre',Valor='$Valor' WHERE Id_Parametro ='$Id_Parametro'");

				if($query){
					echo "<script> alert('Parametro Actualizado Exitosamente');window.location= 'Gestion_parametros.php' </script>";
				}else{
					$alert='<p class="msg_error">Error al actualizar el parametro.</p>';
				}
			}
		}
	}

	//Mostrar Datos
	if(empty($_REQUEST['Id']))
	{
		header('Location: Gestion_parametros.php');
	}
	$Id = $_REQUEST['Id'];

	$sql= mysqli_query($conn,"SELECT *	FROM TBL_PARAMETROS WHERE Id_Parametro = $Id");
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: Gestion_parametros.php');
	}else{
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$Id_Parametro = $data['Id_Parametro'];
			$Nombre       = $data['Parametro'];
			$Valor        = $data['Valor'];
		}
	}

 ?>

<?php include 'barralateralinicial.php';?>

  </div>
  <br>
    <a href="Gestion_parametros.php"><input type="submit" class="btn-atras" Value=" Regresar "></a>
		<div class="form_register">
			<h1>Actualizar Parametro</h1>
			<hr>
			<form action="" method="post">
                <input type="hidden" name="Id_Parametro" value="<?php echo $Id_Parametro  ?>">
				<label for="Parametro">Nombre Parametro</label>
				<input type="text" name="Parametro" maxlength="30" id="Parametro" placeholder="Parametro" value ="<?php echo $Nombre ?>" size="40">
				<label for="Valor">Valor</label>
				<input type="text" name="Valor" maxlength="40" id="Valor" placeholder="Valor Parametro" value ="<?php echo $Valor ?>" size="40">
				<br>
				<input type="submit" value="Actualizar Parametro" class="btn_save">
			</form>
		</div>
	</section>
</body>
<style type="text/css">
.btn-atras{
	background: #1faac8;
	color: #FFF;
	padding: 0 20px;
	border: 0;
	cursor: pointer;
	margin-left: 20px;
}
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