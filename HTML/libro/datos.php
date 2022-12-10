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

Programa:          entrada
Fecha:             16-jul-2022
Programador:       Fanny
descripcion:       libro

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Fanny	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
David 	       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Allan		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php 
$conexion=mysqli_connect('142.44.161.115','CALAPAL','Calapal##567','2w4GSUinHO');
$cliente=$_POST['cliente'];
?>

<td style="width: 40%">
                <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <select type="date" class="form-control pull-right" name="Idtemporada" id="Idtemporada" required>
				  <option selected disabled >seleccione una Fecha</option>
				  <?php 
	include('../conexion.php');
	  
	  #consulta de todos los paises
	  $consulta2=mysqli_query($conn,"SELECT * FROM rangosdeperiodos where Id_Cliente=$cliente ;" );
	  while($row=mysqli_fetch_array($consulta2)){
		  $epais=$row['Fechainicio']; 
		  $ecity=$row['Fechafinal'];
		  $eid=$row['Id_periodo'];      
   ?>
                      <option class="dropdown-item" style="font-size:18px" value="<?php echo $eid?>"><?php echo $epais ?> al <?php echo $ecity ?></option>
                    <?php
                    }
                    ?>
</select>
</div>
	
