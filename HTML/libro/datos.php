<?php 
$conexion=mysqli_connect('localhost:3307','root','3214','2w4GSUinHO');
$clasificacion=$_POST['clasificacion'];
?>
<select id="lista3" name="lista3" style="font-size:18px">
<option selected disabled >seleccione la cuenta</option>
   <?php 
	include('../conexion.php');
	  
	  #consulta de todos los paises
	  $consulta2=mysqli_query($conn,"SELECT * FROM tbl_catalago_cuentas where CLASIFICACION= '$clasificacion'" );
	  while($row=mysqli_fetch_array($consulta2)){
		  $epais=$row['CUENTA']; 
		  $eid=$row['CODIGO_CUENTA'];      
   ?>
	   
		  <option class="dropdown-item" style="font-size:18px" value="<?php echo $eid?>"><?php echo $epais ?></option>
		  
	  <?php
	  
	   }
	   
	   ?> 
</select>

<div id="select4lista"></div>

<!-- script Cuenta 2 -->

<script type2="text/javascript">
	$(document).ready2(function(){
		$('#lista3').val2(1);
		recargarLista2();

		$('#lista3').change2(function(){
			recargarLista2();
		});
	})
</script>

<script type="text/javascript">
	function recargarLista2(){
		$.ajax2({
			type:"POST",
			url:"datos2.php",
			data:"clasificacion2=" + $('#lista3').val2(),
			success:function(r){
				$('#select4lista').html(r);
			}
		});
	}
</script>