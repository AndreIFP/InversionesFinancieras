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

Programa:          Buscador_Usuario
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
    if ($_SESSION['permisos'][M_GESTION_USUARIOS]['r'] == 0 or !isset($_SESSION['permisos'][M_GESTION_USUARIOS]['r'])) {
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
<title>Gestión Usuarios</title>
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
                <h2><strong>Gestión Usuarios</strong> </h2>
                <a class="btn btn-primary" href="../index.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
                <?php if ($_SESSION['permisos'][M_GESTION_USUARIOS] and $_SESSION['permisos'][M_GESTION_USUARIOS]['w'] == 1) {

                ?>
                    
                <?php } ?>
                <a class="btn btn-warning" href="Reporte_Usuario_Buscador.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte</a>
                 <a class="btn btn-success" href="reporte_excel_buscador_Usuarios.php"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Reporte excel</a>
                 </div>
            <?php
            $mostrar_datos = 0;
            ?>

            <br>
            

            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th> <center> Id </center></th>
                        <th> <center> Usuario </center></th>
                        <th> <center> Nombre Usuario </center></th>
                        <th> <center> Estado </center></th>
                        <th> <center> Rol </center></th>
                        <th colspan="3"> <center> Acciones </center> </th>
                        
                       

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

                    $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM tbl_usuario
                                            WHERE ( Id_Usuario LIKE '%$busqueda%' OR 
                                                    Usuario LIKE '%$busqueda%' OR
                                                    Nombre_Usuario LIKE '%$busqueda%' OR
                                                    Estado_Usuario LIKE '%$busqueda%'
                                                    $rol  )");
                    $result_register = mysqli_fetch_array($sql_registe);
                    $total_registro = $result_register['total_registro'];

                    $por_pagina = 500;

                    if (empty($_GET['pagina'])) {
                        $pagina = 1;
                    } else {
                        $pagina = $_GET['pagina'];
                    }

                    $desde = ($pagina - 1) * $por_pagina;
                    $total_paginas = ceil($total_registro / $por_pagina);
                    $sql = mysqli_query($conn, "SELECT u.Id_Usuario, u.Usuario, u.Nombre_Usuario, u.Estado_Usuario, u.Correo_Electronico, r.Rol from tbl_usuario u inner join tbl_roles r ON u.Rol = r.Id_Rol 
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
                                    <center> <a href="Buscador_Usuario2.php?Id_Usuario2=<?php echo $row['Id_Usuario']?>" class="btn btn-success btn-xs"> <i class="fa fa-eye" aria-hidden="true"></i> </a> </center>
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
