<?php 

session_start();
$_SESSION['id'];
$_SESSION['cliente'];


?>

<?php include '../layout/header.php';


//$branch_id = $_GET['id'];
?>
<title>Estado de Resultado</title>
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
        

        <!-- top navigation -->
       <?php include '../layout/top_nav.php';?>      <!-- /top navigation -->
       <style>
body{
  background-color: #fff;

}
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

select {
   -webkit-appearance:none;
   -moz-appearance:none;
   -ms-appearance:none;
   appearance:none;
   outline:0;
   box-shadow:none;
   border:0!important;
   
   background: #969696;
   background-image: none;
   flex: 1;
   padding: 0 .5em;
   color:#fff;
   cursor:pointer;
   font-size: 1em;
   font-family: 'Open Sans', sans-serif;
}
select::-ms-expand {
   display: none;
      border-color: #5cb85c;
}
.select {
   position: relative;
   display: flex;
   width: 17em;
   height: 3em;
   line-height: 3;
   
   overflow: hidden;
   border-radius: .25em;

}
.select::after {
   content: '\25BC';
   position: absolute;
   top: 0;
   right: 0;
   padding: 0 1em;
   background: #2b2e2e;
   cursor:pointer;
   pointer-events:none;
   transition:.25s all ease;
}
.select:hover::after {
   color: #d9534f;
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
                    $cliente=$_SESSION['cliente'];
                            $fecha = date('Y-m-d h:i:s');
                

                //  if ($guardar=="si") {
                    
                      ?>
</head>
<h6><a  class="btn btn-primary"  href="javascript:history.back()">Volver Atrás</a></h6>
</head>

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
          <select name="txtpregunta" id="format" id="txtpregunta" >
          <option selected disabled>seleccione una Cuenta</option>
             <?php 
              include('../conexion.php');
                
                #consulta de todos los paises
                $consulta=mysqli_query($conn,"SELECT * FROM TBL_CATALAGO_CUENTAS ;" );
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

                      <div class="form-group">
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



 <button type="button" class="btn btn-warning btn-lg btn-print" data-toggle="modal" data-target="#miModalenviar">
  RETIRAR
</button>
     <?php
                 //     }
                      ?>
<div class="modal fade" id="miModalenviar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog"  role="document"style="width:90%;  overflow-y: scroll; display: block;" aria-hidden="false">
    <div class="modal-content">
      <div class="modal-header">
                        <div class="box-body">
                  <!-- Date range -->



                  <form method="post" action="transferir_add.php" enctype="multipart/form-data" class="form-horizontal">
                      <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario;?>" required>
                            <input type="hidden" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha;?>" required>
                          <input type="hidden" class="form-control" id="debe_haber" name="debe_haber" value="haber" required>
                    <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Descripcion</label>
                        <div class="input-group col-sm-8">
                          <input type="text" class="form-control pull-right" id="descripcion" name="descripcion" required >
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>
   <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Monto a gastar</label>
                        <div class="input-group col-sm-8">
                          <input type="text" class="form-control pull-right" id="monto" name="monto" required >
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>



                    <div class="col-md-12">
                       <div class="col-md-12">
                        <button class="btn btn-lg btn-primary btn-print" id="daterange-btn"  name="">RETIRAR GASTO</button>
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
 <a href="Estado_Resultado.php" style="font-size:18px" >Estado de Resultado</a>
<br>
 <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Impresión</a>

<br>
<form class = "btn btn-white btn-print">
                      Busqueda: <input id="txtBusqueda" type="text" onkeyup="Buscar();" />

</form>


                  <div class="box-header btn btn-primary" >
                  <h3 class="box-title">Estado de Resultado</h3>
                </div><!-- /.box-header -->
                <div class="box-body ">
                
                  <table id="example22" class="table table-bordered table-striped">
                    <thead>
                      <tr class=" btn-success">


                        
                          

                          <th> fecha </th>
                          <th> cuenta </th>
                          <th> Descripcion </th>
                  <th> Debe </th>
                  <th> Haber </th>
                       <th class="btn-print"> Accion </th>

                      </tr>
                    </thead>
                    <tbody>
<?php

   // $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from libro where id_cliente='$cliente' and temporada='$temporada' ")or die(mysqli_error());
    $i=1;
    while($row=mysqli_fetch_array($query)){
      $monto_haber=0;
      $monto_debe=0;
      $monto=$row['monto'];
      $id_libro=$row['id_libro'];
      $debe_haber=$row['debe_haber'];
       
    if($debe_haber=="debe"){
      $monto_debe=$row['monto'];

        }
    if($debe_haber=="haber"){
      $monto_haber=$row['monto'];

        }
?>
                      <tr >
              <td><?php echo $row['fecha'];?></td>
              <td><?php echo $row['cuenta'];?></td>
            <td><?php echo $row['descripcion'];?></td>
              <td><?php echo $monto_debe;?></td>
 <td><?php echo $monto_haber;?></td>
      

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
