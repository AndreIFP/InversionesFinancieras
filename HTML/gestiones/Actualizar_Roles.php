<?php
include("../conexion.php");

if (!empty($_POST)) {
	$alert = '';
	if (empty($_POST['Rol']) || empty($_POST['Descripcion'])) {
		$alert = '';
		$alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
	} else {
		$Id_Rol       = $_POST['Id_Rol'];
		$Rol          = $_POST['Rol'];
		$Estado       = $_POST['Estado'];
		$Descripcion  = $_POST['Descripcion'];
		if (!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/", $Descripcion)) {
			echo "<script> alert('La descripción solo recibe letras');window.location= 'Actualizar_Roles.php' </script>";
		} else {

			$query = mysqli_query($conn, "UPDATE tbl_roles SET Estado='$Estado', Descripcion='$Descripcion' WHERE Id_Rol ='$Id_Rol'");

			if ($query) {
				echo "<script> alert('Rol Actualizado Exitosamente');window.location= 'GestionRoles.php' </script>";
			} else {
				$alert = '<p class="msg_error">Error al actualizar la rol.</p>';
			}
		}
	}
}

//Mostrar Datos
if (empty($_REQUEST['Id'])) {
	header('Location: GestionRoles.php');
}
$Id = $_REQUEST['Id'];

$sql = mysqli_query($conn, "SELECT *	FROM tbl_roles WHERE Id_Rol = $Id");
$result_sql = mysqli_num_rows($sql);

if ($result_sql == 0) {
	header('Location: GestionRoles.php');
} else {
	while ($data = mysqli_fetch_array($sql)) {
		# code...
		$Id_Rol       = $data['Id_Rol'];
		$Rol          = $data['Rol'];
		$Estado       = $data['Estado'];
		$Descripcion  = $data['Descripcion'];
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
} else {
	//actualiza los permisos
	updatePermisos($_SESSION['rol']);

	//si no tiene permiso de visualización redirige al index
	if ($_SESSION['permisos'][M_GESTION_ROLES]['u'] == 0 or !isset($_SESSION['permisos'][M_GESTION_ROLES]['u'])) {
		header("Location: ../index.php");
		die();
	}
}
?>

<?php include 'barralateralinicial.php'; ?>
<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 12px; ">
	<a class="btn btn-primary" href="GestionRoles.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
	<hr>
	<div clas="row ">

		<div class="box-header with-border">

			<div class="box-body">

				<form action="" method="post">
					<center>
						<h2><strong> Actualización de Roles</strong></h2>
					</center>
					<input type="hidden" name="Id_Rol" value="<?php echo $Id_Rol  ?>">
					<hr>
					<div class="row">

						<div class="col-xs-14 pull-right">

							<table class="table">
								<thead class="table-primary">
									<tr>

										<th>
											<center>Nombre del rol</center>
										</th>


										<th>
											<center>Estado</center>
										</th>

									</tr>
								</thead>

								<tbody>

									<tr>

										<td style="width: 50%">

											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-lock"></i></span>
												<input type="text" name="Rol" class="form-control" maxlength="50" id="Rol" placeholder="Nombre" readonly="true" value="<?php echo $Rol ?>">

											</div>

										</td>

										<td style="width: 50%">

											<div class="input-group">

												<span class="input-group-addon"><i class="fa fa-check"></i></span>
												<select name="Estado" class="form-control notItemOne" required>
													<option value="<?php echo $Estado ?>"><?php echo $Estado ?></option>
													<option value="ACTIVO">ACTIVO</option>
													<option value="INACTIVO">INACTIVO</option>
												</select>
											</div>

										</td>

									</tr>

								</tbody>
							</table>

						</div>

					</div>

					<div class="row">

						<div class="col-xs-14 pull-right">

							<table class="table">
								<thead class="table-primary">
									<tr>

										<th>
											<center>Descripción</center>
										</th>

									</tr>
								</thead>

								<tbody>

									<tr>

										<td style="width: 100%">

											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-book"></i></span>
												<input type="text" class="form-control" name="Descripcion" maxlength="50" id="Descripcion" placeholder="Descripción" value="<?php echo $Descripcion ?>" size=50 required>

											</div>

										</td>

									</tr>

								</tbody>
							</table>

						</div>

					</div>
					<hr>
					<center><button type="submit" value="Actualizar Rol" class="btn btn-primary btn-lg"><i class="fa fa-eraser" aria-hidden="true"></i> Actualizar</button></center>
				</form>
			</div>
		</div>
	</div>


	</secction>
	</div>



	<style type="text/css">
		.btn-atras {
			background: #1faac8;
			color: #FFF;
			padding: 0 20px;
			border: 0;
			cursor: pointer;
			margin-left: 20px;
		}

		.form_register {
			width: 450px;
			margin: auto;
		}

		.form_register h1 {
			color: #3c93b0;
		}

		hr {
			border: 0;
			background: #CCC;
			height: 1px;
			margin: 10px 0;
			display: block;
		}

		form {
			background: #FFF;
			margin: auto;
			padding: 20px 50px;
			border: 1px solid #d1d1d1;
		}

		label {
			display: block;
			font-size: 12pt;
			font-family: 'GothamBook';
			margin: 15px auto 5px auto;
		}

		.btn_save {
			font-size: 12pt;
			background: #12a4c6;
			padding: 10px;
			color: #FFF;
			letter-spacing: 1px;
			border: 0;
			cursor: pointer;
			margin: 15px auto;
		}

		.notItemOne option:first-child {
			display: none;
		}

		.alert {
			width: 100%;
			background: #66e07d66;
			border-radius: 6px;
			margin: 20px auto;
		}

		.msg_error {
			color: #e65656;
		}

		.msg_save {
			color: #126e00;
		}

		.alert p {
			padding: 10px;
		}
	</style>
	<?php include 'barralateralfinal.php'; ?>