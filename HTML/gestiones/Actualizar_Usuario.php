<?php
   include("../conexion.php");
   if(!empty($_POST))
	{
    $alert='';
    if(empty($_POST['Nombre_Usuario']))
		{ 
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
  $Id_Usuario=$_POST['Id_Usuario'];
  $Usuario=$_POST['Usuario'];
  $Nombre_Usuario=$_POST['Nombre_Usuario'];
  $Estado_Usuario=$_POST['Estado_Usuario'];
  $Correo_Electronico=$_POST['Correo_Electronico'];
  $Rol=$_POST['Rol'];

  if(!preg_match("/^[a-z A-Z \s  ñÑ+áéíóú]+$/" ,$Nombre_Usuario)){
    $alert='<p class="msg_error"> El Nombre Solo Recibe Letras.</p>';
  }else{
  $sql = "UPDATE TBL_USUARIO SET Nombre_Usuario='$Nombre_Usuario',Estado_Usuario='$Estado_Usuario',Correo_Electronico='$Correo_Electronico' ,Rol='$Rol' WHERE Id_Usuario='$Id_Usuario'";
  $query=mysqli_query($conn,$sql);
     if($query){
         echo "<script> alert('Usuario: $Usuario Actualizado');window.location= 'Gestion_Usuarios.php' </script>";
     }
    }
  }
  }
   $Id=$_GET['Id'];
   $sql = "SELECT u.Id_Usuario,u.Usuario, u.Nombre_Usuario, u.Estado_Usuario, u.Correo_Electronico, (u.Rol) as IdRol, (r.Rol) as Rol 
             FROM TBL_USUARIO u
             INNER JOIN TBL_ROLES r
             ON u.Rol = r.Id_Rol
             WHERE Id_Usuario='$Id'";
   $query=mysqli_query($conn,$sql);
   
   $result_sql = mysqli_num_rows($query);
   if($result_sql == 0){
    header('location: Gestion_Usuarios.php');
   }else{
    $option = '';
    while($row=mysqli_fetch_array($query)) {
        $Id_Usuario = $row['Id_Usuario'];
        $Usuario = $row['Usuario'];
        $Nombre_Usuario = $row['Nombre_Usuario'];
        $Estado_Usuario = $row['Estado_Usuario'];
        $Correo_Electronico = $row['Correo_Electronico'];
        $Id_Rol = $row['IdRol'];
        $Rol = $row['Rol'];
        if($Id_Rol == 1){
            $option = '<option value="'.$Id_Rol.'" select>'.$Rol.'</option>';
        }else if($Id_Rol == 2){
            $option = '<option value="'.$Id_Rol.'" select>'.$Rol.'</option>';	
        }else if($Id_Rol == 3){
            $option = '<option value="'.$Id_Rol.'" select>'.$Rol.'</option>';
        }else if($Id_Rol == 4){
            $option = '<option value="'.$Id_Rol.'" select>'.$Rol.'</option>';
        }
    }
   }
   if(empty($_GET['Id']))
   {
    header('location: Gestion_Usuarios.php');
   }
?>

<?php include 'barralateralinicial.php';?>

  </div>
  <title>Actualizar Usuario</title>
  <br>
  <div class="container mt-12">
    <a href="Gestion_Usuarios.php"><input type="submit" class="btn btn-primary" Value=" Regresar "></a>
        <div class="form_actualizar">
            <form action="" method="POST">
                  <h1>Modificar Usuario</h1> 
                  <hr>
                  <input type="hidden" name="Id_Usuario" value="<?php echo $Id_Usuario  ?>">
                  <label for="">Usuario</label>
                  <input type="text" Class="form-contorl mb-3" name="Usuario" readonly= "true" placeholder="Usuario" value ="<?php echo $Usuario ?>" maxlength="10" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required size="30">
                  <label for="">Nombre Usuario</label>
                  <input type="text" Class="form-contorl mb-3" name="Nombre_Usuario" placeholder="Nombre Usuario" value ="<?php echo $Nombre_Usuario ?>" maxlength="20" style="text-transform:uppercase;"  required size="30"><br>
                  </br>
                  <div class="ub1">Estado Usuario</div>
                  
                  <select name="Estado_Usuario" required>
                  <option value ="">Seleccione Una Opción</option>
                  <option value="ACTIVO">ACTIVO</option>
                  <option value="INACTIVO">INACTIVO</option>
                  </select>
                  <label for="">Correo Electronico</label>
                  <input type="email" Class="form-contorl mb-3" name="Correo_Electronico" placeholder="Correo Electronico" value ="<?php echo $Correo_Electronico ?>" maxlength="50" required size="30"></br>
                  </br>
                  <div class="ub1">Rol</div>
                  <?php 
					include("../conexion.php");
					$query_rol = mysqli_query($conn,"SELECT * FROM TBL_ROLES");
					mysqli_close($conn);
					$result_rol = mysqli_num_rows($query_rol);

				 ?>

				<select name="Rol" id="Rol" class="notItemOne">
					<?php
						echo $option; 
						if($result_rol > 0)
						{
							while ($Rol = mysqli_fetch_array($query_rol)) {
					?>
							<option value="<?php echo $Rol["Id_Rol"]; ?>"><?php echo $Rol["Rol"] ?></option>
					<?php 
								# code...
							}
							
						}
					 ?>
				 </select>
                  </br>
                  
                 <input type="submit" class="btn_save" value="Acualizar">
                 </div>
                 </div>
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
.form_actualizar{
	width: 450px;
	margin: auto;
}
.form_actualizar h1{
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
.notItemOne option:first-child{
	display: none;
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