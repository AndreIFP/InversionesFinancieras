<?php
include('conexion.php');
session_start();
$usuarios = $_SESSION['id'];
?>


<?php
$art = $_POST["product"];
$sql9 = "SELECT id_product,amount FROM product WHERE proname = '" . $art . "'";
$ext = $conn->query($sql9);
$fila = $ext->fetch_array(MYSQLI_NUM);
$id = $fila[0];
$cantidad = $fila[1];

if ($cantidad <= 0) {
    echo "<script> alert('ERROR NO TIENE CANTIDAD SUFICICIENTE PARA RETIRAR ESTE ARTICULO ¡REVISE EXISTENCIAS!');window.location= '../gestiones/Gestion_Inventario.php' </script>";
} else {
    echo "<script> alert('EL ARTICULO HA SIDO INGRESADO CON EXITO!');window.location= '../gestiones/Gestion_Inventario.php' </script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <title>Ficha de Salida</title>

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
                                <img src="Log.jpeg" alt="Texto alternativo" width="100" height="70">
                            <h2>INVERSIONES FINANCIERAS S.A</h2>
                            </p>
                            <h5>Tegucigalpa, Honduras</h5><br><br><br>
                            <center>
                                <h3>FICHA DE SALIDA</h3><br><br>
                            </center>
                        </div>

                    </header>
                </div>
            </div>
            <table class="table   caption-top  ">
                <thead class="table-success">
                    <tr>
                        <th>ARTICULO</th>
                        <th>CANTIDAD</th>
                        <th>FECHA DE SALIDA</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php $art = $_POST["product"];
                            echo $art;
                            ?></td>
                        <td><?php $cant = $_POST["cant"];
                            echo $cant;
                            ?></td>
                        <td><?php $fechaa = $_POST["fech"];
                            echo $fechaa;
                            ?></td>
                    </tr>
                </tbody>
            </table>
            <br>

            -FICHA GENERADA AUTOMATICAMENTE SEGUN SUS PARAMETROS DE ENTRADA
            <br>
            </p>

            <center><br><br>
                <h5>¡IMPRIMIR FICHA DE SALIDA!</h5>
                <br><br>
                <input type='button' class="btn btn-primary" onclick='window.print();' value='IMPRIMIR' />
                <a name="" id="" class="btn btn-success" href="../gestiones/Gestion_Inventario.php" role="button">REGRESAR AL INVENTARIO</a>
            </center>

            <br>
            <br>

        </div>
    </div>

    <?php
    include('conexion.php');
    $query = mysqli_query($conn, "SELECT * FROM product WHERE proname = '" . $art . "'");
    $nr = mysqli_num_rows($query);


    $sql2 = "SELECT id_product,amount FROM product WHERE proname = '" . $art . "'";
    $ext = $conn->query($sql2);
    $fila = $ext->fetch_array(MYSQLI_NUM);
    $id = $fila[0];
    $exist = $fila[1];


    $sql4 = "SELECT total_cante, cant_entrada FROM tbl_kardex WHERE proname = '" . $art . "'";
    $ext = $conn->query($sql4);
    $fila = $ext->fetch_array(MYSQLI_NUM);
    $tsal = $fila[0];
    $amount = $fila[1];

    $res = $tsal / $amount;
    $res1 = $res * $cant;

    if ($cantidad > 0) {
        $sql5 = "UPDATE product SET amount=amount+$cant where id_product='$id'";
        $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        $exito = mysqli_query($con, $sql5);

        $sql = "INSERT INTO tbl_kardex (Id_Usuario,fecha, detalle, id_product, proname, cant_entrada, total_cants) VALUES ($usuarios,'$fechaa','ENTRADA',$id,'$art',$cant,$res1)";
        $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        $exito = mysqli_query($con, $sql);
    } else {
        echo "<script> alert('ERROR NO TIENE LA CANTIDAD SUFICICIENTE PARA RETIRAR ESTE ARTICULO ¡REVISE EXISTENCIAS!');window.location= '../gestiones/Gestion_Inventario.php' </script>";
    }
    /* $sql1 = "UPDATE product SET amount=amount+$ent where id='$id'";
            $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
            $exito = mysqli_query($con,$sql1);
 
        }elseif ($nr == 0) {
            $sql = "INSERT INTO tbl_kardex (fecha, detalle, nproducto, cant_entrada, total_cante) VALUES ('$fecha','ENTRADA','$art','$ent','$total')";
            $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
            $exito = mysqli_query($con,$sql);
            }*/
    ?>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="/JS/Menu.js"></script>
</body>

</html>