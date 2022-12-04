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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<style>
  .colored-toast.swal2-icon-info {
    background-color: #3fc3ee !important;
  }
</style>

<!-- partial:index.partial.html -->


  <a class="btn btn-primary" href="libro.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <br>

  <div class="box-header">
    <center>
      <h3><strong> Balanza General de <?php echo $empresa  ?></strong></h3>
      <h3><strong> del <?php echo $fechai  ?> al  <?php echo $fechaf  ?></strong></h3>
    </center>
  </div><!-- /.box-header -->


  

  <div class="box-body ">
    <!-- BOTONES -->
    <div align="left">
    <?php if ($_SESSION['permisos'][M_LIBRO_DIARIO] and $_SESSION['permisos'][M_LIBRO_DIARIO]['w'] == 1) {

    ?>
    


<a class="btn btn-info" href="../libro/Resultado.php"><i   class="fa fa-file-pdf-o" ></i> Estado de resultados</a>
    <?php } ?>
      <a class="btn btn-info" href="../libro/Balanzageneral.php"><i   class="fa fa-file-pdf-o" ></i> Balance Genal</a>
      

    </div>

    <hr>
    <table id="example22" class="table">
      <thead>
        <tr class="table-primary">
        <th>
            <center> Codigo Cuenta</center>
          </th>
        <th>
            <center> Cuenta</center>
          </th>
          <th>
            <center>Monto Haber </center>
          </th>
          <th >
            <center>Monto Debe </center>
          </th>
          <th>
            <center>Saldo Debe </center>
          </th>
          <th >
            <center>Saldo Haber </center>
          </th>


         


        </tr>
      </thead>
      <tbody>
        <?php

        // $branch=$_SESSION['branch'];
        $query = mysqli_query($con, " SELECT tcc.CODIGO_CUENTA,tcc.CUENTA ,tb.Mhaber,tb.Mdebe,tb.Sdebe,tb.SAcreedor  
        FROM  Tbl_Balanza tb join tbl_catalago_cuentas tcc 
        where tb.COD_CUENTA=tcc.CODIGO_CUENTA and tb.Id_cliente ='$cliente'  and tb.Mhaber!=tb.Mdebe; ") ;
        $i = 1;
        while ($row = mysqli_fetch_array($query)) {
      
          
        ?>
          <tr>

            <td style="text-align:left;">
              <?php echo $row['CODIGO_CUENTA']; ?>
            </td>
            <td style="text-align:left;">
              <?php echo $row['CUENTA']; ?>
            </td>
            <td  style="text-align:right;">
              <?php echo $row['Mhaber']; ?>
            </td>
            <td style="text-align:right;">
              <?php echo $row['Mdebe']; ?>
            </td>
            <td style="text-align:right;">
             <?php echo $row['Sdebe']; ?>
            </td>
            <td style="text-align:right;">
              <?php echo $row['SAcreedor']; ?>
            </td>
           
            <td>
            
            
            
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

  function changeDebito(row){
    let fila=row;
    id=`debito${fila}`;
    selecDebito=document.querySelector(`#${id}`);
    valorDebito=selecDebito.value;
    // selecion del campo credto selecDebito.parentNode.nextElementSibling.firstChild
    credito=selecDebito.parentNode.nextElementSibling.firstChild;
    if (valorDebito>0) {
      credito.readOnly=true;
      credito.value=0;
    }else{
      credito.readOnly=false;
    }
  }

  function changeCredito(row){
    let fila=row;
    id=`credito${fila}`;
    selecCredito=document.querySelector(`#${id}`);
    valorCredito=selecCredito.value;

    
    // selecion del campo debito selecCredito.parentNode.previousElementSibling.firstChild
    debito=selecCredito.parentNode.previousElementSibling.firstChild;
    if (valorCredito>0) {
      debito.readOnly=true;
      debito.value=0;
    }else{
      debito.readOnly=false;
    }
   
  }
  
  var Toast =Swal.mixin({
      toast: true,
      position: 'top',
      iconColor: 'white',
      showConfirmButton: false,
      timer: 3000,
      customClass: {
        popup: 'colored-toast'
      },
    });
  function keyAlert(fila){
    if (fila.hasAttribute("readOnly")) {
      Toast.fire({
        icon: 'info',
        title: 'Campo Desactivado'
      })
    }
    
  }
  

  /* function changeSelect(row) {
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



      
   
   

     
    } */
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