<?php 
	
	include("../conexion.php");
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['Preguntas']))
		{ 
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
			$nombre = $_POST['Preguntas'];
			if(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú ¿?]+$/" ,$nombre)){
			$alert='<p class="msg_error">Solo Letras.</p>';
			}else{
			$query_insert = mysqli_query($conn,"INSERT INTO TBL_PREGUNTAS (Preguntas)
																	VALUES('$nombre')");
			if($query_insert){
				echo "<script> alert('Pregunta Registrada Exitosamente');window.location= 'Gestion_Preguntas.php' </script>";
			}else{
				$alert='<p class="msg_error">Error al registrar la pregunta.</p>';
			}
		}
		}
	}
 ?>
<?php


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
   if ($_SESSION['permisos'][M_GESTION_PREGUNTAS]['w']==0 or !isset($_SESSION['permisos'][M_GESTION_PREGUNTAS]['w'])) {
       header("Location: ../index.php");
       die();
   }
}
?>

<?php include 'barralateralinicial.php';?>
                </div>
				<br>
				<title>Gestion Preguntas</title><div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <h6><a  class="btn btn-primary"  href="Gestion_Preguntas.php">Volver Atrás</a></h6>
  <div class="form_register">
			
			<form action="" method="post">
			<h1>Registro Pregunta</h1>
			<hr>
				<label for="Preguntas">Preguntas</label>
				<input type="text" name="Preguntas" maxlength="35" id="Preguntas" placeholder="Pregunta" size="40">
				<br>
				<input type="submit" value="Registrar Parametro" class="btn_save">
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