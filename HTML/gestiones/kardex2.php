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
    if ($_SESSION['permisos'][M_GESTION_CLIENTE]['r'] == 0 or !isset($_SESSION['permisos'][M_GESTION_CLIENTE]['r'])) {
        header("Location: ../index.php");
        die();
    }
}

$numero = 99999.99;
?>


<?php include 'barralateralinicial.php';?>

<!DOCTYPE html>
<html lang="en">
<title>Gestión Clientes</title>
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
</head>



<p></p>
<title>Kardex</title>
<section style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 12px; ">


    <h2><strong>Kardex</strong> </h2>
    <div class="box-body table-responsive">
    <div class="reportes">

    <a class="btn btn-primary"  href="Gestion_Inventario.php "><i class="fa fa-arrow-circle-left"></i>Volver Atrás</a>
    <p>
                     <?php
                        $mostrar_datos = 0;
                        $Id_kardex2 = $_REQUEST['Id_kardex2'];
                        ?>
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
                     <form action="Buscador_Kardex.php" method="get" class="form_search">
                             
                            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" size=40>
                            <input type="submit" value="Buscar" class="btn_search">
                     </form>

                     <table class="table">
                     <thead class="table-primary">
                            <tr>
                                <th>Fecha</th>
                                <th>Detalle</th>
                                <th>Producto</th>
                                <th>Cantidad de Inventario Entrante</th>
                                <th>Cantidad de Inventario Saliente</th>
                                <th>Acciones</th>
                                <th></th>
                            </tr>   
                        </thead>
                        <tbody>
                                <?php
                                //Paginador
			                    $sql_registe = mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM TBL_KARDEX");
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
                                    $sql = mysqli_query($conn,"select * FROM TBL_KARDEX LIMIT $desde,$por_pagina ");
                                    mysqli_close($conn);

			                        $result = mysqli_num_rows($sql);
                                    if($result > 0){
                                    while($row=mysqli_fetch_array($sql)){


                                        $Id_kardex         =$row['Id_kardex'];
                                        $fecha             = $row ['fecha'];
                                        $detalle           = $row ['detalle'];
                                        $proname          = $row ['proname'];
                                        $cant_entrada    = $row ['cant_entrada'];
                                        $total_cante     = $row ['total_cante'];
                                        $cant_salida     = $row ['cant_salida'];
                                        $total_cants       = $row ['total_cants'];  
                                        $_SESSION['Id_Mauri']=$Id_kardex2;

                                ?>
                                     <tr>
                                        <th><?php echo $fecha?></th>
                                        <th><?php echo $detalle?></th>
                                        <th><?php echo $proname?></th>
                                        <th><?php echo $cant_entrada?></th>   
                                        <th><?php echo $cant_salida?></th>
                                     
                                        <script>
                                            function alerta(){
                                                window.alert('No es posible hacer esta Accion');
                                            }
                                        </script>
                                        <th><a type="button" class="btn btn-primary" onclick="alerta()" >Editar</a></th>
                                        <th><a type="button" class="btn btn-danger" onclick="alerta()" >Eliminar</a></th>
                                        <th><a href="kardex2.php?Id_kardex2=<?php echo $Id_Kardex ?>" class="btn btn-success btn-xs">Ver</a></th>
                                  
                                        <form method="post" action="Kardex.php" name="miformulario">
                                <script>
		window.onload = function() {
			// Una vez cargada la página, el formulario se enviara automáticamente.
			var ModalEdit = new bootstrap.Modal(EditModal, {}).show();
      var $pop= este;
		}
	</script>
</form>
      
                                    </tr>
                                <?php
                                       }
                                    }
                                ?>
                        </tbody>
                      </table>

                      <script>
    function editar(este) {
      var ModalEdit = new bootstrap.Modal(EditModal, {}).show();
      var $pop= este;
      
    }
  </script>

        <div class="modal" tabindex="-1" id="EditModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Información del del kardex</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
<form>
    <?php
    include("../conexion.php");
  $poll=$_SESSION['Id_Mauri'];
$query = mysqli_query($conn,"SELECT * FROM TBL_KARDEX WHERE Id_kardex = '$poll' ");
                  $nr = mysqli_num_rows($query);
                  while($row=mysqli_fetch_array($query)){
                    

                    $Id_kardex         =$row['Id_kardex'];
                    $fecha             = $row ['fecha'];
                    $detalle           = $row ['detalle'];
                    $proname          = $row ['proname'];
                    $cant_entrada    = $row ['cant_entrada'];
                    $total_cante     = $row ['total_cante'];
                    $cant_salida     = $row ['cant_salida'];
                    $total_cants       = $row ['total_cants'];  
                 

?>
                  
<div class= "form group">
  <label for="recipient-name" class="col-form-label" >Id Cliente:</label>
  <input type="text" class="form-control" Readonly  id="recipient-name" value="  <?php echo $Id_kardex ?>">
  </div>

  <div class= "form group">
  <label for="recipient-name" class="col-form-label" >Fecha:</label>
  <input type="text" class="form-control" Readonly id="recipient-name" value=" <?php echo $fecha ?> ">
  </div>


  <div class= "form group">
  <label for="recipient-name" class="col-form-label" >Detalle:</label>
  <input type="text" class="form-control" Readonly id="recipient-name" value=" <?php echo  $detalle ?> ">
  </div>


  <div class= "form group">
  <label for="recipient-name" class="col-form-label" >Producto:</label>
  <input type="text" class="form-control" Readonly id="recipient-name" value=" <?php echo $proname ?> ">
  </div>


  <div class= "form group">
  <label for="recipient-name" class="col-form-label" >Cantidad entrada:</label>
  <input type="text" class="form-control"  Readonly id="recipient-name" value=" <?php echo $cant_entrada ?> ">
  </div>


  <div class= "form group">
  <label for="recipient-name" class="col-form-label" >Total entrada:</label>
  <input type="text" class="form-control"  Readonly id="recipient-name" value=" <?php echo $total_cante ?> ">
  </div>


  <div class= "form group">
  <label for="recipient-name" class="col-form-label" >Total cantidad salida:</label>
  <input type="text" class="form-control" Readonly  id="recipient-name" value=" <?php echo $cant_salida?> ">
  </div>


  <div class= "form group">
  <label for="recipient-name" class="col-form-label" >Total cantidad salida:</label>
  <input type="text" class="form-control" Readonly  id="recipient-name" value=" <?php echo $total_cants?> ">
  </div>

  <?php
}
?>

          <p id="variable"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          
        </div>
      </div>
    </div>
  </div>

        </div>


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
                        <div class="reportes">
                            <a class="btn btn-warning" href="Reporte_Kardex.php" >Reporte</a>
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
<?php include 'barralateralfinal.php';?>
