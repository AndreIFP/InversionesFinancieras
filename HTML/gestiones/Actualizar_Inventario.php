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

Programa:          Actualizar_Inventario
Fecha:             16-jul-2022
Programador:       Allan
descripcion:       entrada

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Fanny	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Luis		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php 
	include ("../conexion.php");

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
			  $query = mysqli_query($conn,"UPDATE TBL_BODEGA_INVENTARIO SET Nombre_Producto='$Nombre_Producto', Descripcion ='$Descripcion', Precio ='$Precio', Tipo ='$Tipo', Estado ='$Estado', Fecha ='$Fecha', Cantidad ='$Cantidad' WHERE Id_Inventario ='$Id_Inventario'");

				if($query){
					echo "<script> alert('Inventario Actualizado Exitosamente');window.location= 'Gestion_Inventario.php' </script>";
				}else{
					$alert='<p class="msg_error">Error al actualizar el Inventario.</p>';
				}
			}
		}
	}

	//Mostrar Datos
	if(empty($_REQUEST['Id']))
	{
		header('Location: Gestion_Inventario.php');
	}
	$Id = $_REQUEST['Id'];

	$sql= mysqli_query($conn,"SELECT *	FROM TBL_BODEGA_INVENTARIO WHERE Id_Inventario = $Id");
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: Gestion_Inventario.php');
	}else{
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$Id_Inventario   = $data['Id_Inventario'];
			$Nombre_Producto = $data['Nombre_Producto'];
            $Descripcion     = $data['Descripcion'];
			$Precio          = $data['Precio'];
			$Tipo            = $data['Tipo'];
			$Estado          = $data['Estado'];
            $Fecha           = $data['Fecha'];
            $Cantidad        = $data['Cantidad'];
		}
	}

 ?>

<?php include 'barralateralinicial.php';?>
<title>Actualizar Inventario</title>
  <h6><a  class="btn btn-primary"  href="Gestion_Inventario.php ">Volver Atrás</a></h6>
	<section id="container">
		<div class="form_register">
			
			<form action="" method="post">
			<h1>Actualizar Inventario</h1>
			<hr>
                <input type="hidden" name="Id_Inventario" value="<?php echo $Id_Inventario  ?>">
				<label for="Nombre_Producto">Nombre Producto</label>
				<input type="text" name="Nombre_Producto" maxlength="50" id="Nombre_Producto" placeholder="Nombre_Producto" pattern = "[a-zA-Z]+" value ="<?php echo $Nombre_Producto ?>">
				<label for="Descripcion">Descripción</label>
				<input type="text" name="Descripcion" maxlength="50" id="Descripcion" placeholder="Descripción" pattern = "[a-z A-Z]+" value ="<?php echo $Descripcion ?>">
				<label for="Precio">Precio</label>
				<input type="text" name="Precio" maxlength="60" id="Precio" placeholder="Precio" pattern = "[0-9]+" value ="<?php echo $Precio ?>">
                <label for="Tipo">Tipo</label>
				<input type="text" name="Tipo" maxlength="60" id="Tipo" placeholder="Tipo" pattern = "[a-zA-Z]+" value ="<?php echo $Tipo ?>">
				<label for="Estado">Estado</label>
				<input type="tex" name="Estado" maxlength="50" id="Estado" placeholder="Estado" pattern = "[a-z A-Z]+" value ="<?php echo $Estado ?>">
                <label for="Fecha">Fecha</label>
				<input type="text" name="Fecha" maxlength="20" id="Fecha" placeholder="Fecha"value ="<?php echo $Fecha ?>">
                <label for="Cantidad">Cantidad</label>
				<input type="text" name="Cantidad" maxlength="60" id="Cantidad" placeholder="Cantidad" pattern = "[0-9]+" value ="<?php echo $Cantidad ?>">

                
				<br>
				<input type="submit" value="Actualizar Inventario" class="btn_save">
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