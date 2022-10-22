<?php include 'barralateralinicial.php';?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>INVENTARIO</title>
    <style>
        body {
            font-family: sans-serif, verdana, arial;
        } 
        
        table tr td:first-child
        {
            text-align: right;
        }
    </style>
</head>
<body>
<center> 

<form method="post" action="fichasalida.php"> 
<br><br>
<table cellpadding="5" border="1">
<?php
$mysqli = mysqli_connect("localhost:3307","root","3214","2w4GSUinHO");
$query = mysqli_query($mysqli,"SELECT nproducto FROM TBL_KARDEX");
?>
<tr>
 <td>Articulo:</td>
 <td>
      <select name ="product" >
         <?php
         while ($fila = $query->fetch_assoc()):
         $nombre = $fila['nproducto'];
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
<br><br>

<button type="submit">GENERAR FICHA DE SALIDA DE INVENTARIO</button>

</form>
<br><br><br><br>
</center>
</body>
<?php include 'barralateralfinal.php';?>
</html>
