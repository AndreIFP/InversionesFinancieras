<?php
session_start();
include('conexion.php');
$user=$_SESSION['user'];
if(isset($_REQUEST["btnregistrarx"])){
  $tpregunta=$_POST['tpregunta'];
  $preguntas=$_POST['txtpregunta'];
  $nombre=$_POST['tusuario'];
  $_SESSION['user']=$_POST["tusuario"];
  $passw=$_POST['userpassword'];
  $_SESSION["intentos"] = isset($_SESSION["intentos"]) ? $_SESSION["intentos"] : 0;
  $trespuesta ="";

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
   
        echo "<script> alert('Datos icorrectos');window.location= 'Login.php' </script>"; 
    }
   

    $conecsul	= mysqli_query($conn,"SELECT Contraseña FROM TBL_USUARIO WHERE Usuario = '$user'");
    while($row=mysqli_fetch_array($conecsul)){
    $contras=$row['Contraseña'];
    }

    $query = mysqli_query($conn,"SELECT * FROM tbl_preguntas_x_usuario WHERE Respuestas = '".$trespuesta."'");
    $nr = mysqli_num_rows($query);

       if ($nr > 0){
        $sqlc = "SELECT * FROM tbl_preguntas_x_usuario WHERE Respuestas = '".$trespuesta."'";
        $extr = $conn->query($sqlc);
        $fila = $extr->fetch_array(MYSQLI_NUM);
        $valor1 = $fila[3];
        $valor2 = $fila[5];
        $_SESSION["intentos"] = 0;
       //echo "<script> alert('ERR-002: ".$valor1." ".$valor2."'  );window.location= 'login.php' </script>";
       // echo "<script> alert('ERR-002:".$valor1."' )</script>";
        if($valor1 == 'ACTIVO' and $valor2 == '4'){
            $data = mysqli_fetch_array($query);
            $_SESSION['rol']=$data["Rol"];
            //header("Location: index.php");
            echo "<script>alert('EL usuario esta identificado como Nuevo. PORFAVOR CONTACTE CON EL ADMINISTRADOR');window.location= 'index.php'</script>";  
            header("Location: index_nuevo.php");

        }elseif ($valor1 == 'ACTIVO') {
            $data = mysqli_fetch_array($query);
            $_SESSION['rol']=$data["Rol"];
            header("Location: index.php");

        }elseif(($valor1 == 'INACTIVO' AND $valor2 == '4') or ($valor1 == 'INACTIVO' AND $valor2 == '2') or ($valor1 == 'INACTIVO' AND $valor2 == '3')){
            echo "<script> window.location= 'preguntasReg.php' </script>";
        }elseif ($valor1 == 'INACTIVO' OR $valor1 == 'BLOQUEADO') {
            echo "<script>alert('Ingreso invalido, EL USUARIO SE ENCUENTRA BLOQUEADO O ESTA INACTIVO. CONSULTE CON SU ADMINISTRADOR');window.location= 'login.php'</script>";  
        }
    }
	  
    $sql2 = "SELECT Valor FROM TBL_PARAMETROS;";
    $ext = $conn->query($sql2);
    $fila = $ext->fetch_array(MYSQLI_NUM);
    $param = $fila[0];

    if($_SESSION["intentos"] >= $param){
        
        // actualizamos el campo mostrar para que no se puede iniciar session
        $sql1="SELECT Id_usuario from TBL_USUARIO WHERE Usuario='$nombre'";
                    $res1 = $conn->query($sql1);
                    $fila = $res1->fetch_array(MYSQLI_NUM);
                    $iduser = $fila[0];    
    
                    $sql = "UPDATE TBL_USUARIO SET Estado_Usuario='BLOQUEADO' WHERE Id_Usuario='$iduser'";
                    $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
                    $exito = mysqli_query($con,$sql);
                    echo "<script>alert('DEMASIADOS INTENTOS EL USUARIO ".$nombre." SE HA BLOQUEADO');window.location= 'login.php'</script>";
    }else{
        $_SESSION["intentos"]++; // aumentamos en 1 los intentos
        echo "<script>alert('Ingreso invalido, PORFAVOR REVISE SUS CREDENCIALES DE INICIO DE SESION);window.location= 'login.php'</script>";
        //header("location:Login.php");
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
        $nombre=$row['Usuario'];
      }
      $queryregistro = "UPDATE TBL_USUARIO SET Contraseña = '$passw' where Usuario='tusuario'";
	 //}
	  if(mysqli_query($conn,$queryregistro))
     {
		echo "<script> alert('Contraseña Actualizada del Usuario: $nombre');window.location= 'Login.php' </script>"; 
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
?>
