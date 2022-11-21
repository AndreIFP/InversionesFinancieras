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
  <div class="modal fade"  id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-document" role="document" >
      <div class="modal-content" style="max-width: 1200px ; left:80px;  margin-top: 50px"   >
        <div class="modal-header"  >
          <div class="box-body" >
            <!-- Date range -->
            <form method="post" action="depositar_add.php" enctype="multipart/form-data" class="form-horizontal">
              <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>" required>

              <input type="hidden" class="form-control" id="debe_haber" name="debe_haber" value="debe" required>
              <div class="col-md-12 btn-print">
                <br>

                <div class="form-group">
                  <center>
                    <h5> <strong> Asiento Contable </strong></h5>
                  </center>
                  <hr>
                  
                  <div class="col-md-5 btn-print" style="right: 16px;">
                   <!-- ENTRADA DEl ID ASIENTO-->
                   
                   <div class="form-group">
                   <h5> <strong> Número de Asiento </strong></h5>
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                      <input type="text" class="form-control pull-right" id="descripcion" name="NAsiento" placeholder="Número de Asiento" required>
                    </div>
                  </div>
                  <h5> <strong >Fecha </strong></h5 >
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
                  <h5> <strong> Descripción </strong></h5>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                      <input type="text" class="form-control pull-right" id="descripcion" name="descripcion" placeholder="Descripción del Asiento" required>
                    </div>
                  </div>
                            <!-- ENTRADA PARA LA CUENTA -->
                            <div class="form-group">
                            <h5> <strong> Cuenta principal </strong></h5>
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
                </div>
                <hr>
                <div class="form-group">
                <div class="invoicelist-body">
                <table>
    <thead>
      <th width="10%">Debito</th>
      <th width="10%">Crédito</th>
      <th width="15%">Codigó de Cuenta</th>
      <th width="60%">Nombre Cuenta</th>
      <th width="40%">Descripción</th>
    </thead>
    <tbody>
      <tr>
        <td width='10%'><a class="control removeRow" href="#">x</a><input type="text" name="debito" style="width:150px;height:20px;border:0" maxlength="10"  placeholder="Debito" size="15" value="" oninput="this.value = this.value.replace(/[^0-9]/,'')" required/><br> </td>
        <td width='10%'><input type="text" name="credito" style="width:150px;height:20px;border:0" maxlength="10"  placeholder="Credito" size="15" value="" oninput="this.value = this.value.replace(/[^0-9]/,'')" required/><br> </td>
        <td width='15%'><input type="text" name="codig_cuenta" style="width:150px;height:20px;border:0" maxlength="10"  placeholder="Codigo Cuenta" size="15" value="" oninput="this.value = this.value.replace(/[^0-9]/,'')" required/><br> </td>
        <td width='60%'> 
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-book"></i></span>
                      <select class="form-control" name="cuenta" id="cuenta" required>
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
                  </td>
        <td width='40%'><input type="text" name="descripcion" style="width:250px;height:20px;border:0" maxlength="50"  placeholder="Descripción" size="30" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" value="" required/><br></td>
      </tr>
    </tbody>
  </table>
  <a class="control newRow" href="#">+ Nueva fila</a>
  </div>
  </div>
             
                <div class="col-md-12">
                  <button class="btn btn-primary" id="daterange-btn" name=""> <i class="fa fa-credit-card" aria-hidden="true"></i> Agregar</button>
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
      <i class="fa fa-plus-square" aria-hidden="true"></i> Agregar Asiento </button>
    <?php } ?>
      <a class="btn btn-info" href="../gestiones/Reporte_libro.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;"><i   class="fa fa-file-pdf-o" ></i> Imprimir</a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')</script>
<script src="assets/js/main1.js"></script>

  <?php
  # code...
  // }
  ?>
  <!-- /gauge.js -->

  <?php include 'barralateralfinal.php'; ?>