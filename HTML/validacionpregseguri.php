<?php
session_start();
include('conexion.php');
$user=$_SESSION['user'];
if(isset($_REQUEST["btnregistrarx"])){
  $tpregunta=$_POST['tpregunta'];
  $preguntas=$_POST['txtpregunta'];
  $tusuario=$_POST['tusuario'];
  $_SESSION['user']=$_POST["tusuario"];
  $passw=$_POST['userpassword'];
  $_SESSION["intentos"] = isset($_SESSION["intentos"]) ? $_SESSION["intentos"] : 0;
  

  try {

    $conecsul	= mysqli_query($conn,"SELECT Id_Usuario FROM TBL_USUARIO WHERE Usuario = '$user'");
	while($row=mysqli_fetch_array($conecsul)){
	$idusus=$row['Id_Usuario'];
	}

    $conecsul	= mysqli_query($conn,"SELECT Id_Preguntas FROM TBL_PREGUNTAS_X_USUARIO WHERE Id_Usuario = '$idusus'");
	while($row=mysqli_fetch_array($conecsul)){
	$idpregunta=$row['Id_Preguntas'];
	}
    

    

    $conecsul	= mysqli_query($conn,"SELECT Respuestas FROM TBL_PREGUNTAS_X_USUARIO WHERE Id_Usuario = '$idusus'");
	while($row=mysqli_fetch_array($conecsul)){
    $idrespuest=$row['Respuestas'];
	}


  
    
    
      if($preguntas != $idpregunta or $tpregunta != $idrespuest  ){



      $sql2 = "SELECT Valor FROM TBL_PARAMETROS;";
      $ext = $conn->query($sql2);
      $fila = $ext->fetch_array(MYSQLI_NUM);
      $param = $fila[0];
    

      if($_SESSION["intentos"] >=  $param  ){
        $_SESSION["intentos"] = 0; 
          // actualizamos el campo mostrar para que no se puede iniciar session
          $sql1="SELECT Id_usuario from TBL_USUARIO WHERE Usuario='$tusuario'";
                      $res1 = $conn->query($sql1);
                      $fila = $res1->fetch_array(MYSQLI_NUM);
                      $iduser = $fila[0];    

                      $sql = "UPDATE TBL_USUARIO SET Estado_Usuario='BLOQUEADO' WHERE Id_Usuario='$iduser'";
                      $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
                      $exito = mysqli_query($con,$sql);
                      echo "<script>alert('DEMASIADOS INTENTOS EL USUARIO ".$tusuario." SE HA BLOQUEADO');window.location= 'login.php'</script>";
                    }else{
                        $_SESSION["intentos"]++; // aumentamos en 1 los intentos
                        
                    }

        echo "<script> alert('Datos icorrectos');window.location= 'Login.php' </script>"; 
}

   
    $conecsul	= mysqli_query($conn,"SELECT Contraseña FROM TBL_USUARIO WHERE Usuario = '$user'");
    while($row=mysqli_fetch_array($conecsul)){
    $contras=$row['Contraseña'];
    }



    
    }catch (Exception $e) {
        echo "<script> alert('ERR-002: Se presento un error en la consulta hacia la tabla TBL_USUARIO. LINEA DEL ERROR: ".$e->getline()."' );window.location= 'login.php' </script>";
    }

$query = mysqli_query($conn,"SELECT Respuestas FROM TBL_PREGUNTAS_X_USUARIO WHERE Respuestas like '$tpregunta'  order by Id_Preguntas desc");
$nr = mysqli_num_rows($query);



try{

  

if($nr == 1)
{
  
	//header("Location: OlvidoContra.html");
    
   

    if($contras!=$passw){
    
        
        $consulta=mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Usuario");
        while($row=mysqli_fetch_array($consulta)){
          $tusuario=$row['Usuario'];
        }
        $queryregistro = "UPDATE TBL_USUARIO SET Contraseña = '$passw' where Usuario='$tusuario'";

        if(mysqli_query($conn,$queryregistro))
       {
          echo "<script> alert('Contraseña Actualizada del Usuario: $tusuario');window.location= 'Login.php' </script>"; 
       }
   
    }else{
        echo "<script> alert('Su contraseña actual no puede ser la nueva');window.location= 'Login.php' </script>"; 
    
    }
    }


    

else if ($nr == 0) 
{
	//header("Location: login.php");
	echo "No ingreso"; 
	echo "<script> alert('Respuesta Incorrecta: $idrespuest ');window.location= 'OlvidoContra.php' </script>";
} 
}catch (Exception $e){
  echo "<script> alert('ERR-002: Se presento un error en la consulta hacia la tabla TBL_USUARIO. LINEA DEL ERROR: ".$e->getline()."' );window.location= 'login.php' </script>";
}
  }

