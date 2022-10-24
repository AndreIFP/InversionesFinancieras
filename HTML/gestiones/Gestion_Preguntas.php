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
   if ($_SESSION['permisos'][M_GESTION_PREGUNTAS]['r']==0 or !isset($_SESSION['permisos'][M_GESTION_PREGUNTAS]['r'])) {
       header("Location: ../index.php");
       die();
   }
}
?>
<?php include 'barralateralinicial.php';?>
  </div>
  <title>Gestión Preguntas</title>
           <div class="container mt-12">
                  <div class="col-md-12">
                     <h1>Gestión Preguntas</h1> 
                     <h6><a  class="btn btn-primary"  href="../index.php ">Volver Atrás</a></h6>
                     <?php  if ($_SESSION['permisos'][M_GESTION_PREGUNTAS] and $_SESSION['permisos'][M_GESTION_PREGUNTAS]['w'] == 1) {                      
                    ?>
                     <a href="Nueva_Preguntas.php"><input type="submit" class="btn btn-success" Value="Crear Preguntas"></a><p>
                        <?php } ?>
                     <?php
                        $mostrar_datos = 0;
                        ?>
                     <form action="" method="get">
                            <label for="datos_mostrar">Datos A Mostrar En El Formulario</label>
                            <select name="mostrar" onchange='submit();'>
                            <option ></option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="100">100</option>
                                <?php
                                $mostrar_datos = $_GET['mostrar'];
                                ?>
                            </select>
                     </form>
                     <form action="Buscador_Preguntas.php" method="get" class="form_search">
                            <select name="datos">
                            <option value ="">Seleccione</option>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="100">100</option>
                            </select>
                            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
                            <input type="submit" value="Buscar" class="btn_search">
                     </form>

                     <table class="table">
                        <thead class="table-succees table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Preguntas</th>
                                <th>Acciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                //Paginador
			                    $sql_registe = mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM TBL_PREGUNTAS WHERE Id_Preguntas = Id_Preguntas ");
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
                                    $sql = mysqli_query($conn,"select * FROM TBL_PREGUNTAS LIMIT $desde,$por_pagina ");
                                    mysqli_close($conn);

			                        $result = mysqli_num_rows($sql);
                                    if($result > 0){
                                    while($row=mysqli_fetch_array($sql)){
                                ?>
                                     <tr>
                                        <th><?php echo $row['Id_Preguntas']?></th>
                                        <th><?php echo $row['Preguntas']?></th>
                                        <script>
                                            function alerta(){
                                                window.alert('No es posible hacer esta Accion');
                                            }
                                        </script>
                                        <?php  if ($_SESSION['permisos'][M_GESTION_PREGUNTAS] and $_SESSION['permisos'][M_GESTION_PREGUNTAS]['u'] == 1) {                      
                                        ?>  
                                        <th><a type="button" class="btn btn-primary" onclick="alerta()" >Editar</a></th>
                                        <?php } ?>
                                        <?php  if ($_SESSION['permisos'][M_GESTION_PREGUNTAS] and $_SESSION['permisos'][M_GESTION_PREGUNTAS]['d'] == 1) {                      
                                        ?>
                                        <th><a type="button" class="btn btn-danger" onclick="alerta()" >Eliminar</a></th>
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
				        <li><a href="?pagina=<?php echo $pagina-1; ?>">Ant</a></li>
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
				        <li><a href="?pagina=<?php echo $pagina + 1; ?>">Sig</a></li>
				        <li><a href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
			            <?php } ?>
			            </ul>
		                </div>
                        <div class="reportes">
                            <a class="btn btn-warning" href="Reporte_Preguntas.php" >Reporte</a>
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
</style>

</section>
<?php include 'barralateralfinal.php';?>
