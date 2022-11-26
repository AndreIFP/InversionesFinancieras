<?php
include("conexion.php");

//incluir las funciones de helpers
include_once("helpers/helpers.php");

//iniciar las sesiones
session_start();
// si no existe la variable rol, el usuario no esta logueado y redirige al Login
if (!isset($_SESSION['rol'])) {
    header("Location: login.php");
    die();
} else {
    //actualiza los permisos
    updatePermisos2($_SESSION['rol']);

    //si no tiene permiso de visualización redirige al index
    if ($_SESSION['permisos'][M_BACKUP]['r'] == 0 or !isset($_SESSION['permisos'][M_BACKUP]['r'])) {
        header("Location: index.php");
        die();
    }
}
?>
<?php include 'barralateralinicial.php'; ?><p></p>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

<section style=" background-color:rgb(255, 255, 255);
padding: 15px;
color:black;
font-size: 12px; ">
    <title>Respaldo</title>
    <div class="container-fluid">
        <div class="box-body table-responsive">
            <a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>



            <?php
            include("Connet.php");
            ?>

            <body data-ng-app="validationApp">
                <div class="container-fluid" data-ng-controller="RegistrationController">


                    <data-uib-tabset data-active="activeJustified" data-justified="true">
                        <data-uib-tab data-heading="BACKUP" data-index="0">


                            <div class="main">
                                <header class="page-header">
                                    <div class="branding">
                                        <div class="row">

                                            <div class="col-6">
                                                <!--Mi TABLA-->
                                                <div class="card card-primary table-responsive">

                                                    <div class="card-body">

                                                        
                                                            <center><h3><strong>Respaldo base de datos</strong></h3></center>

                                                        
                                                        <table class="box-body">




                                                            <?php if ($_SESSION['permisos'][M_BACKUP] and $_SESSION['permisos'][M_BACKUP]['w'] == 1) {
                                                            ?><br>
                                                                <center><a href="./Backup.php"><button type="button" class="btn btn-success"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Realizar copia de seguridad</button></a></center>

                                                            <?php } ?>

                                                            <?php if ($_SESSION['permisos'][M_BACKUP] and $_SESSION['permisos'][M_BACKUP]['u'] == 1) {
                                                            ?>
                                                                <form action="./Restore.php" method="POST">
                                                                    <br> <br>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-6">
                                                <!--Mi TABLA-->
                                                <div class="card card-primary table-responsive">
                                                    <div class="card-body">
                                                        
                                                            <center><h3><strong>Restauración base de datos</strong></h3></center>
                                                        
                                                        <table class="box-body">


                                                            <select name="restorePoint" class="form-control">
                                                                <option value="" disabled="" selected="">Selecciona una fecha para restauración
                                                                </option>
                                                                <?php
                                                                $ruta = BACKUP_PATH;
                                                                if (is_dir($ruta)) {
                                                                    if ($aux = opendir($ruta)) {
                                                                        while (($archivo = readdir($aux)) !== false) {
                                                                            if ($archivo != "." && $archivo != "..") {
                                                                                $nombrearchivo = str_replace(".sql", "", $archivo);
                                                                                $nombrearchivo = str_replace("-", ":", $nombrearchivo);
                                                                                $ruta_completa = $ruta . $archivo;
                                                                                if (is_dir($ruta_completa)) {
                                                                                } else {
                                                                                    echo '<option value="' . $ruta_completa . '">' . $nombrearchivo . '</option>';
                                                                                }
                                                                            }
                                                                        }
                                                                        closedir($aux);
                                                                    }
                                                                } else {
                                                                    echo $ruta . " No es ruta válida";
                                                                }
                                                                ?>

                                                            </select>&nbsp; <br>

                                                         <center>   <button type="submit" class="btn btn-success" onclick="editar(this.id)"><i class="fa fa-cloud-download" aria-hidden="true"></i> Restaurar Base de Datos</button>
                                                         </center>

                                                            <div class="modal" tabindex="-1" id="EditModal">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <center>
                                                                                <h4 class="modal-title"><strong>Restauración de Base de Datos</strong></h4>
                                                                            </center>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <h5>Espere mientras se restaura la base de Datos..</h5>

                                                                            <script>
                                                                                function editar(este) {
                                                                                    var ModalEdit = new bootstrap.Modal(EditModal, {}).show();
                                                                                    variable.innerHTML = "El id es : " + este;
                                                                                }
                                                                            </script>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </form>


                                                        <?php } ?>
                                                        </table>

                                                    </div>

                                                </div>
                                                <br><br><br><br><br><br>
                                            </div>

                                        </div>
                                    </div>

                            </div>

            </body>

            <script src="/JS/bitacora.js"></script>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
            <script src="/JS/Menu.js"></script>
            </body>
            <?php include 'barralateralfinal.php'; ?>



        </div>
    </div>

</section>
</div>