<?php

include("../conexion.php");

if (!empty($_POST)) {
	$alert = '';
	if (empty($_POST['Rol']) || empty($_POST['Descripcion'])) {
		$alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
	} else {

		$Rol         = $_POST['Rol'];
		$Estado      = $_POST['Estado'];
		$Descripcion = $_POST['Descripcion'];
		if (!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/", $Rol)) {
			$alert = '<p class="msg_error"> El Nombre Solo Recibe Letras.</p>';
		} elseif (!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/", $Descripcion)) {
			echo "<script> alert('La descripción solo recibe letras');window.location= 'Nuevo_Roles.php' </script>";
		} else {
			$queryrol 	= mysqli_query($conn, "SELECT * FROM TBL_ROLES WHERE Rol = '$Rol'");
			$nr 			= mysqli_num_rows($queryrol);
			if ($nr == 0) {
				$query_insert = mysqli_query($conn, "INSERT INTO TBL_ROLES(Rol,Estado,Descripcion)
										VALUES('$Rol','$Estado','$Descripcion')");
				if ($query_insert) {
					echo "<script> alert('El Rol se ha registrado exitosamente');window.location= 'GestionRoles.php' </script>";
				}
			} else {
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
} else {
	//actualiza los permisos
	updatePermisos($_SESSION['rol']);

	//si no tiene permiso de visualización redirige al index
	if ($_SESSION['permisos'][M_GESTION_ROLES]['w'] == 0 or !isset($_SESSION['permisos'][M_GESTION_ROLES]['w'])) {
		header("Location: ../index.php");
		die();
	}
}
?>
<?php include 'barralateralinicial.php'; ?>
<p></p>
<section style=" background-color:rgb(255, 255, 255);  padding: 15px;  color:black;  font-size: 12px; ">
<title>Gestion Roles</title>

<a class="btn btn-primary" href="GestionRoles.php "> <i class="fa fa-arrow-circle-left"></i>  Volver Atrás</a>
<hr>
<div clas="row ">

	<div class="box-header with-border">

		<div class="box-body">

			<form action="" method="post">
				<center>
					<h2><strong> Roles</strong></h2>
				</center>
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
											<input type="text" class="form-control" name="Rol" maxlength="20" id="Rol" placeholder="Nombre completo" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return blockSpecialCharacters(event)" required>

										</div>

									</td>

									<td style="width: 50%">

										<div class="input-group">

											<span class="input-group-addon"><i class="fa fa-check"></i></span>
											<select class="form-control" name="Estado" required>
												<option value="">Seleccione Una Opción</option>
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
											<input type="text" class="form-control" name="Descripcion" maxlength="50" id="Descripcion" placeholder="Descripción" required size=50>
				
										</div>

									</td>

								</tr>

							</tbody>
						</table>

					</div>

				</div>
				<hr>
				<center><input type="submit" value="Registrar Roles" class="btn btn-primary"></center>
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

<script>
	function blockSpecialCharacters(e) {
		let key = e.key;
		let keyCharCode = key.charCodeAt(0);

		// A-Z
		if (keyCharCode >= 65 && keyCharCode <= 90) {
			return key;
		}
		// a-z
		if (keyCharCode >= 97 && keyCharCode <= 122) {
			return key;
		}

		return false;
	}

	$('#theInput').keypress(function(e) {
		blockSpecialCharacters(e);
	});
</script>
<?php include 'barralateralfinal.php'; ?>