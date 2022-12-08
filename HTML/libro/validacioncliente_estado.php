<?php 
$cliente=$_POST['Idcliente'];
$fechai=$_POST['fecha_inicio'];
$fechaf=$_POST['fecha_final'];

include('../conexion.php');
if($fechaf < $fechai){
	echo "<script> alert('La fecha final no debe ser menor a la inicial');window.location= 'validacionestado.php' </script>";
}

				$consulta=mysqli_query($conn,"SELECT * FROM tbl_clientes where Id_Cliente='$cliente'; " );
                while($row=mysqli_fetch_array($consulta)){
                    $nombree=$row['Nombre_Empresa']; 
                    $nnombre=$row['Nombre_Cliente'];   
				}

?>
			<form  method="post" action="validacioncliente_estadodos.php" name="miformulario" >
            <?php 
            session_start();
            $_SESSION['cliente']=$cliente;
			$_SESSION['ncliente']=$nnombre;
			$_SESSION['empresa']=$nombree;
			$_SESSION['fechai']=$fechai;
			$_SESSION['fechaf']=$fechaf;
            ?>
			
					<script>
    				window.onload=function(){
                	// Una vez cargada la página, el formulario se enviara automáticamente.
					document.forms["miformulario"].submit();
    				}
    				</script>
            </form>	