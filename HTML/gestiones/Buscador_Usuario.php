<?php
include("../conexion.php");
session_start();
?>
<?php include 'barralateralinicial.php';?>
  </div>
  <title>Gestión Usuarios</title>
           <div class="container mt-12">
                  <div class="col-md-12">
                    <?php 
                        $busqueda = strtolower($_REQUEST['busqueda']);
                        if(empty($busqueda))
                        {
                            echo "<script> alert('Dejo En Blanco El Buscador');window.location= 'Gestion_Usuarios.php' </script>";
                        }
                    ?>
                    <h1>Gestión Usuarios</h1> 
                    <a  class="btn btn-primary"  href="Gestion_Usuarios.php ">Volver Atrás</a>
			    <a class="btn btn-warning" href="Reporte_Usuario_Buscador.php?variable=<?php echo $busqueda;?>" onclick="window.open(this.href,this.target, 'width=1000,height=600');return false;" >Reporte</a>
                    
                        <p>
                     

                     <table class="table">
                            <thead class="table-succees table-striped">
                                <tr>
                                    <th>Id</th>
                                    <th>Usuario</th>
                                    <th>Nombre Usuario</th>
                                    <th>Estado</th>
                                    <th>Correo Electrónico</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    //Paginador
                                    $rol = '';
                                    if($busqueda == 'administrador')
                                    {
                                        $rol = " OR rol LIKE '%1%' ";

                                    }else if($busqueda == 'secretario'){

                                        $rol = " OR rol LIKE '%2%' ";

                                    }else if($busqueda == 'seguridad'){

                                        $rol = " OR rol LIKE '%3%' ";
                                    }else if($busqueda == 'nuevo'){

                                        $rol = " OR rol LIKE '%4%' ";
                                    }

                                    $sql_registe = mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM TBL_USUARIO
                                            WHERE ( Id_Usuario LIKE '%$busqueda%' OR 
                                                    Usuario LIKE '%$busqueda%' OR
                                                    Nombre_Usuario LIKE '%$busqueda%' OR
                                                    Estado_Usuario LIKE '%$busqueda%'
                                                    $rol  )");
                                    $result_register = mysqli_fetch_array($sql_registe);
                                    $total_registro = $result_register['total_registro'];

                                        $por_pagina = 20;

                                    if(empty($_GET['pagina']))
                                    {
                                        $pagina = 1;
                                    }else{
                                        $pagina = $_GET['pagina'];
                                    }

                                    $desde = ($pagina-1) * $por_pagina;
                                    $total_paginas = ceil($total_registro / $por_pagina);
                                        $sql = mysqli_query($conn,"SELECT u.Id_Usuario, u.Usuario, u.Nombre_Usuario, u.Estado_Usuario, u.Correo_Electronico, r.Rol from TBL_USUARIO u inner join TBL_ROLES r ON u.Rol = r.Id_Rol 
                                                                        WHERE ( u.Id_Usuario LIKE '%$busqueda%' OR 
                                                                                u.Usuario LIKE '%$busqueda%' OR
                                                                                u.Nombre_Usuario LIKE '%$busqueda%' OR
                                                                                u.Estado_Usuario LIKE '%$busqueda%' OR
                                                                                r.rol LIKE '%$busqueda%') ORDER BY u.Id_Usuario DESC LIMIT $desde,$por_pagina ");
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
                                                <th><a href="Actualizar_Usuario.php?Id=<?php echo $row['Id_Usuario'] ?>"class="btn btn-primary" >Editar</a></th><p>
                                                <th><a href="Delete_Usuario.php?Id=<?php echo $row['Id_Usuario'] ?>"class="btn btn-danger">Eliminar</a></th><p>
                                            </tr>
                                        <?php
                                               }

                                            }else{
                                                echo "<script> alert('No se encontro registros');window.location= 'Gestion_Usuarios.php' </script>";
                                            }
                                        ?>
                            </tbody>
                      </table>
                      <?php
                            if($total_registro != 0)
                                {
                       ?>
                                <div class="paginador">
                                        <ul>
                                            <?php 
                                                if($pagina != 1)
                                                {
                                                    ?>
                                                    <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>">|<</a></li>
                                                    <li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda; ?>"><<</a></li>
                                                    <?php 
                                                    }
                                                for ($i=1; $i <= $total_paginas; $i++) { 
                                                # code...
                                                if($i == $pagina)
                                                {
                                                    echo '<li class="pageSelected">'.$i.'</li>';
                                                }else{
                                                    echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
                                                }
                                                }

                                                if($pagina != $total_paginas)
                                                {  
                                            ?>
                                                    <li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo $busqueda; ?>">>></a></li>
                                                    <li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?> ">>|</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                            <?php } ?>
                  </div>
                 
           </div>
    </body>
<style type="text/css">
     /*============ Paginador =============*/
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
</section>
<?php include 'barralateralfinal.php';?>
