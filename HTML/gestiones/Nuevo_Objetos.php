<?php 
	
	include("../conexion.php");

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['Objetos']) || empty($_POST['Descripcion']))
		{ 
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$Objetos       = $_POST['Objetos'];
			$Descripcion          = $_POST['Descripcion'];
			$Tipo_Objeto          = $_POST['Tipo_Objeto'];
            if(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Objetos)){
                $alert='<p class="msg_error"> El Nombre Solo Recibe Letras.</p>';
            }elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Descripcion)){
                    $alert='<p class="msg_error">La descripcion solo recibe letras.</p>';
			}elseif(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Tipo_Objeto)){
                    $alert='<p class="msg_error">El Tipo de Objeto solo recibe letras.</p>';
            }else{
			
			$query_insert = mysqli_query($conn,"INSERT INTO TBL_OBJETOS(Objetos,Descripcion,Tipo_Objeto)
										VALUES('$Objetos','$Descripcion','$Tipo_Objeto')");
			    if($query_insert){
					echo "<script> alert('Objetos Registrado Exitosamente');window.location= 'Gestion_Objetos.php' </script>";
				}else{
					$alert='<p class="msg_error">Error al registrar el Objetos.</p>';
				}
            }
		}
	}
 ?>

<?php
include("../conexion.php");

?>
<?php include 'barralateralinicial.php';?>
  </div>
  <title>Gestion Objetos</title>
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <h6><a  class="btn btn-primary"  href="Gestion_Objetos.php ">Volver Atrás</a></h6>

  <div class="container mt-12">
                  <div class="col-md-12">
                </div>
		<div class="form_register">
			
			<form action="" method="post">
			<h1>Registro Objetos</h1>
			<hr>
				<label for="Objetos">Objetos</label>
				<input type="text" name="Objetos" maxlength="50" id="Objetos" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return blockSpecialCharacters(event)" required placeholder="Objeto">
				<label for="Descripcion">Descripcion</label>
				<input type="text" name="Descripcion" maxlength="50" id="Descripcion" placeholder="Descripcion" required>
				<label for="Objetos">Tipo</label>
				<input type="text" name="Tipo_Objeto" maxlength="50" id="Tipo_Objeto" placeholder="Tipo" required>
				<br>
				<input type="submit" value="Registrar Objetos" class="btn_save">
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
<script>
//validacion no espacios en contraseña
var input = document.getElementById('inpucontra2');
input.addEventListener('input',function(){
     this.value = this.value.trim();
}) 

var input = document.getElementById('inpucontracon');
input.addEventListener('input',function(){
     this.value = this.value.trim();
}) 
//validacion bloqueo de caracteres especiales
function blockSpecialCharacters(e) {
            let key = e.key;
            let keyCharCode = key.charCodeAt(0);
            
            // A-Z
            if(keyCharCode >= 65 && keyCharCode <= 90) {
                return key;
            }
            // a-z
            if(keyCharCode >= 97 && keyCharCode <= 122) {
                return key;
            }

            return false;
    }

    $('#theInput').keypress(function(e) {
        blockSpecialCharacters(e);
    });

//
</script>
<?php include 'barralateralfinal.php';?>