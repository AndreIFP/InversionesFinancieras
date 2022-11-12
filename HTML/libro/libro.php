<?php

session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['empresa'];
$_SESSION['temporada'] = "10";




?>

<title> Libro Diario </title>
<!-- Font Awesome -->
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">


<?php include '../layout/top_nav.php'; ?>
<?php
$id_usuario = $_SESSION['id'];
$cliente = $_SESSION['cliente'];
$temporada = $_SESSION['temporada'];
$fechai = $_SESSION['fechai'];
$fechaf = $_SESSION['fechaf'];
$empresa = $_SESSION['empresa'];
$fecha = date('Y-m-d h:i:s');

?>

<?php include '../layout/header.php'; ?>
<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 12px; ">

  <a class="btn btn-primary" href="validacionlibro.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <br>
  <div class="box-header">
    <center>
      <h3><strong> Libro diario de <?php echo $empresa  ?></strong></h3>
    </center>
  </div><!-- /.box-header -->


  <!--DEPOSITO-->
  <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="box-body">
            <!-- Date range -->
            <form method="post" action="depositar_add.php" enctype="multipart/form-data" class="form-horizontal">
              <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>" required>

              <input type="hidden" class="form-control" id="debe_haber" name="debe_haber" value="debe" required>
              <div class="col-md-12 btn-print">
                <br>
                <div class="form-group">
                  <center>
                    <h5> <strong> DEPÓSITO </strong></h5>
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
                        $consulta = mysqli_query($conn, "SELECT * FROM TBL_CATALAGO_CUENTAS ;");
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
                  <button class="btn btn-primary" id="daterange-btn" name=""> <i class="fa fa-credit-card" aria-hidden="true"></i> DEPOSITAR</button>
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

  <!--RETIRO-->
  <div class="modal fade" id="miModalenviar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:90%;  overflow-y: scroll; display: block;" aria-hidden="false">
      <div class="modal-content">
        <div class="modal-header">
          <div class="box-body">
            <!-- Date range -->



            <form method="post" action="transferir_add.php" enctype="multipart/form-data" class="form-horizontal">
              <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>" required>

              <input type="hidden" class="form-control" id="debe_haber" name="debe_haber" value="haber" required>
              <div class="col-md-12 btn-print">
                <br>
                <div class="form-group">
                  <center>
                    <h5> <strong> RETIRO </strong></h5>
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
                        $consulta = mysqli_query($conn, "SELECT * FROM TBL_CATALAGO_CUENTAS ;");
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
                  <button class="btn btn-primary " id="daterange-btn" name=""> <i class="fa fa-credit-card" aria-hidden="true"></i> RETIRAR </button>
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
    <?php if ($_SESSION['permisos'][M_LIBRO_DIARIO] and $_SESSION['permisos'][M_LIBRO_DIARIO]['w'] == 1) {

    ?>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">
      <i class="fa fa-plus-square" aria-hidden="true"></i> Depositar </button>
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miModalenviar">
      <i class="fa fa-minus-circle" aria-hidden="true"></i> Retirar </button>
    <?php } ?>
      <a class="btn btn-secondary" href="Libro_Mayor.php"><i class="fa fa-book" aria-hidden="true"></i> Generar Libro Mayor</a>
      <a class="btn btn-info" href="../gestiones/Reporte_libro.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;"><i aria-hidden="true" class ="glyphicon glyphicon-print"></i> Imprimir</a>
      <a class="btn btn-light pull-right"><i class="fa fa-money" aria-hidden="true"></i> <strong>Saldo <?php echo $simbolo_moneda . " " . number_format($sumabanco, 2); ?></strong> </a>

    </div>



    <hr>

    <table id="example22" class="table">
      <thead>
        <tr class="table-primary">

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
            <center> Debe </center>
          </th>
          <th>
            <center> Haber </center>
          </th>
          <th class="btn-print">
            <center> Acción </center>
          </th>

        </tr>
      </thead>
      <tbody>
        <?php

        // $branch=$_SESSION['branch'];
        $query = mysqli_query($con, "select * from libro where id_cliente='$cliente' and fecha >='$fechai' and fecha <='$fechaf' ") or die(mysqli_error($con));
        $i = 1;
        while ($row = mysqli_fetch_array($query)) {
          $monto_haber = 0;
          $monto_debe = 0;
          $monto = $row['monto'];
          $id_libro = $row['id_libro'];
          $debe_haber = $row['debe_haber'];

          if ($debe_haber == "debe") {
            $monto_debe = $row['monto'];
          }
          if ($debe_haber == "haber") {
            $monto_haber = $row['monto'];
          }
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
              <center><?php echo $simbolo_moneda . " " . number_format($monto_debe, 2); ?></center>
            </td>
            <td>
              <center><?php echo $simbolo_moneda . " " . number_format($monto_haber, 2); ?></center>
            </td>


            <td class="btn-print">
              <center>
                <?php
                //  if ($eliminar=="si") {

                ?>
                <?php if ($_SESSION['permisos'][M_LIBRO_DIARIO] and $_SESSION['permisos'][M_LIBRO_DIARIO]['d'] == 1) {

                ?>
                    <a class="small-box-footer btn-print" href="<?php echo "eliminar_libro.php?monto=$monto&id_libro=$id_libro&debe_haber=$debe_haber&id_usuario=$id_usuario"; ?>" onClick="return confirm('¿Está seguro de eliminar la transacción?');"><i class="glyphicon glyphicon-remove"></i></a>
                <?php } ?>
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

    //validacion
    $('.message a').click(function() {
      $('form').animate({
        height: "toggle",
        opacity: "toggle"
      }, "slow");
    });
    var y = document.getElementById("frmregistrar");

    //validacion no espacios en contraseña
    var input = document.getElementById('inpucontra2');
    input.addEventListener('input', function() {
      this.value = this.value.trim();
    })

    var input = document.getElementById('inpucontracon');
    input.addEventListener('input', function() {
      this.value = this.value.trim();
    })
    var input = document.getElementById('inpucontra');
    input.addEventListener('input', function() {
      this.value = this.value.trim();
    })

    //validacion bloqueo de caracteres especiales
    function blockSpecialCharacters(e) {
      let key = e.key;
      let keyCharCode = key.charCodeAt(0);

      // A-Z
      if (keyCharCode >= 65 && keyCharCode <= 90) {
        return key;
      }
      // a-z
      if (keyCharCode >= 97 && keyCharCode <= 122) {
        return key;
      }

      return false;
    }

    $('#theInput').keypress(function(e) {
      blockSpecialCharacters(e);
    });
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

  <?php include 'barralateralfinal.php'; ?>