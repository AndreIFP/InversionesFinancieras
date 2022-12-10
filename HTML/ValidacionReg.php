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

Programa:          ValidacionReg
Fecha:             16-jul-2022
Programador:       Fanny
descripcion:       libro

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Fanny	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
David 	       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Allan		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php 
include('conexion.php');

$nombre = $_POST["txtusuario"];
$nombreu= $_POST["Nombre_Usuario"];
$pass = $_POST["txtpassword"];
$email=$_POST["txtcorreo"];
$nombrec = $_POST["txtusuario"];

$queryusuario 	= mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Usuario = '$nombre'");
$nr 			= mysqli_num_rows($queryusuario); 

$querycorreo 	= mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Correo_Electronico= '$email'");
$nr 			= mysqli_num_rows($querycorreo); 


if ($nr == 0 )
{
	$queryregistrar = "INSERT INTO tbl_usuario (Usuario, Nombre_Usuario,Contraseña, Correo_Electronico,Estado_Usuario,Rol) values ('$nombre','$nombreu','$pass','$email','INACTIVO','4')";
	//$queryregistrare = "INSERT INTO tbl_preguntas (pregunta) values ('$pregunta')";
if(mysqli_query($conn,$queryregistrar))
{
	
/////////////////


$query2 = mysqli_query($conn,"SELECT Usuario, Correo_Electronico,Contraseña  FROM tbl_usuario WHERE Usuario like '$nombrec'  order by Id_Usuario desc");
$nr2 = mysqli_num_rows($query2);

if($nr2 == 1)
{
	//header("Location: OlvidoContra.html");
	while ($nombrec = mysqli_fetch_row($query2)) {
		?>
		<tr>

			<form  method="post" action="index3.php" name="miformulario" >
            <input type="text" value=<?php echo $nombrec[1] ?> name="txtcorreo" style="visibility: hidden;"/>
				<input type="text" value=<?php echo $nombreu ?> name="Nombre_Usuario" style="visibility: hidden;"/>
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
	
	echo "<script> alert('Usuario $nombre Valido'); window.location= </script>";

}
/////////////////
	
}
else 
{
	echo "Error: " .$queryregistrar."<br>".mysqli_error($conn);
}

}else
{
		echo "<script> alert('¡Error! Usuario o Correo Electronico Ya Existe: $nombre');window.location= 'Login.php' </script>";
}


?>
