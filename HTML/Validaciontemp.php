<?php
include('conexion.php');

$tok = $_POST['txtcont'];
$contra1 = $_POST['txtcontra'];
$contra2 = $_POST['txtpassword'];
//$usuario = $_POST['txtidususario'];

$sql = "SELECT * FROM TBL_PARAMETROS WHERE VALOR = '$tok'";
$ext = $conn->query($sql);
$fila = $ext->fetch_array(MYSQLI_NUM);
$valor = $fila[2];
$id_user = $fila[3];

if($tok == $valor){
    
    if($contra1 == $contra2){
        /*$sql1 = "SELECT Id_Usuario FROM TBL_USUARIO WHERE Id_usuario = '$id_user'";
        $ext = $conn->query($sql);
        $fila = $ext->fetch_array(MYSQLI_NUM);
        $id_user = $fila[0];*/
        
        $sql2 = "UPDATE TBL_USUARIO SET Contraseña='$contra2' WHERE Id_Usuario='$id_user'";
        $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
        $exito = mysqli_query($con,$sql2);

        $sql3 = "DELETE FROM TBL_PARAMETROS WHERE VALOR = '$tok'";
        $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
        $exito = mysqli_query($con,$sql3);
       echo "<script> alert('SU CONTRASEÑA HA SIDO ACTUALIZADA EXITOSAMENTE');window.location= 'Login.php' </script>";
    }else{
        echo "<script> alert('LAS CONTRASEÑAS NO COINCIDEN');window.location= 'Contratemp.php' </script>";  
    }
}else{
    echo "<script> alert('TOKEN INCORRECTO, PORFAVOR INGRESE SU TOKEN NUEVAMENTE');window.location= 'Contratemp.php' </script>";
}






?>