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

Programa:          GestionRoles
Fecha:             16-jul-2022
Programador:       Sara
descripcion:       Pantalla 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
José	          01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Fanny 	       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Esperanza	    01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

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
    if ($_SESSION['permisos'][M_GESTION_ROLES]['r'] == 0 or !isset($_SESSION['permisos'][M_GESTION_ROLES]['r'])) {
        header("Location: ../index.php");
        die();
    }
}
?>
<?php include 'barralateralinicial.php'; ?><p></p>
<section style=" background-color:rgb(255, 255, 255);
padding: 15px;
color:black;
font-size: 12px; ">

    <title>Gestión Roles</title>
    <div class="container-fluid">
        <div class="box-body table-responsive">
            <h2><strong>Gestión Roles</strong> </h2>
            <a class="btn btn-primary" href="../index.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
            <?php if ($_SESSION['permisos'][M_GESTION_ROLES] and $_SESSION['permisos'][M_GESTION_ROLES]['w'] == 1) {

            ?>
                <a href="Nuevo_Roles.php" input type="submit" class="btn btn-success " Value="Crear Nuevo Rol"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Rol</a>
            <?php } ?>

            <a class="btn btn-warning" href="reporte_roles.php" target="_blank" onclick="window.open(this.href,this.target, 'width=1000,height=600');return false;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte pdf</a>
            <a class="btn btn-success" href="reporte_excel_roles.php"> Reporte excel</a>
            <a align="rigth" href="GestionRolesInac.php"><button type="submit" class="btn btn-info"><i class="fa fa-times" aria-hidden="true"></i> Roles Inactivos</button></a>
            <p></p>




            <?php
            $mostrar_datos = 0;
            ?>

            <form action="" method="get" class="form_datos">
                <label for="datos_mostrar">Datos A Mostrar</label>
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
            <form action="Buscador_Roles.php" method="get" class="form_search">
                <input type="text" name="busqueda" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" id="busqueda" placeholder="Buscar" size=40>
                <input type="submit" value="Buscar" class="btn btn-primary">
            </form>

            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <center>
                            <th><center>Id</center></th>
                            <th><center>Rol</center></th>
                            <th><center>Estado</center></th>
                            <th><center>Descripción</center></th>
                            <th colspan="3"><center>Acciones</center></th>
                            

                </thead>
                <tbody>
                    <?php

                    //Paginador
                    $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM tbl_roles WHERE Estado = 'ACTIVO' ");
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
                    $sql = mysqli_query($conn, "SELECT * FROM tbl_roles WHERE Estado = 'ACTIVO' LIMIT $desde,$por_pagina ");
                    mysqli_close($conn);

                    $result = mysqli_num_rows($sql);
                    if ($result > 0) {
                        while ($row = mysqli_fetch_array($sql)) {
                    ?>
                            <tr>
                                <th><center><?php echo $row['Id_Rol'] ?></center></th>
                                <th><center><?php echo $row['Rol'] ?></center></th>
                                <th><center><?php echo $row['Estado'] ?></center></th>
                                <th><center><?php echo $row['Descripcion'] ?></center></th>
                                <?php if ($_SESSION['permisos'][M_GESTION_ROLES] and $_SESSION['permisos'][M_GESTION_ROLES]['u'] == 1) {

                                ?>
                                    <th><center><a href="Actualizar_Roles.php?Id=<?php echo $row['Id_Rol'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a></center></th>
                                    <th><center><a href="Actualizar_Permisos.php?Id=<?php echo $row['Id_Rol'] ?>" class="btn btn-success btn-xs"><i class="fa fa-key" aria-hidden="true"></i></a></center></th>
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
        padding: 0 30px;
        border: 0;
        cursor: pointer;
        margin-left: 10px;
    }
</style>
<?php include 'barralateralfinal.php'; ?>
