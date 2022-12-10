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

Programa:          ValidacionoContra
Fecha:             16-jul-2022
Programador:       José
descripcion:       facturacion 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Luis	           01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara 	           01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Allan		         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php
//validacion Login
include('conexion.php');

$nombre = $_POST["txtusuario"];


$query = mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Usuario = '".$nombre."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
	//header("Location: OlvidoContra.html");
	echo "<script> alert('Usuario Valido: $nombre');window.location= 'PreguntasxUsuario.php' </script>";
}
else if ($nr == 0) 
{
	//header("Location: login.php");
	echo "No ingreso"; 
	echo "<script> alert('Usuario No Valido: $nombre');window.location= 'OlvidoContra.php' </script>";
}
	
//Validacion registro



?>
