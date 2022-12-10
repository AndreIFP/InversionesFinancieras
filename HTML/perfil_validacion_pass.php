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

Programa:          perfil_validacion_pass
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
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include("conexion.php");

session_start();
$_SESSION['id'];
$_SESSION['user'];

$Id_Usuario=$_SESSION['id'];
$eleccion=$_POST['eleccion'];


    if ($eleccion == 1) {
        $ipregunta=$_POST['txtpregunta'];
        $trespuesta=$_POST['txtrespuesta'];

        $query_pr = mysqli_query($conn, "SELECT * FROM tbl_preguntas WHERE Id_Preguntas = $ipregunta");
       while ($row = mysqli_fetch_array($query_pr)) {
        $tpregunta = $row['Preguntas'];
      }

        $sql = "UPDATE tbl_preguntas_x_usuario SET Id_Preguntas='$ipregunta', Preguntas='$tpregunta', Respuestas='$trespuesta' WHERE Id_Usuario='$Id_Usuario'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script> alert('Actualizacion Exitosa');window.location= 'perfil.php' </script>";
        }

    }else {
        
$passw=$_POST['userpassword'];

        $sql = "UPDATE tbl_usuario SET Contraseña='$passw' WHERE Id_Usuario='$Id_Usuario'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script> alert('Contraseña Actualizada Exitosamente');window.location= 'perfil.php' </script>";
        }
          }

?>


