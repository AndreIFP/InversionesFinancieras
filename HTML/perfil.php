<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include("conexion.php");

session_start();
$_SESSION['id'];
$_SESSION['user'];

?>
<?php
        $Id_Usuario         = $_SESSION['id'];
        


       $query_user = mysqli_query($conn, "SELECT * FROM tbl_usuario WHERE Id_Usuario = $Id_Usuario");
       while ($row = mysqli_fetch_array($query_user)) {
        $Usuario            = $row['Usuario'];
        $Nombre_Usuario     = $row['Nombre_Usuario'];
        $Correo_Electronico = $row['Correo_Electronico'];
        $Id_Rol                = $row['Rol'];
      }


      $query_rol = mysqli_query($conn, "SELECT * FROM tbl_roles WHERE Id_Rol = $Id_Rol");
       while ($row = mysqli_fetch_array($query_rol)) {
        $Rol                = $row['Rol'];
      }
        ?>

<?php include 'barralateralinicial.php'; ?>

<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 16px; ">

  <title>Ajustes de usuario</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'><link rel="stylesheet" href="./cssperfil/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body>
<h1>Ajustes de usuario</h1>    
<br>
   <div class="container">
         <ul class="nav">
                       
         </ul> 
      </div>
      <div class="row">
         <div class="col-md-11">
            <div class="panel with-nav-tabs panel-default">
               <div class="panel-heading single-project-nav">
                  <ul class="nav nav-tabs"> 
                   <li class="active">
                      <a href="#user-profile-info" data-toggle="tab">detalles de la cuenta</a>
                   </li>

               </ul>
            </div>
               <div class="panel-body">
                 <div class="tab-content">
                  <div class="tab-pane fade in active" id="user-profile-info">

                  
                  <form class="" action="perfil_actualizar.php" method="post">

                     <div class="row">
                        <div class="col-sm-6">
                           <label>Usuario</label>
                           <input type="text" readonly="true" class="input-md form-control " value="<?php echo $Usuario ?>">
                        </div>
                        <div class="col-sm-6">
                           <label>Rol</label>
                           <input type="text" readonly="true" class="input-md form-control" value="<?php echo $Rol ?>">
                        </div>
                        <div class="col-sm-6">
                           <label>Nombre Completo</label>
                           <input type="text" class="input-md form-control" name="Nombre_Usuario" value="<?php echo $Nombre_Usuario ?>" maxlength="40" style="text-transform:uppercase;" required size="30">
                        </div>
                        <div class="col-sm-6">
                           <label>Email</label>
                           <input type="text" class="input-md form-control" name="Correo_Electronico" value="<?php echo $Correo_Electronico ?>">
                        </div>
                        <div class="col-sm-6">
                           <label></label>
                        </div>
                        <center>
                        <br><br>
                        <div class="col-sm-12">
                           <label>Pregunta de Seguridad</label>
                           <br>
                           <a class="btn flat btn-success">Cambiar</a>
                        </div>
                        </center>
                     </div>
                     
                  </div>
                                    
              </div>
              <button class="btn flat btn-create" id="daterange-btn" name="">Guardar <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
              </form>
              
         </div>
         </div>
      </div>
   </div>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.4.2/Sortable.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="/JS/Java.js"></script>

<!--Estilos Css-->
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);

  .login-page {
    width: 360px;
    padding: 8% 0 0;
    margin: auto;
  }



  #pp {
    text-align: left;
    font-size: 18;
  }

  .per {
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

  .form button:hover,
  .form button:active,
  .form button:focus {
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

  .container:before,
  .container:after {
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

  .form label {
    font-family: "Roboto", sans-serif;
    font-size: 25px;
    letter-spacing: 1px;
    text-align: center;
    text-transform: uppercase;
    padding: 12px;
    text-decoration: none;
    -moz-osx-font-smoothing: grayscale;
    color: #4d4d4d;
    display: block;
    top: 20px;
    margin: 15px auto;
  }
</style>


</body>

<?php include 'barralateralfinal.php'; ?>