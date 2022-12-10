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

Programa:          Buscador_Catalogo
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
                <?php  
                
                if (isset($_GET['filtro'])) {
                ?>
                    <a class="btn btn-warning" href="Reporte_Catalogo_Buscador.php?variable=<?php echo $busqueda; ?>&filtro=<?php echo "si"; ?>  " onclick="window.open(this.href,this.target, 'width=1000,height=600');return false;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte</a>
                    <input type="hidden" name="busqueda_filtro" id="busqueda_filtro" value="<?php echo $busqueda ?>">
                    <input type="hidden" name="filtro" id="filtro" value="<?php echo "si" ?>">
                     <button class="btn btn-warning" id="daterange-btn" name=""> <i class="fa fa-file-excel-o" aria-hidden="true"></i>  Reporte Excel </button>
                <?php }else{  ?>
                    <a class="btn btn-warning" href="Reporte_Catalogo_Buscador.php?variable=<?php echo $busqueda; ?>  " onclick="window.open(this.href,this.target, 'width=1000,height=600');return false;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte</a>
                    <input type="hidden" name="busqueda_filtro" id="busqueda_filtro" value="<?php echo $busqueda ?>">
                     <button class="btn btn-warning" id="daterange-btn" name=""> <i class="fa fa-file-excel-o" aria-hidden="true"></i>  Reporte Excel </button>
                <?php } ?>

               
                   
                </form>
                
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th><center>Código</center></th>
                            <th><center>Cuenta</center></th>
                            <th><center>Tipo Cuenta</center></th>
                            <th><center>Estado Cuenta</center></th>
                            <th><center>Acciones</center></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         if (isset($_GET['filtro'])) {
                            //Paginador
                            $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM tbl_catalago_cuentas 
                            WHERE ( CODIGO_CUENTA LIKE '$busqueda%')");
                         }else{
                             //Paginador
                        $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM tbl_catalago_cuentas 
                        WHERE ( CODIGO_CUENTA LIKE '%$busqueda%' OR
                                CUENTA LIKE '%$busqueda%' OR 
                                Estado_Cuenta  LIKE '%$busqueda%')");
                         }
                       
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

                        if (isset($_GET['filtro'])) {

                            
                            $sql = mysqli_query($conn, "SELECT tcc2.CODIGO_CUENTA as CODIGO_CUENTA ,tcc2.CUENTA,tcc.CUENTA as TIPOCUENTA,
                            tcc.Estado_Cuenta from tbl_catalago_cuentas tcc join tbl_catalago_cuentas tcc2 on tcc.Mayor=SUBSTRING(tcc2.CODIGO_CUENTA,1,2) or
                            tcc.Mayor=SUBSTRING(tcc2.CODIGO_CUENTA,1,1)
                             AND  tcc.Mayor=SUBSTRING(tcc2.CODIGO_CUENTA,1,2)
                           where tcc2.CODIGO_CUENTA LIKE '$busqueda%'
                            order by SUBSTRING( tcc2.CODIGO_CUENTA,1,6) LIMIT $desde,$por_pagina");
                        }else{
                            
                            $sql = mysqli_query($conn, "SELECT tcc2.CODIGO_CUENTA as CODIGO_CUENTA ,tcc2.CUENTA,tcc.CUENTA as TIPOCUENTA,
                            tcc.Estado_Cuenta from tbl_catalago_cuentas tcc join tbl_catalago_cuentas tcc2 on tcc.Mayor=SUBSTRING(tcc2.CODIGO_CUENTA,1,2) or
                            tcc.Mayor=SUBSTRING(tcc2.CODIGO_CUENTA,1,1)
                            and  tcc2.Mayor=SUBSTRING(tcc.CODIGO_CUENTA,1,2)  
                            where  tcc.CUENTA LIKE '%$busqueda%' OR tcc.CODIGO_CUENTA like '%$busqueda%' OR tcc2.CUENTA LIKE '%$busqueda%' OR tcc2.CODIGO_CUENTA like '%$busqueda%'
                            order by SUBSTRING( tcc2.CODIGO_CUENTA,1,6) LIMIT $desde,$por_pagina ");
                        }
                       



                        mysqli_close($conn);

                        $result = mysqli_num_rows($sql);
                        if ($result > 0) {
                            while ($row = mysqli_fetch_array($sql)) {
                        ?>
                                <tr>
                                    <th><center><?php echo $row['CODIGO_CUENTA'] ?></center></th>
                                    <th><center><?php echo $row['CUENTA'] ?></center></th>
                                    <th><center><?php echo $row['TIPOCUENTA'] ?></center></th>
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
                            if (isset($_GET['filtro'])) {
                        ?>

                            <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>&filtro=<?php echo "si"; ?>">|<</a>
                            </li>
                            <li><a href="?pagina=<?php echo $pagina - 1; ?>&busqueda=<?php echo $busqueda; ?>&filtro=<?php echo "si"; ?>">
                                    <<</a>
                            </li>
                            <?php }else{  ?>   

                                <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>">|<</a>
                            </li>
                            <li><a href="?pagina=<?php echo $pagina - 1; ?>&busqueda=<?php echo $busqueda; ?>">
                                    <<</a>
                            </li>
                        <?php
                         }
                        }
                        for ($i = 1; $i <= $total_paginas; $i++) {
                            # code...
                            if ($i == $pagina) {
                                echo '<li class="pageSelected">' . $i . '</li>';
                            } else {
                                if (isset($_GET['filtro'])) {
                                    echo '<li><a href="?pagina=' . $i . '&busqueda=' . $busqueda . '&filtro=si">' . $i . '</a></li>';
                                }else{

                                    echo '<li><a href="?pagina=' . $i . '&busqueda=' . $busqueda . '">' . $i . '</a></li>';
                                }
                            }
                        }

                        if ($pagina != $total_paginas) {
                            if (isset($_GET['filtro'])) {
                        ?>
                        
                        <li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo $busqueda; ?>&filtro=<?php echo "si"; ?>">>></a></li>
                        <li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?>&filtro=<?php echo "si"; ?>">>|</a></li>
                        <?php }else{?>
                            <li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo $busqueda; ?>">>></a></li>
                            <li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?> ">>|</a></li>
                        <?php } } ?>
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
