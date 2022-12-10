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

Programa:          Delete_Parametro
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
  include("../conexion.php");

  if(!empty($_POST))
	{
		
		$Id_Parametro = $_POST['Id_Parametro'];

		$query_delete = mysqli_query($conn,"DELETE FROM tbl_parametros WHERE Id_Parametro =$Id_Parametro");
		if($query_delete){
			header("location: parametro.php");
		}else{
			echo "Error al eliminar";
		}

	}

  if(empty($_REQUEST['Id']))
  {
    header("location: Gestion_parametros.php");
		mysqli_close($conn);
  }else{
    $Id_Parametro = $_REQUEST['Id'];

		$query = mysqli_query($conn,"SELECT * FROM tbl_parametros WHERE Id_Parametro = $Id_Parametro ");
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				$Nombre = $data['Parametro'];
			}
		}else{
			header("location: Gestion_parametros.php");
		}
	}
?>

<?php include 'barralateralinicial.php';?>
  </div>
  <title>Gestion Parametro</title>
		<div class="data_delete">
			<h2>¿Está Seguro De Eliminar El Siguiente Registro?</h2>
            </br>
			<p>Nombre Parametro: <span><?php echo $Nombre; ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="Id_Parametro" value="<?php echo $Id_Parametro; ?>">
				<a href="Gestion_parametros.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>


	</section>
</body>
<style type="text/css">
	.data_delete{
	text-align: center;
}
.data_delete h2{
	font-size: 12pt;
}
.data_delete span{
	font-weight: bold;
	color: #4f72d4;
	font-size: 12pt;
}
.btn_cancel,.btn_ok{
	width: 124px;
	background: #478ba2;
	color: #FFF;
	display: inline-block;
	padding: 5px;
	border-radius: 5px;
	cursor: pointer;
	margin: 15px;
}
.btn_cancel{
	background: #42b343;
}

.data_delete form{

	background: initial;
	margin: auto;
	padding: 20px 50px;
	border: 0;

}
</style>
<?php include 'barralateralfinal.php';?>