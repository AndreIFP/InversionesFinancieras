<?php
include("../conexion.php");

if (!empty($_POST)) {
	$alert = '';

	$CODIGO_CUENTA  = $_POST['CODIGO_CUENTA'];
	$CUENTA         = $_POST['CUENTA'];
	$CLASIFICACION  = $_POST['CLASIFICACION'];
	$ESTADO_CUENTA  = $_POST['Estado_Cuenta'];

	$query = mysqli_query($conn, "UPDATE TBL_CATALAGO_CUENTAS SET CODIGO_CUENTA='$CODIGO_CUENTA', CUENTA ='$CUENTA', CLASIFICACION ='$CLASIFICACION', Estado_Cuenta ='$ESTADO_CUENTA' WHERE CODIGO_CUENTA ='$CODIGO_CUENTA'");

	if ($query) {
		echo "<script> alert('Cuenta Actualizada Exitosamente');window.location= 'Gestion_CatalogoCuenta.php' </script>";
	} else {
		$alert = '<p class="msg_error">Error al actualizar el Catalogo Cuenta.</p>';
	}
}

//Mostrar Datos
if (empty($_REQUEST['Id'])) {
	header('Location: Gestion_CatalogoCuenta.php');
}
$Id = $_REQUEST['Id'];

$sql = mysqli_query($conn, "SELECT *	FROM TBL_CATALAGO_CUENTAS WHERE CODIGO_CUENTA = $Id");
$result_sql = mysqli_num_rows($sql);

if ($result_sql == 0) {
	header('Location: Gestion_CatalogoCuenta.php');
} else {
	while ($data = mysqli_fetch_array($sql)) {
		# code...
		$CODIGO_CUENTA  = $data['CODIGO_CUENTA'];
		$CUENTA         = $data['CUENTA'];
		$CLASIFICACION  = $data['CLASIFICACION'];
		$ESTADO_CUENTA  = $data['Estado_Cuenta'];
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
	if ($_SESSION['permisos'][M_GESTION_CLIENTE]['u'] == 0 or !isset($_SESSION['permisos'][M_GESTION_CLIENTE]['u'])) {
		header("Location: ../index.php");
		die();
	}
}
?>

<?php include 'barralateralinicial.php'; ?>

<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 12px; ">

	<title>Actualizar Cuentas</title>
	<a class="btn btn-primary" href="Gestion_CatalogoCuenta.php"><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
	<hr>
	<div clas="row ">

		<div class="box-header with-border">

			<div class="box-body">

				<form class="" method="post">
					<center>
						<h2><strong>Actualización de Cuentas</strong></h2>
					</center>
					<hr>

					<div class="row">

						<div class="col-xs-14 pull-right">

							<table class="table">
								<input type="hidden" name="CODIGO_CUENTA" value="<?php echo $CODIGO_CUENTA  ?>">
								<thead class="table-primary">
									<tr>

										<th>
											<center>Código de cuenta</center>
										</th>


										<th>
											<center>Nombre de Cuenta</center>
										</th>

									</tr>
								</thead>

								<tbody>

									<tr>

										<td style="width: 50%">

											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-key"></i></span>
												<input type="text" class="form-control" name="CODIGO_CUENTA" value="<?php echo $CODIGO_CUENTA  ?>" disabled="true" readonly>

											</div>

										</td>

										<td style="width: 50%">

											<div class="input-group">

												<span class="input-group-addon"><i class="fa fa-book"></i></span>
												<input type="text" class="form-control" name="CUENTA" maxlength="50" id="CUENTA" value="<?php echo $CUENTA ?>" size="50" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return validar(event)" required>

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
											<center>Clasificación</center>
										</th>


										<th>
											<center>Estado de la Cuenta</center>
										</th>

									</tr>
								</thead>

								<tbody>

									<tr>

										<td style="width: 50%">

											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-tags"></i></span>
												<select class="form-control notItemOne" name="CLASIFICACION">
													<option value="<?php echo $CLASIFICACION ?>"><?php echo $CLASIFICACION ?></option>
													<option value="ACTIVO CORRIENTE">ACTIVO CORRIENTE</option>
													<option value="ACTIVO NO CORRIENTE">ACTIVO NO CORRIENTE</option>
													<option value="PASIVO CORRIENTE">PASIVO CORRIENTE</option>
													<option value="PASIVO NO CORRIENTE">PASIVO NO CORRIENTE</option>
													<option value="PATRIMONIO">PATRIMONIO</option>
												</select>
											</div>

										</td>

										<td style="width: 50%">

											<div class="input-group">

												<span class="input-group-addon"><i class="fa fa-check"></i></span>
												<select class="form-control notItemOne" name="Estado_Cuenta" required>
													<option value="<?php echo $ESTADO_CUENTA ?>"><?php echo $ESTADO_CUENTA ?></option>
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


					<hr>
					<center><button type="submit" class="btn btn-primary btn-lg"> <i class="fa fa-eraser" aria-hidden="true"></i> Actualizar </button></center>
				</form>
			</div>
		</div>
	</div>
</section>
</div>

<style type="text/css">
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