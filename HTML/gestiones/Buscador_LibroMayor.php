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

Programa:          Buscador_LibroMayor
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
<?php include 'barralateralinicial.php'; ?><p></p>
<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 12px; ">
    <div class="container-fluid">
        <div class="col-md-12">
            <title>Gestión Libro Mayor</title>
       
        <?php
        $busqueda = strtolower($_REQUEST['busqueda']);
        if (empty($busqueda)) {
            echo "<script> alert('Dejo En Blanco El Buscador');window.location= 'Gestion_LibroMayor.php' </script>";
        }
        ?>
        <h2><strong>Gestión Libro Mayor</strong> </h2>
        <div class="box-body table-responsive">
            <a class="btn btn-primary" href="Gestion_LibroMayor.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
            <a class="btn btn-warning" href="Reporte_LibroMayor_Buscador.php?variable=<?php echo $busqueda; ?>" onclick="window.open(this.href,this.target, 'width=1000,height=600');return false;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte</a>

            <table class="table">
                <thead class="table-primary"><br><br>
                    <tr>
                        <th>Id</th>
                        <th>Cuenta</th>
                        <th>Total Cuenta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Paginador
                    $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM TBL_LIBRO_MAYOR 
                                            WHERE ( ID_LIBRO_MAYOR LIKE '%$busqueda%' OR
                                            CUENTA LIKE '%$busqueda%' )");
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
                    $sql = mysqli_query($conn, "select * FROM TBL_LIBRO_MAYOR WHERE ( ID_LIBRO_MAYOR LIKE '%$busqueda%' OR
                                    CUENTA LIKE '%$busqueda%') LIMIT $desde,$por_pagina ");
                    mysqli_close($conn);

                    $result = mysqli_num_rows($sql);
                    if ($result > 0) {
                        while ($row = mysqli_fetch_array($sql)) {
                    ?>
                            <tr>
                                <th><?php echo $row['ID_LIBRO_MAYOR'] ?></th>
                                <th><?php echo $row['CUENTA'] ?></th>
                                <th><?php echo 'L ' . number_format($row['TOTAL_CUENTA'], 2) ?></th>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<script> alert('No se encontro registros');window.location= 'Gestion_LibroMayor.php' </script>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
            if ($total_registro != 0) {
            ?>
        </div>
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

        </div></div>
<?php } ?>
</div>
<div class="reportes">


</section>
</div>
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