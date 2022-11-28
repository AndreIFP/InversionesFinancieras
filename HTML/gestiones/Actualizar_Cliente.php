<?php
include("../conexion.php");

if (!empty($_POST)) {
	$alert = '';
	if (empty($_POST['Nombre_Empresa']) || empty($_POST['Nombre_Cliente']) || empty($_POST['RTN_Cliente']) || empty($_POST['Direccion']) || empty($_POST['Telefono']) || empty($_POST['Tipo_Cliente']) || empty($_POST['Ciudad'])) {
		$alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
	} else {
		$Id_Cliente   = $_POST['Id_Cliente'];
		$nombree      = $_POST['Nombre_Empresa'];
		$nombre       = $_POST['Nombre_Cliente'];
		$RTN          = $_POST['RTN_Cliente'];
		$Direccion    = $_POST['Direccion'];
		$Telefono     = $_POST['Telefono'];
		$Tipo_Cliente = $_POST['Tipo_Cliente'];
		$Ciudad       = $_POST['Ciudad'];
		if (!is_numeric($RTN) || !is_numeric($Telefono)) {
			$alert = '<p class="msg_error">Error al actualizar el cliente, Solo Números en RTN o Teléfono.</p>';
		} elseif (!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/", $nombree)) {
			$alert = '<p class="msg_error"> El Nombre Solo Recibe Letras.</p>';
		} elseif (!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/", $nombre)) {
			$alert = '<p class="msg_error"> El Nombre Solo Recibe Letras.</p>';
		} elseif (!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/", $Direccion)) {
			$alert = '<p class="msg_error">La dirección solo recibe letras.</p>';
		} elseif (!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/", $Tipo_Cliente)) {
			$alert = '<p class="msg_error">El tipo cliente solo recibe letras.</p>';
		} elseif (!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/", $Ciudad)) {
			$alert = '<p class="msg_error">Solo recibe letras.</p>';
		} else {
			$query = mysqli_query($conn, "UPDATE TBL_CLIENTES SET Nombre_Empresa='$nombree',Nombre_Cliente='$nombre',RTN_Cliente ='$RTN',Direccion ='$Direccion',Telefono ='$Telefono',Tipo_Cliente ='$Tipo_Cliente' ,Ciudad ='$Ciudad' WHERE Id_Cliente ='$Id_Cliente'");

			if ($query) {
				echo "<script> alert('Cliente Actualizado Exitosamente');window.location= 'Gestion_Clientes.php' </script>";
			} else {
				$alert = '<p class="msg_error">Error al actualizar el cliente.</p>';
			}
		}
	}
}

//Mostrar Datos
if (empty($_REQUEST['Id'])) {
	header('Location: Gestion_Clientes.php');
}
$Id = $_REQUEST['Id'];

$sql = mysqli_query($conn, "SELECT *	FROM TBL_CLIENTES WHERE Id_Cliente = $Id");
$result_sql = mysqli_num_rows($sql);

if ($result_sql == 0) {
	header('Location: Gestion_Clientes.php');
} else {
	while ($data = mysqli_fetch_array($sql)) {
		# code...
		$Id_Cliente   = $data['Id_Cliente'];
		$Nombree      = $data['Nombre_Empresa'];
		$Nombre       = $data['Nombre_Cliente'];
		$RTN_Cliente  = $data['RTN_Cliente'];
		$Direccion    = $data['Direccion'];
		$Telefono     = $data['Telefono'];
		$Tipo_Cliente = $data['Tipo_Cliente'];
		$Ciudad       = $data['Ciudad'];
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
<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 12px; ">

	<script>
		function validar(e) {
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla == 8) return true; //Tecla de retroceso (para poder borrar)
			// dejar la línea de patron que se necesite y borrar el resto
			patron = /[A-Za-z\s]/; // Solo acepta letras y espacios

			te = String.fromCharCode(tecla);
			return patron.test(te);
		}
	</script>

	<title>Actualizar Cliente</title>

	<a class="btn btn-primary" href="Gestion_Clientes.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>

	<hr>

	<div clas="row ">

		<div class="box-header with-border">

			<div class="box-body">

				<form action="" method="post">

					<center>
						<h2><strong> Actualizar Cliente</strong></h2>
					</center>
					<hr>
					<div class="row">

						<div class="col-xs-14 pull-right">

							<table class="table">
								<thead class="table-primary">

									<tr>

										<th>
											<center>Nombre de la empresa </center>
										</th>


										<th>
											<center>Representante Legal</center>
										</th>




									</tr>
								</thead>

								<tbody>

									<tr>

								

										<td style="width: 70%">

											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-building"></i></span>
												<input type="text" class="form-control" name="Nombre_Empresa" maxlength="35" id="Nombre_Empresa" placeholder="Nombre completo" value="<?php echo $Nombree ?>" size="40" onkeyup="javascript:this.value=this.value.toUpperCase();" required>

											</div>

										</td>

										<td style="width: 30%">

											<div class="input-group">

												<span class="input-group-addon"><i class="fa fa-user"></i></span>
												<input type="text" class="form-control" name="Nombre_Cliente" maxlength="35" id="Nombre_Cliente" placeholder="Nombre completo" value="<?php echo $Nombre ?>" size="40" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return validar(event)" required>


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
											<center>RTN / DNI</center>
										</th>

										<th>
											<center>Teléfono </center>
										</th>


										<th>
											<center>Estado</center>
										</th>




									</tr>
								</thead>

								<tbody>

									<tr>

										<td style="width: 40%">

											<div class="input-group">

												<span class="input-group-addon"><i class="fa fa-lock"></i></span>
												<input type="text" class="form-control" name="RTN_Cliente" maxlength="20" id="RTN_Cliente" placeholder="RTN" value="<?php echo $RTN_Cliente ?>" size="40" oninput="this.value = this.value.replace(/[^0-9]/,'')" onkeyup="javascript:this.value=this.value.toUpperCase();" required>

											</div>

										</td>

										<td style="width: 35%">

											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-phone"></i></span>
												<input type="tex" class="form-control" name="Telefono" maxlength="10" id="Telefono" placeholder="Teléfono" value="<?php echo $Telefono ?>" size="40">

											</div>

										</td>

										<td style="width: 25%">

											<div class="input-group">

												<span class="input-group-addon"><i class="fa fa-check"></i></span>
												<select name="Tipo_Cliente" class="form-control" required>
													<option value="<?php echo $Tipo_Cliente ?>"><?php echo $Tipo_Cliente ?></option>
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
											<center>Ciudad</center>
										</th>


										<th>
											<center>Dirección</center>
										</th>



									</tr>
								</thead>

								<tbody>

									<tr>

										<td style="width: 30%">

											<div class="input-group">

												<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
												<input type="text" class="form-control" name="Ciudad" maxlength="25" id="Ciudad" placeholder="Ciudad" value="<?php echo $Ciudad ?>" size="40" onkeyup="javascript:this.value=this.value.toUpperCase();" required>

											</div>

										</td>

										<td style="width: 70%">

											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
												<input type="Direccion" class="form-control" name="Direccion" maxlength="60" id="Direccion" placeholder="Dirección" value="<?php echo $Direccion ?>" size="40" onkeyup="javascript:this.value=this.value.toUpperCase();" required>

											</div>

										</td>


									</tr>

								</tbody>
							</table>

						</div>

					</div>
					<hr>
					<center><button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-eraser" aria-hidden="true"></i> Actualizar Cliente</a></button></center>
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