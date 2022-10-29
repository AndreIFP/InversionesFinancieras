<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include("conexion.php");
include("../HTML/helpers/helpers.php");
//incluir las funciones de helpers


session_start();


$_SESSION['user'];
$_SESSION['rol'];
//actualiza los permisos
updatePermisos2($_SESSION['rol']);
;

// si no existe la variable rol, el usuario no esta logueado y redirige al Login
if (!isset($_SESSION['rol'])) {
  header("Location: ../HTML/login.php"); 
  die();
}else{
   include 'barralateralinicial.php';
  
  
}

?>



<title>Inicio</title>
<body data-ng-app="validationApp">
<br>
    <section  style=" background-color:rgb(255, 255, 255);
    padding: 15px;
    color:black;
    font-size: 20px; " >
      
      <div class="content" >
        <div class="content-header" >
            <div class="row">
                <h2>Bienvenido al Sistema de Inversiones Financieras</h2>
                           
                
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
    </section>
</div>


</body>
<!-- partial -->

<?php include 'barralateralfinal.php';?>
