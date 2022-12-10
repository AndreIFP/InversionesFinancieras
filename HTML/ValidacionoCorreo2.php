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

Programa:          ValidacionoCorreo2
Fecha:             16-jul-2022
Programador:       Andrés
descripcion:       Menu

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Andrés	        01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Allan		        01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Esperanza		    01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		        01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php
//validacion Login
include('conexion.php');

$nombre = $_POST["txtusuario"];
$idusuario = $_POST["txtusuario"];
$name = $nombre;
$mensaje = $_POST["txtusuario"];

function tokenG($len=10){
	$cadena ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
	$token = "";

	for ($i=0; $i < $len; $i++) {
		$token .= $cadena[rand(0,61)];
	} 
	return $token;
}

$passtoken = tokenG(20);

$query = mysqli_query($conn,"SELECT Usuario, Correo_Electronico,Id_Usuario  FROM tbl_usuario WHERE Usuario like '$nombre'  order by Id_Usuario desc");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
	//header("Location: OlvidoContra.html");
	while ($nombre = mysqli_fetch_row($query)) {
		?>
		<tr>

			<form  method="post" action="index1.php" name="miformulario" >
			<input type="text" value=<?php echo $nombre[0] ?> name="txtusuario" style="visibility: hidden;"/>
            <input type="text" value=<?php echo $nombre[1] ?> name="txtcorreo" style="visibility: hidden;"/>
			<input type="text" value=<?php echo $nombre[2] ?> name="txtidusuario" style="visibility: hidden;"/>
			<input type="text" value=<?php echo $passtoken ?> name="txttoken" style="visibility: hidden;"/>

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
//==========================REDIRIGE A LOGIN ===============================
	echo "No ingreso"; 
	echo "<script> alert('Usuario No Valido: ');window.location= 'Login.php' </script>";
}
	
//Validacion registro



?>
