<?php
session_start();
include('conexion.php');
$pregunta=$_POST['txtpregunta'];
$respuesta=$_POST['txtrespuesta'];
$user=$_SESSION['user'];
    if(isset($_POST["btnregistro"])){

      $consultas=mysqli_query($conn,"SELECT Preguntas FROM TBL_PREGUNTAS where Id_Preguntas=$pregunta  ;");
      while($row=mysqli_fetch_array($consultas))
      {
       $idpreg=$row['Preguntas'];
      }

 
      $conecsul	= mysqli_query($conn,"SELECT Id_Usuario FROM TBL_USUARIO WHERE Usuario = '$user'");
      while($row=mysqli_fetch_array($conecsul)){
      $idusus=$row['Id_Usuario'];
      }

  
      mysqli_query($conn,"SELECT * FROM TBL_PREGUNTAS_X_USUARIO ");
      $queryregistro = "INSERT INTO TBL_PREGUNTAS_X_USUARIO (Id_Preguntas,Id_Usuario,Preguntas,Respuestas) values ('$pregunta','$idusus','$idpreg','$respuesta');";
    
    if(mysqli_query($conn,$queryregistro))
  {

    $queryregistro = "UPDATE TBL_USUARIO SET Rol = 4, Estado_Usuario = 'ACTIVO' where Id_Usuario='$idusus';";
    
    if(mysqli_query($conn,$queryregistro))
    {

    } 
    echo "<script> alert('Pregunta registrada: $idpreg');window.location= 'Login.php' </script>"; 
   }else{
    echo "<script> alert('ERROR');window.location= 'Login.php' </script>"; 
  }
	 }
	


    ?>
