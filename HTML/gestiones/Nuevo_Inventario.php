<?php 
	
	include("../conexion.php");

	if(!empty($_POST))
	{
		$alert='';
        if(empty($_POST['Nombre_Producto']) || empty($_POST['Descripcion']) || empty($_POST['Precio']) || empty($_POST['Tipo']) || empty($_POST['Estado']) || empty($_POST['Fecha']) || empty($_POST['Cantidad']))
		{ 
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
            $Id_Inventario   = $_POST['Id_Inventario'];
			$Nombre_Producto = $_POST['Nombre_Producto'];
            $Descripcion     = $_POST['Descripcion'];
			$Precio          = $_POST['Precio'];
			$Tipo            = $_POST['Tipo'];
			$Estado          = $_POST['Estado'];
            $Fecha           = $_POST['Fecha'];
            $Cantidad        = $_POST['Cantidad'];

			if(!is_numeric($Precio) || !is_numeric($Cantidad)){
				$alert='<p class="msg_error">Error al actualizar el Inventario, Solo Números en Precio y Cantidad.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Nombre_Producto)){
				$alert='<p class="msg_error"> El Nombre Del Producto Solo Recibe Letras.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Descripcion)){
				$alert='<p class="msg_error"> La Descripción del Producto Solo Recibe Letras.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Tipo)){
				$alert='<p class="msg_error"> El Tipo Del Producto Solo Recibe Letras.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Estado)){
				$alert='<p class="msg_error"> El Estado Del Producto Solo Recibe Letras.</p>';
			}else{
					$alert='<p class="msg_error">Error al Registrar el Inventario.</p>';
				}
			}
		}
	
 ?>

<?php include 'barralateralinicial.php';?>
</div>
<title>Gestion Inventarios</title>
<div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <h6><a  class="btn btn-primary"  href="Gestion_Inventario.php">Volver Atrás</a></h6>
	<section id="container">
		<div class="form_register">
			
			<form action="" method="post">
			<h1>Registro Inventario</h1>
			<hr>
            <label for="Nombre_Producto">Nombre Producto</label>
				<input type="text" name="Nombre_Producto" maxlength="50" id="Nombre_Producto" placeholder="Nombre_Producto">
				<label for="Descripcion">Descripción</label>
				<input type="text" name="Descripcion" maxlength="50" id="Descripcion" placeholder="Descripción">
				<label for="Precio">Precio</label>
				<input type="text" name="Precio" maxlength="60" id="Precio" placeholder="Precio">
                <label for="Tipo">Tipo</label>
				<input type="text" name="Tipo" maxlength="60" id="Tipo" placeholder="Tipo">
				<label for="Estado">Estado</label>
				<input type="tex" name="Estado" maxlength="50" id="Estado" placeholder="Estado">
                <label for="Fecha">Fecha</label>
				<input type="text" name="Fecha" maxlength="20" id="Fecha" placeholder="Fecha">
                <label for="Cantidad">Cantidad</label>
				<input type="text" name="Cantidad" maxlength="60" id="Cantidad" placeholder="Cantidad">
				<br>
				<input type="submit" value="Registrar Inventario" class="btn_save">
			</form>
		</div>
	</section>
  </body>
<style type="text/css">
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