<?php 
	include ("../conexion.php");

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['Preguntas']))
		{ 
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
            $Id_Preguntas   = $_POST['Id_Preguntas'];
			$nombre       = $_POST['Preguntas'];
			if(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú ¿?]+$/" ,$nombre)){
			$alert='<p class="msg_error">Solo Letras.</p>';
			}else{
			
			  $query = mysqli_query($conn,"UPDATE TBL_PREGUNTAS SET Preguntas='$nombre' WHERE Id_Preguntas ='$Id_Preguntas'");

				if($query){
					echo "<script> alert('Pregunta Actualizado Exitosamente');window.location= 'Gestion_Preguntas.php' </script>";
				}else{
					$alert='<p class="msg_error">Error al actualizar la pregunta.</p>';
				}
			}
		}
	}

	//Mostrar Datos
	if(empty($_REQUEST['Id']))
	{
		header('Location: Gestion_Preguntas.php');
	}
	$Id = $_REQUEST['Id'];

	$sql= mysqli_query($conn,"SELECT *	FROM TBL_PREGUNTAS WHERE Id_Preguntas = $Id");
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: Gestion_Preguntas.php');
	}else{
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$Id_Preguntas   = $data['Id_Preguntas'];
			$Nombre       = $data['Preguntas'];
		}
	}

 ?>

<?php
//FUNCION DE PERMISOS

//incluir las funciones de helpers
include_once("../helpers/helpers.php");

//iniciar las sesiones
session_start();
   // si no existe la variable rol, el usuario no esta logueado y redirige al Login
if (!isset($_SESSION['rol'])) {
   header("Location: ../login.php"); 
   die();
}else{
   //actualiza los permisos
   updatePermisos($_SESSION['rol']);
   
   //si no tiene permiso de visualización redirige al index
   if ($_SESSION['permisos'][M_GESTION_PREGUNTAS]['u']==0 or !isset($_SESSION['permisos'][M_GESTION_PREGUNTAS]['u'])) {
       header("Location: ../index.php");
       die();
   }
}
?>

<?php include 'barralateralinicial.php';?>

  </div>
  <br>
    <a href="Gestion_Preguntas.php"><input type="submit" class="btn-atras" Value=" Regresar "></a>
		<div class="form_register">
			<h1>Actualizar Preguntas</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
			<form action="" method="post">
                <input type="hidden" name="Id_Preguntas" value="<?php echo $Id_Preguntas  ?>">
				<label for="Preguntas">Preguntas</label>
				<input type="text" name="Preguntas" maxlength="30" id="Preguntas" placeholder="Pregunta" value ="<?php echo $Nombre ?>" size="40">
				<br>
				<input type="submit" value="Actualizar Pregunta" class="btn_save">
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