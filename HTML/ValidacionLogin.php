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

Programa:          ValidacionLogin
Fecha:             16-jul-2022
Programador:       Sara
descripcion:       Pantalla 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
José	          01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Fanny 	       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Esperanza	    01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php
//validacion Login

session_start();

include('conexion.php');

if(isset($_REQUEST["btnrlogin"])){
    $nombre = $_POST["txtusuario"];
    $_SESSION['user']=$_POST["txtusuario"];
    $pass = $_POST["txtpassword"];
    $_SESSION["intentos"] = isset($_SESSION["intentos"]) ? $_SESSION["intentos"] : 0;
    try {
        $consultas=mysqli_query($conn,"SELECT Contraseña FROM tbl_usuario WHERE Usuario = '".$nombre."' ;");
        while($row=mysqli_fetch_array($consultas))
        {
         $contrabase=$row['Contraseña'];
        }

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
         $desencriptar = function ($valor) use ($method, $clave, $iv) {
             $encrypted_data = base64_decode($valor);
             return openssl_decrypt($valor, $method, $clave, false, $iv);
         };
         /*
         Genera un valor para IV
         */
         $getIV = function () use ($method) {
             return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
         };
         
         // Como usar las funciones para encriptar y desencriptar.
         $dato =  $pass;
         //Encripta informaciÃ³n:
            $dato_encriptado = $encriptar($dato);
            //Desencripta informaciÃ³n:
                $dato_desencriptado = $desencriptar($dato_encriptado);


    
        $query = mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Usuario = '".$nombre."' and Contraseña = '".$dato_encriptado."'");
        $nr = mysqli_num_rows($query);

           if ($nr > 0 ){
            $sqlc = "SELECT * FROM tbl_usuario WHERE Usuario = '".$nombre."' and Contraseña = '".$dato_encriptado."'";
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
                echo "<script>alert('EL usuario esta identificado como Nuevo. PORFAVOR CONTACTE CON EL ADMINISTRADOR');window.location= 'login.php'</script>";

            }elseif ($valor1 == 'ACTIVO') {
                $data = mysqli_fetch_array($query);
                $_SESSION['rol']=$data["Rol"];
                header("Location: index.php");

            }elseif(($valor1 == 'NUEVO' )){
                echo "<script> window.location= 'preguntasReg.php' </script>";
            }elseif ($valor1 == 'INACTIVO' OR $valor1 == 'BLOQUEADO') {
                echo "<script>alert('Ingreso invalido, EL USUARIO SE ENCUENTRA BLOQUEADO O ESTA INACTIVO. CONSULTE CON SU ADMINISTRADOR');window.location= 'login.php'</script>";  
            }
        }
        $sql2 = "SELECT Valor FROM tbl_parametros;";
            $ext = $conn->query($sql2);
            $fila = $ext->fetch_array(MYSQLI_NUM);
            $param = $fila[0];

        if($_SESSION["intentos"] >=$param){
            
            // actualizamos el campo mostrar para que no se puede iniciar session
            $sql1="SELECT Id_usuario from tbl_usuario WHERE Usuario='$nombre'";
                        $res1 = $conn->query($sql1);
                        $fila = $res1->fetch_array(MYSQLI_NUM);
                        $iduser = $fila[0];    
        
                        $sql = "UPDATE tbl_usuario SET Estado_Usuario='BLOQUEADO' WHERE Id_Usuario='$iduser'";
                        $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
                        $exito = mysqli_query($con,$sql);
                        echo "<script>alert('DEMASIADOS INTENTOS EL USUARIO ".$nombre." SE HA BLOQUEADO');window.location= 'login.php'</script>";
        }else{
            $_SESSION["intentos"]++; // aumentamos en 1 los intentos
            echo "<script>alert('Ingreso invalido, PORFAVOR REVISE SUS CREDENCIALES DE INICIO DE SESION);window.location= 'login.php'</script>";
            //header("location:Login.php");
        }

        
        }catch (Exception $e) {
            echo "<script> alert('ERR-002: Se presento un error en la consulta hacia la tabla tbl_usuario. LINEA DEL ERROR: ".$e->getline()."' );window.location= 'login.php' </script>";
        }
try{
    if($nr == 1)
{
    $usuario = $_POST["txtusuario"];

    $conecsul	= mysqli_query($conn,"SELECT Id_Usuario FROM tbl_usuario WHERE Usuario = '$usuario'");
	while($row=mysqli_fetch_array($conecsul)){
	$idusus=$row['Id_Usuario'];
	}
    $_SESSION['id']="$idusus";
    $query2 = mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Usuario = '".$nombre."';");
    $nr2 = mysqli_num_rows($query2);
    //header("Location: index.php");
    if($nr2 == 1)
    {
        ?>
		<tr>
			<form  method="post" action="login.php" name="miformulario" >
            <input type="text" value=<?php echo $idusus ?> name="txtuser" style="visibility: hidden;"/>
					<script>
    				window.onload=function(){
                	// Una vez cargada la página, el formulario se enviara automáticamente.
					document.forms["miformulario"].submit();
    				}
    				</script>
            </form>
		</tr>	
	<?php
    }
    else 
    {
    $query2 = mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Usuario = '".$nombre."' and Estado_Usuario = 'ACTIVO''");
    $nr2 = mysqli_num_rows($query2);
    if($nr2 != 1)
    {
    $query2 = mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Usuario = '".$nombre."' and Estado_Usuario = 'NUEVO'");
    $nr2 = mysqli_num_rows($query2);
    echo "<script> window.location= 'preguntasReg.php' </script>";
    }
    echo "<script> window.location= 'bienvenido.php' </script>";
    }
}

}catch (Exception $e){
    echo "<script> alert('ERR-002: Se presento un error en la consulta hacia la tabla tbl_usuario. LINEA DEL ERROR: ".$e->getline()."' );window.location= 'login.php' </script>";
}
/*if(isset($_COOKIE["block".$nombre])){
    echo "<script> alert('El usuario ha sido bloqueado. PORFAVOR PONGASE EN CONTACTO CON EL ADMINISTRADOR');window.location= 'login.php' </script>";
}else{
        if(isset($_COOKIE["$nombre"])){          
            $cont =$_COOKIE["$nombre"];
            $cont++;
            setcookie($nombre,$cont,time()+500);             
            try{
            $sql2 = "SELECT Valor FROM tbl_parametros;";
            $ext = $conn->query($sql2);
            $fila = $ext->fetch_array(MYSQLI_NUM);
            $valor = $fila[0];
            }catch(Exception $e){
                echo "<script> alert('ERR-003: Error en la consulta hacia la tabla tbl_parametros. LINEA DEL ERROR: ".$e->getline()."' );window.location= 'login.php' </script>";
            }
             
            if($cont==$valor){
            $sql1="SELECT Id_usuario from tbl_usuario WHERE Usuario='$nombre'";
            $res1 = $conn->query($sql1);
            $fila = $res1->fetch_array(MYSQLI_NUM);
            $iduser = $fila[0];    
            try{
            $sql = "UPDATE tbl_usuario SET Estado_Usuario='BLOQUEADO' WHERE Id_Usuario='$iduser'";
            $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
            $exito = mysqli_query($con,$sql);
            setcookie("block".$nombre,$cont,time()+500);
            }catch(Exception $e ){
                echo "<script> alert('ERR-004: Error en la proceso de actualizacion del estado en la tabla tbl_usuario. LINEA DEL ERROR: ".$e->getline()."' );window.location= 'login.php' </script>";
            }
        }  
        echo"<script>alert('Error al iniciar sesion');window.location= 'login.php'</script>"; 
        }else{
            setcookie($nombre,1,time()+30);
        }  
        
    }
}   */
/*
if($nr == 1)
{
    $query2 = mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Usuario = '".$nombre."' and Rol = '1'");
    $nr2 = mysqli_num_rows($query2);
    //header("Location: OlvidoContra.html");
    if($nr2 == 1)
    {
    echo "Bienvenido:" .$nombre;
    echo "<script> alert('Bienvenido');window.location= 'index.php' </script>";
    }
    else 
    {
    $query2 = mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Usuario = '".$nombre."' and Rol = '2'");
    $nr2 = mysqli_num_rows($query2);
    if($nr2 != 1)
    {
    $query2 = mysqli_query($conn,"SELECT * FROM tbl_usuario WHERE Usuario = '".$nombre."' and Rol = '4'");
    $nr2 = mysqli_num_rows($query2);
    echo "<script> window.location= 'preguntasReg.php' </script>";
    }
    echo "<script> window.location= 'bienvenido.php' </script>";
    }
    

}
*/
if ($nr == 0) 
{
    //header("Location: login.php");
    echo "<script> alert('Nombre o Contraseña incorrecto');window.location= 'login.php' </script>";

     if(isset($_COOKIE["$nombre"])){
        $cont =$_COOKIE["$nombre"];
        $cont++;
        setcookie($nombre,$cont,time()+ 12000);
        if($cont >= 3){
            setcookie("block".$nombre,$cont,time()+60000);
        }
    }else {
        setcookie($nombre,1,time()+12000);
    }

}
}
?>
