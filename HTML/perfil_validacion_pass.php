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


