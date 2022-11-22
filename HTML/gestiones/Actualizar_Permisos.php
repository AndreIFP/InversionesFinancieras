<?php
include("../conexion.php");
include("../helpers/helpers.php");
session_start();
$Id_Rol = $_SESSION['rol'];
updatePermisos($Id_Rol);
if (!empty($_POST)) {
	$idRol = $_POST['idrol'];
	$modulos = $_POST['modulos'];
	$fecha = NOW();
	//$permisos=$modulos['permisos'];


	$sqlDeletePermiso = mysqli_query($conn, "DELETE FROM `tbl_roles_objetos` WHERE Id_Rol=" . $idRol);

	foreach ($modulos as $modulo) {
		$idModulo = $modulo['Id_Objetos'];
		$r = empty($modulo['r']) ? 0 : 1;
		$w = empty($modulo['w']) ? 0 : 1;
		$u = empty($modulo['u']) ? 0 : 1;
		$d = empty($modulo['d']) ? 0 : 1;

		$sqlPermiso = mysqli_query($conn, "INSERT INTO `tbl_roles_objetos`(`Id_Rol`, `Id_Objetos`, `Permiso_Creacion`, `Permiso_Visualizacion`, `Permiso_Eliminacion`, `Permiso_Actualizacion`, `Modificado_Por`) VALUES ('$idRol','$idModulo','$w','$r','$d','$u','$Id_Rol')");
	}

	if ($sqlPermiso) {
		echo "<script> alert('Permisos Actualizados Exitosamente');window.location= 'GestionRoles.php' </script>";
	} else {
		$alert = '<p class="msg_error">Error al actualizar la rol.</p>';
	}
	/* dep($modulos);
		exit; */

	/* $alert='';
		if(empty($_POST['Rol']) || empty($_POST['Descripcion']))
		{ 
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
            $Id_Rol   = $_POST['Id_Rol'];
			$Rol       = $_POST['Rol'];
			$Descripcion          = $_POST['Descripcion'];
            if(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Descripcion)){
                    $alert='<p class="msg_error">La descripcion solo recibe letras.</p>';
            }else{

            $query = mysqli_query($conn,"UPDATE TBL_ROLES SET Descripcion='$Descripcion' WHERE Id_Rol ='$Id_Rol'");

				if($query){
					echo "<script> alert('Rol Actualizado Exitosamente');window.location= 'GestionRoles.php' </script>";
				}else{
					$alert='<p class="msg_error">Error al actualizar la rol.</p>';
				}
			}
        } */
}

//Mostrar Datos
if (empty($_REQUEST['Id'])) {
	header('Location: GestionRoles.php');
}
$Id = $_REQUEST['Id'];

/* $sql= mysqli_query($conn,"select p.Id_Rol,r.Rol,p.Id_Objetos, o.Objetos,p.Permiso_Creacion as w, p.Permiso_Visualizacion as r, p.Permiso_Eliminacion as d, p.Permiso_Actualizacion as u from tbl_roles_objetos p 
	INNER JOIN tbl_roles r on p.Id_Rol=r.Id_Rol
	INNER JOIN tbl_objetos o on p.Id_Objetos = o.Id_Objetos where r.Id_Rol=".$Id."");
	$permisos=mysqli_fetch_all($sql,1);

	dep($permisos);
	exit; */

//modulos
$sqlModulos = mysqli_query($conn, "SELECT * from tbl_objetos");
$arrModulos = mysqli_fetch_all($sqlModulos, 1);


$sqlRol = mysqli_query($conn, "SELECT * from tbl_roles where Id_Rol=" . $Id);
$arrRol = mysqli_fetch_array($sqlRol);
//permisos
$sqlPermisos = mysqli_query($conn, "SELECT p.Id_Rol,r.Rol as nomRol,p.Id_Objetos, p.Permiso_Creacion as w, p.Permiso_Visualizacion as r, p.Permiso_Eliminacion as d, p.Permiso_Actualizacion as u FROM `tbl_roles_objetos` as p INNER Join tbl_roles r on p.Id_Rol=r.Id_Rol WHERE p.Id_Rol = " . $Id . "");
$arrPermisosRol = mysqli_fetch_all($sqlPermisos, 1);
$arrPermisos = array('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);
$arrPermisoRol = array('idrol' => $Id, 'nomRol' => $arrRol['Rol']);


/* dep($arrPermisos);
	exit; */

if (empty($arrPermisosRol)) {

	for ($i = 0; $i < count($arrModulos); $i++) {
		$arrModulos[$i]['permisos'] = $arrPermisos;
	}
} else {
	for ($i = 0; $i < count($arrModulos); $i++) {
		$arrPermisos = array('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);

		if (isset($arrPermisosRol[$i])) {
			$arrPermisos = array(
				'r' => $arrPermisosRol[$i]['r'],
				'w' => $arrPermisosRol[$i]['w'],
				'u' => $arrPermisosRol[$i]['u'],
				'd' => $arrPermisosRol[$i]['d']
			);
		}
		$arrModulos[$i]['permisos'] = $arrPermisos;
	}
}
$arrPermisoRol['modulos'] = $arrModulos;

?>

<?php

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
<?php include 'barralateralinicial.php'; ?><p></p>
<section style=" background-color:rgb(255, 255, 255);
padding: 15px;
color:black;
font-size: 12px; ">

	<title>ACTUALIZAR PERMISOS</title>
	<h6><a class="btn btn-primary" href="GestionRoles.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a></h6>

	<form action="" method="post">
		<input type="hidden" id="idrol" name="idrol" value="<?= $arrPermisoRol['idrol']; ?>" required="">
		<center><h3><strong> ACTUALIZAR PERMISOS DEL <?= $arrPermisoRol['nomRol'];  ?> </strong></h3></center>
		<hr>
		<table class="table">
			<thead class="table-primary">
				<tr>
					<th>#</th>
					<th>Módulo</th>
					<th>Ver</th>
					<th>Crear</th>
					<th>Actualizar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$no = 1;
				$modulos = $arrPermisoRol['modulos'];
				/* dep($modulos);
						 exit; */
				for ($i = 0; $i < count($modulos); $i++) {
					$permisos = $modulos[$i]['permisos'];
					$rCheck = $permisos['r'] == 1 ? " checked " : "";
					$wCheck = $permisos['w'] == 1 ? " checked " : "";
					$uCheck = $permisos['u'] == 1 ? " checked " : "";
					$dCheck = $permisos['d'] == 1 ? " checked " : "";

					$idmod = $modulos[$i]['Id_Objetos'];


				?>
					<td> <?= $no; ?>
						<input type="hidden" name="modulos[<?= $i; ?>][Id_Objetos]" value="<?= $idmod ?>" required>
					</td>
					<td><?= $modulos[$i]['Objetos'];  ?></td>

					<td>
						<div class="toggle-flip">
							<label class="switch">
								<input type="checkbox" id="unchecked" class="deschecar" name="modulos[<?= $i; ?>][r]" <?= $rCheck ?>><span class="slider round" data-toggle-on="ON" data-toggle-off="OFF"></span>
							</label>
						</div>
					</td>
					<!-- Codigo para solo mostrar leer en calendario -->
					<?php
					//if ($idmod==7) {
					//break;
					//}
					?>
					<td>
						<div class="toggle-flip">
							<label class="switch">
								<input type="checkbox" class="selectAll" onclick="checkBoxes('modulos[<?= $i; ?>][r]')" name="modulos[<?= $i; ?>][w]" <?= $wCheck ?>><span class="slider round" data-toggle-on="ON" data-toggle-off="OFF"></span>
							</label>
						</div>
					</td>
					<td>
						<div class="toggle-flip">
							<label class="switch">
								<input type="checkbox" class="selectAll" onClick="checkBoxes('modulos[<?= $i; ?>][r]')" name="modulos[<?= $i; ?>][u]" <?= $uCheck ?>><span class="slider round" data-toggle-on="ON" data-toggle-off="OFF"></span>
							</label>
						</div>
					</td>
					<td>
						<div class="toggle-flip">
							<label class="switch">
								<input type="checkbox" class="selectAll" onClick="checkBoxes('modulos[<?= $i; ?>][r]')" name="modulos[<?= $i; ?>][d]" <?= $dCheck ?>><span class="slider round" data-toggle-on="ON" data-toggle-off="OFF"></span>
							</label>
						</div>
					</td>

					</tr>
				<?php
					$no++;
				}
				?>
			</tbody>
		</table>
		<hr>
		<div align="right">
		<a href="GestionRoles.php" class="btn btn-danger" style="margin-right: 20px;"> <i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
		<button type="submit" class="btn btn-success"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar Permisos</button>
	
		</div>
	</form>

	</div>

	</body>
	<style type="text/css">
		.switch {
			position: relative;
			display: inline-block;
			width: 60px;
			height: 34px;
		}

		.switch input {
			opacity: 0;
			width: 0;
			height: 0;
		}

		.slider {
			position: absolute;
			cursor: pointer;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #ccc;
			-webkit-transition: .4s;
			transition: .4s;
		}

		.slider:before {
			position: absolute;
			content: "";
			height: 26px;
			width: 26px;
			left: 4px;
			bottom: 4px;
			background-color: white;
			-webkit-transition: .4s;
			transition: .4s;
		}

		input:checked+.slider {
			background-color: #2196F3;
		}

		input:focus+.slider {
			box-shadow: 0 0 1px #2196F3;
		}

		input:checked+.slider:before {
			-webkit-transform: translateX(26px);
			-ms-transform: translateX(26px);
			transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
			border-radius: 34px;
		}

		.slider.round:before {
			border-radius: 50%;
		}

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
			border: 0px solid #d1d1d1;
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
		//Funcion para checkbox
		function checkBoxes(nameInput) {
			const deschecar = document.querySelector(`input[name='${nameInput}']`);
			deschecar.checked = true;
		}
	</script>
	<?php include 'barralateralfinal.php'; ?>