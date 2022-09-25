<?php 

$cliente=$_POST['Idcliente'];
$fechai=$_POST['fecha_inicio'];
$fechaf=$_POST['fecha_final'];


?>
			<form  method="post" action="validacionlibro.php" name="miformulario" >
            <?php 
			include('../conexion.php');

			$queryusuario 	= mysqli_query($conn,"SELECT * FROM TBL_LIBROS WHERE fecha = '$temporada' AND Id_cliente='$cliente' ");
			$nr 			= mysqli_num_rows($queryusuario); 



			if ($nr == 0 )
			{
			
			$query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBROS (fecha,Id_cliente,caja) 
			                   values ('$temporada','$cliente','0')");
			}
			else
			{
echo "<script> alert('No puedes registrar Esta fecha: $temporada por que ya existe');window.location= 'validaciondate.php' </script>";
			}
			?>
            
			
					<script>
    				window.onload=function()
					{
                	// Una vez cargada la página, el formulario se enviara automáticamente.
					document.forms["miformulario"].submit();
    				}
    				</script>
            </form>

	