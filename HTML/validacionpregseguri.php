<?php

include('conexion.php');
$tusuario=$_POST['tusuario'];
$passw=$_POST['userpassword'];
$tpregunta=$_POST['tpregunta'];



$query = mysqli_query($conn,"SELECT Respuestas FROM TBL_PREGUNTAS_X_USUARIO WHERE Respuestas like '$tpregunta'  order by Id_Preguntas desc");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
  
	//header("Location: OlvidoContra.html");

    $consulta=mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Usuario");
      while($row=mysqli_fetch_array($consulta)){
        $tusuario=$row['Usuario'];
      }
      $queryregistro = "UPDATE TBL_USUARIO SET Contraseña = '$passw' where Usuario='$tusuario'";
	 //}
	  if(mysqli_query($conn,$queryregistro))
     {
		echo "<script> alert('Contraseña Actualizada del Usuario: $tusuario');window.location= 'Login.php' </script>"; 
     }
    }

else if ($nr == 0) 
{
	//header("Location: login.php");
	echo "No ingreso"; 
	echo "<script> alert('Respuesta Incorrecta: $trespuesta ');window.location= 'OlvidoContra.php' </script>";
} 

?>
