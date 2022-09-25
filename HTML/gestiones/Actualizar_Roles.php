<?php 
	include ("../conexion.php");

	if(!empty($_POST))
	{
		$alert='';
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
        }
	}

	//Mostrar Datos
	if(empty($_REQUEST['Id']))
	{
		header('Location: GestionRoles.php');
	}
	$Id = $_REQUEST['Id'];

	$sql= mysqli_query($conn,"SELECT *	FROM TBL_ROLES WHERE Id_Rol = $Id");
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: GestionRoles.php');
	}else{
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$Id_Rol   = $data['Id_Rol'];
			$Rol       = $data['Rol'];
			$Descripcion  = $data['Descripcion'];
		}
	}

 ?>

<?php
include("../conexion.php");

?>
<?php include 'barralateralinicial.php';?>
  </div>
  <div class="container mt-12">
                  <div class="col-md-12">
	<title>ACTUALIZAR ROL</title>
  <h6><a  class="btn btn-primary"  href="GestionRoles.php ">Volver Atrás</a></h6>
</head>
<body>
	<section id="container">
		<div class="form_register">
			
			<form action="" method="post">
			<h1>Actualizar Rol</h1>
			<hr>
                <input type="hidden" name="Id_Rol" value="<?php echo $Id_Rol  ?>">
				<label for="Rol">Nombre Rol</label>
				<input type="text" name="Rol" maxlength="50" id="Rol" placeholder="Nombre" readonly= "true" value ="<?php echo $Rol?>">
				<label for="Descripcion">Descripcion</label>
				<input type="text" name="Descripcion" maxlength="50" id="Descripcion" placeholder="Descripcion" value ="<?php echo $Descripcion ?>">
				<br>
				<input type="submit" value="Actualizar Rol" class="btn_save">
			</form>
		</div>
	</section>
</body>
<style type="text/css">
.btn-atras{
	background: #1faac8;
	color: #FFF;
	padding: 0 20px;
	border: 0;
	cursor: pointer;
	margin-left: 20px;
}
.form_register{
	width: 450px;
	margin: auto;
}
.form_register h1{
	color: #3c93b0;
}
hr{
	border: 0;
	background: #CCC;
	height: 1px;
	margin: 10px 0;
	display: block;
}
form{
	background: #FFF;
	margin: auto;
	padding: 20px 50px;
	border: 1px solid #d1d1d1;
}
label{
	display: block;
	font-size: 12pt;
	font-family: 'GothamBook';
	margin: 15px auto 5px auto;
}
.btn_save{
	font-size: 12pt;
	background: #12a4c6;
	padding: 10px;
	color: #FFF;
	letter-spacing: 1px;
	border: 0;
	cursor: pointer;
	margin: 15px auto;
}
.alert{
	width: 100%;
	background: #66e07d66;
	border-radius: 6px;
	margin: 20px auto;
}
.msg_error{
	color: #e65656;
}
.msg_save{
	color: #126e00;
}
.alert p{
	padding: 10px;
}
</style>
<?php include 'barralateralfinal.php';?>