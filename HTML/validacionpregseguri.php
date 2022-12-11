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

Programa:          validacionpregseguri
Fecha:             16-jul-2022
Programador:       José
descripcion:       facturacion 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Luis	           01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara 	           01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Allan		         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

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

    $clave  = 'Una cadena, muy, muy larga para mejorar la encriptacion';
//Metodo de encriptaciÃ³n
$method = 'aes-256-cbc';
// Puedes generar una diferente usando la funcion $getIV()
$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw");
 /*
 Encripta el contenido de la variable, enviada como parametro.
  */
 $encriptar = function ($valor) use ($method, $clave, $iv) {
	 return openssl_encrypt ($valor, $method, $clave, false, $iv);
 };
 /*
 Desencripta el texto recibido
 */

 /*
 Genera un valor para IV
 */
 $getIV = function () use ($method) {
	 return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
 };

 $dato =  $passw;
 //Encripta informaciÃ³n:
	$dato_encriptado = $encriptar($dato);

    $conecsul	= mysqli_query($conn,"SELECT Id_Usuario FROM tbl_usuario WHERE Usuario = '$user'");
	while($row=mysqli_fetch_array($conecsul)){
	$idusus=$row['Id_Usuario'];
	}

    $conecsul	= mysqli_query($conn,"SELECT Id_Preguntas FROM tbl_preguntas_x_usuario WHERE Id_Usuario = '$idusus'");
	while($row=mysqli_fetch_array($conecsul)){
	$idpregunta=$row['Id_Preguntas'];
	}
    

    

    $conecsul	= mysqli_query($conn,"SELECT Respuestas FROM tbl_preguntas_x_usuario WHERE Id_Usuario = '$idusus'");
	while($row=mysqli_fetch_array($conecsul)){
    $idrespuest=$row['Respuestas'];
	}


  
    
    
      if($preguntas != $idpregunta or $tpregunta != $idrespuest  ){



      $sql2 = "SELECT Valor FROM tbl_parametros;";
      $ext = $conn->query($sql2);
      $fila = $ext->fetch_array(MYSQLI_NUM);
      $param = $fila[0];
    

      if($_SESSION["intentos"] >=  $param  ){
        $_SESSION["intentos"] = 0; 
          // actualizamos el campo mostrar para que no se puede iniciar session
          $sql1="SELECT Id_usuario from tbl_usuario WHERE Usuario='$tusuario'";
                      $res1 = $conn->query($sql1);
                      $fila = $res1->fetch_array(MYSQLI_NUM);
                      $iduser = $fila[0];    

                      $sql = "UPDATE tbl_usuario SET Estado_Usuario='BLOQUEADO' WHERE Id_Usuario='$iduser'";
                      $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
                      $exito = mysqli_query($con,$sql);
                      echo "<script>alert('DEMASIADOS INTENTOS EL USUARIO ".$tusuario." SE HA BLOQUEADO');window.location= 'login.php'</script>";
                    }else{
                        $_SESSION["intentos"]++; // aumentamos en 1 los intentos
                        
                    }

        echo "<script> alert('Datos icorrectos');window.location= 'Login.php' </script>"; 
}

   
    $conecsul	= mysqli_query($conn,"SELECT Contraseña FROM tbl_usuario WHERE Usuario = '$user'");
    while($row=mysqli_fetch_array($conecsul)){
    $contras=$row['Contraseña'];
    }



    
    }catch (Exception $e) {
        echo "<script> alert('ERR-002: Se presento un error en la consulta hacia la tabla tbl_usuario. LINEA DEL ERROR: ".$e->getline()."' );window.location= 'login.php' </script>";
    }

$query = mysqli_query($conn,"SELECT Respuestas FROM tbl_preguntas_x_usuario WHERE Respuestas like '$tpregunta'  order by Id_Preguntas desc");
$nr = mysqli_num_rows($query);



try{

  

if($nr == 1)
{
  
	//header("Location: OlvidoContra.html");
    
   

    if($contras!=$dato_encriptado){
    
        
        $consulta=mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Usuario");
        while($row=mysqli_fetch_array($consulta)){
          $tusuario=$row['Usuario'];
        }
        $queryregistro = "UPDATE tbl_usuario SET Contraseña = '$dato_encriptado' where Usuario='$tusuario'";

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
  echo "<script> alert('ERR-002: Se presento un error en la consulta hacia la tabla tbl_usuario. LINEA DEL ERROR: ".$e->getline()."' );window.location= 'login.php' </script>";
}
  }

