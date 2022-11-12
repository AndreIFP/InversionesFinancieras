<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
         $('#some')[0].click();
    });
</script>
<a id="some" href="javascript:window.print()"></a>

<?php
 include('conexion.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <title>FichaEntrada</title>
    
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/fontawesome/4.1.0/css/font-awesome.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600'>

    
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>

</head>

<body>

    <div class="container">
        <div class="invoice">
            <div class="row">
                <div class="col-7">
                </div>
                <div class="col-12">
                    <header class="page-header">
                        <div class="branding">
                            <p>
                        <img src= "Log.jpeg" alt="Texto alternativo" width="100" height="70">
                        <h2>INVERSIONES FINANCIERAS S.A</h2>
</p>
                            <h5>Tegucigalpa, Honduras</h5><br>
                            <center>
                            <h3>FICHA DE COMPRA</h3>
                            </center>
                            <b><h5><?php
                            $factura = $_POST["id_factura"];
                            echo "FACTURA NO: " .$factura;
                            ?></h5></b>
                        </div>
                    </header>
                </div>
            </div>
            <h5><br><b><?php $fecha = $_POST["fecha_factura"];
                         echo "FECHA DE COMPRA: " .$fecha;
                        ?></h5></b><br>

            <table class="table   caption-top  ">
                <thead class="table-success">
                    <tr>
                        <th>No. Factura</th>
                        <th>ARTICULO</th>
                        <th>CANTIDAD</th>
                        <th>ESTADO DEL PRODUCTO</th>
                        <th>Subtotal</th>
                        <th>ISV</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php $factura = $_POST["id_factura"];
                         echo $factura;
                        ?></td>
                        <td><?php $art = $_POST["producto"];
                         echo $art;
                        ?></td>
                        <td><?php $ent = $_POST["cant"];
                         echo $ent;
                        ?></td>
                        <td><?php $est = $_POST["Estado"];
                         echo $est;
                        ?></td>
                        <td><?php $grav = $_POST["gravado"];
                         echo $grav;
                        ?></td>
                        <td><?php $isv = $_POST["impto"];
                         echo $isv;
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
                            <td class="table-success">ISV 15%</td>
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
            <p class="conditions"><b><?php
date_default_timezone_set('America/Tegucigalpa');    
$DateAndTime2 = date('m-d-Y h:i:s a', time());  
echo "FECHA A DIA DE HOY DE LA FICHA : $DateAndTime2.";
?></p></b>
            <p class="conditions">

                -FICHA GENERADA AUTOMATICAMENTE SEGUN SUS PARAMETROS DE ENTRADA
                <br>
            </p>

            <center><br><br>
                <h5>¡IMPRIMIR FICHA DE ENTRADA!</h5>
                <br><br>
                <input type='button' class="btn btn-primary" onclick='window.print();' value='IMPRIMIR' />
                <a name="" id="" class="btn btn-success" href="../gestiones/Gestion_Inventario.php" role="button">REGRESAR AL INVENTARIO</a>
            </center>

            <br>
            <br>

        </div>
    </div>

<?php
 $query = mysqli_query($conn,"SELECT * FROM product WHERE proname = '".$art."'");
 $nr = mysqli_num_rows($query);

 if($nr == 1){
    $sql2 = "SELECT id_product FROM product WHERE proname = '".$art."'";
    $ext = $conn->query($sql2);
               $fila = $ext->fetch_array(MYSQLI_NUM);
               $id = $fila[0];

    $sql = "INSERT INTO TBL_KARDEX (Id_Usuario,fecha, detalle, id_product, proname, cant_entrada, total_cante,cant_salida, total_cants) VALUES (1,'$fecha','ENTRADA',1,'$art',$ent,$result,null,null)";
            $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
            $exito = mysqli_query($con,$sql);

            $sql1 = "UPDATE product SET amount=amount+$ent where id_product='$id'";
            $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
            $exito = mysqli_query($con,$sql1);
 
        }elseif ($nr == 0) {
            $sql = "INSERT INTO TBL_KARDEX (Id_Usuario,fecha, detalle, id_product, proname, cant_entrada, total_cante,cant_salida, total_cants) VALUES (1,'$fecha','ENTRADA',1,'$art',$ent,$result,null,null)";
            $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
            $exito = mysqli_query($con,$sql);

            $sql3 = "INSERT INTO product (proname,amount) VALUES ('$art','$ent')";
            $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
            $exito = mysqli_query($con,$sql3);
        }

?>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="/JS/Menu.js"></script>
</body>

</html>