<?php

include("../conexion.php");

if (!empty($_POST)) {
	$alert = '';
	if (empty($_POST['CLASIFICACION']) || empty($_POST['TIPO_CUENTA'])) {
		$alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
	} else {

		$CLASIFICACION          = $_POST['CLASIFICACION'];
		$TIPO_CUENTA    = $_POST['TIPO_CUENTA'];

		if (!!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/", $CUENTA)) {
			$alert = '<p class="msg_error">La Cuenta Solo Recibe Letas.</p>';
		} elseif (!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/", $CLASIFICACION)) {
			$alert = '<p class="msg_error"> La Clasificación de La Cuenta Solo Recibe Letras.</p>';
		} elseif (!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/", $TIPO_CUENTA)) {
			$alert = '<p class="msg_error"> El Tipo de Cuenta Solo Recibe Letras.</p>';
		} else {
			$query_insert = mysqli_query($conn, "INSERT INTO TBL_CATALAGO_CUENTAS (CLASIFICACION,TIPO_CUENTA)
																	VALUES('$CLASIFICACION','$TIPO_CUENTA')");
			if ($query_insert) {
				echo "<script> alert('Cuenta Registrado Exitosamente');window.location= 'Gestion_CatalogoCuenta.php' </script>";
			} else {
				$alert = '<p class="msg_error">Error al registrar la Cuenta.</p>';
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
	if ($_SESSION['permisos'][M_GESTION_CAT_CUENTA]['w'] == 0 or !isset($_SESSION['permisos'][M_GESTION_CAT_CUENTA]['w'])) {
		header("Location: ../index.php");
		die();
	}
}
?>



<?php include 'barralateralinicial.php'; ?>
</div>

<title>Gestion Catalogo Cuentas</title>
<div class="col-md-12">
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="col-md-12">
				<script>
					function validar(e) {
						tecla = (document.all) ? e.keyCode : e.which;
						if (tecla == 8) return true; //Tecla de retroceso (para poder borrar)
						// dejar la línea de patron que se necesite y borrar el resto
						patron = /[A-Za-z\s]/; // Solo acepta letras y espacios
						//patron = /\d/; // Solo acepta números
						//patron = /\w/; // Acepta números y letras
						//patron = /\D/; // No acepta números
						//
						te = String.fromCharCode(tecla);
						return patron.test(te);
					}
				</script>
				<div class="form_register">
					<h6><a class="btn btn-primary " href="Gestion_CatalogoCuenta.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a></h6>
					<form action="agregarcuenta.php" method="post">

						<center><h2><strong>Registro de Cuenta</strong> </h2></center>
						<hr>
						<div class="form-group">

							<div class="input-group">

								<span class="input-group-addon"><i class="fa fa-book"></i></span>
								<input type="text" class="form-control" name="CLASIFICACION" maxlength="50" id="CLASIFICACION" placeholder="Nombre de la Cuenta" size="35" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return validar(event)" required>

							</div>

						</div>

						<div class="form-group">

							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-tags "></i></span>
								<select class="form-control" name="TIPO CUENTA" required>
									<option value="">Seleccione el tipo de cuenta</option>
									<option value="ACTIVO CORRIENTE">ACTIVO CORRIENTE</option>
									<option value="ACTIVO NO CORRIENTE">ACTIVO NO CORRIENTE</option>
									<option value="PASIVO CORRIENTE">PASIVO CORRIENTE</option>
									<option value="PASIVO NO CORRIENTE">PASIVO NO CORRIENTE</option>
									<option value="PATRIMONIO">PATRIMONIO</option>
								</select>
								
							</div>
						</div>

						<center><input type="submit" value="Registrar Cuenta" class="btn btn-primary"></center>

					</form>

				</div>


				</section>
				</body>
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