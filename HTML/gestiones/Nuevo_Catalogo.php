<?php 
	
	include("../conexion.php");

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
			$query_insert = mysqli_query($conn,"INSERT INTO TBL_CATALAGO_CUENTAS (CODIGO_CUENTA,CUENTA,CLASIFICACION,TIPO_CUENTA)
																	VALUES('$CODIGO_CUENTA','$CUENTA','$CLASIFICACION','$TIPO_CUENTA')");
			if($query_insert){
				echo "<script> alert('Cuenta Registrado Exitosamente');window.location= 'Gestion_CatalogoCuenta.php' </script>";
			}else{
				$alert='<p class="msg_error">Error al registrar la Cuenta.</p>';
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
   if ($_SESSION['permisos'][M_GESTION_CAT_CUENTA]['w']==0 or !isset($_SESSION['permisos'][M_GESTION_CAT_CUENTA]['w'])) {
       header("Location: ../index.php");
       die();
   }
}
?>
<?php include 'barralateralinicial.php';?>
                </div>
				<title>Gestion Catalogo Cuentas</title>
				<div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <h6><a  class="btn btn-primary"  href="Gestion_CatalogoCuenta.php ">Volver Atrás</a></h6>
    		<div class="form_register">
			
			<form action="" method="post">
			<h1>Registro Cuenta</h1>
			<hr>
            <label for="CUENTA">Cuenta</label>
				<input type="text" name="CUENTA" maxlength="50" id="CUENTA" placeholder="Cuenta" pattern = "[a-z A-Z]+">
				<label for="CLASIFICACION">Clasificación</label>
				<input type="text" name="CLASIFICACION" maxlength="50" id="CLASIFICACION" placeholder="Clasificación">
				<label for="TIPO_CUENTA">Tipo Cuenta</label>
				<input type="text" name="TIPO_CUENTA" maxlength="60" id="TIPO_CUENTA" placeholder="Tipo Cuenta">
				<br>
				<input type="submit" value="Registrar Cuenta" class="btn_save">
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