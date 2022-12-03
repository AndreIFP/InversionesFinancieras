<?php
include("../conexion.php");
session_start();
?>
<?php include 'barralateralinicial.php'; ?><p></p>
<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 12px; ">
    <title>Gestión Usuarios</title>
    <div class="container-fluid">
        <div class="box-body table-responsive">
            <?php
            $busqueda = strtolower($_REQUEST['busqueda']);
            if (empty($busqueda)) {
                echo "<script> alert('Dejo En Blanco El Buscador');window.location= 'Gestion_Usuarios.php' </script>";
            }
            ?>
            <h2><strong> Gestión Usuarios</strong></h2>
        <form action="reporte_excel_buscador_usuarios.php" method="get">
                    <a  class="btn btn-primary"  href="Gestion_Usuarios.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
                    <a class="btn btn-warning" href="Reporte_Usuario_Buscador.php?variable=<?php echo $busqueda;?>
                    " onclick="window.open(this.href,this.target, 'width=1000,height=600');return false;" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte</a>
                    <input type="hidden" name="busqueda_filtro" id="busqueda_filtro" value="<?php echo $busqueda ?>">
                    <input type="submit" value=" Reporte Excel" class="btn btn-success" download="Mi_Excel" >
                    </form>

<hr>
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th><center>Id</center></th>
                        <th><center>Usuario</center></th>
                        <th><center>Nombre Usuario</center></th>
                        <th><center>Estado</center></th>
                        <th><center>Correo Electrónico</center></th>
                        <th><center>Rol</center></th>
                        <th colspan="3"><center>Acciones</center></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Paginador
                    $rol = '';
                    if ($busqueda == 'administrador') {
                        $rol = " OR rol LIKE '%1%' ";
                    } else if ($busqueda == 'secretario') {

                        $rol = " OR rol LIKE '%2%' ";
                    } else if ($busqueda == 'seguridad') {

                        $rol = " OR rol LIKE '%3%' ";
                    } else if ($busqueda == 'nuevo') {

                        $rol = " OR rol LIKE '%4%' ";
                    }

                    $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM TBL_USUARIO
                                            WHERE ( Id_Usuario LIKE '%$busqueda%' OR 
                                                    Usuario LIKE '%$busqueda%' OR
                                                    Nombre_Usuario LIKE '%$busqueda%' OR
                                                    Estado_Usuario LIKE '%$busqueda%'
                                                    $rol  )");
                    $result_register = mysqli_fetch_array($sql_registe);
                    $total_registro = $result_register['total_registro'];

                    $por_pagina = 20;

                    if (empty($_GET['pagina'])) {
                        $pagina = 1;
                    } else {
                        $pagina = $_GET['pagina'];
                    }

                    $desde = ($pagina - 1) * $por_pagina;
                    $total_paginas = ceil($total_registro / $por_pagina);
                    $sql = mysqli_query($conn, "SELECT u.Id_Usuario, u.Usuario, u.Nombre_Usuario, u.Estado_Usuario, u.Correo_Electronico, r.Rol from TBL_USUARIO u inner join TBL_ROLES r ON u.Rol = r.Id_Rol 
                                                                        WHERE ( u.Id_Usuario LIKE '%$busqueda%' OR 
                                                                                u.Usuario LIKE '%$busqueda%' OR
                                                                                u.Nombre_Usuario LIKE '%$busqueda%' OR
                                                                                u.Estado_Usuario LIKE '%$busqueda%' OR
                                                                                r.rol LIKE '%$busqueda%') ORDER BY u.Id_Usuario DESC LIMIT $desde,$por_pagina ");
                    mysqli_close($conn);

                    $result = mysqli_num_rows($sql);
                    if ($result > 0) {
                        while ($row = mysqli_fetch_array($sql)) {

                    ?>
                            <tr>
                                
                                <th><center><?php echo $row['Id_Usuario'] ?></center></th>
                                <th><center><?php echo $row['Usuario'] ?></center></th>
                                <th><center><?php echo $row['Nombre_Usuario'] ?></center></th>
                                <th><center><?php echo $row['Estado_Usuario'] ?></center></th>
                                <th><center><?php echo $row['Correo_Electronico'] ?></center></th>
                                <th><center><?php echo $row['Rol'] ?></center></th>
                                <?php if ($_SESSION['permisos'][M_GESTION_USUARIOS] and $_SESSION['permisos'][M_GESTION_USUARIOS]['u'] == 1) {

                                ?>
                                    <th>
                                        <center><a href="Actualizar_Usuario.php?Id=<?php echo $row['Id_Usuario'] ?>" class="btn btn-primary btn-xs"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> </center>
                                    </th>
                                <?php } ?>

                                <th>
                                    <center> <a href="Gestion_Usuarios2.php?Id_Usuario2=<?php echo $row['Id_Usuario']?>" class="btn btn-success btn-xs"> <i class="fa fa-eye" aria-hidden="true"></i> </a> </center>
                                </th>

                            </tr>
                    <?php
                        }
                    } else {
                        echo "<script> alert('No se encontro registros');window.location= 'Gestion_Usuarios.php' </script>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        if ($total_registro != 0) {
        ?>
            <div class="paginador">
                <ul>
                    <?php
                    if ($pagina != 1) {
                    ?>
                        <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>">|<</a>
                        </li>
                        <li><a href="?pagina=<?php echo $pagina - 1; ?>&busqueda=<?php echo $busqueda; ?>">
                                <<</a>
                        </li>
                    <?php
                    }
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        # code...
                        if ($i == $pagina) {
                            echo '<li class="pageSelected">' . $i . '</li>';
                        } else {
                            echo '<li><a href="?pagina=' . $i . '&busqueda=' . $busqueda . '">' . $i . '</a></li>';
                        }
                    }

                    if ($pagina != $total_paginas) {
                    ?>
                        <li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo $busqueda; ?>">>></a></li>
                        <li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?> ">>|</a></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>


    </div>
</section>
</div>
</body>
<style type="text/css">
    /*============ Paginador =============*/
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
</style>
</section>
<?php include 'barralateralfinal.php'; ?>
