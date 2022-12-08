<?php
include("../conexion.php");

if (!empty($_POST)) {

	$Id_Usuario = $_POST['Id_Usuario'];

	$query_delete = mysqli_query($conn, "DELETE FROM tbl_usuario WHERE Id_Usuario =$Id_Usuario AND Rol='4'");
	if ($query_delete) {
		header("location: Gestion_Usuarios.php");
	} else {
		echo "Error al eliminar";
	}
}

if (empty($_REQUEST['Id'])) {
	header("location: Gestion_Usuarios.php");
	mysqli_close($conn);
} else {
	$Id_Usuario = $_REQUEST['Id'];

	$query = mysqli_query($conn, "SELECT u.Usuario,u.Nombre_Usuario,r.Rol
												FROM tbl_usuario u
												INNER JOIN
												tbl_roles r
												ON u.Rol = r.Id_Rol
												WHERE u.Id_Usuario = $Id_Usuario ");
	$result = mysqli_num_rows($query);

	if ($result > 0) {
		while ($data = mysqli_fetch_array($query)) {
			# code...
			$Usuario = $data['Usuario'];
			$Nombre_Usuario = $data['Nombre_Usuario'];
			$Rol     = $data['Rol'];
		}
	} else {
		header("location: Gestion_Usuarios.php");
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
} else {
	//actualiza los permisos
	updatePermisos($_SESSION['rol']);

	//si no tiene permiso de visualización redirige al index
	if ($_SESSION['permisos'][M_GESTION_USUARIOS]['d'] == 0 or !isset($_SESSION['permisos'][M_GESTION_USUARIOS]['d'])) {
		header("Location: ../index.php");
		die();
	}
}
?>
<?php include 'barralateralinicial.php'; ?>
<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 12px; ">
	<title>Gestion Usuarios</title>
	<div class="data_delete">
		<h2> <strong> ¿Está Seguro que desea eliminar este usuario? </strong></h2>
		<hr>
		<H4> Usuario: <span><?php echo $Usuario; ?>  </span></h4>
		<H4> Nombre: <span><?php echo $Nombre_Usuario; ?>  </span></h4>
		<H4> Tipo Usuario: <span><?php echo $Rol; ?> </span></h4>
		<H4> ¡Recuerda que solo el rol: <strong> nuevo </strong> se puede eliminar  </span></h4>
		<H4> en otro rol la accion no surgira efecto!  </span></h4>

		<form method="post" action="">
			<input type="hidden" name="Id_Usuario" value="<?php echo $Id_Usuario; ?>">
			<a href="Gestion_Usuarios.php" class="btn btn-danger"> <i class="fa fa-close" aria-hidden="true"></i> Cancelar</a>
			<button type="submit" class="btn btn-primary"> <i class="fa fa-check" aria-hidden="true"></i>  Aceptar </button>
		</form>
	</div>
	</secction>
	</div>
	<style type="text/css">
		.data_delete {
			text-align: center;
		}

		.data_delete h2 {
			font-size: 12pt;
		}

		.data_delete span {
			font-weight: bold;
			color: #4f72d4;
			font-size: 12pt;
		}

		.btn_cancel,
		.btn_ok {
			width: 124px;
			background: #478ba2;
			color: #FFF;
			display: inline-block;
			padding: 5px;
			border-radius: 5px;
			cursor: pointer;
			margin: 15px;
		}

		.btn_cancel {
			background: #42b343;
		}

		.data_delete form {

			background: initial;
			margin: auto;
			padding: 20px 50px;
			border: 0;

		}
	</style>
	<?php include 'barralateralfinal.php'; ?>