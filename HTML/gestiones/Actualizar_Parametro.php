<?php
include("../conexion.php");
session_start();

if (!empty($_POST)) {
	if (empty($_POST['Parametro']) || empty($_POST['Valor'])) {
		$alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
	} else {
		$Id_Parametro = $_POST['Id_Parametro'];
		$nombre       = $_POST['Parametro'];
		$Valor        = $_POST['Valor'];
		$query = mysqli_query($conn, "UPDATE tbl_parametros SET Parametro='$nombre',Valor='$Valor' WHERE Id_Parametro ='$Id_Parametro'");

		if ($query) {
			echo "<script> alert('Parametro Actualizado Exitosamente');window.location= 'Gestion_parametros.php' </script>";
		} else {
			$alert = '<p class="msg_error">Error al actualizar el parametro.</p>';
		}
	}
}

//Mostrar Datos
if (empty($_REQUEST['Id'])) {
	header('Location: Gestion_parametros.php');
}
$Id = $_REQUEST['Id'];

$sql = mysqli_query($conn, "SELECT *	FROM tbl_parametros WHERE Id_Parametro = $Id");
$result_sql = mysqli_num_rows($sql);

if ($result_sql == 0) {
	header('Location: Gestion_parametros.php');
} else {
	while ($data = mysqli_fetch_array($sql)) {
		# code...
		$Id_Parametro = $data['Id_Parametro'];
		$Nombre       = $data['Parametro'];
		$Valor        = $data['Valor'];
	}
}

?>

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
						<h2><strong>Actualizar Parametro</strong></h2>
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
												<input type="text" Class="form-control" name="Parametro" readonly="true" placeholder="Nombre Parametro" value="<?php echo $Nombre ?>" maxlength="20" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required size="30" readonly>

											</div>

										</td>

										<td style="width: 50%">

											<div class="input-group">

												<span class="input-group-addon"><i class="fa fa-key"></i></span>
												<input type="text" class="form-control" name="Valor" maxlength="40" id="Valor" placeholder="Valor Parametro" value="<?php echo $Valor ?>" size="40">

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