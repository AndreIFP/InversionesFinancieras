<?php 
	
	include("../conexion.php");

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['Rol']) || empty($_POST['Descripcion']))
		{ 
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$Rol         = $_POST['Rol'];
			$Descripcion = $_POST['Descripcion'];
            if(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Rol)){
                $alert='<p class="msg_error"> El Nombre Solo Recibe Letras.</p>';
            }elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Descripcion)){
				echo "<script> alert('La descripción solo recibe letras');window.location= 'Nuevo_Roles.php' </script>";
            }else{
				$queryrol 	= mysqli_query($conn,"SELECT * FROM TBL_ROLES WHERE Rol = '$Rol'");
				$nr 			= mysqli_num_rows($queryrol); 
			if($nr == 0){
			$query_insert = mysqli_query($conn,"INSERT INTO TBL_ROLES(Rol,Descripcion)
										VALUES('$Rol','$Descripcion')");
			    if($query_insert){
					echo "<script> alert('El Rol se ha registrado exitosamente');window.location= 'GestionRoles.php' </script>";
				}
			}else{
				echo "<script> alert('No se puede registrar este Rol, ya que este existe');window.location= 'Nuevo_Roles.php' </script>";
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
   if ($_SESSION['permisos'][M_GESTION_ROLES]['w']==0 or !isset($_SESSION['permisos'][M_GESTION_ROLES]['w'])) {
       header("Location: ../index.php");
       die();
   }
}
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
				<input type="text" name="Rol" maxlength="20" id="Rol" placeholder="Nombre completo" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return blockSpecialCharacters(event)" required>
				<label for="Descripcion">Descripción</label>
				<input type="text" name="Descripcion" maxlength="20" id="Descripcion" placeholder="Descripción" required>
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

<script>
	function blockSpecialCharacters(e) {
            let key = e.key;
            let keyCharCode = key.charCodeAt(0);
            
            // A-Z
            if(keyCharCode >= 65 && keyCharCode <= 90) {
                return key;
            }
            // a-z
            if(keyCharCode >= 97 && keyCharCode <= 122) {
                return key;
            }

            return false;
    }

    $('#theInput').keypress(function(e) {
        blockSpecialCharacters(e);
    });
</script>
<?php include 'barralateralfinal.php';?>