<?php

include('conexion.php');
$pregunta=$_POST['txtpregunta'];
$respuesta=$_POST['txtrespuesta'];

    if(isset($_POST["btnregistro"])){

      $consultas=mysqli_query($conn,"SELECT Preguntas FROM TBL_PREGUNTAS where Id_Preguntas=$pregunta  ;");
      while($row=mysqli_fetch_array($consultas))
      {
       $idpreg=$row['Preguntas'];
      }

 
      $consulta=mysqli_query($conn,"SELECT * FROM TBL_PREGUNTAS_X_USUARIO p INNER JOIN TBL_USUARIO u  where p.Preguntas= 'aaaa' ;");
      while($row=mysqli_fetch_array($consulta)){
        $idusus=$row['Id_Usuario'];
      }
      //echo($idusus);
    $queryregistro = "UPDATE TBL_PREGUNTAS_X_USUARIO SET  Preguntas = '$idpreg', Respuestas='$respuesta' where Id_Usuario='$idusus';";
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
