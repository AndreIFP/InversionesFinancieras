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

$queryParametros = mysqli_query($conn, "SELECT valor FROM TBL_PARAMETROS WHERE Parametro='Minutos_Vigencia_Token'");
$parametrosResult = mysqli_fetch_array($queryParametros, 1);
//MINUTOS DE VIGENCIA=================================================
$vigencia = $parametrosResult['valor'];

$Fecha_final = date('Y-m-d H:i:s', strtotime($date . ' + ' . $vigencia . ' minute'));

$sql = "DELETE FROM tbl_token WHERE Id_usuario = $idusuario";
mysqli_query($conn, $sql);


$queryregistro = "INSERT INTO tbl_token (Token,Id_usuario,Fecha_inicio,Fecha_final) 
                   values ('$token','$idusuario','$date','$Fecha_final')";
mysqli_query($conn, $queryregistro);

$queryusuario     = mysqli_query($conn, "SELECT * FROM TBL_USUARIO WHERE Correo_Electronico = '$correo'");
$nr             = mysqli_num_rows($queryusuario);
if ($nr == 1) {
    $mostrar        = mysqli_fetch_array($queryusuario);

    //$enviarpass 	= $mostrar['pass'];

    $paracorreo         = $correo;
    $titulo                = "Recuperar contraseña";
    //$mensaje			= $enviarpass;

    if ($paracorreo = $correo) {
        echo "<script> alert('Correo Verificado') </script>";
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
    $mail->setFrom($CorreoS, 'Inversion');
    $mail->addAddress($correo);     //Add a recipient
    $mail->addCC('cc@example.com');


    //Attachments
    //Attachments

    //Content
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';                                 //Set email format to HTML
    $mail->Subject = 'Sistema de Recuperacion de Constraseña';
    $mail->Body    = '
    <!DOCTYPE html
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
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#3d5ca3;width:600px"
                                    cellspacing="0" cellpadding="0" bgcolor="#3d5ca3" align="center">
                                    <tr style="border-collapse:collapse">
                                        <td style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#3d5ca3"
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
                                                                <td align="center"
                                                                    style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0">
                                                                    <img src="https://apfxli.stripocdn.email/content/guids/CABINET_dd354a98a803b60e2f0411e893c82f56/images/23891556799905703.png"
                                                                        alt
                                                                        style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                                                        width="175">
                                                                </td>
                                                            </tr>
                                                            <tr style="border-collapse:collapse">
                                                                <td align="center"
                                                                    style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px">
                                                                    <h1
                                                                        style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#333333">
                                                                        <strong>
                                                                            <font style="vertical-align:inherit">
                                                                                <font style="vertical-align:inherit">
                                                                                    ¿Olvidó su contraseña? </font>
                                                                            </font>
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
                                                                            <font style="vertical-align:inherit">
                                                                                Estimado/a recibió este correo
                                                                                electrónico en respuesta a su solicitud
                                                                                para restablecer su contraseña para el
                                                                                usuario ' . $usuario . '</font>
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
                                                                            <font style="vertical-align:inherit">Haga
                                                                                clic en el botón que a continuación se
                                                                                le presenta para restablecer su
                                                                                contraseña, el enlace para restablecer
                                                                                la contraseña solo es válido durante ' .
                                                                                $vigencia . ' minutos </font>
                                                                        </font>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr style="border-collapse:collapse">
                                                                <td align="center"
                                                                    style="Margin:0;padding-left:10px;padding-right:10px;padding-top:40px;padding-bottom:40px">
                                                                    <span class="es-button-border"
                                                                        style="border-style:solid;border-color:#3D5CA3;background:#FFFFFF;border-width:2px;display:inline-block;border-radius:10px;width:auto"><a
                                                                            href="http://localhost/inversionesfinancieras/HTML/contratemp.php?token=' . $token . '"
                                                                            class="es-button" target="_blank"
                                                                            style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#3D5CA3;font-size:14px;border-style:solid;border-color:#FFFFFF;border-width:15px 20px 15px 20px;display:inline-block;background:#FFFFFF;border-radius:10px;font-family:arial, helvetica, sans-serif;font-weight:bold;font-style:normal;line-height:17px;width:auto;text-align:center">
                                                                            <font style="vertical-align:inherit">
                                                                                <font style="vertical-align:inherit">
                                                                                    Cambiar Contraseña</font>
                                                                            </font>
                                                                        </a></span>
                                                                </td>
                                                            </tr>

                                                            <table class="es-header-body"
                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#3d5ca3;width:600px"
                                                                cellspacing="0" cellpadding="0" bgcolor="#3d5ca3"
                                                                align="center">
                                                                <tr style="border-collapse:collapse">
                                                                    <td style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#3d5ca3"
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
    $mail->AltBody = "";
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
echo ("Location: OlvidoContra.html");
?>