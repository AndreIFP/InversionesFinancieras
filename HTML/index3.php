<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include('conexion.php');

$correo = $_POST['txtcorreo'];
$usuario = $_POST['txtususario'];

$queryusuario     = mysqli_query($conn, "SELECT * FROM TBL_USUARIO WHERE Correo_Electronico = '$correo'");
$nr             = mysqli_num_rows($queryusuario);
if ($nr == 1) {
    $mostrar        = mysqli_fetch_array($queryusuario);


    $paracorreo         = $correo;
    $titulo                = "Recuperar contraseña";


    if ($paracorreo = $correo) {
        echo "<script> alert('Registrado');window.location= 'Login.php' </script>";
    } else {
        echo "<script> alert('Error');window.location= 'Login.php' </script>";
    }
}

// Llamado del parametro correo
$sqlCorreo = "SELECT * FROM TBL_PARAMETROS WHERE Id_Parametro = '9'";
$resultadocorreo = mysqli_query($conn, $sqlCorreo);
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
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $CorreoS;                     //SMTP username
    $mail->Password   = 'paobulsoyjnbbqvf';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($CorreoS, 'Inversion');
    $mail->addAddress($correo);     //Add a recipient
    $mail->addCC('cc@example.com');


    //Attachments


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Bienvenido al sistema';
    $mail->Body    = '<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
    style="width:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">

<head>

</head>

<body
    style="width:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;font-family:helvetica, arial, verdana, sans-serif;padding:0;Margin:0">
    <div class="es-wrapper-color" style="background-color:#FAFAFA">
        <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#fafafa"></v:fill>
			</v:background>
		<![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"
            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FAFAFA">
            <tr style="border-collapse:collapse">
                <td valign="top" style="padding:0;Margin:0">
                    <br>
                    <table cellpadding="0" cellspacing="0" class="es-header" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                        <tr style="border-collapse:collapse">
                            <td class="es-adaptive" align="center" style="padding:0;Margin:0">
                                <table class="es-header-body"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#50a5ba;width:600px"
                                    cellspacing="0" cellpadding="0" align="center">
                                    <tr style="border-collapse:collapse">
                                       
                                        <td style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#50a5ba"
                                            bgcolor="#3d5ca3" align="left">
                                            <center>
                                                <H3>INVERSIONES FINANCIERAS - IS DE HONDURAS S.A</H3>
                                                <H5>Trabajando Juntos Hoy Forjamos Nuestro Patrimononio del Mañana</H5>
                                            </center>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                        <tr style="border-collapse:collapse">
                            <td style="padding:0;Margin:0;background-color:#fafafa" bgcolor="#fafafa" align="center">
                                <table class="es-content-body"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#ffffff;width:600px"
                                    cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                    <tr style="border-collapse:collapse">
                                        <td style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:40px;background-color:transparent;background-position:left top"
                                            bgcolor="transparent" align="left">
                                            <table width="100%" cellspacing="0" cellpadding="0"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                <tr style="border-collapse:collapse">
                                                    <td valign="top" align="center"
                                                        style="padding:0;Margin:0;width:560px">
                                                        <table
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top"
                                                            width="100%" cellspacing="0" cellpadding="0"
                                                            role="presentation">
                                                            <tr style="border-collapse:collapse">

                                                            </tr>
                                                            <tr style="border-collapse:collapse">
                                                                <td align="center"
                                                                    style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px">
                                                                    <h1
                                                                        style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#333333">
                                                                        <strong>

                                                                            <H5> ¡BIENVENIDO A INVERSIONES
                                                                                FINANCIERAS - IS DE HONDURAS S.A!
                                                                            </H5>


                                                                        </strong>
                                                                    </h1>
                                                                    <h1
                                                                        style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#333333">
                                                                        <strong>
                                                                            <font style="vertical-align:inherit"></font>
                                                                        </strong>
                                                                    </h1>
                                                                </td>
                                                            </tr>
                                                            <tr style="border-collapse:collapse">
                                                                <td align="left"
                                                                    style="padding:0;Margin:0;padding-left:40px;padding-right:40px">
                                                                    <p
                                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica,  arial, verdana, sans-serif;line-height:24px;color:#666666;font-size:16px;text-align:center">
                                                                        <font style="vertical-align:inherit">
                                                                            <p align="center">
                                                                                Es para nosotros un placer darte la
                                                                                bienvenida ' . $usuario . '</p>
                                                                        </font>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr style="border-collapse:collapse">
                                                                <td align="center"
                                                                    style="padding:0;Margin:0;padding-top:25px;padding-left:40px;padding-right:40px">
                                                                    <p
                                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, arial, verdana, sans-serif;line-height:24px;color:#666666;font-size:16px">
                                                                        <font style="vertical-align:inherit">
                                                                            <p align="justify">En
                                                                                nombre de "INVERSIONES FINANCIERAS - IS
                                                                                DE HONDURAS S.A" sabemos que tienes
                                                                                mucho que aportar y que crecerás y te
                                                                                desarrollarás con nosotros. Estamos
                                                                                seguros de que juntos lograremos
                                                                                nuestros objetivos profesionales y
                                                                                ofreceremos un servicio de calidad a
                                                                                nuestros clientes.</p>
                                                                        </font>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr style="border-collapse:collapse">
                                                                <td align="center"
                                                                    style="Margin:0;padding-left:10px;padding-right:10px;padding-top:40px;padding-bottom:40px">
                                                                    <span class="es-button-border"
                                                                        style="border-style:solid;border-color:#3D5CA3;background:#5f8aa9;border-width:2px;display:inline-block;border-radius:10px;width:auto"><a
                                                                            href="http://localhost/inversionesfinancieras/HTML/login.php"
                                                                            class="es-button" target="_blank"
                                                                            style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#3D5CA3;font-size:14px;border-style:solid;border-color:#FFFFFF;border-width:15px 20px 15px 20px;display:inline-block;background:#FFFFFF;border-radius:10px;font-family:arial, helvetica, sans-serif;font-weight:bold;font-style:normal;line-height:17px;width:auto;text-align:center">
                                                                            <font style="vertical-align:inherit">
                                                                                <font style="vertical-align:inherit">
                                                                                    Iniciar Sesión</font>
                                                                            </font>
                                                                        </a></span>
                                                                </td>
                                                            </tr>

                                                            <table class="es-header-body"
                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#63b6d1;width:600px"
                                                                cellspacing="0" cellpadding="0" bgcolor="#3d5ca3"
                                                                align="center">
                                                                <tr style="border-collapse:collapse">
                                                                    <td style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#50a5ba"
                                                                        bgcolor="#3d5ca3" align="left">

                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>';

    $mail->send();
    echo "<script> alert('favor revisar su correo gmail');window.location= 'Login.php' </script>";
} catch (Exception $e) {
    echo "Mensaje: {$mail->ErrorInfo}";
}
echo ("Location: login.php");
