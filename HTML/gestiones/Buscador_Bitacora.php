<?php
include("../conexion.php");
session_start();
?>
<?php include 'barralateralinicial.php'; ?><p></p>
<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 12px; ">
    <div class="container-fluid">
        <title>Gestion Bitacora</title>
      
            <div class="col-md-12">
                <?php
                $busqueda = strtolower($_REQUEST['busqueda']);
                if (empty($busqueda)) {
                    echo "<script> alert('Dejo En Blanco El Buscador');window.location= 'Gestion_Factura.php' </script>";
                }
                ?>
                <h2><strong>Gestion Bitacora</strong></h2>
                <div class="box-body table-responsive">
                               <form action="reporte_excel_buscador_bitacora.php" method="get">
                <a class="btn btn-primary" href="Gestion_Bitacora.php "><i class="fa fa-arrow-circle-left"></i>Volver Atrás</a>
                <a class="btn btn-warning" href="Reporte_Bitacora_Buscador.php?variable=<?php echo $busqueda; ?>" onclick="window.open(this.href,this.target, 'width=1000,height=600');return false;"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte</a>
                    <input type="hidden" name="busqueda_filtro" id="busqueda_filtro" value="<?php echo $busqueda ?>">
                    <input type="submit" value=" Reporte Excel" class="btn btn-success" download="Mi_Excel" >

                 </form>
                    <table class="table">
                        <thead class="table-primary"><br><br>
                            <tr>
                                <th><center>Id</center></th>
                                <th><center>Fecha</center></th>
                                <th><center>Acción</center></th>
                                <th><center>Descripcion</center></th>
                                <th><center> Usuario </center></th>

                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //Paginador
                            $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM tbl_ms_bitacora 
                                            WHERE ( Id_Bitacora LIKE '%$busqueda%' OR
                                                    Accion LIKE '%$busqueda%' )");
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
                            $sql = mysqli_query($conn, "select * FROM tbl_ms_bitacora WHERE ( Id_Bitacora LIKE '%$busqueda%' OR
                                                                Accion LIKE '%$busqueda%' OR
                                                                Descripcion LIKE '%$busqueda%' OR
                                                                Fecha LIKE '%$busqueda%'  ) LIMIT $desde,$por_pagina ");
                            mysqli_close($conn);

                            $result = mysqli_num_rows($sql);
                            if ($result > 0) {
                                while ($row = mysqli_fetch_array($sql)) {
                            ?>
                                    <tr>
                                        <th><center><?php echo $row['Id_Bitacora'] ?></center></th>
                                        <th><center><?php echo $row['Fecha'] ?></center></th>
                                        <th><center> <?php echo $row['Accion'] ?> </center></th>
                                        <th><center><?php echo $row['Descripcion'] ?></center></th>
                                        <th><center> <?php echo $row['Id_Usuario'] ?> </center></th>
                                     

                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<script> alert('No se encontro registros');window.location= 'Gestion_Bitacora.php' </script>";
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
<?php include 'barralateralfinal.php'; ?>
