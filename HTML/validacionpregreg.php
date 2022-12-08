<?php
session_start();
include('conexion.php');
$pregunta=$_POST['txtpregunta'];
$respuesta=$_POST['txtrespuesta'];
$user=$_SESSION['user'];
    if(isset($_POST["btnregistro"])){

      $consultas=mysqli_query($conn,"SELECT Preguntas FROM tbl_preguntas where Id_Preguntas=$pregunta  ;");
      while($row=mysqli_fetch_array($consultas))
      {
       $idpreg=$row['Preguntas'];
      }

 
      $conecsul	= mysqli_query($conn,"SELECT Id_Usuario FROM tbl_usuario WHERE Usuario = '$user'");
      while($row=mysqli_fetch_array($conecsul)){
      $idusus=$row['Id_Usuario'];
      }

  
      mysqli_query($conn,"SELECT * FROM tbl_preguntas_x_usuario ");
      $queryregistro = "INSERT INTO tbl_preguntas_x_usuario (Id_Preguntas,Id_Usuario,Preguntas,Respuestas) values ('$pregunta','$idusus','$idpreg','$respuesta');";
    
    if(mysqli_query($conn,$queryregistro))
  {

    $queryregistro = "UPDATE tbl_usuario SET Rol = 4, Estado_Usuario = 'ACTIVO' where Id_Usuario='$idusus';";
    
    if(mysqli_query($conn,$queryregistro))
    {

    } 
    echo "<script> alert('Pregunta registrada: $idpreg');window.location= 'Login.php' </script>"; 
   }else{
    echo "<script> alert('ERROR');window.location= 'Login.php' </script>"; 
  }
	 }
	


    ?>
