<!-- -----------------------------------------------------------------------
	    Universidad Nacional Autonoma de Honduras (UNAH)
		           Facultad de Ciencias Economicas
	        Departamento de Informatica administrativa
        Analisis, Programacion y Evaluacion de Sistemas
                    Primer Periodo 2022


Equipo:
Allan Mauricio Hernández ...... (mauricio.galindo@unah.hn)
Andrés Isaías Flores .......... (aifloresp@unah.hn)
Esperanza Lisseth Cartagena ... (esperanza.cartagena@unah.hn)
Fanny Merari Ventura .......... (fmventura@unah.hn
José David García ............. (jdgarciad@unah.hn)
José Luis Martínez ............ (jlmartinezo@unah.hn)
Luis Steven Vásquez ........... (Lsvasquez@unah.hn)
Sara Raquel Ortiz ............. (Sortizm@unah.hn)

Catedratico:
LIC. CLAUDIA REGINA NUÑEZ GALINDO
Lic. GIANCARLO MARTINI SCALICI AGUILAR
Lic. KARLA MELISA GARCIA PINEDA 

----------------------------------------------------------------------

Programa:          libro
Fecha:             16-jul-2022
Programador:       David
descripcion:       pantalla

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Luis	          01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
David		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara 	          01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Andrés		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php

session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['empresa'];
$_SESSION['temporada'] = "10";
$_SESSION['Idtemporada'];

date_default_timezone_set('America/Tegucigalpa');


?>

<title> Libro Diario </title>
<!-- script CUENTA -->
<script language="javascript" src="js/jquery-3.1.1.min.js"></script>

<script language="javascript">
  $(document).ready(function() {
    $("#cbx_estado").change(function() {

      $('#cbx_casa').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
      $('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

      $("#cbx_estado option:selected").each(function() {
        id_estado = $(this).val();
        $.post("includes/getMunicipio.php", {
          id_estado: id_estado
        }, function(data) {
          $("#cbx_municipio").html(data);
        });
      });
    })
  });

  $(document).ready(function() {
    $("#cbx_municipio").change(function() {



      $("#cbx_municipio option:selected").each(function() {
        id_municipio = $(this).val();
        $.post("includes/getCasa.php", {
          id_municipio: id_municipio
        }, function(data) {
          $("#cbx_casa").html(data);
        });
      });
    })
  });

  $(document).ready(function() {
    $("#cbx_casa").change(function() {
      $("#cbx_casa option:selected").each(function() {
        id_casa = $(this).val();
        $.post("includes/getLocalidad.php", {
          id_casa: id_casa
        }, function(data) {
          $("#cbx_localidad").html(data);
        });
      });
    })
  });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">

<script>
$( document ).ready(function() {
  $('#miModales').modal('toggle')
});
</script>


<?php include '../layout/top_nav.php'; ?>
<?php
$id_usuario = $_SESSION['id'];
$cliente = $_SESSION['cliente'];
$temporada = $_SESSION['temporada'];
$fechai = $_SESSION['fechai'];
$fechaf = $_SESSION['fechaf'];
$empresa = $_SESSION['empresa'];
$Idperiodo=$_SESSION['Idtemporada'];
$fecha = date('Y-m-d h:i:s');
$asiento2 = $_REQUEST['asiento'];

?>

<?php include '../layout/header.php'; ?>
<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 12px; ">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel="stylesheet" href="./style.css">

  <style>
    .colored-toast.swal2-icon-info {
      background-color: #3fc3ee !important;
    }
  </style>

  <!-- partial:index.partial.html -->


  <a class="btn btn-primary" href="validacionlibro.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <br>

  <div class="box-header">
    <center>
      <h3><strong> Libro diario de <?php echo $empresa  ?></strong></h3>
      <h3><strong> del <?php echo $fechai  ?> al <?php echo $fechaf  ?></strong></h3>
    </center>
  </div><!-- /.box-header -->


  <!--DEPOSITO-->
  <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-document" role="document">
      <div class="modal-content" style="max-width: 1200px ; left:80px;  margin-top: 50px">
        <div class="modal-header">
          <div class="box-body">
            <!-- Date range -->
            <!-- Mauri -->
            <form id="formasiento" method="POST" action="" enctype="multipart/form-data" class="form-horizontal">
              <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>" required>

              <input type="hidden" class="form-control" id="debe_haber" name="debe_haber" value="debe" required>
             
              <div class="col-md-5 btn-print" >
              <div class="container" align="right" >
                
                <br>
                
                
                <div class="form-group">
                  <center>
                    <h5> <strong>REGISTRO DE ASIENTOS CONTABLES</strong></h5>
                    <h3><strong> del <?php echo $fechai ?> al <?php echo $fechaf  ?></strong></h3>
                  </center>
                  <hr>

                  <div class="row">

<div class="col-xs-14 pull-right">

  <table class="table">
    <thead class="table-primary">
      <tr>

        <th>
          <center><strong>Fecha </strong></center>
        </th>


        <th>
          <center><strong>Descripción</strong></center>
        </th>

       

      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 40%">


                  
        <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-calendar"></i>  <strong ></strong></span>
                  <input type="date" class="form-control pull-right"   id="date" name="fechax" 
                 name="party" min=<?php echo $fechai  ?> max=<?php echo $fechaf  ?> required>
                </div>
            

        </td>
<br>
        <td style="width: 60%">

                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i><strong></strong></span>
                   <input type="text" class="form-control pull-right" id="descripcion" name="descripcion2" placeholder="Descripción del Asiento" required>
                 </div>
               

        </td>


        

      </tr>

    </tbody>
  </table>

</div>

</div>
                  <!-- ENTRADA PARA LA FECHA -->
                  
                 
                  <!-- ENTRADA DE LA DESCRIPCION-->
                  
                </div>
                <hr>
                
</die
                <div class="container" align="center" >
  
  <div class="table-responsive" align="center">
        <table id="Table_id" class="table table-primary" align="center">
            <thead>
                <tr>
                    <th><CENTER><STRONG>DEBE</STRONG></CENTER></th>
                    <th><CENTER><STRONg>HABER</STRONg></CENTER></th>
                    <th><CENTER><STRONg>CUENTA PRINCIPAL</STRONg></CENTER></th>
                    <th><CENTER><STRONg>CUENTA AUXILIAR</STRONg></CENTER></th>
                </tr>
            </thead>
            <tbody id="tableToModify" align="center">
              
              <tr id="rowToClone" align="center">
                  <td><input type="number" step="0.01" class="debito" value="0" id="debito1"  name="debito[]" onkeyup="keyAlert(this)"  onchange="changeDebito(1)" style="width:150px;height:20px;border:0" maxlength="10"  placeholder="Debito" size="15" value=""/></td>
                  <td><input type="number" step="0.01" value="0" class="credito" id="credito1" name="credito[]" style="width:150px;height:20px;border:0" maxlength="10" onchange="changeCredito(1)" onkeyup="keyAlert(this)"  placeholder="Credito" size="15" value=""/></td>
                  <td><div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-book"></i></span>
                    <select class="form-control cuentas" onchange="changeSelect(1)" name="cuentas[]" id="cuentas1" required>
                        <option value="">Seleccione una Cuenta</option>
                        <?php
                        include('../conexion.php');
                        #consulta de todos los paises
                        $consulta = mysqli_query($conn, "select CODIGO_CUENTA, CUENTA as CUENTA  from tbl_catalago_cuentas c
                        where char_length(c.CODIGO_CUENTA)=4 and Estado_Cuenta='ACTIVO'");
                        while ($row = mysqli_fetch_array($consulta)) {
                          $nombrepais = $row['CUENTA'];
                          $nombeid = $row['CODIGO_CUENTA'];
                        ?>
                          <option class="dropdown-item" value="<?php echo $nombeid ?>"> <?php echo $nombrepais ?></option>
                        <?php
                        }
                        ?>
                    </select>
                  </div></td>
                  <!-- <td><input type="text" name="codig_cuenta[]" style="width:150px;height:20px;border:0" maxlength="10"  placeholder="Codigo Cuenta" size="15" value="<?php echo $nombeid?>" oninput="this.value = this.value.replace(/[^0-9]/,'')" required/></td> -->
                  <td><div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-book"></i></span>
                    <select class="form-control cuentas" name="descripcion[]" id="descripcion2" required>
                       
                  </div></td>
                </tr>
            </tbody>
        </table>
    </div>
    <button type="button" class="btn btn-success" onclick="cloneRow()"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Fila </button> 
 </div>

                <div class="col-md-12">
                  <button class="btn btn-primary" id="daterange-btn" name="insertar"><i class="fa fa-floppy-o" aria-hidden="true"></i> Agregar</button>
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



        <form method="post" action="procebalanza.php" enctype="multipart/form-data">
          <button type="button" class="btn btn-primary" data-toggle="modal" onclick="limpiarForm()" data-target="#miModal">

            <i class="fa fa-plus-square" aria-hidden="true"></i> Agregar Asiento </button>
          <a class="btn btn-warning" href="../gestiones/Reporte_libro.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;"><i class="fa fa-file-pdf-o"></i> Imprimir</a>
          <a class="btn btn-success" href="../gestiones/reporte_excel_libro.php"  ><i class="fa fa-file-excel-o"></i> Excel</a>
          <button type="submit" name="btnregistrarx" class="btn btn-info"><i class="fa fa-plus-square" aria-hidden="true"></i> Balanza de Comprobación</button>


        <?php } ?>

        </form>

    </div>

    <hr>
    <table id="example22" class="table">
      <thead>
        <tr class="table-primary">

          <th>
            <center> No. Asiento </center>
          </th>

          <th>
            <center> Usuario </center>
          </th>
          <th>
            <center> Fecha</center>
          </th>
          <th>
            <center> Descripcion </center>
          </th>
          <th>
            <center> Monto </center>
          </th>
          <th class="btn-print">
            <center> Acción </center>
          </th>



        </tr>
      </thead>
      <tbody>
        <?php

        // $branch=$_SESSION['branch'];
        $query = mysqli_query($conn, "select ta.Id_asiento,tu.Usuario ,ta.Fecha,ta.Descripcion,ta.montoTotal  from tbl_asientos ta
        join tbl_usuario tu on ta.Id_Usuario=tu.Id_Usuario 
        where ta.Id_Cliente='$cliente' and ta.Id_periodo='$Idperiodo'");
        $i = 1;
        while ($row = mysqli_fetch_array($query)) {

          $asiento = $row['Id_asiento'];

        ?>
          <tr>
            <td>
              <center><?php echo $row['Id_asiento']; ?></center>
            </td>
            <td>
              <center><?php echo $row['Usuario']; ?></center>
            </td>
            <td>
              <center><?php echo $row['Fecha']; ?></center>
            </td>
            <td>
              <center><?php echo $row['Descripcion']; ?></center>
            </td>
            <td>
            <center><?php echo number_format($row['montoTotal'],2); ?></center>
            </td>
            <td class="btn-print">
              <center>
                <?php
                //  if ($eliminar=="si") {

                ?>
                <?php if ($_SESSION['permisos'][M_LIBRO_DIARIO] and $_SESSION['permisos'][M_LIBRO_DIARIO]['d'] == 1) {

                ?>
                  <a class="small-box-footer btn-print" href="libro2.php?asiento=<?php echo $asiento ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>

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
            <td>



          </tr>
          <!--end of modal-->

        <?php $i++;
        } ?>
      </tbody>

    </table>
  </div>


  <!--DEPOSITO-->
  <div class="modal fade" id="miModales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                      <h5> <strong> DETALLES DE ASIENTO NÚMERO <?php echo $asiento2 ?>  </strong></h5>
                    </center>
                    <hr>
                    <!-- ENTRADA PARA LA CUENTA -->
                    <div class="form-group">
                      <div class="input-group">                        
                          <?php
                          include('../conexion.php');
                          #consulta de todos los paises
                          $consulta = mysqli_query($conn, "SELECT * FROM tbl_detallleasientos;");
                          while ($row = mysqli_fetch_array($consulta)) {
                            $Id_detalle = $row['Id_detalle'];
                            
                            $CODIGO_CUENTA = $row['CODIGO_CUENTA'];
                            $debito = $row['debito'];
                            $credito = $row['credito'];
                          }
                          ?>
                      </div>
                    </div>
<?php

?>
                    

                    <table id="example22" class="table">
      <thead>
        <tr class="table-primary">

          
          <th>
            <center><STRONG>CUENTA</STRONG>  </center>
          </th>
          <th>
            <center><STRong>DEBE</STRong>  </center>
          </th>
          <th>
            <center><STRONG> HABER</STRONG></STRONG></center>
          </th>
          
         


        </tr>
      </thead>
      <tbody>
        <?php

        // $branch=$_SESSION['branch'];
        $query = mysqli_query($con, "SELECT tcc.CUENTA AS CODIGO_CUENTA,td.debito,td.credito  from tbl_detallleasientos td
        JOIN tbl_catalago_cuentas tcc ON td.descripcion=tcc.CODIGO_CUENTA  where Id_asiento='$asiento2' ") ;
        $i = 1;
        while ($row = mysqli_fetch_array($query)) {

          
        ?>
          <tr>
           
            <td>
              <center><?php echo $row['CODIGO_CUENTA']; ?></center>
            </td>
            <td>
              <center><?php echo $row['debito']; ?></center>
            </td>
            <td>
              <center><?php echo $row['credito']; ?></center>
            </td>
           
              <center>
                <?php
                //  if ($eliminar=="si") {

                ?>
                <?php if ($_SESSION['permisos'][M_LIBRO_DIARIO] and $_SESSION['permisos'][M_LIBRO_DIARIO]['d'] == 1) {

                ?>
                    
                       
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
            <td>
            
            
            
          </tr>
          <!--end of modal-->

        <?php $i++;
        } ?>
      </tbody>

    </table>

                    <!-- SALIDA -->

                  <div class="col-md-12">
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


  </secction>
  </div>

  <script>
    function limpiarForm() {
      formasiento.reset();
    }


    $(document).ready(function() {

      $('#formasiento').submit(function(e) {
        e.preventDefault();
        let formasiento = document.querySelector("#formasiento");



        var totalDebito = 0;
        var totalCredito = 0;
        const sumaCredito = document.querySelectorAll(
          'input[name="credito[]"]'
        );

        sumaCredito.forEach((elemento2) => {

          if (isNaN(elemento2.value)) {

          } else {

            totalCredito = totalCredito + Number(elemento2.value);
          }

        });



        const sumaDebito = document.querySelectorAll(
          'input[name="debito[]"]'
        );

        sumaDebito.forEach((elemento) => {
          if (isNaN(elemento.value)) {

          } else {
            totalDebito = totalDebito + Number(elemento.value);
          }



        });
        console.log(sumaDebito);
        console.log(sumaCredito);


        if (totalCredito == totalDebito) {


          let request = window.XMLHttpRequest ?
            new XMLHttpRequest() :
            new ActiveXObject("Microsoft.XMLHTTP");
          let ajaxUrl = "libroInsert.php";
          let formData = new FormData(formasiento);
          formData.append("modo", "insertAsiento");
          request.open("POST", ajaxUrl, true);
          request.send(formData);
          request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
              //console.log(request.responseText);
              let objData = JSON.parse(request.responseText);

              if (objData.status) {
                alert(objData.msg);
                window.location.reload()
              }
            }
          }
        } else {
          alert("Revise el debe y el Haber");
          return false;
        }
      });








      /*   document.querySelector('.debito').addEventListener('keyup', function() {
          debito= document.querySelector('.debito');
          credito=debito.parentNode.nextElementSibling.firstChild;
         
          //console.log(credito);
          if (debito.value>0) {
            credito.readOnly  =true;
            credito.value=0;

          }else{
            credito.readOnly  =false;
            
          } 
        })

        document.querySelector('#credito').addEventListener('keyup', function() {
          debito=document.querySelector('#debito');
          credito=document.querySelector('#credito').value;

          if (credito>0) {
            debito.readOnly =true;
            debito.value=0;

          }else{
            debito.readOnly =false;
            
          }
        }) */



    });

    function changeDebito(row) {
      let fila = row;
      id = `debito${fila}`;
      selecDebito = document.querySelector(`#${id}`);
      valorDebito = selecDebito.value;
      // selecion del campo credto selecDebito.parentNode.nextElementSibling.firstChild
      credito = selecDebito.parentNode.nextElementSibling.firstChild;
      if (valorDebito > 0) {
        credito.readOnly = true;
        credito.value = 0;
      } else {
        credito.readOnly = false;
      }
    }

    function changeCredito(row) {
      let fila = row;
      id = `credito${fila}`;
      selecCredito = document.querySelector(`#${id}`);
      valorCredito = selecCredito.value;


      // selecion del campo debito selecCredito.parentNode.previousElementSibling.firstChild
      debito = selecCredito.parentNode.previousElementSibling.firstChild;
      if (valorCredito > 0) {
        debito.readOnly = true;
        debito.value = 0;
      } else {
        debito.readOnly = false;
      }

    }

    var Toast = Swal.mixin({
      toast: true,
      position: 'top',
      iconColor: 'white',
      showConfirmButton: false,
      timer: 3000,
      customClass: {
        popup: 'colored-toast'
      },
    });

    function keyAlert(fila) {
      if (fila.hasAttribute("readOnly")) {
        Toast.fire({
          icon: 'info',
          title: 'Campo Desactivado'
        })
      }

    }


    function changeSelect(row) {
      let fila = row;
      id = `cuentas${fila}`;
      selectCuenta = document.querySelector(`#${id}`)
      idCuenta = selectCuenta.value;
      console.log(idCuenta);
      //credito
      //selectCuenta.parentNode.parentNode.previousElementSibling.firstElementChild.value=idCuenta
      //debito
      //selectCuenta.parentNode.parentNode.previousSibling.previousSibling.previousElementSibling.firstElementChild.value=idCuenta;



      let request = window.XMLHttpRequest ?
        new XMLHttpRequest() :
        new ActiveXObject("Microsoft.XMLHTTP");
      let ajaxUrl = "libroInsert.php";
      let formData = new FormData(formasiento);
      formData.append("idCuenta", idCuenta);
      formData.append("modo", "Cuenta");
      request.open("POST", ajaxUrl, true);
      request.send(formData);
      request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
          //console.log(request.responseText);
          let objData = JSON.parse(request.responseText);
          //let movimiento=objData.data.Movimiento;
          console.log(objData)

          Select2 = document.querySelector("#descripcion2");
          var option = document.createElement("option");
          //option.html = objData.html;
          //Select2.innerHTML=objData.data;
          //console.log(option)
          //Select2.add(option);
          console.log();

          selectCuenta.parentNode.parentNode.nextElementSibling.firstChild.firstChild.nextElementSibling.nextElementSibling.innerHTML = objData.data;
          /*  if (movimiento==null) { 
             alert("seleccione una cuenta deudora o acreedora");
             //credito
             selectCuenta.parentNode.parentNode.previousElementSibling.firstElementChild.readOnly =true;
             selectCuenta.parentNode.parentNode.previousElementSibling.firstElementChild.value=0;
             //debito
               selectCuenta.parentNode.parentNode.previousSibling.previousSibling.previousElementSibling.firstElementChild.readOnly =true;
               selectCuenta.parentNode.parentNode.previousSibling.previousSibling.previousElementSibling.firstElementChild.value=0
             
           }else{
             if (movimiento=="Deudor") {
               //credito
               selectCuenta.parentNode.parentNode.previousElementSibling.firstElementChild.readOnly =true;

               selectCuenta.parentNode.parentNode.previousElementSibling.firstElementChild.value=0;
               //debito
               selectCuenta.parentNode.parentNode.previousSibling.previousSibling.previousElementSibling.firstElementChild.readOnly =false;
               
             }else if (movimiento=="Acreedor") {
               //credito
               selectCuenta.parentNode.parentNode.previousElementSibling.firstElementChild.readOnly =false
               //debito
             selectCuenta.parentNode.parentNode.previousSibling.previousSibling.previousElementSibling.firstElementChild.readOnly =true;
             selectCuenta.parentNode.parentNode.previousSibling.previousSibling.previousElementSibling.firstElementChild.value=0;
               
               
             }

           } */
        }
      }
a







    }
  </script>


  <?php
  const DRIVER = 'mysql';
  const SERVER = '142.44.161.115';
  const DATABASE = '2w4GSUinHO';
  const USERNAME = 'CALAPAL';
  const PASSWORD = 'Calapal##567';
  class Conexion
  {

    public static function conectar()
    {
      try {
        $pdoOptions = array(
          PDO::ATTR_EMULATE_PREPARES => FALSE,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''
        );

        $link = new PDO('' . DRIVER . ':host=' . SERVER . ';dbname=' . DATABASE, USERNAME, PASSWORD, $pdoOptions);
        return $link;
      } catch (PDOException $e) {
        echo "Fallo la conexión: " . $e->getMessage();
      }
    }
  }

  if (isset($_POST['debito'])) {


    $id_usuario = $_POST['id_usuario'];
    $NAsiento = $_POST['NAsiento'];
    $fechax = $_POST['fechax'];
    $descripcion = $_POST['descripcion2'];

    $items1 = $_POST['debito'];
    $items2 = $_POST['credito'];
    $items3 = $_POST['cuentas'];
    $items4 = $_POST['descripcion'];



    $pdo = Conexion::conectar();

    $sumaDebito = array_sum($items1);
    $sumaCredito = array_sum($items2);


    if ($sumaCredito == $sumaDebito) {
      while (true) {

        //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
        $item1 = current($items1);
        $item2 = current($items2);
        $item3 = current($items3);
        $item4 = current($items4);

        ////// ASIGNARLOS A VARIABLES ///////////////////
        $debito = (($item1 !== false) ? $item1 : ", &nbsp;");
        $credito = (($item2 !== false) ? $item2 : ", &nbsp;");
        $cuentas = (($item3 !== false) ? $item3 : ", &nbsp;");
        $descripcion = (($item4 !== false) ? $item4 : ", &nbsp;");

        //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
        $valores = '(' . $NAsiento . ',' . $cliente . ',' . $id_usuario . ',"' . $fechax . '","' . $descripcion.'" ,"'.$Idperiodo.'"),';
        //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
        $valoresQ = substr($valores, 0, -1);
        ///////// QUERY DE INSERCIÓN ////////////////////////////
        $sql = "INSERT INTO tbl_asientos (Id_asiento,Id_cliente,Id_usuario,Fecha,Descripcion,Id_periodo) 
      VALUES $valoresQ";


        //$sqlRes=$conexion->query($sql) or mysql_error();

        //$pdo=Conexion::conectar();
        $consulta = $pdo->prepare($sql);

        $consulta->execute();
        $idProducto = $pdo->lastInsertId();



        //insertar en Kardex
        $valores2 = "('.$cuentas.','.$debito.','.$credito.','.$NAsiento.','.$Idperiodo.'),";

        //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
        $valoresQuery = substr($valores2, 0, -1);
        ///////// QUERY DE INSERCIÓN ////////////////////////////


        $sql2 = "INSERT INTO tbl_detallleasientos (Id_cuenta,debito, credito, Id_asiento,Id_periodo) VALUES $valoresQuery";


        $consulta = $pdo->prepare($sql2);

        $consulta->execute();


        // Up! Next Value
        $item1 = next($items1);
        $item2 = next($items2);
        $item3 = next($items3);
        $item4 = next($items4);

        // Check terminator
        if ($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
      }
      echo "<script> alert('Asiento Insertado');window.location= 'libro.php' </script>";
    } else {
      echo "<script> alert('Revisar Debito y Credito'); </script>";
    }
  }
  ?>

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
  <!-- partial -->
  <script src="script.js"></script>

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
