<?php
 include('conexion.php');
////////////////// CONEXION A LA BASE DE DATOS //////////////////
session_start();
$host = 'localhost:3307';
$basededatos = '2w4GSUinHO';
$usuario = 'root';
$contraseña = '3214';
const DRIVER='mysql';
const SERVER='localhost:3307';
const DATABASE='2w4GSUinHO';
const USERNAME='root';
const PASSWORD='3214';




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


$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno) {
die( "Fallo la conexión : (" . $conexion -> mysqli_connect_errno() 
. ") " . $conexion -> mysqli_connect_error());
}
  ///////////////////CONSULTA DE LOS ALUMNOS///////////////////////

$alumnos="SELECT * FROM product order by id_product";
$queryAlumnos= $conexion->query($alumnos);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    <script src="html2pdf.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
			
      $(function(){
      // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
      $("#newRow").on('click', function(){
        $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
      });
     
      // Evento que selecciona la fila y la elimina 
     
      
    });
  </script>
</head>
<body id="body">
<div class="control-bar">
  <div class="container">
    <div class="row">
      <div class="col-2-4">
        <div class="slogan">Facturación </div>

        <label for="config_tax">IVA:
          <input type="checkbox" id="config_tax" />
        </label>
        <label for="config_tax_rate" class="taxrelated">Tasa:
          <input type="text" id="config_tax_rate" value="15"/>%
        </label>
        <label for="config_note">Descargar en:
          <a id="btnCrearPdf"><input type="submit" Value="PDF"></a>
        </label>
      </div>
      <div class="col-4 text-right">
        <a href="javascript:window.print()">Imprimir</a>
        <a href="../index.php"><input type="submit" class="btn btn-primary" Value="Atras"></a>
      </div><!--.col-->
    </div><!--.row-->
  </div><!--.container-->
</div><!--.control-bar-->

<header class="row">


  <div class="me">
    <div class="col-2">
    <h1>Factura Inventario</h1>
  </div><!--.col-->
  </div><!--.me-->
</header>


<div class="row section">

	<div class="col-2">
 
  </div><!--.col--> 

   <div class="col-2 text-center details">
      
  </div><!--.col-->
  
  
  
 <div class="col-2">
    

    <p class="client">
      <strong>Datos</strong><br>
      Fecha: <input  disabled  type="date" name="Fecha" style="width:90px;border:0" name="Fechaini" value="<?=  $_SESSION['productos']['Fecha']  ?>" required><br>
      Factura #: <input  disabled type="text" name="factura" value="<?=  $_SESSION['productos']['factura']  ?>" placeholder="000-001-01-000000" maxlength="15" style="width:120px;border:0" oninput="this.value = this.value.replace(/[^0-9_-]/,'')" required/><br>
      CAI: <input disabled  type="text" value="<?=  $_SESSION['productos']['CAI']  ?>" placeholder="00000000000" maxlength="17" style="width:120px;border:0" oninput="this.value = this.value.replace(/[^0-9\s]/,'')" required/><br>
     Vence: <input disabled  type="date" style="width:90px;border:0" name="Fechaven" value="<?=  $_SESSION['productos']['Fechaven']  ?>" required/>
      <input disabled type="text" style="width:400px;height:35px;border:0"  placeholder="Direccion del Proveedor" size="150" value="<?=  $_SESSION['productos']['dirProveedor']  ?>" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" required /><br><br>
      <input disabled type="text" style="width:150px;height:20px;border:0" maxlength="10"  placeholder="Telefono" size="15" value="<?=  $_SESSION['productos']['telefono']  ?>" oninput="this.value = this.value.replace(/[^0-9\s]/,'')" required/><br>
    </p>
  </div><!--.col--> 
  
  
  <div class="col-2">
   
      
  </div><!--.col-->

  

</div><!--.row-->

<div class="row section" style="margin-top:-1rem">
<div class="col-1">
	<table style='width:100%'>
    <thead contenteditable>
	<tr class="invoice_detail">
      <th width="25%" style="text-align">Proveedor</th>
      <th width="30%">Términos y condiciones</th>
	 </tr> 
    </thead>
    <tbody contenteditable>
	<tr class="invoice_detail">
      <td width="25%" style="text-align"> <input disabled type="text" name="proveedor" value="<?=  $_SESSION['productos']['proveedor']  ?>" style="width:250px;height:20px;border:0" maxlength="50"  placeholder="Nombre de proveedor"   size="30" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" value="" required/></td>
      <td width="30%"><input disabled type="text" name="Terminos" value="<?=  $_SESSION['productos']['Terminos']  ?>" style="width:200px;height:20px;border:0" maxlength="30"  placeholder="Terminos y condiciones" size="30" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" value="" required/></td>
	 </tr>
	</tbody>
	</table>
</div>

</div><!--.row-->

<div class="invoicelist-body">
  <table >
    <thead>
      <th width="5%">Código</th>
      <th width="60%">Descripción</th>
      
      <th width="8%">Cant.</th>
      <th width="15%">Precio</th>
      <th class="taxrelated">IVA</th>
      <th width="10%">Total</th>
    </thead>
    </table>
    <form id="form" method="post">
    <table  id="tabla">
 
      <tr class="fila-fija">
        <td width='5%'><a class="control removeRow" href="#">x</a><input type="text" name="Codigo[]" style="width:35px;height:20px;border:0" maxlength="10"  placeholder="Cod." size="15" value="" oninput="this.value = this.value.replace(/[^0-9]/,'')" required/><br> </td>
        <td width='60%'><input type="text" name="Descripcion[]" style="width:350px;height:20px;border:0" maxlength="50"  placeholder="Descripción" size="30" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" value="" required/><br></td>
        <td width='1%' class="amount"><input type="number" name="cantidad[]" style="width:50px;height:20px;border:0" value="1" required/></td>
        <td class="rate"><input type="number" name="precio[]" style="width:60px;height:20px;border:0" Placeholder="Precio" step=00.01 required/></td>
  
        <td class="tax taxrelated"></td>
        <td class="sum"></td>
      </tr>
   
  </table>
  <a class="control newRow" id="newRow" href="#">+ Nueva fila</a>
</div><!--.invoice-body-->
<center>




<div class="invoicelist-footer">
  <table>
    <tr class="taxrelated">
      <td>IVA:</td>
      <td><label id="total_tax" name="totalr"></label><input type="hidden" id="totalRetenido" name="totalRetenido"></td>
    </tr>
    <tr>
      <td><strong>Total:</strong></td>
      <td><label  id="total_price" name="totalt"></label><input value="" type="hidden" id="montoTotal" name="montoTotal"></td>
    </tr>
  </table>
</div>
<button type="submit" name="insertar" class="btn btn-success btn-lg">Registrar su factura</button>
</form>

<?php

				//////////////////////// PRESIONAR EL BOTÓN //////////////////////////
				if(isset($_POST['insertar']))

				{
        $factura=$_SESSION['productos']['factura'];
        $proveedor=$_SESSION['productos']['proveedor'];
        
        $idUsuario=$_SESSION['id'];


				$items1 = ($_POST['Codigo']);
				$items2 = ($_POST['Descripcion']);
				$items3 = ($_POST['cantidad']);
				$items4 = ($_POST['precio']);
				///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
				while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
				    $item1 = current($items1);
				    $item2 = current($items2);
				    $item3 = current($items3);
				    $item4 = current($items4);
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $nom=(( $item2 !== false) ? $item2 : ", &nbsp;");
				    $can=(( $item3 !== false) ? $item3 : ", &nbsp;");
				    $gru=(( $item4 !== false) ? $item4 : ", &nbsp;");


            
            $sql5 = mysqli_query($conn,"SELECT * FROM product WHERE proname = '".$nom."'");
            $result_register = mysqli_fetch_all($sql5,1);
            $Result=$result_register;

            
            $request=$Result[0];
            if (empty($Result)) {
              $request=$Result[0];
              $valores='("'.$factura.'","'.$proveedor.'","'.$nom.'","'.$can.'"),';
              //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
              $valoresQ= substr($valores, 0, -1);
              ///////// QUERY DE INSERCIÓN ////////////////////////////
              $sql = "INSERT INTO product (Nfactura,Proveedor,proname,amount) 
                VALUES $valoresQ";

                //$sqlRes=$conexion->query($sql) or mysql_error();
              
              $pdo=Conexion::conectar();
              $consulta=$pdo->prepare($sql);

              $consulta -> execute();
              $idProducto = $pdo->lastInsertId();
            }else{
              
              $request=$Result[0];

              $canActual=$request['amount'];

              $cantitadTotal=$canActual+ $can;

              $idProducto =$request['id_product']; 

              $query = mysqli_query($conn,"UPDATE `product` SET `amount`=$cantitadTotal WHERE proname='".$nom."'");
              //$result_register = mysqli_fetch_all($sql5,1);
            }
				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////

					
					
          
           //insertar en Kardex
           $valores2='("'.$idUsuario.'","ENTRADA","'.$idProducto.'","'.$nom.'","'.$can.'"),';
          
           //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
           $valoresQuery= substr($valores2, 0, -1);
           ///////// QUERY DE INSERCIÓN ////////////////////////////

         
         $sql2 = "INSERT INTO TBL_KARDEX (Id_Usuario, detalle,id_product, proname, cant_entrada) VALUES $valoresQuery";
         $sqlRes2=$conexion->query($sql2) or mysql_error();

				    
				    // Up! Next Value
				    $item1 = next( $items1 );
				    $item2 = next( $items2 );
				    $item3 = next( $items3 );
				    $item4 = next( $items4 );
				    
				    // Check terminator
            if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
    
				}
        echo "<script> alert('Productos insertados correctamente');window.location= 'Facturacion.php' </script>";
				}

			?>
<div class="note" contenteditable>
  <h2>Nota:</h2>
</div><!--.note-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')</script>
<script src="assets/js/main.js"></script>
</body>
</html>

