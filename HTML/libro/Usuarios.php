<?php 
$_SESSION['id'];
?>

<?php include '../layout/header.php';


//$branch_id = $_GET['id'];
?>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">
  <body class="nav-md">
    <?php 
   // if ($alumnos=="si") {
      # code...
    
?>
    <div class="container body">
      <div class="main_container">
        <?php include '../layout/main_sidebar.php';?>

        <!-- top navigation -->
       <?php include '../layout/top_nav.php';?>      <!-- /top navigation -->
       <style>
label{

color: black;
}
li {
  color: white;
}
ul {
  color: white;
}
#buscar{
  text-align: right;
}
       </style>

        <!-- page content -->
        <div class="right_col" role="main">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class = "x-panel">

            </div>

        </div><!--end of modal-dialog-->
 </div>
                    <?php
                    $id_usuario=$_SESSION['id'];
                            $fecha = date('Y-m-d h:i:s');
                

                //  if ($guardar=="si") {
                    
                      ?>


<?php
include("../conexion.php");



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MANTENIMIENTO USUARIO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
           <div class="container mt-12">
                  <div class="col-md-12">
                     <h1>MOSTRAR USUARIOS</h1> 
                     <a href="nuevo.php"><input type="submit" class="btn btn-primary btn-block" Value="Nuevo"></a><p>
                     <form action="Buscador.php" method="get" class="form_search">
                            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" size=40>
                            <input type="submit" value="Buscar" class="btn_search">
                     </form>

                     <table class="table">
                        <thead class="table-succees table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Usuario</th>
                                <th>Nombre Usuario</th>
                                <th>Estado</th>
                                <th>Correo Electronico</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                //Paginador
			                    $sql_registe = mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM tbl_usuario WHERE Id_Usuario = Id_Usuario ");
			                    $result_register = mysqli_fetch_array($sql_registe);
			                    $total_registro = $result_register['total_registro'];

			                    $por_pagina = 5;

                                if(empty($_GET['pagina']))
                                {
                                    $pagina = 1;
                                }else{
                                    $pagina = $_GET['pagina'];
                                }

                                $desde = ($pagina-1) * $por_pagina;
                                $total_paginas = ceil($total_registro / $por_pagina);
                                    $sql = mysqli_query($conn,"select u.Id_Usuario, u.Usuario, u.Nombre_Usuario, u.Estado_Usuario, u.Correo_Electronico, r.Rol from tbl_usuario u inner join tbl_roles r ON u.Rol = r.Id_Rol LIMIT $desde,$por_pagina ");
                                    mysqli_close($conn);

			                        $result = mysqli_num_rows($sql);
                                    if($result > 0){
                                    while($row=mysqli_fetch_array($sql)){
                                ?>
                                     <tr>
                                        <th><?php echo $row['Id_Usuario']?></th>
                                        <th><?php echo $row['Usuario']?></th>
                                        <th><?php echo $row['Nombre_Usuario']?></th>
                                        <th><?php echo $row['Estado_Usuario']?></th>
                                        <th><?php echo $row['Correo_Electronico']?></th>
                                        <th><?php echo $row['Rol']?></th>
                                        <th><a href="Actualizar.php?Id=<?php echo $row['Id_Usuario'] ?>"class="btn btn-primary" >Editar</a></th><p>
                                        <th><a href="delete.php?Id=<?php echo $row['Id_Usuario'] ?>"class="btn btn-danger">Eliminar</a></th><p>
                                    </tr>
                                <?php
                                       }
                                    }
                                ?>
                        </tbody>
                      </table>
                      <div class="paginador">
			            <ul>
			            <?php 
				        if($pagina != 1)
				        {
			            ?>
				        <li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
				        <li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
			            <?php 
				        }
				        for ($i=1; $i <= $total_paginas; $i++) { 
					    # code...
					    if($i == $pagina)
					    {
						echo '<li class="pageSelected">'.$i.'</li>';
					    }else{
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					    }
				        }

				        if($pagina != $total_paginas)
				        {  
			            ?>
				        <li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
				        <li><a href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
			            <?php } ?>
			            </ul>
		                </div>
                  </div>
           </div>
    </body>
    
</html>

<style type="text/css">
        .paginador ul{
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
    .paginador a, .pageSelected{
        color: #428bca;
        border: 1px solid #ddd;
        padding: 5px;
        display: inline-block;
        font-size: 14px;
        text-align: center;
        width: 35px;
    }
    .paginador a:hover{
        background: #ddd;
    }
    .pageSelected{
        color: #FFF;
        background: #428bca;
        border: 1px solid #428bca;
    }
    /*============ Buscador ============*/
.form_search{
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
.form_search .btn_search{
	background: #1faac8;
	color: #FFF;
	padding: 0 20px;
	border: 0;
	cursor: pointer;
	margin-left: 10px;
}
</style>