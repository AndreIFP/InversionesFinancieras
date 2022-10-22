<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include('conexion.php');

$correo = $_POST['txtcorreo'];
$idusuario = $_POST['txtidusuario'];
$usuario = $_POST['txtusuario'];
$token = $_POST['txttoken'];

mysqli_query($conn,"SELECT * FROM TBL_PARAMETROS ");
$queryregistro = "INSERT INTO TBL_PARAMETROS (Parametro,Valor,Id_Usuario) 
                   values ('Recupera_Usuario','$token','$idusuario')";
mysqli_query($conn,$queryregistro);

$queryusuario 	= mysqli_query($conn,"SELECT * FROM TBL_USUARIO WHERE Correo_Electronico = '$correo'");
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr == 1)
{
$mostrar		= mysqli_fetch_array($queryusuario); 
$enviarpass 	= $mostrar['pass'];

$paracorreo 		= $correo;
$titulo				= "Recuperar contraseña";
$mensaje			= $enviarpass;

if($paracorreo =$correo)
{
	echo "<script> alert('Correo Verificado') </script>";
}else
{
	echo "<script> alert('Error');window.location= 'olvidoCorreo.php' </script>";
}
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
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'inversionesfinancierasish@gmail.com';                     //SMTP username
    $mail->Password   = 'paobulsoyjnbbqvf';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('inversionesfinancierasish@gmail.com', 'Inversion');
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
    <a href="http://localhost/InversionesFinancieras/HTML/contratemp.php"><button style="background-color: #93DEC7 ; width:200px;
    margin:10px 40px;
    border-radius: 40px;
    padding:20px;" > Cambiar contraseña</button></a>
    </header>
    </body> 
</html>';
    $mail->AltBody ="";
    $mail->send();
    
    echo "<script> alert('Token de seguridad enviado a su correo Exitosamente') </script>";

    ?>
    
    <form  method="post" action="contratemp.php" name="miformulario" >
            <input type="text" value=<?php echo $idusuario ?> name="txtidususario" style="visibility: hidden;"/>
					<script>
    				window.onload=function(){
                	// Una vez cargada la página, el formulario se enviara automáticamente.
					document.forms["miformulario"].submit();
    				}
    				</script>
            </form>
<?php
include('conexion.php');

} catch (Exception $e) {
    echo "Mensaje: {$mail->ErrorInfo}";
}
echo("Location: OlvidoContra.html");
?>