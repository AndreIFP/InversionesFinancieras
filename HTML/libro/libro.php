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
<!-- script CUENTA -->
<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
		
<script language="javascript">
			$(document).ready(function(){
				$("#cbx_estado").change(function () {

					$('#cbx_casa').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
          
					$("#cbx_estado option:selected").each(function () {
						id_estado = $(this).val();
						$.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});

      $(document).ready(function(){
				$("#cbx_municipio").change(function () {

          

					$("#cbx_municipio option:selected").each(function () {
						id_municipio = $(this).val();
						$.post("includes/getCasa.php", { id_municipio: id_municipio }, function(data){
							$("#cbx_casa").html(data);
						});            
					});
				})
			});

      $(document).ready(function(){
				$("#cbx_casa").change(function () {
					$("#cbx_casa option:selected").each(function () {
						id_casa = $(this).val();
						$.post("includes/getLocalidad.php", { id_casa: id_casa}, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});

		</script>

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">

<!-- partial:index.partial.html -->


  <a class="btn btn-primary" href="validacionlibro.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <br>
  <div class="box-header">
    <center>
      <h3><strong> Libro diario de <?php echo $empresa  ?></strong></h3>
      <h3><strong> del <?php echo $fechai  ?> al  <?php echo $fechaf  ?></strong></h3>
    </center>
  </div><!-- /.box-header -->


  <!--DEPOSITO-->
  <div class="modal fade"  id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-document" role="document" >
      <div class="modal-content" style="max-width: 1200px ; left:80px;  margin-top: 50px"   >
        <div class="modal-header"  >
          <div class="box-body" >
            <!-- Date range -->
            <form id="formasiento" method="POST" action="" enctype="multipart/form-data" class="form-horizontal">
              <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>" required>

              <input type="hidden" class="form-control" id="debe_haber" name="debe_haber" value="debe" required>
              <div class="col-md-11 btn-print">
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
                      <input type="text" class="form-control pull-right" id="descripcion" name="descripcion2" placeholder="Descripción del Asiento" required>
                    </div>
                  </div>
                </div>
                <hr>
                
                <div class="container">
  
                      <div class="table-responsive">
                            <table id="Table_id" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Debito</th>
                                        <th>Crédito</th>
                                        <th>Codigó de Cuenta</th>
                                        <!-- <th>Nombre Cuenta</th> -->
                                        <th>Descripción</th>
                                            }
                                    </tr>
                                </thead>
                                <tbody id="tableToModify">
                                  
                                  <tr id="rowToClone">
                                      <td><input type="text" class="debito" value="0" id="debito1"  name="debito[]" onchange="changeSelect(1)" style="width:150px;height:20px;border:0" maxlength="10"  placeholder="Debito" size="15" value="" oninput="this.value = this.value.replace(/[^0-9]/,'')" /></td>
                                      <td><input type="text" value="0" class="credito" id="credito1" name="credito[]" style="width:150px;height:20px;border:0" maxlength="10"  placeholder="Credito" size="15" value="" oninput="this.value = this.value.replace(/[^0-9]/,'')" /></td>
                                      <td><div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                        <select class="form-control cuentas" onchange="changeSelect(1)" name="cuentas[]" id="cuentas1" required>
                                            <option value="">Seleccione una Cuenta</option>
                                            <?php
                                            include('../conexion.php');
                                            #consulta de todos los paises
                                            $consulta = mysqli_query($conn, "SELECT * FROM TBL_CATALAGO_CUENTAS WHERE CODIGO_CUENTA >='10';");
                                            while ($row = mysqli_fetch_array($consulta)) {
                                              $nombrepais = $row['CUENTA'];
                                              $nombeid = $row['CODIGO_CUENTA'];
                                            ?>
                                              <option class="dropdown-item" value="<?php echo $nombeid ?>"><?php echo $nombeid ?> - <?php echo $nombrepais ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                      </div></td>
                                      <!-- <td><input type="text" name="codig_cuenta[]" style="width:150px;height:20px;border:0" maxlength="10"  placeholder="Codigo Cuenta" size="15" value="<?php echo $nombeid?>" oninput="this.value = this.value.replace(/[^0-9]/,'')" required/></td> -->
                                      <td><input type="text" name="descripcion[]" style="width:250px;height:20px;border:0" maxlength="50"  placeholder="Descripción" size="30" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" value="" required/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="button" onclick="cloneRow()" value="Agregar Nueva Fila"/>
                     </div>

                <div class="col-md-12">
                  <button class="btn btn-primary" id="daterange-btn" name="insertar"> <i class="fa fa-credit-card" aria-hidden="true"></i> Agregar</button>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" onclick="limpiarForm()" data-target="#miModal">
      <i class="fa fa-plus-square" aria-hidden="true"></i> Agregar Asiento </button>
    <?php } ?>
      <a class="btn btn-info" href="../gestiones/Reporte_libro.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;"><i   class="fa fa-file-pdf-o" ></i> Imprimir</a>


    </div>

    <hr>
      
    <table id="example22" class="table">
      <thead>
        <tr class="table-primary">

          <th>
            <center> Id Asiento </center>
          </th>
          <th>
            <center> ID Cliente </center>
          </th>
          <th>
            <center> ID Usuario </center>
          </th>
          <th>
            <center> Fecha</center>
          </th>
          <th>
            <center> Descripcion </center>
          </th>
          <th >
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
        $query = mysqli_query($con, "select * from tbl_asientos where id_cliente='$cliente' ") ;
        $i = 1;
        while ($row = mysqli_fetch_array($query)) {

          
        ?>
          <tr>
            <td>
              <center><?php echo $row['Id_asiento']; ?></center>
            </td>
            <td>
              <center><?php echo $row['Id_Cliente']; ?></center>
            </td>
            <td>
              <center><?php echo $row['Id_usuario']; ?></center>
            </td>
            <td>
              <center><?php echo $row['Fecha']; ?></center>
            </td>
            <td>
              <center><?php echo $row['Descripcion']; ?></center>
            </td>
            <td>
              <center><?php echo $row['montoTotal']; ?></center>
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

  <script>
    function limpiarForm(){
      formasiento.reset();
    }

    
    $(document).ready(function() {
    
    $('#formasiento').submit(function(e) {
        e.preventDefault();
        let formasiento = document.querySelector("#formasiento");
        


        var totalDebito=0;
        var totalCredito=0;
        const sumaCredito = document.querySelectorAll(
            'input[name="credito[]"]'
        );

        sumaCredito.forEach((elemento2) => {
          
          if (isNaN(elemento2.value)) {

          }else{
            
            totalCredito=totalCredito+Number(elemento2.value);
          }

        });

        

        const sumaDebito = document.querySelectorAll(
            'input[name="debito[]"]'
        );

        sumaDebito.forEach((elemento) => {
          if (isNaN(elemento.value)) {

          }else{
            totalDebito=totalDebito+Number(elemento.value);
          }
         
          

        });
       console.log(sumaDebito);
       console.log(sumaCredito);


        if (totalCredito==totalDebito) {
          
            
              let request = window.XMLHttpRequest
            ? new XMLHttpRequest()
            : new ActiveXObject("Microsoft.XMLHTTP");
          let ajaxUrl = "libroInsert.php";
          let formData = new FormData(formasiento);
          formData.append("modo", "insertAsiento");
          request.open("POST", ajaxUrl, true);
          request.send(formData);
          request.onreadystatechange = function () {
          if (request.readyState == 4 && request.status == 200) {
            //console.log(request.responseText);
            let objData = JSON.parse(request.responseText);

            if (objData.status) { 
              alert(objData.msg);
              window.location.reload()
            } 
          }
         }
        }else{
          alert("Revise el debe y el Haber");
          return false;
        }
    });

 






    document.querySelector('.debito').addEventListener('keyup', function() {
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
    })
  });
  function changeSelect(row) {
      let fila=row;
      id=`cuentas${fila}`;
      selectCuenta=document.querySelector(`#${id}`)
      idCuenta=selectCuenta.value;
      //credito
      //selectCuenta.parentNode.parentNode.previousElementSibling.firstElementChild.value=idCuenta
      //debito
      //selectCuenta.parentNode.parentNode.previousSibling.previousSibling.previousElementSibling.firstElementChild.value=idCuenta;


 
      let request = window.XMLHttpRequest
                  ? new XMLHttpRequest()
                  : new ActiveXObject("Microsoft.XMLHTTP");
                let ajaxUrl = "libroInsert.php";
                let formData = new FormData(formasiento);
                formData.append("idCuenta", idCuenta);
                formData.append("modo", "Cuenta");
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                  //console.log(request.responseText);
                  let objData = JSON.parse(request.responseText);
                  let movimiento=objData.data.Movimiento;
                  console.log(objData)
                  if (movimiento==null) { 
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

                  }
                }
              }



      
   
   

     
    }
  </script>


  <?php
const DRIVER='mysql';
const SERVER='localhost';
const DATABASE='2w4GSUinHO';
const USERNAME='root';
const PASSWORD='';
class Conexion{

  public static function conectar(){
      try {
              $pdoOptions = array(
                                      PDO::ATTR_EMULATE_PREPARES => FALSE, 
                                      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''
                                  );

              $link = new PDO(''.DRIVER.':host='.SERVER.';dbname='.DATABASE, USERNAME, PASSWORD, $pdoOptions);
              return $link;

      }catch(PDOException $e){
              echo "Fallo la conexión: " . $e->getMessage();
      }
  }
}

   if(isset($_POST['debito'])){

    
      $id_usuario=$_POST['id_usuario'];
      $NAsiento=$_POST['NAsiento'];
      $fechax=$_POST['fechax'];
      $descripcion=$_POST['descripcion2'];

      $items1=$_POST['debito'];
      $items2=$_POST['credito'];
      $items3=$_POST['cuentas'];
      $items4=$_POST['descripcion'];

    

      $pdo=Conexion::conectar();

      $sumaDebito=array_sum($items1);
      $sumaCredito=array_sum($items2);


    if ($sumaCredito == $sumaDebito) {
      while(true) {

        //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
        $item1 = current($items1);
        $item2 = current($items2);
        $item3 = current($items3);
        $item4 = current($items4);
        
        ////// ASIGNARLOS A VARIABLES ///////////////////
        $debito=(( $item1 !== false) ? $item1 : ", &nbsp;");
        $credito=(( $item2 !== false) ? $item2 : ", &nbsp;");
        $cuentas=(( $item3 !== false) ? $item3 : ", &nbsp;");
        $descripcion=(( $item4 !== false) ? $item4 : ", &nbsp;");

        //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
        $valores='('.$NAsiento.','.$cliente.','.$id_usuario.',"'.$fechax.'","'.$descripcion.'"),';
        //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
        $valoresQ= substr($valores, 0, -1);
        ///////// QUERY DE INSERCIÓN ////////////////////////////
        $sql = "INSERT INTO tbl_asientos (Id_asiento,Id_cliente,Id_usuario,Fecha,Descripcion) 
      VALUES $valoresQ";

      
      //$sqlRes=$conexion->query($sql) or mysql_error();
      
      //$pdo=Conexion::conectar();
      $consulta=$pdo->prepare($sql);

      $consulta -> execute();
      $idProducto = $pdo->lastInsertId();
      
     

       //insertar en Kardex
       $valores2="('.$cuentas.','.$debito.','.$credito.','.$NAsiento.'),";
      
       //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
       $valoresQuery= substr($valores2, 0, -1);
       ///////// QUERY DE INSERCIÓN ////////////////////////////

     
     $sql2 = "INSERT INTO tbl_detallleasientos (Id_cuenta,debito, credito, Id_asiento) VALUES $valoresQuery";

  
     $consulta=$pdo->prepare($sql2);

     $consulta -> execute();

        
        // Up! Next Value
        $item1 = next( $items1 );
        $item2 = next( $items2 );
        $item3 = next( $items3 );
        $item4 = next( $items4 );
        
        // Check terminator
        if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;

    }
      echo "<script> alert('Asiento Insertado');window.location= 'libro.php' </script>";
    }else{
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
  <script  src="script.js"></script>

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