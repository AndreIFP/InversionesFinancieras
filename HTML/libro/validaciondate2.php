<?php 

$cliente=$_POST['Idcliente'];
$temporada=$_POST['txtfecha'];
$temporada2=$_POST['txtfecha2'];

if ($temporada2 < $temporada) {
	echo "<script> alert('La fecha final no debe ser menor a la inicial');window.location= 'validaciondate.php' </script>";
}
?>
			<form  method="post" action="validacionlibro.php" name="miformulario" >
            <?php 
			include('../conexion.php');

			$queryusuario 	= mysqli_query($conn,"SELECT * FROM rangosdeperiodos WHERE Fechainicio = '$temporada' AND Fechafinal = '$temporada' AND Id_Cliente='$cliente' ");
			$nr 			= mysqli_num_rows($queryusuario); 



			if ($nr == 0 )
			{
			
			$query_insert = mysqli_query($conn,"INSERT INTO rangosdeperiodos (Id_Cliente,Fechainicio,Fechafinal) 
			                   values ('$cliente','$temporada','$temporada2')");
			}
			else
			{
echo "<script> alert('No puedes registrar Este rango de fecha: $temporada al $temporada2 por que ya existe');window.location= 'validaciondate.php' </script>";
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

	