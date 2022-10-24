<?php
include('conexion.php');

$tok = $_POST['txtcont'];
$contra1 = $_POST['txtcontra'];
$contra2 = $_POST['txtpassword'];
//$usuario = $_POST['txtidususario'];

$queryToken=mysqli_query($conn,"SELECT * FROM tbl_token WHERE Token = '$tok'");
$tokenResult = mysqli_fetch_array($queryToken,1);

//fecha actual
$date = date('Y-m-d H:i:s');
$fechaFinal=$tokenResult['Fecha_final'];

/* $ext = $conn->query($sql);
$fila = $ext->fetch_array(MYSQLI_NUM); */
$valor = $tokenResult['Token'];
$id_user = $tokenResult['Id_usuario'];

if($tok == $valor){
    if ($date < $fechaFinal ) {      
    if($contra1 == $contra2){
        /*$sql1 = "SELECT Id_Usuario FROM TBL_USUARIO WHERE Id_usuario = '$id_user'";
        $ext = $conn->query($sql);
        $fila = $ext->fetch_array(MYSQLI_NUM);
        $id_user = $fila[0];*/
        
        $sql2 = "UPDATE TBL_USUARIO SET Contraseña='$contra2' WHERE Id_Usuario='$id_user'";
        $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
        $exito = mysqli_query($con,$sql2);

        $sql3 = "DELETE FROM tbl_token WHERE Token = '$tok'";
        $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
        $exito = mysqli_query($con,$sql3);
       echo "<script> alert('SU CONTRASEÑA HA SIDO ACTUALIZADA EXITOSAMENTE');window.location= 'Login.php' </script>";
    }else{
        echo "<script> alert('LAS CONTRASEÑAS NO COINCIDEN');window.location= 'Contratemp.php?token=".$tok."' </script>";  
    }

    
}else{
    echo "<script> alert('TOKEN EXPIRADO, INGRESE UN TOKEN VALIDO');window.location= 'Contratemp.php?token=".$tok."' </script>";
}
}else{
    echo "<script> alert('TOKEN INCORRECTO, PORFAVOR INGRESE SU TOKEN NUEVAMENTE');window.location= 'Contratemp.php?token=".$tok."' </script>";
}

?>