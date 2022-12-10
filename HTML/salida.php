<!-- -----------------------------------------------------------------------
	    Universidad Nacional Autonoma de Honduras (UNAH)
		           Facultad de Ciencias Economicas
	        Departamento de Informatica administrativa
        Analisis, Programacion y Evaluacion de Sistemas
                    Primer Periodo 2022


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

Programa:          salida
Fecha:             16-jul-2022
Programador:       José
descripcion:       facturacion 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Luis	           01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara 	           01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Allan		         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

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
$mysqli = mysqli_connect("142.44.161.115","CALAPAL","Calapal##567","2w4GSUinHO");
$query = mysqli_query($mysqli,"SELECT nproducto FROM tbl_kardex");
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
/*$mysqli = mysqli_connect("localhost","CALAPAL","","2w4GSUinHO");
$query = mysqli_query($mysqli,"SELECT CODIGO_CUENTA, CUENTA FROM tbl_catalago_cuentas ORDER BY FIELD (CLASIFICACION, 'ACTIVO', 'PASIVO', 'CAPITAL', 'INGRESOS','COSTOS','GASTOS') ASC, CODIGO_CUENTA, CLASIFICACION");
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
