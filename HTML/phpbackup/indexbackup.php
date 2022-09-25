<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bitacora / Backup</title>
    <!-- JS ===================== -->
    <!-- load angular -->
    <script src="https://code.angularjs.org/1.5.5/angular.js"></script>
    <!--Load angular bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.0.0/ui-bootstrap-tpls.js"></script>
    <script src="app.js"></script>
    <!-- CSS ===================== -->
    <!--load font awesome-->

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/CSS/bitacora.css" />

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/fontawesome/4.1.0/css/font-awesome.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600'>
    <link rel="stylesheet" href="/CSS/Menu.css">
    <link rel="stylesheet" href="/CSS/Home.css">
    <style>
        body {
            padding-top: 30px;
        }
    </style>
    <link rel="stylesheet" href="/CSS/bitacora.css">

</head>
<body>
    <!-- partial:index.partial.html -->
    <!-- apply angular app and controller to body -->
    <!-- Navigation -->
    

    <!-- /menu vertical -->

   


    <body data-ng-app="validationApp">
        <div class="container" data-ng-controller="RegistrationController">

            <!-- PAGE HEADER -->
            <div class="page-header">
                <h1 class="text-center">BITACORA DEL SISTEMA </h1>
            </div>
            <data-uib-tabset data-active="activeJustified" data-justified="true">
                <data-uib-tab data-heading="BACKUP" data-index="0">
                    <br/>
                    <center>
                        <div class="main">
                            <header class="page-header">
                                <div class="branding">
                                    <br>
                                    <img src="https://img2.freepng.es/20181125/uzh/kisspng-computer-icons-backup-and-restore-clip-art-databas-5bfae2143ce388.5626160015431685322494.jpg" alt="Logo" title="Home page" class="logo1"  width="200" height="200" />
                                    <h1>Respaldo y Restauración de la base de datos</h1>
                                
	<?php
		include './Connet.php';
	?>
	<center><a href="./Backup.php">Realizar copia de seguridad</a></center> 
	<form action="./Restore.php" method="POST">
	<center><label>Selecciona un punto de restauración</label><br></center>
		<select name="restorePoint">
	<center><option value="" disabled="" selected="">Selecciona un punto de restauración</option>
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


</html>
