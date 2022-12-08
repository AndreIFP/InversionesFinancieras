<?php
include("../conexion.php");

if (!empty($_POST)) {

	$Id_Cliente = $_POST['Id_Cliente'];

	$query_delete = mysqli_query($conn, "DELETE FROM tbl_clientes WHERE Id_Cliente =$Id_Cliente");
	if ($query_delete) {
		header("location: Gestion_Clientes.php");
	} else {
		echo "Error al eliminar";
	}
}

if (empty($_REQUEST['Id'])) {
	header("location: Gestion_Clientes.php");
	mysqli_close($conn);
} else {
	$Id_Cliente = $_REQUEST['Id'];

	$query = mysqli_query($conn, "SELECT * FROM tbl_clientes WHERE Id_Cliente = $Id_Cliente ");
	$result = mysqli_num_rows($query);

	if ($result > 0) {
		while ($data = mysqli_fetch_array($query)) {
			# code...
			$Nombre_Cliente = $data['Nombre_Cliente'];
		}
	} else {
		header("location: Gestion_Clientes.php");
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
	if ($_SESSION['permisos'][M_GESTION_CLIENTE]['d'] == 0 or !isset($_SESSION['permisos'][M_GESTION_CLIENTE]['d'])) {
		header("Location: ../index.php");
		die();
	}
}
?>

<?php include 'barralateralinicial.php'; ?>

<p></p>
<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 12px; ">

	<title>Gestion Cliente</title>
	<div class="data_delete">
		<h2>¿Está seguro que desea eliminar este cliente?</h2>
		</br>
		<H4>Nombre: <span><?php echo $Nombre_Cliente; ?></span></H4>

		<form method="post" action="">
			<input type="hidden" name="Id_Cliente" value="<?php echo $Id_Cliente; ?>">
			<a href="Gestion_Clientes.php" class="btn btn-danger "> <i class="fa fa-close" aria-hidden="true"></i> Cancelar</a>
			<button type="submit"  class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Aceptar</a></button>
		
		</form>
	</div>




</section>
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