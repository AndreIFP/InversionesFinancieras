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

Programa:          balanza
Fecha:             16-jul-2022
Programador:       José
descripcion:       balancegeneral 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Luis	           01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara 	           01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Allan		         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php

session_start();
$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];
$_SESSION['empresa'];
$_SESSION['temporada'] = "10";
$_SESSION['Idtemporada'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .accordion {
      background-color:#ECFAF4 ;
      color: #444;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
      transition: 0.4s;
    }

    .active,
    .accordion:hover {
      background-color: #ccc;
    }

    .panel {
      padding: 0 18px;
      display: none;
      background-color: white;
      overflow: hidden;
    }
  </style>
  <?php include 'barralateralinicial.php'; ?>
  <p></p>
  <section style=" background-color:rgb(255, 255, 255);  padding: 15px;  color:black;  font-size: 12px; ">
</head>

<body>
  <?php
  include("../conexion.php");
  $id_usuario = $_SESSION['id'];
  $cliente = $_SESSION['cliente'];
  $temporada = $_SESSION['temporada'];
  $fechai = $_SESSION['fechai'];
  $fechaf = $_SESSION['fechaf'];
  $empresa = $_SESSION['empresa'];
  $Idperiodo=$_SESSION['Idtemporada'];
  $fecha = date('Y-m-d h:i:s');

  $consulta = mysqli_query($conn, "select * from tbl_balanza
WHERE Id_cliente=$cliente");
  $nr = mysqli_num_rows($consulta);
  if ($nr == 0) {
    echo "<script> alert('No hay datos');window.location= 'BalanzaComp.php' </script>";
  }

  ?>
  <a class="btn btn-primary" href="Resultado.php "> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <br>
  <div align="right">
    <a class="btn btn-warning" href="../gestiones/Reporte_Balance.php" onclick="window.open(this.href,this.target, 'width=1000,height=700');return false;"><i class="fa fa-file-pdf-o"></i> Imprimir</a>
    <a class="btn btn-success" href="../gestiones/reporte_excel_balance.php"><i class="fa fa-file-excel-o"></i> Excel</a>
  </div>
  <hr>
  <center>
    <h4><strong><?php echo $empresa  ?></strong></h4>
    <h4><strong>Balance General</strong></h4>
    <h4><strong> del <?php echo $fechai  ?> al <?php echo $fechaf  ?></strong></h4>
  </center>
  <hr>
  <!-- DESPLIEGUE DE INGRESOS-->
  <table class="table">
    <thead  >
      <?php
      if(empty($ingresos)){
        $ingresos = 0;
      }
      ?>
                <tr>
                   
            
                </tr>
            </thead>
            <tbody>
      
      
            
            
 
<?php
 include("../conexion.php");
  $sql = mysqli_query($conn, " select *  from tbl_balanzageneral tb 
  where tb.IdBalanzaG =(select MAX(IdBalanzaG) from tbl_balanzageneral te2 where te2.Id_periodo='$Idperiodo' and te2.Id_Cliente='$cliente')");
  mysqli_close($conn);

  $result = mysqli_num_rows($sql);
  if ($result > 0) {
      while ($rows = mysqli_fetch_array($sql)) {
  ?>
  <?php
          $Activo = $rows["Activo"];
          $Pasivo = $rows["Pasivo"];
          $Patrimonio = $rows["Patrimonio"];
          
          ?>
          <tr>

          
              <td >
           Activos <center><?php echo    $Activo?></center>

         Pasivos <center><?php echo   $Pasivo  ?></center>
              
          Patrimonio <center><?php echo  $Patrimonio ?></center>

        
              </td>
              
                  <?php
              }
                  ?>


          </tr>
  <?php
      }
  
  ?>
</tbody>
</table>
   
  </secction>
  <?php include 'barralateralfinal.php'; ?>
