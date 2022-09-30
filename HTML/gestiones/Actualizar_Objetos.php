<?php 
	include ("../conexion.php");

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['Objetos']) || empty($_POST['Descripcion']))
		{ 
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
            $Id_Objetos   = $_POST['Id_Objetos'];
			$Objetos       = $_POST['Objetos'];
			$Descripcion          = $_POST['Descripcion'];
			$Tipo_Objeto          = $_POST['Tipo_Objeto'];
            if(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Descripcion)){
                    $alert='<p class="msg_error">La descripcion solo recibe letras.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Tipo_Objeto)){
				$alert='<p class="msg_error">El Tipo de Objeto solo recibe letras.</p>';
			}else{

            $query = mysqli_query($conn,"UPDATE TBL_OBJETOS SET Descripcion='$Descripcion', Tipo_Objeto='$Tipo_Objeto' WHERE Id_Objetos ='$Id_Objetos'");

				if($query){
					echo "<script> alert('Objeto Actualizado Exitosamente');window.location= 'Gestion_Objetos.php' </script>";
				}else{
					$alert='<p class="msg_error">Error al actualizar la Objeto.</p>';
				}
			}
        }
	}

	//Mostrar Datos
	if(empty($_REQUEST['Id']))
	{
		header('Location: Gestion_Objetos.php');
	}
	$Id = $_REQUEST['Id'];

	$sql= mysqli_query($conn,"SELECT *	FROM TBL_OBJETOS WHERE Id_Objetos = $Id");
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: Gestion_Objetos.php');
	}else{
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$Id_Objetos   = $data['Id_Objetos'];
			$Objetos       = $data['Objetos'];
			$Descripcion  = $data['Descripcion'];
			$Tipo_Objeto  = $data['Tipo_Objeto'];
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
	<title>ACTUALIZAR Objetos</title>
  <h6><a  class="btn btn-primary"  href="Gestion_Objetos.php ">Volver Atrás</a></h6>
</head>
<body>
	<section id="container">
		<div class="form_register">
			
			<form action="" method="post">
			<h1>Actualizar Objetos</h1>
			<hr>
                <input type="hidden" name="Id_Objetos" value="<?php echo $Id_Objetos  ?>">
				<label for="Objetos">Nombre Objetos</label>
				<input type="text" name="Objetos" maxlength="50" id="Objetos" placeholder="Nombre" readonly= "true" value ="<?php echo $Objetos?>" required>
				<label for="Descripcion">Descripcion</label>
				<input type="text" name="Descripcion" maxlength="50" id="Descripcion" placeholder="Descripcion" value ="<?php echo $Descripcion ?>" required>
				<label for="Tipo_Objeto">Tipo</label>
				<input type="text" name="Tipo_Objeto" maxlength="50" id="Tipo_Objeto" placeholder="Tipo" value ="<?php echo $Tipo_Objeto?>" required>
				<br>
				<input type="submit" value="Actualizar Objetos" class="btn_save">
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