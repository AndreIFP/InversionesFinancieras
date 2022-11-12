<?php

session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['empresa'];
$_SESSION['temporada'] = "10";




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
  <?php include '../layout/top_nav2.php'; ?>
  <!-- /top navigation -->


  <!-- page content -->



  <?php
  $id_usuario = $_SESSION['id'];
  $cliente = $_SESSION['cliente'];
  $temporada = $_SESSION['temporada'];
  $fechai = $_SESSION['fechai'];
  $fechaf = $_SESSION['fechaf'];
  $empresa = $_SESSION['empresa'];
  $fecha = date('Y-m-d h:i:s');


  //  if ($guardar=="si") {

  ?>
  <?php include '../layout/header.php'; //ERROR


  //$branch_id = $_GET['id'];
  ?>
  <p></p>
  <section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 12px; ">
    
  <a class="btn btn-primary" href="validacionestado.php"> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
    <div class="box-header">
      <center>
        <h3><strong> Estado de resultado de <?php echo $empresa  ?></strong></h3>
      </center>
    </div><!-- /.box-header -->

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
                <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>" required>

                <input type="hidden" class="form-control" id="debe_haber" name="debe_haber" value="debe" required>
                <div class="col-md-12 btn-print">
                  <br>
                  <div class="form-group">
                    <center>
                      <h5> <strong> Ingresar </strong></h5>
                    </center>
                    <hr>
                    <!-- ENTRADA PARA LA CUENTA -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                        <select class="form-control" name="txtpregunta" id="format" id="txtpregunta" required>
                          <option value="">Seleccione una Cuenta</option>
                          <?php
                          include('../conexion.php');
                          #consulta de todos los paises
                          $consulta = mysqli_query($conn, "SELECT * FROM TBL_CATALAGO_ESTADO ;");
                          while ($row = mysqli_fetch_array($consulta)) {
                            $nombrepais = $row['CUENTA'];
                            $nombeid = $row['CODIGO_CUENTA'];
                          ?>
                            <option class="dropdown-item" value="<?php echo $nombeid ?>"><?php echo $nombrepais ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <!-- ENTRADA PARA LA FECHA -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="date" class="form-control pull-right" id="date" name="fechax" required>
                      </div>
                    </div>
                    <!-- ENTRADA DE LA DESCRIPCION-->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                        <input type="text" class="form-control pull-right" id="descripcion" name="descripcion" placeholder="Descripción del Movimiento" required>
                      </div>
                    </div>

                    <!--ENTRADA DEL MONTO -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        <input type="number" step="0.01" class="form-control pull-right" id="monto" name="monto" placeholder="Ingrese el monto" required>
                      </div>
                    </div>
                  </div>
                  <hr>

                  <div class="col-md-12">
                    <button class="btn btn-primary " id="daterange-btn" name=""> <i class="fa fa-credit-card" aria-hidden="true"></i> INGRESAR </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times-circle" aria-hidden="true"></i> CERRAR</button>
                  </div>

                </div>

              </form>

            </div>
          </div>

        </div>
      </div>
    </div>
    <!--end of modal-->




    <div class="box-body ">
      <!-- BOTONES -->
      <div align="left">
        <button type="button" class="btn btn-primary btn-print" data-toggle="modal" data-target="#miModal">
          <i class="fa fa-plus-square" aria-hidden="true"></i> Ingresar
        </button>
        <a class="btn btn-secondary btn-print" href="../gestiones/Reporte_Estado_Resultado.php"><i class="fa fa-book" aria-hidden="true"></i> Generar Estado de Resulado</a>
        <a class="btn btn-success btn-print" href="../gestiones/Reporte_Resultado.php"><i class="glyphicon glyphicon-print"></i> Imprimir</a>
      </div>

      <hr>
      <table id="example22" class="table ">
        <thead>
          <tr class=" table-primary">

            <th>
              <center> Fecha </center>
            </th>
            <th>
              <center> Cuenta </center>
            </th>
            <th>
              <center> Descripción </center>
            </th>
            <th>
              <center> Monto </center>
            </th>
            <th class="btn-print">
              <center>Acción </center>
            </th>

          </tr>
        </thead>
        <tbody>
          <?php

          // $branch=$_SESSION['branch'];
          $query = mysqli_query($con, "select * from libro2 where id_cliente='$cliente' and fecha >='$fechai' and fecha <='$fechaf' ") or die(mysqli_error($con));
          $i = 1;
          while ($row = mysqli_fetch_array($query)) {
            $monto = $row['monto'];
            $id_libro = $row['id_libro'];
          ?>
            <tr>
              <td>
                <center><?php echo $row['fecha']; ?></center>
              </td>
              <td>
                <center><?php echo $row['cuenta']; ?></center>
              </td>
              <td>
                <center><?php echo $row['descripcion']; ?></center>
              </td>
              <td>
                <center><?php echo $simbolo_moneda . " " . number_format($monto, 2); ?></center>
              </td>


              <td class="btn-print">
                <center>
                  <?php
                  //  if ($eliminar=="si") {

                  ?>
                  <a class="small-box-footer btn-print" href="<?php echo "eliminar_estado.php?monto=$monto&id_libro=$id_libro&debe_haber=$debe_haber&id_usuario=$id_usuario"; ?>" onClick="return confirm('¿Está seguro de que quieres eliminar la transacción?');"><i class="glyphicon glyphicon-remove"></i></a>
                  <?php
                  //    }
                  ?>
                  <?php
                  //     if ($editar=="si") {

                  ?>

                  <?php
                  //    }
                  ?>

                </center>
              </td>
            </tr>
            <!--end of modal-->

          <?php $i++;
          } ?>
        </tbody>

      </table>
    </div>


</secction>
    </div>

    <script type="text/javascript">
      // < ![CDATA[
      function Eliminar(i) {
        document.getElementsByTagName("table")[0].setAttribute("id", "tableid");
        document.getElementById("tableid").deleteRow(i);
      }

      function Buscar() {
        var tabla = document.getElementById('example22');
        var busqueda = document.getElementById('txtBusqueda').value.toLowerCase();
        var cellsOfRow = "";
        var found = false;
        var compareWith = "";
        for (var i = 1; i < tabla.rows.length; i++) {
          cellsOfRow = tabla.rows[i].getElementsByTagName('td');
          found = false;
          for (var j = 0; j < cellsOfRow.length && !found; j++) {
            compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            if (busqueda.length == 0 || (compareWith.indexOf(busqueda) > -1)) {
              found = true;
            }
          }
          if (found) {
            tabla.rows[i].style.display = '';
          } else {
            tabla.rows[i].style.display = 'none';
          }
        }
      }
      // ]]>
    </script>
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

    <?php include '../layout/datatable_script.php'; ?>



    <script>
      $(document).ready(function() {
        $('#example2').dataTable({
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
      });
    </script>

    <?php
    # code...
    // }
    ?>
    <!-- /gauge.js -->
</body>
<?php include 'barralateralfinal.php'; ?>