<?php

include("../conexion.php");


if (!empty($_POST)) {
	    $alert = '';
	    session_start();
	    $user              = $_SESSION['user'];
		$consultas=mysqli_query($conn,"SELECT Id_Usuario FROM TBL_USUARIO where Usuario='$user' ;");
		while($row=mysqli_fetch_array($consultas)){
		   $iduser=$row['Id_Usuario'];
		}

		$CODIGO_CUENTA     = $_POST['CODIGO_CUENTA'];
		$CUENTA            = $_POST['CUENTA'];
		$CLASIFICACION     = $_POST['CLASIFICACION'];
		$ESTADO_CUENTA     = $_POST['Estado_Cuenta'];

		$querycodigo 	= mysqli_query($conn, "SELECT * FROM TBL_CATALAGO_CUENTAS WHERE CODIGO_CUENTA = '$CODIGO_CUENTA'");
		$nr = mysqli_num_rows($querycodigo);

		$querynombre 	= mysqli_query($conn, "SELECT * FROM TBL_CATALAGO_CUENTAS WHERE CUENTA = '$CUENTA'");
		$nr1 = mysqli_num_rows($querynombre);
		if($nr == 0 AND $nr1 == 0){
			$query_insert = mysqli_query($conn, "INSERT INTO TBL_CATALAGO_CUENTAS (CODIGO_CUENTA,Id_Usuario,CUENTA,CLASIFICACION,Estado_Cuenta)
																	VALUES('$CODIGO_CUENTA','$iduser','$CUENTA','$CLASIFICACION','$ESTADO_CUENTA')");
			if ($query_insert) {
				echo "<script> alert('Cuenta Registrado Exitosamente');window.location= 'Gestion_CatalogoCuenta.php' </script>";
			}
		} else {
			echo "<script> alert('No se puede registrar este número de cuenta o nombre de la cuenta, ya que este existe');window.location= 'Nuevo_Catalogo.php' </script>";
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
				<script>
					function validarn(n) {
						tecla = (document.all) ? n.keyCode : n.which;
						if (tecla == 8) return true; //Tecla de retroceso (para poder borrar)
						// dejar la línea de patron que se necesite y borrar el resto
						//patron = /[A-Za-z\s]/; // Solo acepta letras y espacios
						patron = /\d/; // Solo acepta números
						//patron = /\w/; // Acepta números y letras
						//patron = /\D/; // No acepta números
						//
						te = String.fromCharCode(tecla);
						return patron.test(te);
					}
				</script>
				<div class="form_register">
					<h6><a class="btn btn-primary " href="Gestion_CatalogoCuenta.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a></h6>
					<form action="" method="post">

						<center><h2><strong>Registro de Cuenta</strong> </h2></center>
						<hr>
						<div class="form-group">
						   <label for="CODIGO_CUENTA">Codigo De Cuenta</label>

							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-book"></i></span>
								<input type="text" class="form-control" name="CODIGO_CUENTA" minlength="2" maxlength="50" id="CODIGO_CUENTA" placeholder="Codigo de la cuenta" size="35" onkeypress="return validarn(event)" required>

							</div>

						</div>

						<div class="form-group">
						   <label for="CUENTA">Nombre De La Cuenta</label>

							<div class="input-group">

								<span class="input-group-addon"><i class="fa fa-book"></i></span>
								<input type="text" class="form-control" name="CUENTA" maxlength="50" id="CUENTA" placeholder="Nombre de la Cuenta" size="35" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return validar(event)" required>

							</div>

						</div>

						<div class="form-group">
						    <label for="CLASIFICACION">Clasificación</label>

							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-tags "></i></span>
								<select class="form-control" name="CLASIFICACION" required>
									<option value="">Seleccione el tipo de cuenta</option>
									<option value="ACTIVO CORRIENTE">ACTIVO CORRIENTE</option>
									<option value="ACTIVO NO CORRIENTE">ACTIVO NO CORRIENTE</option>
									<option value="PASIVO CORRIENTE">PASIVO CORRIENTE</option>
									<option value="PASIVO NO CORRIENTE">PASIVO NO CORRIENTE</option>
									<option value="PATRIMONIO">PATRIMONIO</option>
								</select>
								
							</div>
						</div>

						<div class="form-group">
							<label for="Estado_Cuenta">Estado Cuenta</label>

							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-tags "></i></span>
								<select class="form-control" name="Estado_Cuenta" required>
									<option value="">Seleccione el estado de la cuenta</option>
									<option value="ACTIVO">ACTIVO</option>
									<option value="INACTIVO">INACTIVO</option>
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