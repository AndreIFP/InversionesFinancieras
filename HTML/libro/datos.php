<?php 
$conexion=mysqli_connect('localhost','root','','2w4GSUinHO');
$cliente=$_POST['cliente'];
?>

<div class="form-group">
<p   id="pa">Seleccione la Fecha del Libro:</p>
<div class="select">
<select name="Idtemporada" id="Idtemporada" style="font-size:18px">
<option selected disabled >seleccione una Fecha</option>
   <?php 
	include('../conexion.php');
	  
	  #consulta de todos los paises
	  $consulta2=mysqli_query($conn,"SELECT * FROM TBL_LIBROS where Id_cliente=$cliente ;" );
	  while($row=mysqli_fetch_array($consulta2)){
		  $epais=$row['fecha']; 
		  $eid=$row['Id_Libro'];      
   ?>
	   
		  <option class="dropdown-item" style="font-size:18px" value="<?php echo $eid?>"><?php echo $epais ?></option>
		  
	  <?php
	  
	   }
	   
	   ?> 
</select>
</div>
</div>
	
