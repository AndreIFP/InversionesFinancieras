<!-- -----------------------------------------------------------------------
	    Universidad Nacional Autonoma de Honduras (UNAH)
		           Facultad de Ciencias Economicas
	        Departamento de Informatica administrativa
        Analisis, Programacion y Evaluacion de Sistemas
                    Primer Periodo 2022


Equipo:
Allan Mauricio Hernández ...... (mauricio.galindo@unah.hn)
Andrés Isaías Flores .......... (aifloresp@unah.hn)
Esperanza Lisseth Cartagena ... (esperanza.cartagena@unah.hn)
Fanny Merari Ventura .......... (fmventura@unah.hn
José David García ............. (jdgarciad@unah.hn)
José Luis Martínez ............ (jlmartinezo@unah.hn)
Luis Steven Vásquez ........... (Lsvasquez@unah.hn)
Sara Raquel Ortiz ............. (Sortizm@unah.hn)

Catedratico:
LIC. CLAUDIA REGINA NUÑEZ GALINDO
Lic. GIANCARLO MARTINI SCALICI AGUILAR
Lic. KARLA MELISA GARCIA PINEDA 

----------------------------------------------------------------------

Programa:          Actualizar_Preguntas
Fecha:             16-jul-2022
Programador:       Luis
descripcion:       Pantalla 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Luis	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Esperanza		 01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Fanny 	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Andrés		     01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php
include("../conexion.php");

if (!empty($_POST)) {
	$alert = '';
	if (empty($_POST['Preguntas'])) {
		$alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
	} else {
		$Id_Preguntas   = $_POST['Id_Preguntas'];
		$nombre       = $_POST['Preguntas'];
		if (!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú ¿?]+$/", $nombre)) {
			$alert = '<p class="msg_error">Solo Letras.</p>';
		} else {

			$query = mysqli_query($conn, "UPDATE tbl_preguntas SET Preguntas='$nombre' WHERE Id_Preguntas ='$Id_Preguntas'");

			if ($query) {
				echo "<script> alert('Pregunta Actualizado Exitosamente');window.location= 'Gestion_Preguntas.php' </script>";
			} else {
				$alert = '<p class="msg_error">Error al actualizar la pregunta.</p>';
			}
		}
	}
}

//Mostrar Datos
if (empty($_REQUEST['Id'])) {
	header('Location: Gestion_Preguntas.php');
}
$Id = $_REQUEST['Id'];

$sql = mysqli_query($conn, "SELECT *	FROM tbl_preguntas WHERE Id_Preguntas = $Id");
$result_sql = mysqli_num_rows($sql);

if ($result_sql == 0) {
	header('Location: Gestion_Preguntas.php');
} else {
	while ($data = mysqli_fetch_array($sql)) {
		# code...
		$Id_Preguntas   = $data['Id_Preguntas'];
		$Nombre       = $data['Preguntas'];
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
	if ($_SESSION['permisos'][M_GESTION_PREGUNTAS]['u'] == 0 or !isset($_SESSION['permisos'][M_GESTION_PREGUNTAS]['u'])) {
		header("Location: ../index.php");
		die();
	}
}
?>

<?php include 'barralateralinicial.php'; ?>

<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 12px; ">

	<title>Gestion Preguntas</title>

	<h6><a class="btn btn-primary" href="Gestion_Preguntas.php"><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a></h6>

	<hr>
	<div clas="row ">

		<div class="box-header with-border">

			<div class="box-body">

				<form class="" method="post">
					<center>
						<h2><strong> Actualizar Pregunta </strong></h2>
					</center>
					<hr>
					<div class="row">
						<input type="hidden" name="Id_Preguntas" value="<?php echo $Id_Preguntas  ?>">

						<div class="col-xs-14 pull-right">

							<table class="table">
								<thead class="table-primary">
									<tr>

										<th>
											<center>Pregunta</center>
										</th>

									</tr>
								</thead>

								<tbody>

									<tr>

										<td style="width: 100%">

											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-check"></i></span>
												<input type="text" class="form-control" name="Preguntas" maxlength="60" id="Preguntas" placeholder="Pregunta" value="<?php echo $Nombre ?>" size="40">
		
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