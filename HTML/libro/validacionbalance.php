<?php
include("../conexion.php");

//incluir las funciones de helpers
include_once("../helpers/helpers.php");

//iniciar las sesiones
session_start();
   // si no existe la variable rol, el usuario no esta logueado y redirige al Login
if (!isset($_SESSION['rol'])) {
   header("Location: ../login.php"); 
   die();
}else{
   //actualiza los permisos
   updatePermisos($_SESSION['rol']);
   
   //si no tiene permiso de visualización redirige al index
   if ($_SESSION['permisos'][M_BALGENERAL]['r']==0 or !isset($_SESSION['permisos'][M_BALGENERAL]['r'])) {
       header("Location: ../index.php");
       die();
   }
}
?>

<?php include 'barralateralinicial.php';?>
    
<br>
</body>
<title>Balance General</title>
            <label for="text" > Balance General </label>
            <h6><a  class="btn btn-primary"  href="../index.php ">Volver Atrás</a></h6>
            <br>
             <p   id="pa">Seleccione el Cliente:</p>
             <div class="container">
           
      
           </div>
           <div class="col-md-4">
             <form method="post" action="validacioncliente_balance.php" enctype="multipart/form-data" class="form-horizontal">
                    <div class="col-md-13 btn-print">

                    <div class="form-group">
                    
          <div class="select">
          <select name="Idcliente" id="Idcliente" style="font-size:18px" required>
          <option value="" >Selecciona una opcion</option>
             <?php 
              include('../conexion.php');
                
                #consulta de todos los paises
                $consulta=mysqli_query($conn,"SELECT * FROM TBL_CLIENTES ;" );
                while($row=mysqli_fetch_array($consulta)){
                    $nombrepais=$row['Nombre_Cliente']; 
                    $nombeid=$row['Id_Cliente'];   
                    

                     
             ?>
                 
                 
                    <option  class="dropdown-item" style="font-size:18px" value="<?php echo $nombeid?>"><?php echo $nombrepais ?></option>
                    
                    

                <?php

                

                 }
                 
                 ?> 
      </select>
          </div>
          </div>
          
                    
                    <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-13 control-label" >Fecha inicio</label>
                        <div class="input-group col-sm-11">
                          <input type="date" class="form-control pull-right" id="date" name="fecha_inicio"  required >
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>
                    <br>
            <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-13 control-label">Fecha final</label>
                        <div class="input-group col-sm-11">
                          <input type="date" class="form-control pull-right" id="date" name="fecha_final"  required >
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>
              

                    <div class="col-md-12">
                       <div class="col-md-12">
                        <button class="btn btn-lg btn-success btn-print" id="daterange-btn" style="font-size:20px;" name="">Continuar</button>
                        
           </div>
           <div class="col-md-3">
        
           </div>

                          </div>

                    </div>
              
        </div>
      </div>
      <!-- partial -->
        <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="/JS/Java.js"></script>
      
        <!--Estilos Css-->
        <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
#pa{
    text-align: left;
    font-size: 15;
}
#pp{
    text-align: left;
    font-size: 18;
}
.per{
    font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: rgb(117, 209, 174) 50%;
  width: 100% 100px;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;

}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: rgb(82, 184, 125) 50%;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: rgb(111, 126, 194);
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: rgb(111, 126, 194);
  text-decoration: none;
}
.form .register-form {
  align-items: center;
  display: none;
}
.form img {
    margin: 15px auto;
    text-align: center;
    width: 50%;
    display: block;
    align-items: center;
    z-index: 2;


  }
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}

.form label{
    font-family: "Roboto", sans-serif;
    font-size: 25px;
    letter-spacing: 1px;
    text-align: center;
    text-transform: uppercase;
    padding: 12px;
    text-decoration: none;
    -moz-osx-font-smoothing: grayscale; 
    color:#4d4d4d;
    display: block;
    top: 20px;
    margin: 15px auto;
}
 </style>
 
    
</body>

<?php include 'barralateralfinal.php';?>

