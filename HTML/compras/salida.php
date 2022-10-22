<?php
include("../conexion.php");

//incluir las funciones de helpers
include_once("../helpers/helpers.php");

//iniciar las sesiones
session_start();
   // si no existe la variable rol, el usuario no esta logueado y redirige al Login
if (!isset($_SESSION['rol'])) {
   header("Location: ../login.php"); 
   die();
}else{
   //actualiza los permisos
   updatePermisos($_SESSION['rol']);
   
   //si no tiene permiso de visualización redirige al index
   if ($_SESSION['permisos'][M_INVENTARIOS]['u']==0 or !isset($_SESSION['permisos'][M_INVENTARIOS]['u'])) {
       header("Location: ../index.php");
       die();
   }
}
?>

<?php include 'barralateralinicial.php';?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>INVERSIONES FINANCIERAS S.A</title>
    <style>
        body {
            font-family: sans-serif, verdana, arial;
        } 
        
        table tr td:first-child
        {
            text-align: right;
        }
    </style>
    <a name="" id="" class="btn btn-info" href="../gestiones/Gestion_Inventario.php" role="button">ATRAS</a>
</head>
<body>
<center>
<h3></h3> 

<form method="post" action="fichasalida.php"> 
<br><br>
<table cellpadding="5" border="1">
<?php
$mysqli = mysqli_connect("localhost","root","","2w4GSUinHO");
$query = mysqli_query($mysqli,"SELECT proname FROM product");
?>
<tr>
 <td>Articulo:</td>
 <td>
      <select name ="product" >
         <?php
         while ($fila = $query->fetch_assoc()):
         $nombre = $fila['proname'];
         echo "<option value='$nombre                                    '>   $nombre</option>";
         endwhile;
         ?>
 </tr>
 <tr>
    <td>Unidades:</td>
    <td><input type="number" name="cant" value="" size="20"></td>
 </tr>
 <tr>
    <td>Estado del producto recibido:</td>
    <td>
    <select name="Estado" id="estado">
     <option value="NUEVO">NUEVO</option>
     <option value="USADO EN BUEN ESTADO">USADO EN BUEN ESTADO</option>
      </select>
      </td>
 </tr>
 <tr>
    <td>Fecha y hora:</td>
    <td><input type="text" name="fech" value="<?php
date_default_timezone_set('America/Tegucigalpa');    
$DateAndTime2 = date('m-d-Y h:i:s a', time());  
echo $DateAndTime2;
?>" size="20"></td>
      </table>
<?php
/*$mysqli = mysqli_connect("localhost","root","","2w4GSUinHO");
$query = mysqli_query($mysqli,"SELECT CODIGO_CUENTA, CUENTA FROM TBL_CATALAGO_CUENTAS ORDER BY FIELD (CLASIFICACION, 'ACTIVO', 'PASIVO', 'CAPITAL', 'INGRESOS','COSTOS','GASTOS') ASC, CODIGO_CUENTA, CLASIFICACION");
?>
<table>
   <tr>
      <th>Cuenta</th>
   </tr>
   <tr>
     <td>
      <select name ="Cuenta" >
         <?php
         while ($fila = $query->fetch_assoc()):
         $id = $fila['CODIGO_CUENTA'];
         $nombre = $fila['CUENTA'];
         echo "<option value='$nombre                                    '>$id,   $nombre</option>";
         endwhile;*/
         ?>
         </select>
     </td>
   </tr>
</table>
<br><br>

<table cellpadding="5" border="1">
 
</table>


<button type="submit" class="btn btn-info">GENERAR FICHA DE SALIDA DE INVENTARIO</button>

</form>
<br><br><br><br>
</center>
</body>
<?php include 'barralateralfinal.php';?>
</html>