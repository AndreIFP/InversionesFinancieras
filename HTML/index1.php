<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
date_default_timezone_set("America/Tegucigalpa");
include('conexion.php');

$correo = $_POST['txtcorreo'];
$idusuario = $_POST['txtidusuario'];
$usuario = $_POST['txtusuario'];
$token = $_POST['txttoken'];


//fecha actual
$date = date('Y-m-d H:i:s');

$queryParametros=mysqli_query($conn,"SELECT valor FROM TBL_PARAMETROS WHERE Parametro='Minutos_Vigencia_Token'");
$parametrosResult = mysqli_fetch_array($queryParametros,1);
//MINUTOS DE VIGENCIA=================================================
$vigencia=$parametrosResult['valor'];

$Fecha_final = date('Y-m-d H:i:s', strtotime($date . ' + ' . $vigencia . ' minute'));

$sql = "DELETE FROM tbl_token WHERE Id_usuario = $idusuario";
mysqli_query($conn,$sql);


$queryregistro = "INSERT INTO tbl_token (Token,Id_usuario,Fecha_inicio,Fecha_final) 
                   values ('$token','$idusuario','$date','$Fecha_final')";
mysqli_query($conn,$queryregistro);

$queryusuario 	= mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Correo_Electronico = '$correo'");
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr == 1)
{
$mostrar		= mysqli_fetch_array($queryusuario);

//$enviarpass 	= $mostrar['pass'];

$paracorreo 		= $correo;
$titulo				= "Recuperar contraseña";
//$mensaje			= $enviarpass;

if($paracorreo =$correo)
{
	echo "<script> alert('Correo Verificado') </script>";
}else
{
	echo "<script> alert('Error');window.location= 'Login.php' </script>";
}
}

// Llamado del parametro correo
$sqlCorreo = "SELECT * FROM TBL_PARAMETROS WHERE Id_Parametro = '9'";
$resultadocorreo = mysqli_query($conn,$sqlCorreo);
while ($fila = $resultadocorreo->fetch_assoc()) {
    $CorreoS = $fila["Valor"];
}


/*VaidrollTeam*/
/*VaidrollTeam*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

require 'Phpmiler\src/PHPMailer.php';
require 'Phpmiler\src/SMTP.php';
require 'Phpmiler\src/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
//$correrec=$_POST["txtcorreo"];
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->SMTPDebug = 0;                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $CorreoS;                     //SMTP username
    $mail->Password   = 'paobulsoyjnbbqvf';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($CorreoS;, 'Inversion');
    $mail->addAddress($correo );     //Add a recipient
    $mail->addCC('cc@example.com');


    //Attachments
//Attachments

    //Content
    $mail->isHTML(true); 
    $mail->CharSet = 'UTF-8';                                 //Set email format to HTML
    $mail->Subject = 'Sistema de Recuperacion de Constraseña';
    $mail->Body    = '
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>

</head>
<body style="background-color:#D0C8C6; width:400px;
    margin:10px 10px;
    padding:20px; " ><header style="
    padding:15px;
    font-size:italic;
    background-color:#cfc;
    color:#000;">
    <center><h1>Cambio de Contraseña</h1></center>
    </header><header style="
    padding:15px;
    font-size:italic;
    background-color:#FFFFFF ;
    color:#000;"><p style="color: #000000 ;">Hola</p>
    <p style="color: #000000 ;">ha solicitado el cambio de contraseña para el usuario '.$usuario.'</p> 
    <p style="color: #000000 ;">Tu Token de Acceso es: '.$token.'</p>
    <p style="color: #000000 ;">Ingresa al siguiente enlace para cambiar su contraseña:</p>
    <a href="http://localhost/inversionesfinancieras/HTML/contratemp.php?token='.$token.'"><button style="background-color: #93DEC7 ; width:200px;
    margin:10px 40px;
    border-radius: 40px;
    padding:20px;" > Cambiar contraseña</button></a>
    <p style="color: #000000 ;">Este token solo estará valido durante '.$vigencia.' minutos</p>
    </header>
    </body> 
</html>';
    $mail->AltBody ="";
    $mail->send();
    
    echo "<script> alert('Token de seguridad enviado a su correo Exitosamente'); window.location= 'Login.php' </script>";

    ?>
    
    <!-- <form  method="post" action="contratemp.php" name="miformulario" >
            <input type="text" value=<?php echo $idusuario ?> name="txtidususario" style="visibility: hidden;"/>
					<script>
    				window.onload=function(){
                	// Una vez cargada la página, el formulario se enviara automáticamente.
					document.forms["miformulario"].submit();
    				}
    				</script>
            </form> -->
<?php
include('conexion.php');

} catch (Exception $e) {
    echo "Mensaje: {$mail->ErrorInfo}";
}
echo("Location: OlvidoContra.html");
?>
