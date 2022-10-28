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
}else{
   //actualiza los permisos
   updatePermisos($_SESSION['rol']);
   
   //si no tiene permiso de visualización redirige al index
   if ($_SESSION['permisos'][M_GESTION_CLIENTE]['r']==0 or !isset($_SESSION['permisos'][M_GESTION_CLIENTE]['r'])) {
       header("Location: ../index.php");
       die();
   }
}

$numero = 99999.99;
?>

<?php include 'barralateralinicial.php';?>

  </div>
  <title>Gestión Clientes</title>
           <div class="container mt-12">
                  <div class="col-md-12">
                    
                    
                     <div class="reportes">
                     <h1>Gestión Clientes</h1> 
                     <a  class="btn btn-primary"  href="../index.php ">Volver Atrás</a>
                     <?php  if ($_SESSION['permisos'][M_GESTION_CLIENTE] and $_SESSION['permisos'][M_GESTION_CLIENTE]['w'] == 1) {                    
                    ?>
                     <a href="Nuevo_Cliente.php"><input type="submit" class="btn btn-success" Value="Crear Nuevo Cliente"></a>
                            <a class="btn btn-warning" href="reporte_cliente.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;" >Reporte</a>
                    </div> 
                     
                    <?php } ?>
                    
                     <?php
                        $mostrar_datos = 0;
                        ?>
                        <br>
                     <form action="" method="get" class="form_datos" >
                            <label for="datos_mostrar">Datos A Mostrarㅤ</label>
                            <select name="mostrar" onchange='submit();'>
                            <option ></option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                                <?php
                                $mostrar_datos = $_GET['mostrar'];
                                ?>
                            </select>
                     </form>
                     
                     <form action="Buscador_Cliente.php" method="get" class="form_search">
                   
                            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" size=40>
                            <input type="submit" value="Buscar" class="btn btn-primary">
                     </form>

                     <table class="table">
                        <thead class="table-succees table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Nombre Empresa</th>
                                <th>Nombre Cliente</th>
                                <th>RTN</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                //Paginador
			                    $sql_registe = mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM TBL_CLIENTES WHERE Id_Cliente = Id_Cliente ");
			                    $result_register = mysqli_fetch_array($sql_registe);
			                    $total_registro = $result_register['total_registro'];

			        if($mostrar_datos > 0){
                                    $por_pagina = $mostrar_datos;
                                }else{
                                    $por_pagina = 10;
                                }

                                if(empty($_GET['pagina']))
                                {
                                    $pagina = 1;
                                }else{
                                    $pagina = $_GET['pagina'];
                                }

                                $desde = ($pagina-1) * $por_pagina;
                                $total_paginas = ceil($total_registro / $por_pagina);
                                    $sql = mysqli_query($conn,"select * FROM TBL_CLIENTES ORDER BY Fecha_Dato DESC LIMIT $desde,$por_pagina ");
                                    mysqli_close($conn);

			                        $result = mysqli_num_rows($sql);
                                    if($result > 0){
                                    while($row=mysqli_fetch_array($sql)){
                                ?>
                                     <tr>
                                        <th><?php echo $row['Id_Cliente']?></th>
                                        <th><?php echo $row['Nombre_Empresa']?></th>
                                        <th><?php echo $row['Nombre_Cliente']?></th>
                                        <th><?php echo $row['RTN_Cliente']?></th>
                                        <th><?php echo $row['Tipo_Cliente']?></th>
                                       
                                        <?php  if ($_SESSION['permisos'][M_GESTION_CLIENTE] and $_SESSION['permisos'][M_GESTION_CLIENTE]['u'] == 1) {                    
                                        ?>
                                        <th><a href="Actualizar_Cliente.php?Id=<?php echo $row['Id_Cliente'] ?>"class="btn btn-primary" >Editar</a></th><p>
                                        <?php } ?>
                                        <?php  if ($_SESSION['permisos'][M_GESTION_CLIENTE] and $_SESSION['permisos'][M_GESTION_CLIENTE]['d'] == 1) {                    
                                        ?>
                                        <th><a href="Delete_Cliente.php?Id=<?php echo $row['Id_Cliente'] ?>"class="btn btn-danger">Eliminar</a></th><p>
                                        <?php } ?>
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
.form_datos{
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

<?php include 'barralateralfinal.php';?>
