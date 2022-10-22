<?php 
	
	include("../conexion.php");

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['Nombre_Empresa']) || empty($_POST['Nombre_Cliente']) || empty($_POST['RTN_Cliente']) || empty($_POST['Direccion']) || empty($_POST['Telefono']) || empty($_POST['Tipo_Cliente']) || empty($_POST['Ciudad']))
		{ 
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
			$nombree       = $_POST['Nombre_Empresa'];
			$nombre       = $_POST['Nombre_Cliente'];
			$RTN          = $_POST['RTN_Cliente'];
			$Direccion    = $_POST['Direccion'];
			$Telefono     = $_POST['Telefono'];
			$Tipo_Cliente = $_POST['Tipo_Cliente'];
			$Ciudad       = $_POST['Ciudad'];

			if(!is_numeric($RTN) || !is_numeric($Telefono)){
				$alert='<p class="msg_error">Error al registrar el cliente, Solo Números en RTN o Teléfono.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$nombree)){
				$alert='<p class="msg_error"> El Nombre Solo Recibe Letras.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$nombre)){
				$alert='<p class="msg_error"> El Nombre Solo Recibe Letras.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Direccion)){
					$alert='<p class="msg_error">La dirección solo recibe letras.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Tipo_Cliente)){
					$alert='<p class="msg_error">El tipo cliente solo recibe letras.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Ciudad)){
					$alert='<p class="msg_error">Solo recibe letras.</p>';
			}else{
			$query_insert = mysqli_query($conn,"INSERT INTO TBL_CLIENTES(Nombre_Empresa,Nombre_Cliente,RTN_Cliente,Direccion,Telefono,Tipo_Cliente,Ciudad)
																	VALUES('$Nombree','$nombre','$RTN','$Direccion','$Telefono','$Tipo_Cliente','$Ciudad')");
			    if($query_insert){
					echo "<script> alert('Cliente Registrado Exitosamente');window.location= 'Gestion_Clientes.php' </script>";
				}else{
					$alert='<p class="msg_error">Error al registrar el cliente.</p>';
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
   if ($_SESSION['permisos'][M_GESTION_CLIENTE]['w']==0 or !isset($_SESSION['permisos'][M_GESTION_CLIENTE]['w'])) {
       header("Location: ../index.php");
       die();
   }
}
?>
<?php include 'barralateralinicial.php';?>

  </div>
  <title>Gestion Cliente</title>
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <h6><a  class="btn btn-primary"  href="Gestion_Clientes.php ">Volver Atrás</a></h6>
  <div class="form_register">
                  <div class="col-md-12">
			<form action="" method="post">
				
			<h1>Registro Cliente</h1>
			<hr>
				<label for="Nombre_Empresa">Nombre Empresa</label>
				<input type="text" name="Nombre_Empresa" maxlength="50" id="Nombre_Empresa" placeholder="Nombre completo" size="40">
				<label for="Nombre_Cliente">Nombre Cliente</label>
				<input type="text" name="Nombre_Cliente" maxlength="50" id="Nombre_Cliente" placeholder="Nombre completo" size="40">
				<label for="RTN_Cliente">RTN</label>
				<input type="text" name="RTN_Cliente" maxlength="20" id="RTN_Cliente" placeholder="RTN"size="40">
				<label for="Direccion">Dirección</label>
				<input type="Direccion" name="Direccion" maxlength="60" id="Direccion" placeholder="Dirección"size="40">
				<label for="Teléfono">Teléfono</label>
				<input type="tex" name="Telefono" maxlength="10" id="Telefono" placeholder="Teléfono"size="40">
                <label for="Tipo_Cliente">Tipo Cliente</label>
				<input type="text" name="Tipo_Cliente" maxlength="20" id="Tipo_Cliente" placeholder="Tipo Cliente" size="40">
                <label for="Ciudad">Ciudad</label>
				<input type="text" name="Ciudad" maxlength="25" id="Ciudad" placeholder="Ciudad" size="40">
				<br>
				<input type="submit" value="Registrar Cliente" class="btn_save"></center></p>
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