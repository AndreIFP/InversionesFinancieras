<?php
  include("../conexion.php");

  if(!empty($_POST))
	{
		
		$Id_Objetos = $_POST['Id_Objetos'];

		$query_delete = mysqli_query($conn,"DELETE FROM tbl_objetos WHERE Id_Objetos =$Id_Objetos");
		if($query_delete){
			header("location: Gestion_Objetos.php");
			
		}else{
			echo "Error al eliminar";
		}
	}

  if(empty($_REQUEST['Id']))
  {
    header("location: Gestion_Objetos.php");
		mysqli_close($conn);
  }else{
    $Id_Objetos = $_REQUEST['Id'];

		$query = mysqli_query($conn,"SELECT * FROM tbl_objetos WHERE Id_Objetos = $Id_Objetos ");
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				$Objetos = $data['Objetos'];
			}
		}else{
			header("location: Gestion_Objetos.php");
		}
	}
?>

<?php include 'barralateralinicial.php';?>
  </div>
  <title>Gestion Objetos</title>
		<div class="data_delete">
			<h2>¿Está Seguro De Eliminar El Siguiente Registro?</h2>
            </br>
			<p>Nombre: <span><?php echo $Objetos; ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="Id_Objetos" value="<?php echo $Id_Objetos; ?>">
				<a href="Gestion_Objetos.php" class="btn_cancel">Cancelar</a>

				<script>
                    function alerta(){
                    window.alert('Eliminacion Exitosa!');
                                     }
                </script>
				
                <th><input type="submit" value="Aceptar" class="btn_ok" onclick="alerta()"></th>
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