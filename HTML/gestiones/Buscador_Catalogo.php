<?php
include("../conexion.php");
session_start();
?>
<?php include 'barralateralinicial.php'; ?>
<p></p>
<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 12px; ">

    <div class="container-fluid">
        <title>Gestión Catalogo Cuentas</title>
        <div class="col-md-12">
            <?php
            $busqueda = strtolower($_REQUEST['busqueda']);
            if (empty($busqueda)) {
                echo "<script> alert('Dejo En Blanco El Buscador');window.location= 'Gestion_CatalogoCuenta.php' </script>";
            }
            ?>
            <h2><strong> Gestión Catalogo Cuentas</strong></h2>
            <div class="box-body table-responsive">
                
              <form action="reporte_excel_buscador_catalago.php" method="get" >
              <a class="btn btn-primary" href="Gestion_CatalogoCuenta.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
                <a class="btn btn-warning" href="Reporte_Catalogo_Buscador.php?variable=<?php echo $busqueda; ?>  " onclick="window.open(this.href,this.target, 'width=1000,height=600');return false;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte</a>
                    <input type="hidden" name="busqueda_filtro" id="busqueda_filtro" value="<?php echo $busqueda ?>">
                     <input type="submit" value=" Reporte Excel" class="btn btn-warning " download="Mi_Excel" >
                   
                </form>
                
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th><center>Código</center></th>
                            <th><center>Cuenta</center></th>
                            <th><center>Estado Cuenta</center></th>
                            <th><center>Acciones</center></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Paginador
                        $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM TBL_CATALAGO_CUENTAS 
                                            WHERE ( CODIGO_CUENTA LIKE '%$busqueda%' OR
                                                    CUENTA LIKE '%$busqueda%' OR 
                                                    Estado_Cuenta  LIKE '%$busqueda%')");
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
                        $sql = mysqli_query($conn, "SELECT * FROM TBL_CATALAGO_CUENTAS WHERE ( CODIGO_CUENTA LIKE '%$busqueda%' OR
                                                                        CUENTA  LIKE '%$busqueda%'  OR Estado_Cuenta  LIKE '%$busqueda%') LIMIT $desde,$por_pagina ");
                        mysqli_close($conn);

                        $result = mysqli_num_rows($sql);
                        if ($result > 0) {
                            while ($row = mysqli_fetch_array($sql)) {
                        ?>
                                <tr>
                                    <th><center><?php echo $row['CODIGO_CUENTA'] ?></center></th>
                                    <th><center><?php echo $row['CUENTA'] ?></center></th>
                                    <th><center><?php echo $row['Estado_Cuenta'] ?></center></th>
                                    <?php if ($_SESSION['permisos'][M_GESTION_CAT_CUENTA] and $_SESSION['permisos'][M_GESTION_CAT_CUENTA]['u'] == 1) {

                                    ?>
                                        <th>
                                            <center><a href="Actualizar_Catalogo.php?Id=<?php echo $row['CODIGO_CUENTA'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a></center>
                                        </th>
                                    <?php } ?>
                                    <p>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<script> alert('No se encontro registros');window.location= 'Gestion_CatalogoCuenta.php' </script>";
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
                            <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>">|<< /a>
                            </li>
                            <li><a href="?pagina=<?php echo $pagina - 1; ?>&busqueda=<?php echo $busqueda; ?>">
                                    <<< /a>
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
    .form_busqueda {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        float: right;
        background: initial;
        padding: 0px;
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
<?php include 'barralateralfinal.php'; ?>
