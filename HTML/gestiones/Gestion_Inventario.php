<?php
include("../conexion.php");
session_start();
//incluir las funciones de helpers
include_once("../helpers/helpers.php");

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
}




?>
<?php include 'barralateralinicial.php'; ?>
<p></p>
<title>Gestión Inventario</title>
<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 12px; ">


    <h2><strong>Gestión Inventario</strong> </h2>
    <div class="box-body table-responsive">
    <div class="reportes">
        <a class="btn btn-primary" href="../index.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
        <?php if ($_SESSION['permisos'][M_INVENTARIOS] and $_SESSION['permisos'][M_INVENTARIOS]['w'] == 1) {
        ?>
            <a class="btn btn-secondary" href="kardex.php"><i class="fa fa-check" aria-hidden="true"></i> Revisar Kardex</a>
            <a href="../compras/compra.php"input type="submit" class="btn btn-success" Value="Nuevo Producto"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Producto</a>
            
            <?php } ?>
            
            <a class="btn btn-warning" href="Reporte_Inventario.php" onclick="window.open(this.href,this.target, 'width=1000,height=600');return false;"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte</a>
            <p>
            <?php
            $mostrar_datos = 0;
            ?>
    </div>


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
    <form action="Buscador_Inventario.php" method="get" class="form_search">

        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" size=40>
        <input type="submit" value="Buscar" class="btn btn-primary">
    </form>
    <table class="table ">
        <thead class="table-primary">
            <tr>
                <th>Id</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Acciones</th>
                <th> </th>

            </tr>
        </thead>
        <tbody>
            <?php
            //Paginador
            $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM product WHERE id_product= id_product");
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
            ?>
                    <tr>
                        <th><?php echo $row['id_product'] ?></th>
                        <th><?php echo $row['proname'] ?></th>
                        <th><?php echo $row['amount'] ?></th>
                        <th><?php echo $row['time'] ?></th>

                        <?php if ($_SESSION['permisos'][M_INVENTARIOS] and $_SESSION['permisos'][M_INVENTARIOS]['u'] == 1) {

                        ?>
                            <th><a href="../Compras/salida.php?Id=<?php echo $row['id_product'] ?>" class="btn btn-primary btn-xs">Retirar</a></th>
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
                        <?php } ?>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
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