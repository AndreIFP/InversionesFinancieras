<?php 

$cliente=$_POST['Idcliente'];
$temporada=$_POST['txtfecha'];


?>
			<form  method="post" action="validacionlibro.php" name="miformulario" >
            <?php 
			include('../conexion.php');

			$queryusuario 	= mysqli_query($conn,"SELECT * FROM Rangosdeperiodos WHERE Fechainicio = '$temporada' AND Id_Cliente='$cliente' ");
			$nr 			= mysqli_num_rows($queryusuario); 



			if ($nr == 0 )
			{
			
			$query_insert = mysqli_query($conn,"INSERT INTO Rangosdeperiodos (Id_Cliente,Fechainicio,Fechafinal) 
			                   values ('$cliente','$temporada','NULL')");
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

	