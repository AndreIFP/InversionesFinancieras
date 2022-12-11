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

Programa:          Validaciontemp
Fecha:             16-jul-2022
Programador:       David
descripcion:       Gestion

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Luis	          01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
David		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara 	          01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Andrés		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php
date_default_timezone_set("America/Tegucigalpa");
include('conexion.php');

$tok = $_POST['txtcont'];
$contra1 = $_POST['txtcontra'];
$contra2 = $_POST['txtpassword'];
//$usuario = $_POST['txtidususario'];

$queryToken=mysqli_query($conn,"SELECT * FROM tbl_token WHERE Token = '$tok'");
$tokenResult = mysqli_fetch_array($queryToken,1);

//fecha actual
$date = date('Y-m-d H:i:s');
$fechaFinal=$tokenResult['Fecha_final'];

/* $ext = $conn->query($sql);
$fila = $ext->fetch_array(MYSQLI_NUM); */
$valor = $tokenResult['Token'];
$id_user = $tokenResult['Id_Usuario'];

if($tok == $valor){
    if ($date < $fechaFinal ) {      
    if($contra1 == $contra2){
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

 $dato = $contra2;
 //Encripta informaciÃ³n:
	$dato_encriptado = $encriptar($dato);
        /*$sql1 = "SELECT Id_Usuario FROM tbl_usuario WHERE Id_usuario = '$id_user'";
        $ext = $conn->query($sql);
        $fila = $ext->fetch_array(MYSQLI_NUM);
        $id_user = $fila[0];*/
        
        $sql2 = "UPDATE tbl_usuario SET Contraseña='$dato_encriptado' WHERE Id_Usuario='$id_user'";
        $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
        $exito = mysqli_query($con,$sql2);

        $sql3 = "DELETE FROM tbl_token WHERE Token = '$tok'";
        $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
        $exito = mysqli_query($con,$sql3);
       echo "<script> alert('SU CONTRASEÑA HA SIDO ACTUALIZADA EXITOSAMENTE');window.location= 'Login.php' </script>";
    }else{
        echo "<script> alert('LAS CONTRASEÑAS NO COINCIDEN');window.location= 'Contratemp.php?token=".$tok."' </script>";  
    }

    
}else{
    echo "<script> alert('TOKEN EXPIRADO, INGRESE UN TOKEN VALIDO');window.location= 'Contratemp.php?token=".$tok."' </script>";
}
}else{
    echo "<script> alert('TOKEN INCORRECTO, PORFAVOR INGRESE SU TOKEN NUEVAMENTE');window.location= 'Contratemp.php?token=".$tok."' </script>";
}

?>