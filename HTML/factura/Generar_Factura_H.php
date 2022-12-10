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

Programa:          facturacion
Fecha:             16-jul-2022
Programador:       Esperanza
descripcion:       generar_factura 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Andrés	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		     01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Esperanza	     01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Allan		     01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php 
include('../conexion.php');

$n_factura =$_POST["N_Factura"];
$Tipo_factura =$_POST["Tipofactura"];
$fecha =$_POST["Fecha"];
$nombrecliente = $_POST["Nombre_Cliente"];
$rtncliente = $_POST["RTN_Cliente"];
$sumaneta = $_POST["Suma_Neta"];
$concepto =$_POST["Concepto"];
$fechad =$_POST["FechaD"];
$fecham = $_POST["FechaM"];
$fechaa = $_POST["FechaA"];
$totalhonorarios = $_POST["Total_Honorarios"];
$valoresretenidos = $_POST["Valores_Retenidos"];
$totalneto = $_POST["Total_Neto"];


	mysqli_query($conn, "INSERT INTO tbl_factura_1 (N_Factura, Fecha, Nombre_Cliente, RTN_Cliente, Suma_Neta, Concepto, FechaD, FechaM, FechaA, Total_Honorarios, Valores_Retenidos, Total_Neto,Tipo_Factura) 
	values ('$n_factura','$fecha','$nombrecliente','$rtncliente','$sumaneta','$concepto','$fechad','$fecham','$fechaa','$totalhonorarios','$valoresretenidos','$totalneto','$Tipo_factura')");

		echo "<script> alert('Factura Guardada');window.location= 'Reporte_Factura_1.php' </script>";

?>
