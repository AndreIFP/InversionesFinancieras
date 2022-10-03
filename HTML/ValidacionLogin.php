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
        $query = mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Usuario = '".$nombre."' and Contraseña = '".$pass."'");
        $nr = mysqli_num_rows($query);

           if ($nr > 0){
            $sqlc = "SELECT * FROM TBL_USUARIO WHERE Usuario = '".$nombre."' and Contraseña = '".$pass."'";
            $extr = $conn->query($sqlc);
            $fila = $extr->fetch_array(MYSQLI_NUM);
            $valor1 = $fila[3];
            $valor2 = $fila[5];
            $_SESSION["intentos"] = 0;
           //echo "<script> alert('ERR-002: ".$valor1." ".$valor2."'  );window.location= 'login.php' </script>";
           // echo "<script> alert('ERR-002:".$valor1."' )</script>";
            if($valor1 == 'ACTIVO'){
                $data = mysqli_fetch_array($query);
                $_SESSION['rol']=$data["Rol"];
                header("Location: index.php");

            }elseif(($valor1 == 'INACTIVO' AND $valor2 == '4') or ($valor1 == 'INACTIVO' AND $valor2 == '2') or ($valor1 == 'INACTIVO' AND $valor2 == '3')){
                echo "<script> window.location= 'preguntasReg.php' </script>";
            }elseif ($valor1 == 'INACTIVO' OR $valor1 == 'BLOQUEADO') {
                echo "<script>alert('Ingreso invalido, EL USUARIO SE ENCUENTRA BLOQUEADO O ESTA INACTIVO. CONSULTE CON SU ADMINISTRADOR');window.location= 'login.php'</script>";  
            }
        }

        if($_SESSION["intentos"] >=4){
            
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
try{
    if($nr == 1)
{
    $usuario = $_POST["txtusuario"];

    $conecsul	= mysqli_query($conn,"SELECT Id_Usuario FROM TBL_USUARIO WHERE Usuario = '$usuario'");
	while($row=mysqli_fetch_array($conecsul)){
	$idusus=$row['Id_Usuario'];
	}
    $_SESSION['id']="$idusus";
    $query2 = mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Usuario = '".$nombre."';");
    $nr2 = mysqli_num_rows($query2);
    //header("Location: index.php");
    if($nr2 == 1)
    {
        ?>
		<tr>
			<form  method="post" action="index.php" name="miformulario" >
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
    $query2 = mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Usuario = '".$nombre."' and Rol = '2'");
    $nr2 = mysqli_num_rows($query2);
    if($nr2 != 1)
    {
    $query2 = mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Usuario = '".$nombre."' and Rol = '4'");
    $nr2 = mysqli_num_rows($query2);
    echo "<script> window.location= 'preguntasReg.php' </script>";
    }
    echo "<script> window.location= 'bienvenido.php' </script>";
    }
}

}catch (Exception $e){
    echo "<script> alert('ERR-002: Se presento un error en la consulta hacia la tabla TBL_USUARIO. LINEA DEL ERROR: ".$e->getline()."' );window.location= 'login.php' </script>";
}
/*if(isset($_COOKIE["block".$nombre])){
    echo "<script> alert('El usuario ha sido bloqueado. PORFAVOR PONGASE EN CONTACTO CON EL ADMINISTRADOR');window.location= 'login.php' </script>";
}else{
        if(isset($_COOKIE["$nombre"])){          
            $cont =$_COOKIE["$nombre"];
            $cont++;
            setcookie($nombre,$cont,time()+500);             
            try{
            $sql2 = "SELECT Valor FROM TBL_PARAMETROS;";
            $ext = $conn->query($sql2);
            $fila = $ext->fetch_array(MYSQLI_NUM);
            $valor = $fila[0];
            }catch(Exception $e){
                echo "<script> alert('ERR-003: Error en la consulta hacia la tabla TBL_PARAMETROS. LINEA DEL ERROR: ".$e->getline()."' );window.location= 'login.php' </script>";
            }
             
            if($cont==$valor){
            $sql1="SELECT Id_usuario from TBL_USUARIO WHERE Usuario='$nombre'";
            $res1 = $conn->query($sql1);
            $fila = $res1->fetch_array(MYSQLI_NUM);
            $iduser = $fila[0];    
            try{
            $sql = "UPDATE TBL_USUARIO SET Estado_Usuario='BLOQUEADO' WHERE Id_Usuario='$iduser'";
            $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
            $exito = mysqli_query($con,$sql);
            setcookie("block".$nombre,$cont,time()+500);
            }catch(Exception $e ){
                echo "<script> alert('ERR-004: Error en la proceso de actualizacion del estado en la tabla TBL_USUARIO. LINEA DEL ERROR: ".$e->getline()."' );window.location= 'login.php' </script>";
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
    $query2 = mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Usuario = '".$nombre."' and Rol = '1'");
    $nr2 = mysqli_num_rows($query2);
    //header("Location: OlvidoContra.html");
    if($nr2 == 1)
    {
    echo "Bienvenido:" .$nombre;
    echo "<script> alert('Bienvenido');window.location= 'index.php' </script>";
    }
    else 
    {
    $query2 = mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Usuario = '".$nombre."' and Rol = '2'");
    $nr2 = mysqli_num_rows($query2);
    if($nr2 != 1)
    {
    $query2 = mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Usuario = '".$nombre."' and Rol = '4'");
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