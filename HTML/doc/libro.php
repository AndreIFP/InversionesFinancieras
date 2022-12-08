<?php 
session_start();
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

?>
<div class="container body">

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


 <button type="button" class="btn btn-primary btn-lg btn-print" data-toggle="modal" data-target="#miModal">
  DEPOSITAR
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
                  <form method="post" action="depositar_add.php" enctype="multipart/form-data" class="form-horizontal">
                      <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario;?>" required>
                            <input type="hidden" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha;?>" required>
                          <input type="hidden" class="form-control" id="debe_haber" name="debe_haber" value="debe" required>
                    <div class="col-md-12 btn-print">

                    
                        <br>
                      <div class="form-group">
          <label for="date" class="col-sm-3 control-label">Cuenta</label>
          <div class="select">
          <select name="cuenta" id="format" id="txtpregunta" >
          <option selected disabled>seleccione una Cuenta</option>
             <?php 
              include('../conexion.php');
                
                #consulta de todos los paises
                $consulta=mysqli_query($conn,"SELECT * FROM tbl_catalago_cuentas ;" );
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

                      
                    </div>
   <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Monto a Anadir</label>
                        <div class="input-group col-sm-8">
                          <input type="text" class="form-control pull-right" id="monto" name="monto" required >
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>



                    <div class="col-md-12">
                       <div class="col-md-12">
                        <button class="btn btn-lg btn-primary btn-print" id="daterange-btn"  name="">DEPOSITAR</button>
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

 <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Impresión</a>

<br>
<form class = "btn btn-white btn-print">
                      Busqueda: <input id="txtBusqueda" type="text" onkeyup="Buscar();" />

</form>


                  <div class="box-header btn btn-primary" >
                  <h3 class="box-title"> Estado de Resultado</h3>
                </div><!-- /.box-header -->
                <div class="box-body ">
                
                  <table id="example22" class="table table-bordered table-striped">
                    <thead>
                      <tr class=" btn-success">


                        
                          
                      <!-- <th> Fecha </th> -->
                          <th> Cuenta </th>
                  <th> Monto </th>
                       <th class="btn-print"> Accion </th>

                      </tr>
                    </thead>
                    <tbody>
<?php

   // $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from tbl_estado_RESULTADO where Id_Usuario='$id_usuario' ")or die(mysqli_error());
    $i=1;
    while($row=mysqli_fetch_array($query)){
$monto_debe=0;
$monto=$row['Monto'];
    $id_libro=$row['Id_Cuenta'];
       
$monto_debe=$row['Monto'];

?>
                      <tr >
              <!-- <td><?php echo $row['Fecha'];?></td> -->
            <td><?php echo $row['Cuenta'];?></td>
              <td><?php echo $monto_debe;?></td>
      

                        <td class="btn-print">
                                   <?php
                    //  if ($eliminar=="si") {
                    
                      ?>
   <a class="small-box-footer btn-print"  href="<?php  echo "eliminar_libro.php?monto=$monto&id_libro=$id_libro&debe_haber=$debe_haber&id_usuario=$id_usuario";?>" onClick="return confirm('¿Está seguro de que quieres eliminar transaccion??');"><i class="glyphicon glyphicon-remove"></i></a>
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
        <footer>
          <div class="pull-right">
             <a href=""></a>
          </div>
          <div class="clearfix"></div>
        </footer>
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
</html>
