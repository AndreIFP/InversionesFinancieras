<?php
//validacion Login
include('conexion.php');

$nombre = $_POST["txtusuario"];
$mensaje = $_POST["txtusuario"];

$query = mysqli_query($conn,"SELECT Usuario, Correo_Electronico,Contraseña  FROM TBL_USUARIO WHERE Usuario like '$nombre'  order by Id_Usuario desc");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
	//header("Location: OlvidoContra.html");
	while ($nombre = mysqli_fetch_row($query)) {
		?>
		<tr>

			<form  method="post" action="index1.php" name="miformulario" >
            <input type="text" value=<?php echo $nombre[1] ?> name="txtcorreo" style="visibility: hidden;"/>
			<input type="text" value=<?php echo $nombre[2] ?> name="txtpassword" style="visibility: hidden;"/>
			
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
	
	echo "<script> alert('Usuario $mensaje Valido'); </script>";

}

else if ($nr == 0) 
{
	//header("Location: login.php");
	echo "No ingreso"; 
	echo "<script> alert('Usuario No Valido: ');window.location= 'OlvidoContra.php' </script>";
}
	
//Validacion registro



?>
