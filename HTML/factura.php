<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
         $('#some')[0].click();
    });
</script>
<a id="some" href="javascript:window.print()"></a>
<?php
 include('conexion.php');

 if(isset($_REQUEST["Contado"])){
    $factura = $_POST["id_factura"];
    $cliente = $_POST["nombre_cliente"];
    $descripcion = $_POST["Descripcion"];
    $total = $_POST["total"];

    $sql = "INSERT INTO FACTURA (NFACTURA, id_Cliente, DESCRIPCION, TOTAL) VALUES ('$factura','$cliente','$descripcion','$total')";
            $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
            $exito = mysqli_query($con,$sql);
            echo"<script>alert('Los datos de la factura al contado han sido cargados correctamente');window.location= 'demo.php'</script>";
}

if(isset($_REQUEST["Credito"])){

    $idcliente = $_REQUEST["id_cliente"];
    $cuenta = $_REQUEST['Cuenta'];
    $descripcion = $_REQUEST["Descripcion"];
    $total = $_REQUEST["total"];

    $sql = "INSERT INTO CUENTAS_POR_COBRAR (id_cliente, CUENTAS, DESCRIPCION, DEUDA_CUENTA_TOTAL) VALUES ('$idcliente','$cuenta','$descripcion','$total')";
            $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
            $exito = mysqli_query($con,$sql);
            echo"<script>alert('Los datos de la factura a credito han sido cargados correctamente');window.location= 'demo.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/fontawesome/4.1.0/css/font-awesome.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600'>
    <link rel="stylesheet" href="/CSS/Menu.css">
    <link rel="stylesheet" href="/CSS/Home.css">


    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
    <link rel="stylesheet" href="/CSS/ImpresioFactura.css">

</head>

<body>

    <div class="container">
  <img src="Log.png" WIDTH=150 HEIGHT=75>
        <div class="invoice">
            <div class="row">
                <div class="col-7">

                </div>
                <div class="col-12">
                    <header class="page-header">
                        <div class="branding">
                            
                            <h2>INVERSIONES FINANCIERAS S.A</h2>
                            <h5>Tegucigalpa, Honduras</h5><br>

                            <h5>RTN: 08015896135674</h5><br>
                            
                            <h5> <?php
                            $factura = $_POST["id_factura"];
                            echo "Factura No: " .$factura;
                            ?><br>
                        </div>
                    </header>
                </div>
            </div>
            <br>
            <h6><br><b><?php $cliente = $_POST["nombre_cliente"];
                         echo "Cliente: " .$cliente;
                        ?></h6></b><br>
            <p class="conditions"><?php $fecha = $_POST["fecha_factura"];
                         echo "Fecha de factura: " .$fecha;
                        ?></p>
            <table class="table   caption-top  ">
                <thead class="table-success">
                    <tr>
                        <th>Id_Factura</th>
                        <th>Descripción</th>
                        <th>Subtotal</th>
                        <th>ISV</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php $idcliente = $_POST["id_cliente"];
                         echo $idcliente;
                        ?></td>
                        <td><?php $descripcion = $_POST["Descripcion"];
                         echo $descripcion;
                        ?></td>
                        <td><?php $grav = $_POST["gravado"];
                         echo $grav;
                        ?></td>
                        <td><?php $isv = $_POST["impto"];
                         echo $isv;
                        ?></td>
                        <td><?php $grav = $_POST["gravado"];
                            $isv = $_POST["impto"];
                            $result = $grav + $isv;
                         echo $result;
                        ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="row">
                <div class="col-8">
                </div>
                <div class="col-4">
                    <table class="table table-sm text-right">
                        <tr>
                            <td class="table-success"><strong>SubTotal</strong></td>
                            <td class="text-right"><?php $grav = $_POST["gravado"];
                         echo $grav;
                        ?></td>
                        </tr>
                        <tr>
                            <td class="table-success">Impuesto</td>
                            <td class="text-right"><?php $isv = $_POST["impto"];
                         echo $isv;?></td>
                        </tr>
                        <tr>
                            <td class="table-success"><strong>Total </strong></td>
                            <td class="text-right"><?php $grav = $_POST["gravado"];
                            $isv = $_POST["impto"];
                            $result = $grav + $isv;
                         echo $result;
                        ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php
$sql = "INSERT INTO FACTURA (NFACTURA, DESCRIPCION, TOTAL) VALUES ('$factura','$descripcion','$result')";
$con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$exito = mysqli_query($con,$sql);
            ?>
            <p class="conditions"><b><?php
date_default_timezone_set('America/Tegucigalpa');    
$DateAndTime2 = date('m-d-Y h:i:s a', time());  
echo "FECHA DE GENERACION DE SU FACTURA: $DateAndTime2.";
?></p></b>
            <p class="conditions">

                -Condiciones mas 15% de impuesto sobre ventas establecido por el gobierno
                <br> -Factura en regla y comprobada por código ,Precios de productos en regla
                <br> -En caso de cambio o reembolso presentar esta factura sin rayones o cortes.
                <br>
            </p>

            <center><br><br>
                <h5>¡GRACIAS POR PREFERIR NUESTROS SERVICIOS!</h5>
                
            </center>

            <br>
            <br>


            <p class="bottom-page text-right">
            copia cliente-archivo<br> No esta sujeta a modificaciones<br> IBAN FR76 1470 7034 0031 4211 7882 825 - SWIFT CCBPFRPPMTZ
            </p>
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="/JS/Menu.js"></script>
</body>

</html>