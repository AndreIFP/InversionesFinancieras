<?php 
$cliente=$_POST['Idcliente'];
$fechai=$_POST['fecha_inicio'];
$fechaf=$_POST['fecha_final'];

include('../conexion.php');
                
                #consulta de todos los paises
                $consulta=mysqli_query($conn,"SELECT * FROM TBL_CLIENTES where Id_Cliente='$cliente'; " );
                while($row=mysqli_fetch_array($consulta)){
                    $nombree=$row['Nombre_Empresa']; 
                    $nnombre=$row['Nombre_Cliente'];   
				}

?>
			<form  method="post" action="validacioncliente_resultadodos.php" name="miformulario" >
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