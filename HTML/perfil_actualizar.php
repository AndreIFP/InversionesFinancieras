<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include("conexion.php");

session_start();
$_SESSION['id'];
$_SESSION['user'];

$Id_Usuario = $_SESSION['id'];
$Nombre_Usuario = $_POST["Nombre_Usuario"];
$Correo_Electronico = $_POST["Correo_Electronico"];

// echo"<script>alert(' $nombre ');</script>";

$sql = "UPDATE tbl_usuario SET Nombre_Usuario='$Nombre_Usuario',Correo_Electronico='$Correo_Electronico' WHERE Id_Usuario='$Id_Usuario'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "<script> alert('Actualizacion Exitosa');window.location= 'perfil.php' </script>";
            }
?>


