<?php 
	
	include("../conexion.php");

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['Rol']) || empty($_POST['Descripcion']))
		{ 
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$Rol       = $_POST['Rol'];
			$Descripcion          = $_POST['Descripcion'];
            if(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Rol)){
                $alert='<p class="msg_error"> El Nombre Solo Recibe Letras.</p>';
            }elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Descripcion)){
                    $alert='<p class="msg_error">La descripcion solo recibe letras.</p>';
            }else{
			
			$query_insert = mysqli_query($conn,"INSERT INTO TBL_ROLES(Rol,Descripcion)
										VALUES('$Rol','$Descripcion')");
			    if($query_insert){
					echo "<script> alert('Rol Registrado Exitosamente');window.location= 'GestionRoles.php' </script>";
				}else{
					$alert='<p class="msg_error">Error al registrar el Roles.</p>';
				}
            }
		}
	}
 ?>

<?php
include("../conexion.php");

?>
<?php include 'barralateralinicial.php';?>
  </div>
  <title>Gestion Roles</title>
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <h6><a  class="btn btn-primary"  href="GestionRoles.php ">Volver Atrás</a></h6>

  <div class="container mt-12">
                  <div class="col-md-12">
                </div>
		<div class="form_register">
			
			<form action="" method="post">
			<h1>Registro Roles</h1>
			<hr>
				<label for="Rol">Nombre Roles</label>
				<input type="text" name="Rol" maxlength="50" id="Rol" placeholder="Nombre completo">
				<label for="Descripcion">Descripcion</label>
				<input type="text" name="Descripcion" maxlength="20" id="Descripcion" placeholder="Descripcion">
				<br>
				<input type="submit" value="Registrar Roles" class="btn_save">
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