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
    if ($_SESSION['permisos'][M_INVENTARIOS]['r'] == 0 or !isset($_SESSION['permisos'][M_INVENTARIOS]['r'])) {
        header("Location: ../index.php");
        die();
    }

    if (empty($_REQUEST['id_product2'])) {
        header("location: Gestion_Inventario.php");
        die();
    } else {


        $id_product2 = $_REQUEST['id_product2'];
    }
}

$numero = 99999.99;
?>

<?php include 'barralateralinicial.php'; ?><p></p>


<!DOCTYPE html>
<html lang="en">
<title>Gestión Inventario</title>

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
                    <h2><strong>Gestión Inventario</strong> </h2>

                    <a class="btn btn-primary" href="../index.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
                    <?php if ($_SESSION['permisos'][M_INVENTARIOS] and $_SESSION['permisos'][M_INVENTARIOS]['w'] == 1) {

                    ?>
                       <a class="btn btn-secondary" href="reporte_excel_kardex.php"><i class="fa fa-check" aria-hidden="true"></i> Revisar Kardex</a>
                        <a href="Nuevo_Inventario.php" input type="submit" class="btn btn-success" Value="Nuevo Producto"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Producto</a>
                    
                        <?php } ?>

                    <a class="btn btn-warning" href="Reporte_Inventario.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte</a>´
                    <a class="btn btn-success" href="reporte_excel_inventario.php"> Reporte excel</a>
                </div>



                <?php
                $mostrar_datos = 0;

                ?>

                <form action="" method="get" class="form_datos">
                    <label for="datos_mostrar">Datos A mostrar</label>
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
                <form action="Buscador_Inventario.php" method="get" class="form_search">
                  
                    <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" size=40>
                    <input type="submit" value="Buscar" class="btn btn-primary">
                </form>

                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>
                                <center> Id </center>
                            </th>
                            <th>
                                <center> Producto </center>
                            </th>
                            <th>
                                <center> Cantidad </center>
                            </th>
                            <th>
                                <center> Fecha </center>
                            </th>
                    
                            <th colspan="3">
                                <center> Acciones </center>
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Paginador
                        $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM product WHERE id_product = id_product");
                        $result_register = mysqli_fetch_array($sql_registe);
                        $total_registro = $result_register['total_registro'];

                        if ($mostrar_datos > 0) {
                            $por_pagina = $mostrar_datos;
                        } else {
                            $por_pagina = 10;
                        }

                        if (empty($_GET['pagina'])) {
                            $pagina = 1;
                        } else {
                            $pagina = $_GET['pagina'];
                        }

                        $desde = ($pagina - 1) * $por_pagina;
                        $total_paginas = ceil($total_registro / $por_pagina);
                        $sql = mysqli_query($conn, "select * FROM product ORDER BY time DESC LIMIT $desde,$por_pagina ");
                        mysqli_close($conn);

                        $result = mysqli_num_rows($sql);
                        if ($result > 0) {
                            while ($row = mysqli_fetch_array($sql)) {

 
                                $id_product = $row['id_product'];
                                $NFactura      = $row['NFactura'];
                                $Proveedor       = $row['Proveedor'];
                                $proname  = $row['proname'];
                                $amount     = $row['amount'];
                                $time = $row['time'];


                            $_SESSION['Id_Mauri'] = $id_product2;
                                
                           
            
            
            ?>
                                    <tr>
                                    <th>
                                                <center><?php echo  $id_product  ?></center>
                                            </th>
                                            <th>
                                                <center><?php echo  $proname ?></center>
                                            </th>
                                            <th>
                                                <center><?php echo  $amount   ?></center>
                                            </th>
                                            <th>
                                                <center><?php echo  $time ?></center>
                                            </th>
                                   
                                    <?php if ($_SESSION['permisos'][M_INVENTARIOS] and $_SESSION['permisos'][M_INVENTARIOS]['u'] == 1) {

?>
    <th><a href="../Compras/Salida1.php?Id=<?php echo $row['id_product'] ?>" class="btn btn-primary btn-xs">Retirar</a></th>
    <?php } ?>
    <script>
        function alerta() {
            window.alert('No es posible hacer esta Accion');
        }
    </script>
    <?php if ($_SESSION['permisos'][M_INVENTARIOS] and $_SESSION['permisos'][M_INVENTARIOS]['d'] == 1) {

    ?>
    <th>
        <a type="button" class="btn btn-danger btn-xs" onclick="alerta()">Eliminar</a>
    </th>

    <th><center> <a href="Gestion_Inventario2.php?id_product2=<?php echo $id_product ?>" class="btn btn-success btn-xs"> <i class="fa fa-eye" aria-hidden="true"></i> </a> </center> </th>

<?php } ?>
</tr>


    


                                    <form method="post" action="Gestion_Inventario.php" name="miformulario">
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

                            <center>
                                <h3><strong> Información del producto</strong></h3>
                            </center>

                            <hr>

                            <div class="modal-body">
                                <form>
                                    <?php
                                    include("../conexion.php");
                                    $poll = $_SESSION['Id_Mauri'];

                                    $query = mysqli_query($conn,"select * from product WHERE ( id_product LIKE '%$poll%' OR
                                    proname LIKE '%$poll%') ");
                                    $nr = mysqli_num_rows($query);
                                    while ($row = mysqli_fetch_array($query)) {


                                $id_product                = $row['id_product'];
                                $NFactura                  = $row['NFactura'];
                                $Proveedor                = $row['Proveedor'];
                                $proname                   = $row['proname'];
                                $amount                    = $row['amount'];
                                $time                      = $row['time'];

                                    ?>

                                        <div class="row">

                                            <div class="col-xs-14 pull-right">

                                                <table class="table">

                                                    <thead class="table-primary">
                                                        <tr>

                                                            <th>
                                                                <center>id producto</center>
                                                            </th>


                                                            <th>
                                                                <center>Número de factura</center>
                                                            </th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <tr>

                                                            <td style="width: 50%">

                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                                    <input type="text" class="form-control" Readonly id="recipient-name" value="  <?php echo $id_product ?>">

                                                                </div>

                                                            </td>



                                                            <td style="width: 50%">

                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                                    <input type="text" class="form-control" Readonly id="recipient-name" value="  <?php echo $NFactura ?>">

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
                                                                <center>Proveedor</center>
                                                            </th>


                                                            <th>
                                                                <center>Nombre</center>
                                                            </th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <tr>

                                                            <td style="width: 55%">

                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span>
                                                                    <input type="text" class="form-control" Readonly id="recipient-name" value=" <?php echo  $Proveedor ?> ">

                                                                </div>

                                                            </td>

                                                            <td style="width: 45%">

                                                                <div class="input-group">

                                                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                                                    <input type="text" class="form-control" Readonly id="recipient-name" value=" <?php echo $proname ?> ">
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
                                                                <center>Cantidad</center>
                                                            </th>


                                                            <th>
                                                                <center>Fecha</center>
                                                            </th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <tr>

                                                            <td style="width: 45%">

                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                    <input type="text" class="form-control" Readonly id="recipient-name" value=" <?php echo $amount ?> ">

                                                                </div>

                                                            </td>

                                                            <td style="width: 55%">

                                                                <div class="input-group">

                                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                    <input type="text" class="form-control" Readonly id="recipient-name" value=" <?php echo $time ?> ">

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


                                    <center><button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-close" aria-hidden="true"></i> Cerrar</button></Center>


                                </form>

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
</section>

</div>
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

    .form_search .btn_search {
        background: #1faac8;
        color: #FFF;
        padding: 0 20px;
        border: 0;
        cursor: pointer;
        margin-left: 10px;
    }
</style>
<?php include 'barralateralfinal.php'; ?><?php
