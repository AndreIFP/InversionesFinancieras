<?php
include("../conexion.php");
session_start();
?>
<?php include 'barralateralinicial.php';?>
  </div>
  <title>Gestion Bitacora</title>
           <div class="container mt-12">
                  <div class="col-md-12">
                    <?php 
                        $busqueda = strtolower($_REQUEST['busqueda']);
                        if(empty($busqueda))
                        {
                            echo "<script> alert('Dejo En Blanco El Buscador');window.location= 'Gestion_Factura.php' </script>";
                        }
                    ?>
                     <h1>Gestion Bitacora</h1>                      
                     <h6><a  class="btn btn-primary"  href="Gestion_Bitacora.php ">Volver Atrás</a></h6>

                     <table class="table">
                            <thead class="table-succees table-striped">
                                <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Acción</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                                <th><th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    //Paginador
                                   $sql_registe = mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM TBL_MS_BITACORA 
                                            WHERE ( Id_Bitacora LIKE '%$busqueda%' OR
                                                    Accion LIKE '%$busqueda%' )");
			                    $result_register = mysqli_fetch_array($sql_registe);
			                    $total_registro = $result_register['total_registro'];

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
                                    $sql = mysqli_query($conn,"select * FROM TBL_MS_BITACORA WHERE ( Id_Bitacora LIKE '%$busqueda%' OR
                                                                Accion LIKE '%$busqueda%') LIMIT $desde,$por_pagina ");
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
                                            <script>
                                            function alerta(){
                                                window.alert('No es posible hacer esta Accion');
                                            }
                                        </script>
                                        <th><a type="button" class="btn btn-primary" onclick="alerta()" >Editar</a></th>
                                        <th><a type="button" class="btn btn-danger" onclick="alerta()" >Eliminar</a></th>
                                    
                                        </tr>
                                        <?php
                                               }
                                            }else{
                                                echo "<script> alert('No se encontro registros');window.location= 'Gestion_Bitacora.php' </script>";
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
                  <div class="reportes">
                  <a class="btn btn-warning" href="Reporte_Bitacora_Buscador.php?variable=<?php echo $busqueda;?>" >Reporte</a>
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
