<?php

include("../conexion.php");

if (!empty($_POST)) {
	$alert = '';
	if (empty($_POST['Parametro']) || empty($_POST['Valor'])) {
		$alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
	} else {
		$nombre = $_POST['Parametro'];
		$Valor  = $_POST['Valor'];
		if (!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/", $nombre)) {
			$alert = '<p class="msg_error"> El Nombre Del Parametro Solo Recibe Letras.</p>';
		} else {
			$queryparam = mysqli_query($conn, "SELECT * FROM tbl_parametros WHERE Parametro = '$nombre'");
			$nr 			= mysqli_num_rows($queryparam);
			if ($nr == 0) {
				$query_insert = mysqli_query($conn, "INSERT INTO tbl_parametros (Parametro,Valor)
																	VALUES('$nombre','$Valor')");
				if ($query_insert) {
					echo "<script> alert('Parámetro Registrado Exitosamente');window.location= 'Gestion_parametros.php' </script>";
				}
			} else {
				echo "<script> alert('No se puede registrar este parámetro, ya que este existe');window.location= 'Gestion_parametros.php' </script>";
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
	if ($_SESSION['permisos'][M_GESTION_PARAMETROS]['w'] == 0 or !isset($_SESSION['permisos'][M_GESTION_PARAMETROS]['w'])) {
		header("Location: ../index.php");
		die();
	}
}
?>

<title>Gestion Parametro</title>

<?php include 'barralateralinicial.php'; ?>

<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px;  color:black; font-size: 12px; ">

	<a class="btn btn-primary" href="Gestion_parametros.php"><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
	<hr>
	<div clas="row ">

		<div class="box-header with-border">

			<div class="box-body">

				<form class="" method="post">
					<center>
						<h2><strong>Registro Parametro</strong></h2>
					</center>
					<hr>

					<div class="row">

						<div class="col-xs-14 pull-right">

							<table class="table">
								<input type="hidden" name="Id_Parametro" value="<?php echo $Id_Parametro  ?>">
								<thead class="table-primary">
									<tr>

										<th>
											<center>Nombre del parametro</center>
										</th>


										<th>
											<center>Valor</center>
										</th>

									</tr>
								</thead>

								<tbody>

									<tr>

										<td style="width: 50%">

											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-lock"></i></span>
												<input type="text" class="form-control" name="Parametro" maxlength="30" id="Parametro" placeholder="Nombre Parametro" size="40">

											</div>

										</td>

										<td style="width: 50%">

											<div class="input-group">

												<span class="input-group-addon"><i class="fa fa-key"></i></span>
												<input type="text" class="form-control" name="Valor" maxlength="40" id="Valor" placeholder="Valor" size="40">

											</div>

										</td>

									</tr>

								</tbody>
							</table>

						</div>

					</div>

					<hr>
					<center><button type="submit" class="btn btn-primary btn-lg"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar </button></center>
				</form>
			</div>
		</div>
	</div>
</section>
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
<?php include 'barralateralfinal.php'; ?>