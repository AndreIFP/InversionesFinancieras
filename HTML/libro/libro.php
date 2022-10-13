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
<title> Libro Diario </title>
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
        

        <!-- top navigation -->
       <?php include '../layout/top_nav.php';?>      <!-- /top navigation -->
       

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
<h6><a  class="btn btn-primary"  href="validacionlibro.php ">Volver Atrás</a></h6>

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
                          <input type="text" class="form-control pull-right" id="descripcion" name="descripcion" required onkeypress="return blockSpecialCharacters(event)" >
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>
   <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Monto a depositar</label>
                        <div class="input-group col-sm-8">
                          <input type="number" class="form-control pull-right" id="monto" name="monto" required >
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>

                    <script>
  function deposito(){
    alert("Deposito Ingresado correctamente");
     }
    </script>

                    <div class="col-md-12">
                       <div class="col-md-12">
                        <button class="btn btn-lg btn-primary btn-print" onclick="deposito()" id="daterange-btn"  name="">DEPOSITAR</button>
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
                            
                          <input type="hidden" class="form-control" id="debe_haber" name="debe_haber" value="haber" required>
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
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Descripcion</label>
                        <div class="input-group col-sm-8">
                          <input type="text" class="form-control pull-right" id="descripcion" name="descripcion" required onkeypress="return blockSpecialCharacters(event)">
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>

   <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Monto a gastar</label>
                        <div class="input-group col-sm-8">
                          <input type="number" class="form-control pull-right" id="monto" name="monto" required >
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>

                    <script>
  function retiro(){
    alert("Retiro Ingresado correctamente");
     }
    </script>

                    <div class="col-md-12">
                       <div class="col-md-12">
                        <button class="btn btn-lg btn-primary btn-print" onclick="retiro()" id="daterange-btn"  name="">RETIRAR GASTO</button>
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
 
 <a class = "btn btn-success btn-print" href = "Libro_Mayor.php"><i class ="glyphicon glyphicon-print"></i> Generar Libro Mayor</a>
 <a class = "btn btn-success btn-print" href = "../gestiones/Reporte_libro.php"><i class ="glyphicon glyphicon-print"></i> Imprimir</a>
<br>


                  <div class="box-header btn btn-primary" >
                  <h3 class="box-title"> Libro Diario</h3>
                  <center><h6><label class="box-title"> Empresa  <?php echo $empresa  ?></label></h6></center>
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
    $query=mysqli_query($con,"select * from libro where id_cliente='$cliente' and fecha >='$fechai' and fecha <='$fechaf' ")or die(mysqli_error());
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

//validacion
        $('.message a').click(function(){
  $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
var y = document.getElementById("frmregistrar");

//validacion no espacios en contraseña
var input = document.getElementById('inpucontra2');
input.addEventListener('input',function(){
     this.value = this.value.trim();
}) 

var input = document.getElementById('inpucontracon');
input.addEventListener('input',function(){
     this.value = this.value.trim();
}) 
var input = document.getElementById('inpucontra');
input.addEventListener('input',function(){
     this.value = this.value.trim();
}) 

//validacion bloqueo de caracteres especiales
function blockSpecialCharacters(e) {
            let key = e.key;
            let keyCharCode = key.charCodeAt(0);
            
            // A-Z
            if(keyCharCode >= 65 && keyCharCode <= 90) {
                return key;
            }
            // a-z
            if(keyCharCode >= 97 && keyCharCode <= 122) {
                return key;
            }

            return false;
    }

    $('#theInput').keypress(function(e) {
        blockSpecialCharacters(e);
    });
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
