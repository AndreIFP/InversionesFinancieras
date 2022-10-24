<?php
  include("../conexion.php");

  if(!empty($_POST))
	{
		
		$Id_Rol = $_POST['Id_Rol'];

		echo "<script> alert('No se puede eliminar un rol');window.location= 'GestionRoles.php' </script>";

	}

  if(empty($_REQUEST['Id']))
  {
    header("location: GestionRoles.php");
		mysqli_close($conn);
  }else{
    $Id_Rol = $_REQUEST['Id'];

		$query = mysqli_query($conn,"SELECT * FROM TBL_ROLES WHERE Id_Rol = $Id_Rol ");
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				$Rol = $data['Rol'];
			}
		}else{
			header("location: GestionRoles.php");
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
   if ($_SESSION['permisos'][M_GESTION_ROLES]['d']==0 or !isset($_SESSION['permisos'][M_GESTION_ROLES]['d'])) {
       header("Location: ../index.php");
       die();
   }
}
?>
<?php include 'barralateralinicial.php';?>
  </div>
  <title>Gestion Roles</title>
		<div class="data_delete">
			<h2>¿Está Seguro De Eliminar El Siguiente Registro?</h2>
            </br>
			<p>Nombre: <span><?php echo $Rol; ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="Id_Rol" value="<?php echo $Id_Rol; ?>">
				<a href="GestionRoles.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>


	</section>
</body>
<style type="text/css">
	.data_delete{
	text-align: center;
}
.data_delete h2{
	font-size: 12pt;
}
.data_delete span{
	font-weight: bold;
	color: #4f72d4;
	font-size: 12pt;
}
.btn_cancel,.btn_ok{
	width: 124px;
	background: #478ba2;
	color: #FFF;
	display: inline-block;
	padding: 5px;
	border-radius: 5px;
	cursor: pointer;
	margin: 15px;
}
.btn_cancel{
	background: #42b343;
}

.data_delete form{

	background: initial;
	margin: auto;
	padding: 20px 50px;
	border: 0;

}
</style>
<?php include 'barralateralfinal.php';?>