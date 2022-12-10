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

Programa:          ValidacionReg2
Fecha:             16-jul-2022
Programador:       Esperanza
descripcion:       salida 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Andrés	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		     01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Esperanza	     01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Allan		     01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php 
include('conexion.php');
$usuario = $_POST["txtusuario"];
$nombre = $_POST["Nombre_Usuario"];
$pass = $_POST["txtpassword"];
$email=$_POST["txtcorreo"];

$nombrec = $_POST["txtusuario"];

if(isset($_POST["btnregistrarx"]))
{

$queryusuario 	= mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Usuario = '$usuario'");
$nr 			= mysqli_num_rows($queryusuario); 

$queryemail 	= mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Correo_Electronico = '$email'");
$n 			= mysqli_num_rows($queryemail); 

if ($nr == 0 AND $n == 0 )
{
	$queryregistrar = "INSERT INTO tbl_usuario (Usuario,Nombre_Usuario, Contraseña, Correo_Electronico,Estado_Usuario,Rol,caja) values ('$usuario','$nombre','$pass','$email','NUEVO','4','0')";
	//$queryregistrare = "INSERT INTO tbl_preguntas (pregunta) values ('$pregunta')";
if(mysqli_query($conn,$queryregistrar))
{
	$conecsul	= mysqli_query($conn,"SELECT Id_Usuario FROM tbl_usuario WHERE Usuario = '$usuario'");
	while($row=mysqli_fetch_array($conecsul)){
	$idusus=$row['Id_Usuario'];
	}
/////////////////


$query2 = mysqli_query($conn,"SELECT Usuario, Correo_Electronico,Contraseña  FROM tbl_usuario WHERE Usuario like '$nombrec'  order by Id_Usuario desc");
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
		echo "<script> alert('No puedes registrar usuario o correo ya existe');window.location= './gestiones/Nuevo_Usuario.php' </script>";
}

} 

?>