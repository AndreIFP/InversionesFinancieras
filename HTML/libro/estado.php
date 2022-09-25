<?php 

session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['empresa'];
$_SESSION['temporada']="10";




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
    <title>Estado de Resultado</title>
  <body class="nav-md">
    <?php 
   // if ($alumnos=="si") {
      # code...
    
?>
        

        <!-- top navigation -->
       <?php include '../layout/top_nav2.php';?>      <!-- /top navigation -->
       

        <!-- page content -->
        


                    <?php
                    $id_usuario=$_SESSION['id'];
                    $cliente=$_SESSION['cliente'];
                    $temporada=$_SESSION['temporada'];
                    $fechai=$_SESSION['fechai'];
                    $fechaf=$_SESSION['fechaf'];
                    $empresa=$_SESSION['empresa'];
                    $fecha = date('Y-m-d h:i:s');
                

                //  if ($guardar=="si") {
                    
                      ?>
</head>
<h6><a  class="btn btn-primary"  href="validacionestado.php" >Volver Atrás</a></h6>
</head>

 <button type="button" class="btn btn-primary btn-lg btn-print" data-toggle="modal" data-target="#miModal">
  INGRESAR
</button>
     <?php
                 //     }
                      ?>
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
                        <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="depositar_add_estado.php" enctype="multipart/form-data" class="form-horizontal">
                      <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario;?>" required>
                            
                          <input type="hidden" class="form-control" id="debe_haber" name="debe_haber" value="debe" required>
                    <div class="col-md-12 btn-print">

                  
                     
                        <br>
                      <div class="form-group">
          <label for="date" class="col-sm-3 control-label">Cuenta</label>
          <div class="select">
          <select name="txtpregunta" id="format" id="txtpregunta" >
          <option selected disabled>seleccione una Cuenta</option>
             <?php 
              include('../conexion.php');
                
                #consulta de todos los paises
                $consulta=mysqli_query($conn,"SELECT * FROM TBL_CATALAGO_ESTADO ;" );
                while($row=mysqli_fetch_array($consulta)){
                    $nombrepais=$row['CUENTA']; 
                    $nombeid=$row['CODIGO_CUENTA'];      
             ?>
                 
                    <option class="dropdown-item" value="<?php echo $nombeid?>"><?php echo $nombrepais ?></option>
                    
                <?php
                
                 }
                 
                 ?>  
                 </select>
                     </div>
                     </div>
                     <br>
           
                     <div class="col-md-12 btn-print">
                                 <div class="form-group">
                                   <label for="date" class="col-sm-3 control-label">Fecha</label>
                                   <div class="input-group col-sm-6">
                                     <input type="date" class="form-control pull-right" id="date" name="fechax"  required >
                                   </div><!-- /.input group -->
                                 </div><!-- /.form group -->
                               </div>
           
                               <div class="col-md-12 btn-print">
                        <label for="date" class="col-sm-3 control-label">Descripcion</label>
                        <div class="input-group col-sm-8">
                          <input type="text" class="form-control pull-right" id="descripcion" name="descripcion" required >
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>
   <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Monto a depositar</label>
                        <div class="input-group col-sm-8">
                          <input type="text" class="form-control pull-right" id="monto" name="monto" required >
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>



                    <div class="col-md-12">
                       <div class="col-md-12">
                        <button class="btn btn-lg btn-primary btn-print" id="daterange-btn"  name="">INGRESAR</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                         </div>

                    </div>

          </form>

          </div>
      </div>
   
    </div>
  </div>
</div>
 <!--end of modal-->

<br>

 <a class = "btn btn-success btn-print" href = "../gestiones/Reporte_Estado_Resultado.php"><i class ="glyphicon glyphicon-print"></i> Generar Estado de Resulado</a>
 <a class = "btn btn-success btn-print" href = "../gestiones/Reporte_Resultado.php"><i class ="glyphicon glyphicon-print"></i> Imprimir</a>
<br>
>


                  <div class="box-header btn btn-primary" >
                  <h3 class="box-title"> Estado de Resultado </h3>
                  <center><h6><label class="box-title"> Empresa  <?php echo $empresa  ?></label></h6></center>
                </div><!-- /.box-header -->
                <div class="box-body ">
                
                  <table id="example22" class="table table-bordered table-striped">
                    <thead>
                      <tr class=" btn-success">


                        
                          

                          <th> fecha </th>
                          <th> cuenta </th>
                          <th> Descripcion </th>
                  <th> monto </th>
                       <th class="btn-print"> Accion </th>

                      </tr>
                    </thead>
                    <tbody>
<?php

   // $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from libro2 where id_cliente='$cliente' and fecha >='$fechai' and fecha <='$fechaf' ")or die(mysqli_error());
    $i=1;
    while($row=mysqli_fetch_array($query)){
      $monto=$row['monto'];
      $id_libro=$row['id_libro'];
?>
                      <tr >
              <td><?php echo $row['fecha'];?></td>
              <td><?php echo $row['cuenta'];?></td>
            <td><?php echo $row['descripcion'];?></td>
              <td><?php echo $monto;?></td>
      

                        <td class="btn-print">
                                   <?php
                    //  if ($eliminar=="si") {
                    
                      ?>
   <a class="small-box-footer btn-print"  href="<?php  echo "eliminar_estado.php?monto=$monto&id_libro=$id_libro&debe_haber=$debe_haber&id_usuario=$id_usuario";?>" onClick="return confirm('¿Está seguro de que quieres eliminar transaccion??');"><i class="glyphicon glyphicon-remove"></i></a>
   <?php
                  //    }
                      ?>
                               <?php
                 //     if ($editar=="si") {
                    
                      ?>

            <?php
                  //    }
                      ?>

            </td>
                      </tr>
 <!--end of modal-->

<?php $i++;}?>
                    </tbody>

                  </table>


                                   <script type="text/javascript">// < ![CDATA[
function Eliminar (i) {
    document.getElementsByTagName("table")[0].setAttribute("id","tableid");
    document.getElementById("tableid").deleteRow(i);
}
function Buscar() {
            var tabla = document.getElementById('example22');
            var busqueda = document.getElementById('txtBusqueda').value.toLowerCase();
            var cellsOfRow="";
            var found=false;
            var compareWith="";
            for (var i = 1; i < tabla.rows.length; i++) {
                cellsOfRow = tabla.rows[i].getElementsByTagName('td');
                found = false;
                for (var j = 0; j < cellsOfRow.length && !found; j++) { compareWith = cellsOfRow[j].innerHTML.toLowerCase(); if (busqueda.length == 0 || (compareWith.indexOf(busqueda) > -1))
                    {
                        found = true;
                    }
                }
                if(found)
                {
                    tabla.rows[i].style.display = '';
                } else {
                    tabla.rows[i].style.display = 'none';
                }
            }
        }
// ]]></script>
                </div><!-- /.box-body -->

            </div><!-- /.col -->


          </div><!-- /.row -->




                </div><!-- /.box-body -->

            </div>
        </div>
      </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->
      </div>
    </div>

  <?php include '../layout/datatable_script.php';?>



        <script>
        $(document).ready( function() {
                $('#example2').dataTable( {
                 "language": {
                   "paginate": {
                      "previous": "anterior",
                      "next": "posterior"
                    },
                    "search": "Buscar:",


                  },

                  "info": false,
                  "lengthChange": false,
                  "searching": false,


  "searching": true,
                }

              );
              } );
    </script>

    <?php 
          # code...
   // }
?>
    <!-- /gauge.js -->
  </body>
  <?php include 'barralateralfinal.php';?>
