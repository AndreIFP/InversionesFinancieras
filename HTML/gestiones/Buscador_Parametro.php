<?php
include("../conexion.php");
session_start();
?>
<?php include 'barralateralinicial.php';?>
  </div>
  <title>Gestión Parametros</title>
           <div class="container mt-12">
                  <div class="col-md-12">
                    <?php 
                        $busqueda = strtolower($_REQUEST['busqueda']);
                        if(empty($busqueda))
                        {
                            echo "<script> alert('Dejo En Blanco El Buscador');window.location= 'Gestion_parametros.php' </script>";
                        }
                    ?>
                     <h1>Gestión Parametros</h1> 
                     <a  class="btn btn-primary"  href="Gestion_parametros.php ">Volver Atrás</a>
                     <a class="btn btn-warning" href="Reporte_Parametro_Buscador.php?variable=<?php echo $busqueda;?>" onclick="window.open(this.href,this.target, 'width=1000,height=600');return false;" >Reporte</a>
                     <table class="table">
                            <thead class="table-succees table-striped">
                                <tr>
                                <th>Id</th>
                                <th>Nombre Parametro</th>
                                <th>Valor</th>
                                <th>Fecha Creación</th>
                                <th>Fecha Modificación</th>
                                <th>Acciones</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    //Paginador
                                    $sql_registe = mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM TBL_PARAMETROS
                                            WHERE ( Id_Parametro LIKE '%$busqueda%' OR
                                                    Parametro LIKE '%$busqueda%' )");
                                    $result_register = mysqli_fetch_array($sql_registe);
                                    $total_registro = $result_register['total_registro'];

                                     $por_pagina = 10;

                                    if(empty($_GET['pagina']))
                                    {
                                        $pagina = 1;
                                    }else{
                                        $pagina = $_GET['pagina'];
                                    }

                                    $desde = ($pagina-1) * $por_pagina;
                                    $total_paginas = ceil($total_registro / $por_pagina);
                                        $sql = mysqli_query($conn,"select * from TBL_PARAMETROS WHERE ( Id_Parametro LIKE '%$busqueda%' OR
                                                                                Parametro LIKE '%$busqueda%') LIMIT $desde,$por_pagina ");
                                        mysqli_close($conn);

                                        $result = mysqli_num_rows($sql);
                                        if($result > 0){
                                            while($row=mysqli_fetch_array($sql)){
                                        ?>
                                             <tr>
                                             <th><?php echo $row['Id_Parametro']?></th>
                                             <th><?php echo $row['Parametro']?></th>
                                             <th><?php echo $row['Valor']?></th>
                                             <th><?php echo $row['Fecha_Creacion']?></th>
                                             <th><?php echo $row['Fecha_Modificacion']?></th>
                                             <th><a href="Actualizar_Parametro.php?Id=<?php echo $row['Id_Parametro'] ?>"class="btn btn-primary" >Editar</a></th><p>
                                             <th><a href="Delete_Parametro.php?Id=<?php echo $row['Id_Parametro'] ?>"class="btn btn-danger">Eliminar</a></th><p>
                                             </tr>
                                        <?php
                                               }
                                            }else{
                                                echo "<script> alert('No se encontro registros');window.location= 'Gestion_parametros.php' </script>";
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
    </section>
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
<?php include 'barralateralfinal.php';?>
