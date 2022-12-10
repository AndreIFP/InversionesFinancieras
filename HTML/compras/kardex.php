<!-- -----------------------------------------------------------------------
	    Universidad Nacional Autonoma de Honduras (UNAH)
		           Facultad de Ciencias Economicas
	        Departamento de Informatica administrativa
        Analisis, Programacion y Evaluacion de Sistemas
                    Primer Periodo 2016


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

Programa:          Kardex
Fecha:             16-jul-2022
Programador:       Luis
descripcion:       Pantalla 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Luis	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Esperanza		 01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Fanny 	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Andrés		     01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php
session_start();
require_once "conexion.php";

$username = $_SESSION['user'];
$sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>

<!doctype html>
<html lang="en">

<head>
    <title>kardex</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="faviconconfiguroweb.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #5b9af8;
        }
        .header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
            padding: 5px 13px 11px 0px;
            width: 100%;
            color: whitesmoke;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 0px;
            bottom: 0;
            background-color: #2759c7;
        }
        .header p {
            margin-left: 20px;
            text-align: left;
        }
        .button-logout {
            position: relative;
            margin-top: -50px;
            margin-right: 20px;
            float: right;
            text-decoration: none;
            border: transparent;
            border-radius: 15px;
            background-color: #e60000;
            padding: 10px 10px 10px 10px;
            color: white;
            transition: 0.5s;
        }
        .button-logout:hover {
            background-color: #D9ddd4;
            color: red;
        }
        .container {
            margin: 90px auto;
            margin-bottom: 50px;
            border-radius: 30px;
            text-align: center;
            background-color: white;
            width: 40%;
            padding-bottom: 10px;
        }
        table th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px 0px 10px 0px;
        }
        table {
            width: 100%;
        }
        th {
            color: black;
            background-color: #e7ecee;
        }
        tr {
            background-color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .timeregis {
            text-align: center;
        }
        .modify {
            text-align: center;
        }
        .delete {
            text-align: center;
        }
        .modify .bfix {
            border-radius: 15px;
            background-color: #ffcc33;
            color: black;
            text-decoration: none;
            padding: 4px 20px 4px 20px;
            transition: 0.5s;
        }
        .modify .bfix:hover {
            background-color: #1a0e42;
            color: white;
        }
        .delete .bdelete {
            border-radius: 15px;
            background-color: #7c2323;
            text-decoration: none;
            color: white;
            padding: 4px 20px 4px 20px;
            transition: 0.5s;
        }
        .delete .bdelete:hover {
            background-color: #D9ddd4;
            color: red;
        }
        .Addlist {
            margin-right: 100px;
            padding: 5px 30px 5px 30px;
            border-radius: 15px;
            text-decoration: none;
            color: white;
            background-color: #00A600;
            transition: 0.5s;
        }
        .Addlist:hover {
            color: black;
            background-color: #BBFFBB;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3>INVERSIONES FINANCIERAS S.A</h3>
        <a name="" id="" class="button-logout" href="../list.php" role="button">ATRAS</a>
    </div>
    <div class="container">
        <h1>KARDEX</h1>
        <h2>Has accedido como <?php echo $str = strtoupper($username) ?></h2>
    </div>
    <div class="tablekardex">
        <table>
            <tr>
                <th>FECHA</th>
                <th>DETALLE</th>
                <th>PRODUCTO</th>
                <th>Cantidad INV. ENTRANTE</th>
                <th>TOTAL INV. ENTRANTE</th>
                <th>CANTIDAD INV. SALIENTE</th>
                <th>TOTAL INV. SALIENTE</th>
            </tr>
    <?php
    include('conexion.php');

     $sql7 = "SELECT * FROM tbl_kardex";
     $result=mysqli_query($conn,$sql7);
     while($mostrar=mysqli_fetch_array($result)){

    ?>

<tr>
                <th><?php echo $mostrar['fecha'] ?></th>
                <th><?php echo $mostrar['detalle'] ?></th>
                <th><?php echo $mostrar['nproducto'] ?></th>
                <th><?php echo $mostrar['cant_entrada'] ?></th>
                <th><?php echo $mostrar['total_cante'] ?></th>
                <th><?php echo $mostrar['cant_salida'] ?></th>
                <th><?php echo $mostrar['total_cants'] ?></th>
            </tr>

    <?php
    }
    
    ?>