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
}

$numero = 99999.99;
?>

<?php include 'barralateralinicial.php'; ?><p></p>
<?php 
                 $busqueda = strtolower($_REQUEST['busqueda']);
                 if(empty($busqueda))
                 {
                     header("location: Gestion_Cliente.php");
                     mysqli_close($conn);
                 }
                 $_SESSION['busquedaX'] = $busqueda;
             ?>

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

                    <a class="btn btn-primary" href="../index.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
                    <?php if ($_SESSION['permisos'][M_GESTION_CLIENTE] and $_SESSION['permisos'][M_GESTION_CLIENTE]['w'] == 1) {
                    ?>
                        
                        <?php } ?>
                        <a class="btn btn-warning" href="Reporte_Cliente_Buscador.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte</a>
                        <a class="btn btn-success" href="reporte_excel_buscador_clientes.php"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Reporte excel</a>
                        
                </div>

            <?php
            $mostrar_datos = 0;
            ?>
            <br>

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
                        $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM TBL_CLIENTES
                                            WHERE ( Nombre_Empresa LIKE '%$busqueda%' OR
                                                    Nombre_Cliente LIKE '%$busqueda%' )");
                        $result_register = mysqli_fetch_array($sql_registe);
                        $total_registro = $result_register['total_registro'];

                        $por_pagina = 10;

                        if (empty($_GET['pagina'])) {
                            $pagina = 1;
                        } else {
                            $pagina = $_GET['pagina'];
                        }

                        $desde = ($pagina - 1) * $por_pagina;
                        $total_paginas = ceil($total_registro / $por_pagina);
                        $sql = mysqli_query($conn, "select * from TBL_CLIENTES WHERE ( Nombre_Empresa LIKE '%$busqueda%' OR
                                                                                Nombre_Cliente LIKE '%$busqueda%' OR
                                                                                Id_Cliente LIKE '%$busqueda%'  OR
                                                                                Tipo_Cliente LIKE '%$busqueda%' OR
                                                                                RTN_Cliente LIKE '%$busqueda%') LIMIT $desde,$por_pagina ");
                        mysqli_close($conn);

                        $result = mysqli_num_rows($sql);
                        if ($result > 0) {
                            while ($row = mysqli_fetch_array($sql)) {

                            $_SESSION['Id_Mauri'] = $row['Id_Cliente'];;
                            $Nombree      = $row['Nombre_Empresa'];
                            $Nombre       = $row['Nombre_Cliente'];
                            $RTN_Cliente  = $row['RTN_Cliente'];
                            $Direccion    = $row['Direccion'];
                            $Telefono     = $row['Telefono'];
                            $Tipo_Cliente = $row['Tipo_Cliente'];
                            $Ciudad       = $row['Ciudad'];

                            $Id_Cliente = $_SESSION['Id_Mauri'];
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
                                    <center><a href="Buscador_Cliente2.php?Id_Cliente2=<?php echo $Id_Cliente ?>" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> </a></a></center>
                                </th>
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
                            <h3 class="modal-title">Información del cliente</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <?php
                                include("../conexion.php");
                                $poll = $_SESSION['Id_Mauri'];
                                $query = mysqli_query($conn, "SELECT * FROM TBL_CLIENTES WHERE Id_Cliente = '$poll' And Tipo_Cliente = 'Activo' ");
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

                                    <div class="form group">
                                        <label for="recipient-name" class="col-form-label">Id Cliente:</label>
                                        <input type="text" class="form-control" id="recipient-name" value="  <?php echo $Id_Cliente ?>">
                                    </div>

                                    <div class="form group">
                                        <label for="recipient-name" class="col-form-label">Nombre Empresa:</label>
                                        <input type="text" class="form-control" id="recipient-name" value=" <?php echo $Nombree ?> ">
                                    </div>


                                    <div class="form group">
                                        <label for="recipient-name" class="col-form-label">Nombre Cliente:</label>
                                        <input type="text" class="form-control" id="recipient-name" value=" <?php echo  $Nombre ?> ">
                                    </div>


                                    <div class="form group">
                                        <label for="recipient-name" class="col-form-label">RTN:</label>
                                        <input type="text" class="form-control" id="recipient-name" value=" <?php echo $RTN_Cliente ?> ">
                                    </div>


                                    <div class="form group">
                                        <label for="recipient-name" class="col-form-label">Direccion:</label>
                                        <input type="text" class="form-control" id="recipient-name" value=" <?php echo $Direccion ?> ">
                                    </div>


                                    <div class="form group">
                                        <label for="recipient-name" class="col-form-label">Telefono:</label>
                                        <input type="text" class="form-control" id="recipient-name" value=" <?php echo $Telefono ?> ">
                                    </div>


                                    <div class="form group">
                                        <label for="recipient-name" class="col-form-label">Estado:</label>
                                        <input type="text" class="form-control" id="recipient-name" value=" <?php echo $Tipo_Cliente ?> ">
                                    </div>

                                    <div class="form group">
                                        <label for="Ciudad">Ciudad</label>
                                        <input type="text" class="form-control" Readonly id="recipient-name" value="<?php echo $Ciudad ?> ">
                                    </div>

                                <?php
                                }
                                ?>

                                <p id="variable"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                        </div>
                    </div>
                </div>
            </div>

            </div>
            <div class="paginador">
                <ul>
                    <?php
                    if ($pagina != 1) {
                    ?>
                        <li><a href="?pagina=<?php echo 1; ?>">|<</a>
                        </li>
                        <li><a href="?pagina=<?php echo $pagina - 1; ?>">
                                <<</a>
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
