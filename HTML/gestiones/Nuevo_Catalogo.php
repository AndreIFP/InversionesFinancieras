<?php

include("../conexion.php");


if (!empty($_POST)) {
	$alert = '';
	session_start();
	$user              = $_SESSION['user'];
	$consultas = mysqli_query($conn, "SELECT Id_Usuario FROM TBL_USUARIO where Usuario='$user' ;");
	while ($row = mysqli_fetch_array($consultas)) {
		$iduser = $row['Id_Usuario'];
	}

	$CODIGO_CUENTA     = $_POST['cbx_localidad'];
	$CUENTA            = $_POST['CUENTA'];
	$MAYOR            = $_POST['cbx_casa'];
	$MOVIMIENTO        = $_POST['Movimiento'];
	//$CLASIFICACION     = $_POST['CLASIFICACION'];
	$ESTADO_CUENTA     = $_POST['Estado_Cuenta'];

	if(empty($MOVIMIENTO)){
		$MOVIMIENTO = "NULL";
	}

	$querycodigo 	= mysqli_query($conn, "SELECT * FROM TBL_CATALAGO_CUENTAS WHERE CODIGO_CUENTA = '$CODIGO_CUENTA'");
	$nr = mysqli_num_rows($querycodigo);

	$querynombre 	= mysqli_query($conn, "SELECT * FROM TBL_CATALAGO_CUENTAS WHERE CUENTA = '$CUENTA'");
	$nr1 = mysqli_num_rows($querynombre);
	if ($nr == 0 and $nr1 == 0) {
		$query_insert = mysqli_query($conn, "INSERT INTO TBL_CATALAGO_CUENTAS (CODIGO_CUENTA,Id_Usuario,CUENTA,Mayor,Movimiento,Estado_Cuenta)
																	VALUES('$CODIGO_CUENTA','$iduser','$CUENTA','$MAYOR','$MOVIMIENTO','$ESTADO_CUENTA')");
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

<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 12px; ">

	<title>Registrar Cuentas</title>

	<!-- script CUENTA -->
<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
		
		<script language="javascript">
					$(document).ready(function(){
						$("#cbx_estado").change(function () {
		
							$('#cbx_casa').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
							$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
				  
							$("#cbx_estado option:selected").each(function () {
								id_estado = $(this).val();
								$.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
									$("#cbx_municipio").html(data);
								});            
							});
						})
					});
		
			  $(document).ready(function(){
						$("#cbx_municipio").change(function () {
		
				  
		
							$("#cbx_municipio option:selected").each(function () {
								id_municipio = $(this).val();
								$.post("includes/getCasa.php", { id_municipio: id_municipio }, function(data){
									$("#cbx_casa").html(data);
								});            
							});
						})
					});
		
			  $(document).ready(function(){
						$("#cbx_casa").change(function () {
							$("#cbx_casa option:selected").each(function () {
								id_casa = $(this).val();
								$.post("includes/getLocalidad.php", { id_casa: id_casa}, function(data){
									$("#cbx_localidad").html(data);
								});            
							});
						})
					});
		
				</script>


	<a class="btn btn-primary" href="Gestion_CatalogoCuenta.php"><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
	<hr>
	<div clas="row ">
	<form class="" method="post">
					<center>
						<h2><strong>Registro de Cuentas</strong></h2>
					</center>
		<div class="box-header with-border">

		<input id="busqueda" type="checkbox"  style="width:2%; height:20px ;"  >Principal
        <input id="bup" type="checkbox"  style="width:2%; height:20px ;" >Sub-cuenta 1
		<input id="bul" type="checkbox"  style="width:2%; height:20px ;" >Sub-cuenta 2

      
			<div class="box-body">
				
				<div class="row">
	<table class="table">
		<thead class="table-primary">
			<tr>

				<th>
					<center>Cuenta Principal</center>
				</th>


				<th>
					<center>Sub-cuenta 1</center>
				</th>

			</tr>
		</thead>

		<tbody>

			<tr >

				<td style="width:50%;" >

					<div >
				

						<!-- ENTRADA PARA LA CUENTA -->
							<div class="form-group">


                      <!-- ENTRADA PARA LA CUENTA -->
                      <form id="combo" name="combo" action="guarda.php" method="POST">
					  <div class="input-group">
					  <span class="input-group-addon"><i class="fa fa-check"></i></span>
					 <select  class=" form-control"  name="cbx_estado" id="cbx_estado" > 
					    <option value="">Seleccione el estado de la cuenta</option>
						<option value="110_">Activo</option>
						<option value="210_">Pasivo</option>
						<option value="310_">Capital y Patrimonio</option>
						<option value="410_">Ingresos</option>
						<option value="510_">Costos</option>
						<option value="610_">Gastos</option>
			         </select> </span></div></form>
			
			<br />
				</td>

				<td style="width: 50%">

					<div class="input-group">

					<div class="input-group">
				
				<span  class="input-group-addon"><i class="fa fa-check"></i></span>
				<select  class=" elegir  form-control" name="cbx_municipio" id="cbx_municipio" ></select></div>
				</div>
	
		  <br />
					</div>

				</td>

			</tr>

		</tbody>
	</table>

</div>

</div>


				
				<div class="row">
	<table class="table">
		<thead class="table-primary">
			<tr>

				<th>
					<center>Sub-cuenta 2</center>
				</th>


				<th>
					<center>Codigo de Cuenta</center>
				</th>

			</tr>
		</thead>

		<tbody>

			<tr>

				<td style="width:50%;" >

				<div class="input-group">

                <div class="input-group">
				
					<span  class="input-group-addon"><i class="fa fa-check"></i></span>
		   <select class=" elegir elegirl form-control" name="cbx_casa" id="cbx_casa" ></select></div>
			</div>
			
			<br />
				</td>

				<td style="width: 50%">

					<div class="input-group">

					<div class="input-group">
				
			 <span  class="input-group-addon"><i class="fa fa-check"></i></span>
			 <select class="form-control" name="cbx_localidad" id="cbx_localidad"></select></div>
				</div>
	
		  <br />
					</div>

				</td>

			</tr>

		</tbody>
	</table>

</div>



				
			

					<div class="row">

						<div class="col-xs-14 pull-right">

							<table class="table">
								<thead class="table-primary">
									<tr>

										<th>
											<center>Nombre De La Cuenta</center>
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
											    <span class="input-group-addon"><i class="fa fa-book"></i></span>
												<input type="text" class="form-control" name="CUENTA" maxlength="50" id="CUENTA" placeholder="Nombre de la Cuenta" size="35" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return validar(event)" required>

											</div>

										</td>

										<td style="width: 50%">

											<div class="input-group">

											    <span class="input-group-addon"><i class="fa fa-check"></i></span>
												<select class="form-control" name="Estado_Cuenta" required>
													<option value="">Seleccione el estado de la cuenta</option>
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
											<center>Tipo De Movimiento De La Cuenta</center>
										</th>

									</tr>
								</thead>

								<tbody>

									<tr>

										<td style="width: 50%">

											<div class="input-group">

											    <span class="input-group-addon"><i class="fa fa-check"></i></span>
												<select class="form-control" name="Movimiento">
													<option value="">Seleccione el tipo de movimiento de la cuenta</option>
													<option value="Acreedor">ACREEDOR</option>
													<option value="deudor">DEUDOR</option>
												</select>

											</div>

										</td>

									</tr>

								</tbody>
							</table>

						</div>

					</div>

					


					<hr>
					<center><button type="submit" class="btn btn-primary"> <i class="fa fa-check" aria-hidden="true"></i> Registrar Cuenta</button></center>
				</form>
			</div>
		</div>
	</div>
</section>
</div>

<script>
      let elegir = document.querySelectorAll('.elegir');
      let busqueda = document.getElementById('busqueda');
      
      document.addEventListener("DOMContentLoaded", () => {
        elegir.forEach(elemento => elemento.disabled = false);
        
        busqueda.addEventListener('click', () => {
          if (busqueda.checked) {
            elegir.forEach(elemento => elemento.disabled = true);
          } else {
            elegir.forEach(elemento => elemento.disabled = false);
          }
        });
      });
    </script>
	<script>
      let elegirl = document.querySelectorAll('.elegirl');
      let bup = document.getElementById('bup');
      
      document.addEventListener("DOMContentLoaded", () => {
        elegirl.forEach(elemento => elemento.disabled = false);
        
        bup.addEventListener('click', () => {
          if (bup.checked) {
            elegirl.forEach(elemento => elemento.disabled = true);
          } else {
            elegirl.forEach(elemento => elemento.disabled = false);
          }
        });
      });
    </script>

<script>
      let eli = document.querySelectorAll('.eli');
      let bul = document.getElementById('bul');
      
      document.addEventListener("DOMContentLoaded", () => {
        eli.forEach(elemento => elemento.disabled = false);
        
        bul.addEventListener('click', () => {
          if (bul.checked) {
            eli.forEach(elemento => elemento.disabled = true);
          } else {
            eli.forEach(elemento => elemento.disabled = false);
          }
        });
      });
    </script>




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