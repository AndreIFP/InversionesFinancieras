<?php 
$conexion=mysqli_connect('142.44.161.115','CALAPAL','Calapal##567','2w4GSUinHO');
$clasificacion=$_POST['clasificacion2'];
?>

<select name="cuenta" id="cuenta" style="font-size:18px">
<option selected disabled >seleccione la cuenta</option>
   <?php 
	include('../conexion.php');
	  
	  #consulta de todos los paises
	  $consulta2=mysqli_query($conn,"SELECT * FROM tbl_catalago_cuentas where CUENTA= '$clasificacion'" );
	  while($row=mysqli_fetch_array($consulta2)){
		  $epais=$row['CUENTA']; 
		  $eid=$row['CODIGO_CUENTA'];      
   ?>
	   
		  <option class="dropdown-item" style="font-size:18px" value="<?php echo $eid?>"><?php echo $epais ?></option>
		  
	  <?php
	  
	   }
	   
	   ?> 
</select>