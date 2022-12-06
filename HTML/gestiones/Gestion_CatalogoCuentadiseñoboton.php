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
    if ($_SESSION['permisos'][M_GESTION_CAT_CUENTA]['r'] == 0 or !isset($_SESSION['permisos'][M_GESTION_CAT_CUENTA]['r'])) {
        header("Location: ../index.php");
        die();
    }
}
?>
<?php include 'barralateralinicial.php'; ?>
<p></p>
<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 12px; ">
    <div class="container-fluid">
        <h2><center><strong>Agregar Cuentas</strong></center></h2>
        <div class="col-md-12">

            <div class="box-body table-responsive">
                <div class="reportes">
                    <a class="btn btn-primary" href="Gestion_CatalogoCuenta.php"><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
                    <?php if ($_SESSION['permisos'][M_GESTION_CAT_CUENTA] and $_SESSION['permisos'][M_GESTION_CAT_CUENTA]['w'] == 1) {

                    ?>
                    <center>
                        <!--a href="Nuevo_Catalogo2.php " class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>Sub-Cuenta </a-->
                        <a href="Nuevo_Catalogo3.php " class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Sub-Cuenta-2</a>
                        <a href="Nuevo_Catalogo4.php " class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Sub-Cuenta-3</a>
                        <!--a href="Nuevo_Catalogo.php " class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Cuenta Auxiliar</a-->
                        </center>
                    <?php } ?>
                   
                </div>

</section>
</div>


</body>

<style type="text/css">
    table {
        border-collapse: collapse;
    }

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
