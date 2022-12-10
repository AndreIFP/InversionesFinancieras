<!-- -----------------------------------------------------------------------
	    Universidad Nacional Autonoma de Honduras (UNAH)
		           Facultad de Ciencias Economicas
	        Departamento de Informatica administrativa
        Analisis, Programacion y Evaluacion de Sistemas
                    Primer Periodo 2022


Equipo:
Allan Mauricio Hernández ...... (mauricio.galindo@unah.hn)
Andrés Isaías Flores .......... (aifloresp@unah.hn)
Esperanza Lisseth Cartagena ... (esperanza.cartagena@unah.hn)
Fanny Merari Ventura .......... (fmventura@unah.hn
José David García ............. (jdgarciad@unah.hn)
José Luis Martínez ............ (jlmartinezo@unah.hn)
Luis Steven Vásquez ........... (Lsvasquez@unah.hn)
Sara Raquel Ortiz ............. (Sortizm@unah.hn)

Catedratico:
LIC. CLAUDIA REGINA NUÑEZ GALINDO
Lic. GIANCARLO MARTINI SCALICI AGUILAR
Lic. KARLA MELISA GARCIA PINEDA 

----------------------------------------------------------------------

Programa:          validacionpregreg
Fecha:             16-jul-2022
Programador:       Allan
descripcion:       entrada

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Fanny	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Luis		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

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
