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
   if ($_SESSION['permisos'][M_GESTION_BITACORA]['r']==0 or !isset($_SESSION['permisos'][M_GESTION_BITACORA]['r'])) {
       header("Location: ../index.php");
       die();
   }
}
?>
<?php include 'barralateralinicial.php';?>

  </div>
  <title>Gestión Bitacora</title>
           <div class="container mt-12">
                  <div class="col-md-12">

                  <div class="reportes">
                     <h1>Gestión Bitacora</h1> 
                     <a  class="btn btn-primary"  href="../index.php ">Volver Atrás</a>
                     <a class="btn btn-warning" href="Reporte_Bitacora.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;" >Reporte</a>
                     </div><br>
                     <?php
                        $mostrar_datos = 0;
                        ?>
                        <section  style=" background-color:rgb(255,255,255);
    padding: 25px;
    width: 1100px;
    color:black;
    font-size: 15px; " >
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
                     <form action="Buscador_Bitacora.php" method="get" class="form_search">
                             
                            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" size=40>
                            <input type="submit" value="Buscar" class="btn_search">
                     </form>

                     <table class="table">
                        <thead class="table-succees table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Acción</th>
                                <th>Descripción</th>
                                <th>Usuario</th>
                     
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                //Paginador
			                    $sql_registe = mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM TBL_MS_BITACORA WHERE Id_Bitacora = Id_Bitacora ");
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
                                    $sql = mysqli_query($conn,"select * FROM TBL_MS_BITACORA ORDER BY Id_Bitacora DESC LIMIT $desde,$por_pagina ");
                                    mysqli_close($conn);

			                        $result = mysqli_num_rows($sql);
                                    if($result > 0){
                                    while($row=mysqli_fetch_array($sql)){
                                ?>
                                    <tr>
                                        <th><?php echo $row['Id_Bitacora']?></th>
                                        <th><?php echo $row['Fecha']?></th>
                                        <th><?php echo $row['Accion']?></th>
                                        <th><?php echo $row['Descripcion']?></th> 
                                        <th><?php echo $row['Id_Usuario']?></th>                                        
                                        
                                        <script>
                                            function alerta(){
                                                window.alert('No es posible hacer esta Accion');
                                            }
                                        </script>
                                        <?php  if ($_SESSION['permisos'][M_GESTION_BITACORA] and $_SESSION['permisos'][M_GESTION_BITACORA]['u'] == 1) {
                                            
                                        ?>
                                        <th><a type="button" class="btn btn-primary" onclick="alerta()" >Editar</a></th>
                                        <?php } ?>

                                        <?php  if ($_SESSION['permisos'][M_GESTION_BITACORA] and $_SESSION['permisos'][M_GESTION_BITACORA]['d'] == 1) {
                                            
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