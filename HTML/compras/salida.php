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

Programa:          salida
Fecha:             16-jul-2022
Programador:       Sara
descripcion:       Pantalla 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
José	          01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Fanny 	       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Esperanza	    01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php

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
$mysqli = mysqli_connect("142.44.161.115","CALAPAL","Calapal##567","2w4GSUinHO");
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
/*$mysqli = mysqli_connect("142.44.161.115","CALAPAL","Calapal##567","2w4GSUinHO");
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


<button type="submit" class="btn btn-info">GENERAR FICHA DE SALIDA DE INVENTARIO</button>

</form>
<br><br><br><br>
</center>
</body>
<?php include 'barralateralfinal.php';?>
</html>