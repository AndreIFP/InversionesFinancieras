<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include('conexion.php');

$correo = $_POST['txtcorreo'];
$usuario = $_POST['txtususario'];

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
	echo "<script> alert('Contraseña enviada');window.location= 'gestiones/Gestion_Usuarios.php' </script>";
}else
{
	echo "<script> alert('Error');window.location= 'gestiones/Nuevo_Usuario.php' </script>";
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


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Bienvenido al sistema';
    $mail->Body    = "muy buenas $usuario Se le agradece haber registrado, favor ingrese al siguiente link: http://localhost/login2/HTML/login.php ";

    $mail->send();
    echo "<script> alert('favor revisar su correo gmail');window.location= 'gestiones/Gestion_Usuarios.php' </script>";
} catch (Exception $e) {
    echo "Mensaje: {$mail->ErrorInfo}";
}
echo("Location: login.php");
?>