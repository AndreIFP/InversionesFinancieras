<?php
include("../conexion.php");

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
    if ($_SESSION['permisos'][M_GESTION_CLIENTE]['r'] == 0 or !isset($_SESSION['permisos'][M_GESTION_CLIENTE]['r'])) {
        header("Location: ../index.php");
        die();
    }

    if (empty($_REQUEST['Id_Cliente2'])) {
        header("location: Gestion_Clientes_Inact.php");
        die();
    } else {
        $Id_Usuario2 = $_REQUEST['Id_Cliente2'];
    }
}

$numero = 99999.99;
?>

<?php include 'barralateralinicial.php'; ?><p></p>


<!DOCTYPE html>
<html lang="en">
<title>Gestión Clientes</title>

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
</head>
<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 12px; ">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="box-body table-responsive">
                <div class="reportes">
                    <h2><strong>Gestión Clientes</strong> </h2>

                    <a class="btn btn-primary" href="Gestion_Clientes.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
                    <a class="btn btn-warning" href="Reporte_Cliente_Inact.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte</a>
                    <a class="btn btn-success" href="reporte_excel_clientes_inac.php"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Reporte excel</a>
                </div>

            <?php
            $mostrar_datos = 0;
            $Id_Cliente2 = $_REQUEST['Id_Cliente2'];
            ?>
            <form action="" method="get" class="form_datos">
                <label for="datos_mostrar">Datos A Mostrarㅤ</label>
                <select name="mostrar" onchange='submit();'>
                    <option></option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <?php
                    $mostrar_datos = $_GET['mostrar'];
                    ?>
                </select>
            </form>

            <table class="table ">
                <thead class="table-primary">
                    <tr>
                        <th>
                            <center>Id</center>
                        </th>
                        <th>
                            <center>Nombre Empresa</center>
                        </th>
                        <th>
                            <center>Representante Legal</center>
                        </th>
                        <th>
                            <center>RTN</center>
                        </th>
                        <th>
                            <center>Estado</center>
                        </th>
                        <th colspan="3">
                            <center>Acciones</center>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Paginador
                    $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM TBL_CLIENTES WHERE Id_Cliente = Id_Cliente AND Tipo_Cliente = 'Inactivo' ");
                    $result_register = mysqli_fetch_array($sql_registe);
                    $total_registro = $result_register['total_registro'];

                    if ($mostrar_datos > 0) {
                        $por_pagina = $mostrar_datos;
                    } else {
                        $por_pagina = 3;
                    }

                    if (empty($_GET['pagina'])) {
                        $pagina = 1;
                    } else {
                        $pagina = $_GET['pagina'];
                    }

                    $desde = ($pagina - 1) * $por_pagina;
                    $total_paginas = ceil($total_registro / $por_pagina);
                    $sql = mysqli_query($conn, "select * FROM TBL_CLIENTES WHERE Tipo_Cliente = 'Inactivo' ORDER BY Fecha_Dato DESC LIMIT $desde,$por_pagina ");
                    mysqli_close($conn);

                    $result = mysqli_num_rows($sql);
                    if ($result > 0) {
                        while ($row = mysqli_fetch_array($sql)) {

                            $Id_Cliente   = $row['Id_Cliente'];
                            $Nombree      = $row['Nombre_Empresa'];
                            $Nombre       = $row['Nombre_Cliente'];
                            $RTN_Cliente  = $row['RTN_Cliente'];
                            $Direccion    = $row['Direccion'];
                            $Telefono     = $row['Telefono'];
                            $Tipo_Cliente = $row['Tipo_Cliente'];


                            $_SESSION['Id_Mauri'] = $Id_Cliente2;
                    ?>
                            <tr>
                                <th>
                                    <center><?php echo  $Id_Cliente  ?></center>
                                </th>
                                <th>
                                    <center><?php echo  $Nombree ?></center>
                                </th>
                                <th>
                                    <center><?php echo  $Nombre   ?></center>
                                </th>
                                <th>
                                    <center><?php echo  $RTN_Cliente ?></center>
                                </th>
                                <th>
                                    <center><?php echo $Tipo_Cliente ?></center>
                                </th>

                                <?php if ($_SESSION['permisos'][M_GESTION_CLIENTE] and $_SESSION['permisos'][M_GESTION_CLIENTE]['u'] == 1) {
                                ?>
                                    <th>
                                        <center><a href="Actualizar_Cliente.php?Id=<?php echo $Id_Cliente ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> </a></a></center>
                                    </th>
                                <?php } ?>

                                <?php if ($_SESSION['permisos'][M_GESTION_CLIENTE] and $_SESSION['permisos'][M_GESTION_CLIENTE]['d'] == 1) {
                                ?>
                                    <th>
                                        <center><a href="Delete_Cliente.php?Id=<?php echo $Id_Cliente ?>" class="btn btn-danger btn-xs"><i class="fa fa-close" aria-hidden="true"></i> </a></a></center>
                                    </th>

                                <?php } ?>

                                <th>
                                    <center><a href="Gestion_Clientes2_Inac.php?Id_Cliente2=<?php echo $Id_Cliente ?>" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> </a></a></center>
                                </th>
                                <form method="post" action="Gestion_Clientes_Inact.php" name="miformulario">
                                    <script>
                                        window.onload = function() {
                                            // Una vez cargada la página, el formulario se enviara automáticamente.
                                            var ModalEdit = new bootstrap.Modal(EditModal, {}).show();
                                            var $pop = este;
                                        }
                                    </script>
                                </form>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <script>
                function editar(este) {
                    var ModalEdit = new bootstrap.Modal(EditModal, {}).show();
                    var $pop = este;

                }
            </script>

            <div class="modal" tabindex="-1" id="EditModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h3><strong> Información del Cliente</strong></h3>
                            </center>

                        </div>
                        <div class="modal-body">
                            <form>
                                <?php
                                include("../conexion.php");
                                $poll = $_SESSION['Id_Mauri'];
                                $query = mysqli_query($conn, "SELECT * FROM TBL_CLIENTES WHERE Id_Cliente = '$poll' AND Tipo_Cliente = 'Inactivo' ");
                                $nr = mysqli_num_rows($query);
                                while ($row = mysqli_fetch_array($query)) {
                                    $Id_Cliente   = $row['Id_Cliente'];
                                    $Nombree      = $row['Nombre_Empresa'];
                                    $Nombre       = $row['Nombre_Cliente'];
                                    $RTN_Cliente  = $row['RTN_Cliente'];
                                    $Direccion    = $row['Direccion'];
                                    $Telefono     = $row['Telefono'];
                                    $Tipo_Cliente = $row['Tipo_Cliente'];
                                    $Ciudad       = $row['Ciudad'];
                                ?>

                                    <div class="row">

                                        <div class="col-xs-14 pull-right">

                                            <table class="table">

                                                <thead class="table-primary">
                                                    <tr>

                                                        <th>
                                                            <center>Id Cliente</center>
                                                        </th>


                                                        <th>
                                                            <center>Nombre de la empresa</center>
                                                        </th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr>

                                                        <td style="width: 30%">

                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                                <input type="text" class="form-control" id="recipient-name" readonly value="  <?php echo $Id_Cliente ?>">

                                                            </div>

                                                        </td>

                                                        <td style="width: 70%">

                                                            <div class="input-group">

                                                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                                                <input type="text" class="form-control" readonly id="recipient-name" value=" <?php echo $Nombree ?> ">

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
                                                            <center>Representante legal</center>
                                                        </th>


                                                        <th>
                                                            <center>RTN</center>
                                                        </th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr>

                                                        <td style="width: 55%">

                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                                <input type="text" class="form-control" Readonly id="recipient-name" value=" <?php echo  $Nombre ?> ">

                                                            </div>

                                                        </td>

                                                        <td style="width: 45%">

                                                            <div class="input-group">

                                                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                                                <input type="text" class="form-control" Readonly id="recipient-name" value=" <?php echo $RTN_Cliente ?> ">
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
                                                            <center>Teléfono</center>
                                                        </th>


                                                        <th>
                                                            <center>Estado</center>
                                                        </th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr>

                                                        <td style="width: 50%">

                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                <input type="text" class="form-control" Readonly id="recipient-name" value=" <?php echo $Telefono ?> ">

                                                            </div>

                                                        </td>

                                                        <td style="width: 50%">

                                                            <div class="input-group">

                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" class="form-control" Readonly id="recipient-name" value=" <?php echo $Tipo_Cliente ?> ">

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
                                                            <center>Dirección</center>
                                                        </th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr>

                                                        <td style="width: 100%">

                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                                <input type="text" class="form-control" Readonly id="recipient-name" value=" <?php echo $Direccion ?> ">

                                                            </div>

                                                        </td>


                                                    </tr>

                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                <?php
                                }
                                ?>


                        </div>
                        <center><button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> </a> Cerrar</button></center>
                        <hr>
                    </div>
                </div>
            </div>

            </div>
            <div class="paginador">
                <ul>
                    <?php
                    if ($pagina != 1) {
                    ?>
                        <li><a href="?pagina=<?php echo 1; ?>">|<< /a>
                        </li>
                        <li><a href="?pagina=<?php echo $pagina - 1; ?>">
                                <<< /a>
                        </li>
                    <?php
                    }
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        # code...
                        if ($i == $pagina) {
                            echo '<li class="pageSelected">' . $i . '</li>';
                        } else {
                            echo '<li><a href="?pagina=' . $i . '">' . $i . '</a></li>';
                        }
                    }

                    if ($pagina != $total_paginas) {
                    ?>
                        <li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
                        <li><a href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>


    </div>



</section>

</body>

<style type="text/css">
    .paginador ul {
        padding: 15px;
        list-style: none;
        background: #FFF;
        margin-top: 15px;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: flex-end;
    }

    .paginador a,
    .pageSelected {
        color: #428bca;
        border: 1px solid #ddd;
        padding: 5px;
        display: inline-block;
        font-size: 14px;
        text-align: center;
        width: 35px;
    }

    .paginador a:hover {
        background: #ddd;
    }

    .pageSelected {
        color: #FFF;
        background: #428bca;
        border: 1px solid #428bca;
    }

    /*============ Buscador ============*/
    .form_search {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        float: right;
        background: initial;
        padding: 10px;
        border-radius: 10px;
    }

    .form_search .btn_search {
        background: #1faac8;
        color: #FFF;
        padding: 0 20px;
        border: 0;
        cursor: pointer;
        margin-left: 10px;
    }

    .form_datos {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        float: left;
        background: initial;
        padding: 10px;
        border-radius: 10px;
    }
</style>

<?php include 'barralateralfinal.php'; ?>