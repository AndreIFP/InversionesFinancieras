<?php 
include('conexion.php');
$usuario = $_POST["txtusuario"];
$nombre = $_POST["Nombre_Usuario"];
$pass = $_POST["txtpassword"];
$email=$_POST["txtcorreo"];

$nombrec = $_POST["txtusuario"];

if(isset($_POST["btnregistrarx"]))
{

$queryusuario 	= mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Usuario = '$usuario'");
$nr 			= mysqli_num_rows($queryusuario); 

$queryemail 	= mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Correo_Electronico = '$email'");
$n 			= mysqli_num_rows($queryemail); 

if ($nr == 0 AND $n == 0 )
{
	$queryregistrar = "INSERT INTO TBL_USUARIO (Usuario,Nombre_Usuario, Contraseña, Correo_Electronico,Estado_Usuario,Rol,caja) values ('$usuario','$nombre','$pass','$email','INACTIVO','4','0')";
	//$queryregistrare = "INSERT INTO TBL_PREGUNTAS (pregunta) values ('$pregunta')";
if(mysqli_query($conn,$queryregistrar))
{
	$conecsul	= mysqli_query($conn,"SELECT Id_Usuario FROM TBL_USUARIO WHERE Usuario = '$usuario'");
	while($row=mysqli_fetch_array($conecsul)){
	$idusus=$row['Id_Usuario'];
	}
/////////////////


$query2 = mysqli_query($conn,"SELECT Usuario, Correo_Electronico,Contraseña  FROM TBL_USUARIO WHERE Usuario like '$nombrec'  order by Id_Usuario desc");
$nr2 = mysqli_num_rows($query2);

if($nr2 == 1)
{
	//header("Location: OlvidoContra.html");
	while ($nombrec = mysqli_fetch_row($query2)) {
		?>
		<tr>

			<form  method="post" action="index2.php" name="miformulario" >
            <input type="text" value=<?php echo $nombrec[1] ?> name="txtcorreo" style="visibility: hidden;"/>
			<input type="text" value=<?php echo $nombre ?> name="txtususario" style="visibility: hidden;"/>
			
					<script>
    				window.onload=function(){
                	// Una vez cargada la página, el formulario se enviara automáticamente.
					document.forms["miformulario"].submit();
    				}
    				</script>
            </form>

		</tr>
		
	<?php
	}
	
	echo "<script> alert('Usuario $usuario Registrado'); window.location= Gestion_Usuarios.php </script>";

}
/////////////////
	
}
else 
{
	echo "Error: " .$queryregistrar."<br>".mysqli_error($conn);
}

}else
{
		echo "<script> alert('No puedes registrar usuario o correo ya existe');window.location= 'Nuevo_Usuarios.php' </script>";
}

} 

?>