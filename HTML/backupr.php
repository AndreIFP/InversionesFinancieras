<?php
include("conexion.php");
session_start();
?>
<?php include 'barralateralinicial.php';?>

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
                                    <img src ="https://img2.freepng.es/20181125/uzh/kisspng-computer-icons-backup-and-restore-clip-art-databas-5bfae2143ce388.5626160015431685322494.jpg"   alt="Logo" title="Home page" class="logo1"  width="200" height="200"  />
                                    
                                
                                   

	<center><a href="./Backup.php">Realizar copia de seguridad</a></center>
	<form action="./Restore.php" method="POST">
	<h1><center>Restauración base de datos</center></p></h1>
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
		<center><button type="submit" >Restaurar</button></center>
	</form>
</body>
                                    
    <script src="/JS/bitacora.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="/JS/Menu.js"></script>
</body>
<?php include 'barralateralfinal.php';?>