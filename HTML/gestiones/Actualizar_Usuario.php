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

Programa:          Actualizar_Usuario
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
include("../conexion.php");
if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['Nombre_Usuario'])) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
    } else {
        $Id_Usuario         = $_POST['Id_Usuario'];
        $Usuario            = $_POST['Usuario'];
        $Nombre_Usuario     = $_POST['Nombre_Usuario'];
        $Estado_Usuario     = $_POST['Estado_Usuario'];
        $contra             = $_POST['Contraseña'];
        $Correo_Electronico = $_POST['Correo_Electronico'];
        $Rol                = $_POST['Rol'];

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

         $dato = $contra ;
         //Encripta informaciÃ³n:
            $dato_encriptado = $encriptar($dato);
            $dato_desencriptado = $desencriptar( $dato_encriptado);

        if (!preg_match("/[a-zA-ZñÑáéíóúÁÉÍÓÚ ]/", $Nombre_Usuario)) {
            $alert = '<p class="msg_error"> El Nombre Solo Recibe Letras.</p>';
        } else {
            $sql = "UPDATE tbl_usuario SET Nombre_Usuario='$Nombre_Usuario',Estado_Usuario='$Estado_Usuario', Contraseña='$dato_encriptado', Correo_Electronico='$Correo_Electronico' ,Rol='$Rol' WHERE Id_Usuario='$Id_Usuario'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "<script> alert('Usuario: $Usuario Actualizado');window.location= 'Gestion_Usuarios.php' </script>";
            }
        }
    }
}
$Id = $_GET['Id'];
$sql = "SELECT u.Id_Usuario,u.Usuario, u.Nombre_Usuario, u.Estado_Usuario, u.Contraseña, u.Correo_Electronico, (u.Rol) as IdRol, (r.Rol) as Rol 
             FROM tbl_usuario u
             INNER JOIN tbl_roles r
             ON u.Rol = r.Id_Rol
             WHERE Id_Usuario='$Id'";
$query = mysqli_query($conn, $sql);

$result_sql = mysqli_num_rows($query);
if ($result_sql == 0) {
    header('location: Gestion_Usuarios.php');
} else {
    $option = '';
    while ($row = mysqli_fetch_array($query)) {
        $Id_Usuario         = $row['Id_Usuario'];
        $Usuario            = $row['Usuario'];
        $Nombre_Usuario     = $row['Nombre_Usuario'];
        $Estado_Usuario     = $row['Estado_Usuario'];
        $contra             = $row['Contraseña'];
        $Correo_Electronico = $row['Correo_Electronico'];
        $Id_Rol             = $row['IdRol'];
        $Rol                = $row['Rol'];
        if ($Id_Rol == 1) {
            $option = '<option value="' . $Id_Rol . '" select>' . $Rol . '</option>';
        } else if ($Id_Rol == 2) {
            $option = '<option value="' . $Id_Rol . '" select>' . $Rol . '</option>';
        } else if ($Id_Rol == 3) {
            $option = '<option value="' . $Id_Rol . '" select>' . $Rol . '</option>';
        } else if ($Id_Rol == 4) {
            $option = '<option value="' . $Id_Rol . '" select>' . $Rol . '</option>';
        }
    }
}
if (empty($_GET['Id'])) {
    header('location: Gestion_Usuarios.php');
}
?>
<?php


//incluir las funciones de helpers
include_once("../helpers/helpers.php");

//iniciar las sesiones
session_start();
// si no existe la variable rol, el usuario no esta logueado y redirige al Login
if (!isset($_SESSION['rol'])) {
    header("Location: ../login.php");
    die();
} else {
    //actualiza los permisos
    updatePermisos($_SESSION['rol']);

    //si no tiene permiso de visualización redirige al index
    if ($_SESSION['permisos'][M_GESTION_USUARIOS]['u'] == 0 or !isset($_SESSION['permisos'][M_GESTION_USUARIOS]['u'])) {
        header("Location: ../index.php");
        die();
    }
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

         $dato = '$contra ';
         //Encripta informaciÃ³n:
        
            $dato_desencriptado = $desencriptar( $contra);
?>


<?php include 'barralateralinicial.php'; ?>
<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 12px; ">

<title>Actualizar Usuario</title>
<a class="btn btn-primary" href="Gestion_Usuarios.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <hr>
<div clas="row ">

    <div class="box-header with-border">

        <div class="box-body">

            <form class="" method="post">
                <center>
                    <h2><strong> Modificar Usuario</strong></h2>
                </center>
                <hr>

                <div class="row">

                    <div class="col-xs-14 pull-right">

                        <table class="table">
                            <input type="hidden" name="Id_Usuario" value="<?php echo $Id_Usuario  ?>">
                            <thead class="table-primary">
                                <tr>

                                    <th>
                                        <center>Usuario</center>
                                    </th>


                                    <th>
                                        <center>Nombre de Usuario</center>
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                <tr>

                                    <td style="width: 50%">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" Class="form-control" name="Usuario" readonly="true" placeholder="Usuario" value="<?php echo $Usuario ?>" maxlength="10" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required size="30">

                                        </div>

                                    </td>

                                    <td style="width: 50%">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span>
                                            <input type="text" Class="form-control" name="Nombre_Usuario" placeholder="Nombre Usuario" value="<?php echo $Nombre_Usuario ?>" maxlength="40" style="text-transform:uppercase;" required size="30">

                                        </div>

                                    </td>

                                </tr>

                            </tbody>
                        </table>

                    </div>

                </div>

                <div class="row">

                    <div class="col-xs-14 pull-right">

                        <table class="table">
                            <thead class="table-primary">
                                <tr>

                                    <th>
                                        <center>Contraseña</center>
                                    </th>


                                    <th>
                                        <center>Estado del usuario</center>
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                <tr>

                                    <td style="width: 50%">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input id="inpucontracon" type="password" Class="form-control" name="Contraseña" placeholder="Contraseña" value="<?php echo $dato_desencriptado ?>" maxlength="200" required pattern="[A-Za-z0-9/@/`/!/#/$/%/^/~/&/*/_/-/=/+/|/;/:/'/,/./>/</?/¡/¿/]{8,30}" title="Letras Mayusculas y Minusculas , números. Incluir un caracter especial. Tamaño mínimo: 8. Tamaño máximo: 30. " />

                                        </div>

                                    </td>

                                    <td style="width: 50%">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <select name="Estado_Usuario" class="form-control notItemOne" required>
                                                <option value="<?php echo $Estado_Usuario ?>"><?php echo $Estado_Usuario?></option>
                                                <option value="ACTIVO">ACTIVO</option>
                                                <option value="INACTIVO">INACTIVO</option>
                                            </select>
                                        </div>

                                    </td>

                                </tr>

                            </tbody>
                        </table>

                    </div>

                </div>

                <div class="row">

                    <div class="col-xs-14 pull-right">

                        <table class="table">
                            <thead class="table-primary">
                                <tr>

                                    <th>
                                        <center>Correo</center>
                                    </th>

                                    <th>
                                        <center>Rol</center>
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                <tr>

                                    <td style="width: 50%">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" Class="form-control" name="Correo_Electronico" placeholder="Correo Electronico" value="<?php echo $Correo_Electronico ?>" maxlength="50" required size="30">

                                        </div>

                                    </td>

                                    <td style="width: 50%">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <?php
                                            include("../conexion.php");
                                            $query_rol = mysqli_query($conn, "SELECT * FROM tbl_roles WHERE Estado = 'ACTIVO'");
                                            mysqli_close($conn);
                                            $result_rol = mysqli_num_rows($query_rol);

                                            ?>
                                            <select name="Rol" id="Rol" class="form-control notItemOne">
                                                <?php
                                                echo $option;
                                                if ($result_rol > 0) {
                                                    while ($Rol = mysqli_fetch_array($query_rol)) {
                                                ?>
                                                        <option value="<?php echo $Rol["Id_Rol"]; ?>"><?php echo $Rol["Rol"] ?></option>
                                                <?php
                                                        # code...
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </td>

                                </tr>

                            </tbody>
                        </table>


                    </div>

                </div>

                <hr>
                <center><button type="submit" class="btn btn-primary btn-lg"> <i class="fa fa-eraser" aria-hidden="true"></i> Actualizar </button></center>
            </form>
        </div>
    </div>
</div>

</secction>
</div>


<style type="text/css">
    .btn-atras {
        background: #1faac8;
        color: #FFF;
        padding: 0 20px;
        border: 0;
        cursor: pointer;
        margin-left: 20px;
    }

    .form_actualizar {
        width: 450px;
        margin: auto;
    }

    .form_actualizar h1 {
        color: #3c93b0;
    }

    hr {
        border: 0;
        background: #CCC;
        height: 1px;
        margin: 10px 0;
        display: block;
    }

    form {
        background: #FFF;
        margin: auto;
        padding: 20px 50px;
        border: 1px solid #d1d1d1;
    }

    label {
        display: block;
        font-size: 12pt;
        font-family: 'GothamBook';
        margin: 15px auto 5px auto;
    }

    .btn_save {
        font-size: 12pt;
        background: #12a4c6;
        padding: 10px;
        color: #FFF;
        letter-spacing: 1px;
        border: 0;
        cursor: pointer;
        margin: 15px auto;
    }

    .notItemOne option:first-child {
        display: none;
    }

    .alert {
        width: 100%;
        background: #66e07d66;
        border-radius: 6px;
        margin: 20px auto;
    }

    .msg_error {
        color: #e65656;
    }

    .msg_save {
        color: #126e00;
    }

    .alert p {
        padding: 10px;
    }
</style>
<script>
    //validacion no espacios en contraseña
    var input = document.getElementById('inpucontracon');
    input.addEventListener('input', function() {
        this.value = this.value.trim();
    })
</script>
<?php include 'barralateralfinal.php'; ?>