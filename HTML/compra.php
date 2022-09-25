<?php include 'barralateralinicial.php';?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Compras</title>
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
   <br><br>
<center>


<form method="post" action="fichacompra.php"> 
<table>
 <tr>
    <td>ID de factura:</td>
    <td><input type="number" name="id_factura" value="" size="16"></td>
 </tr>
 <tr>
    <td>Fecha emisión de factura:</td>
    <td><input type="text" name="fecha_factura" value="<?php echo date("d-m-Y"); ?>" size="15"></td>
 </tr>
 <tr>
    <td>Empresa emisora:</td>
    <td><input type="text" name="nombre_empresa" value="" size="25"></td>
 </tr>
 <tr>
    <td>Teléfono de la empresa:</td>
    <td><input type="text" name="telefono_empresa" value="" size="15"></td>
 </tr>
</table>

<br><br>
<table cellpadding="6" border="2">
<?php
$mysqli = mysqli_connect("LOCALHOST:3307","root","3214","2w4GSUinHO");
$query = mysqli_query($mysqli,"SELECT proname FROM product");
?>
 <tr>
    <td>Articulo/item:</td>
    <td><input type="text" name="producto" value="" size="20"></td>
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
    <td>Importe gravado:</td>
    <td><input type="number" name="gravado" value="" size="10"> L</td>
 </tr>
 <tr>
    <td>Impuesto(15%):</td>
    <td><input type="number" name="impto" value="" size="10"> L</td>
 </tr>
 <tr>
    <td>Total:</td>
    <td><input type="number" name="total" value="" size="10"> L</td>
 </tr>
      </table>
<?php
/*$mysqli = mysqli_connect("LOCALHOST:3307","root","3214","2w4GSUinHO");
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

<input type="submit" name="enviar" value="GENERAR FICHA DE ENTRADA DE INVENTARIO"/>



</form>
<br><br><br><br>
</center>
</body>
<?php include 'barralateralfinal.php';?>
</html>