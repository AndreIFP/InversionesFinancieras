<?php
include("conexion.php");

//incluir las funciones de helpers
include_once("helpers/helpers.php");

//iniciar las sesiones
session_start();
   // si no existe la variable rol, el usuario no esta logueado y redirige al Login
if (!isset($_SESSION['rol'])) {
   header("Location: login.php"); 
   die();
}else{
   //actualiza los permisos
   updatePermisos2($_SESSION['rol']);
   
   //si no tiene permiso de visualización redirige al index
   if ($_SESSION['permisos'][M_BACKUP]['r']==0 or !isset($_SESSION['permisos'][M_BACKUP]['r'])) {
       header("Location: index.php");
       die();
   }
}
?>
<?php include 'barralateralinicial.php';?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>


  <title>Respaldo</title>
  <a href="index.php"><input type="submit" class="btn btn-primary" Value=" Regresar "></a>
  <div class="container mt-12">
	
                  <div class="col-md-12"
				  
    <!-- partial:index.partial.html -->
    <!-- apply angular app and controller to body -->
    <!-- Navigation -->
    

    <!-- /menu vertical -->
    <?php
     include ("Connet.php");
     ?>
	  
 <body>
<section  style=" background-color:rgb(240,248,255);
    padding: 15px;
    color:black;
    font-size: 25px; " >
    


    <body data-ng-app="validationApp">
        <div class="container" data-ng-controller="RegistrationController">

    
            <data-uib-tabset data-active="activeJustified" data-justified="true">
                <data-uib-tab data-heading="BACKUP" data-index="0">
                    <br/>
                    <center>
                        <div class="main">
                            <header class="page-header">
                                <div class="branding">
                                    <br>
                                    <h1><center>Respaldo base de datos</center></p></h1>
				       <table cellpadding="" border="3">
                                    <td><img src ="https://img2.freepng.es/20181125/uzh/kisspng-computer-icons-backup-and-restore-clip-art-databas-5bfae2143ce388.5626160015431685322494.jpg"   alt="Logo" title="Home page" class="logo1"  width="200" height="200"  /> <td>
                                    
                                
                                   
	<?php  if ($_SESSION['permisos'][M_BACKUP] and $_SESSION['permisos'][M_BACKUP]['w'] == 1) {                      
	?>
		<center><a href="./Backup.php">Realizar copia de seguridad</a></center>
	<?php } ?>
    
	<?php  if ($_SESSION['permisos'][M_BACKUP] and $_SESSION['permisos'][M_BACKUP]['u'] == 1) {                      
	?>
	<form action="./Restore.php" method="POST">
		   <br> <br>
		 </table>
		<br>
	<h1><center>Restauración base de datos</center></p></h1>
				    <table cellpadding="" border="3">
		<td><img src ="https://img2.freepng.es/20181125/uzh/kisspng-computer-icons-backup-and-restore-clip-art-databas-5bfae2143ce388.5626160015431685322494.jpg"   alt="Logo" title="Home page" class="logo1"  width="200" height="200"  /> 
			
					    
		<select name="restorePoint">
    <option value="" disabled="" selected="">Selecciona un punto de restauración<option>
			<?php
				$ruta=BACKUP_PATH;
				if(is_dir($ruta)){
				    if($aux=opendir($ruta)){
				        while(($archivo = readdir($aux)) !== false){
				            if($archivo!="."&&$archivo!=".."){
				                $nombrearchivo=str_replace(".sql", "", $archivo);
				                $nombrearchivo=str_replace("-", ":", $nombrearchivo);
				                $ruta_completa=$ruta.$archivo;
				                if(is_dir($ruta_completa)){
				                }else{
				                    echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
				                }
				            }
				        }
				        closedir($aux);
				    }
				}else{
				    echo $ruta." No es ruta válida";
				}
			?>
		</select>

		<center><button type="submit" onclick="editar(this.id)">Restaurar</button></center>
        

        <div class="modal" tabindex="-1" id="EditModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Por favor espere se restaura su base...</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        
        <script>
    function editar(este) {
      var ModalEdit = new bootstrap.Modal(EditModal, {}).show();
      variable.innerHTML = "El id es : " + este;
    }
  </script>

	</form>
	<?php } ?>
</body>
                                    
    <script src="/JS/bitacora.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="/JS/Menu.js"></script>
</body>
<?php include 'barralateralfinal.php';?>
