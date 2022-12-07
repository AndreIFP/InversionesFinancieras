<?php 
	
	include("../conexion.php");
			$nombren       = $_POST['Nombre_Empresa'];
			$nombre       = $_POST['Nombre_Cliente'];
			$RTN          = $_POST['RTN_Cliente'];
			$Direccion    = $_POST['Direccion'];
			$Telefono     = $_POST['Telefono'];
			$Tipo_Cliente = $_POST['Tipo_Cliente'];
			$Ciudad       = $_POST['Ciudad'];
            
			$query_insert = mysqli_query($conn,"INSERT INTO TBL_CLIENTES(Nombre_Empresa,Nombre_Cliente,RTN_Cliente,Direccion,Telefono,Tipo_Cliente,Ciudad)
																	VALUES('$nombren','$nombre','$RTN','$Direccion','$Telefono','$Tipo_Cliente','$Ciudad')");
			    if($query_insert){
					echo "<script> alert('Cliente Registrado Exitósamente');window.location= 'Gestion_Clientes.php' </script>";
				}else{
					$alert='<p class="msg_error">Error al registrar el cliente.</p>';
				}
