<?php 
$conexion=mysqli_connect('localhost:3307','root','3214','2w4GSUinHO');
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
	  $consulta2=mysqli_query($conn,"SELECT * FROM Rangosdeperiodos where Id_Cliente=$cliente ;" );
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
	
