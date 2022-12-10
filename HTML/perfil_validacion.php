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

Programa:          perfil_validacion
Fecha:             16-jul-2022
Programador:       Allan
descripcion:       entrada

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Fanny	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Luis		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include("conexion.php");

session_start();
$_SESSION['id'];
$_SESSION['user'];

$eleccion=$_POST['eleccion'];

if ($eleccion == 1) {

if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['Nombre_Usuario'])) {
        echo "<script> alert('No puede dejar campos en blanco');window.location= 'perfil.php' </script>";
    }else if (empty($_POST['Correo_Electronico'])) {
        echo "<script> alert('No puede dejar campos en blanco');window.location= 'perfil.php' </script>";
    }else {
        $Id_Usuario = $_SESSION['id'];
        $Nombre_Usuario = $_POST["Nombre_Usuario"];
        $Correo_Electronico = $_POST["Correo_Electronico"];
        
        $sql = "UPDATE tbl_usuario SET Nombre_Usuario='$Nombre_Usuario',Correo_Electronico='$Correo_Electronico' WHERE Id_Usuario='$Id_Usuario'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script> alert('Actualizacion Exitosa');window.location= 'perfil.php' </script>";
        }
        }
    }
}else {
    if (!empty($_POST))     {
        $alert = '';
        if (empty($_POST['Contraseña'])) {
            echo "<script> alert('No puede dejar campos en blanco');window.location= 'perfil.php' </script>";
        }else {
            $Id_Usuario = $_SESSION['id'];
            $Contraseña = $_POST["Contraseña"];
            // echo "<script> alert('$Id_Usuario $Contraseña');</script>";
    
            $query_user = mysqli_query($conn, "SELECT * FROM tbl_usuario WHERE Id_Usuario = '$Id_Usuario' AND Contraseña = '$Contraseña'");
            $result_sql = mysqli_num_rows($query_user);
    
        }
            if ($result_sql == 0) {
                echo "<script> alert('Contraseña incorrecta');window.location= 'perfil.php' </script>";
            }else {
                // $sql = "UPDATE tbl_usuario SET Nombre_Usuario='$Nombre_Usuario',Correo_Electronico='$Correo_Electronico' WHERE Id_Usuario='$Id_Usuario'";
                // $query = mysqli_query($conn, $sql);
                // if ($query) {
                echo "<script> alert('Contraseña Correcta');window.location= 'perfil_pass.php' </script>";
              }
                        }
}
?>


