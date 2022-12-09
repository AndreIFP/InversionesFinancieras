
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
                   <li>
                      <a href="#user-profile-payments" data-toggle="tab">SEGURIDAD</a>
                   </li>
               </ul>
            </div>
            
               <div class="panel-body">
                 <div class="tab-content">
                  <!-- modal -->
                  <div class="tab-pane active" id="user-profile-info">

                  <form class="" action="perfil_validacion.php" method="post">
                    
                      <div class="row">
                        <div class="col-sm-6">
                           <label>Usuario</label>
                           <input type="text" readonly="true" class="input-md form-control " value="<?php echo $Usuario ?>">
                        </div>
                        <div class="col-sm-6">
                           <label>Rol</label>
                           <input type="text" readonly="true" class="input-md form-control" value="<?php echo $Rol ?>">
                        </div>
                        <label></label> <label></label> <input type="hidden" class="input-md form-control" name="eleccion" value="1"> <label></label> <label></label>
                        <div class="col-sm-6">
                           <label>Nombre Completo</label>
                           <input type="text" class="input-md form-control" name="Nombre_Usuario" value="<?php echo $Nombre_Usuario ?>" maxlength="40" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required size="30">
                        </div>
                        <div class="col-sm-6">
                           <label>Email</label>
                           <input type="email" class="input-md form-control" name="Correo_Electronico" value="<?php echo $Correo_Electronico ?>" maxlength="50" required size="30">
                        </div>
                        <div class="col-sm-6">
                           <label></label>
                        </div>
                     </div>
                     <button class="btn flat btn-create" id="daterange-btn" name="">Guardar <i aria-hidden="true"></i></button>
                </form>
                </div>

                  <!-- modal -->
                  <div class="tab-pane fade" id="user-profile-payments">

                  <form class="" action="perfil_validacion.php" method="post">
                    
                      <div class="row">
                      <p>Para acceder al cambio de contraseña o cambio de pregunta, necesita ingresar su contraseña actual.</p>
                      <div class="col-sm-12">
                           <label> </label> <label> </label>
                        </div>
                        <div class="col-sm-3">
                           <label>Contraseña Actual</label>
                           <input type="password" name="Contraseña" class="input-md form-control " required placeholder="Ingrese su Contraseña" maxlength="16" required size="30">
                        </div>
                        <div class="col-sm-12">
                           <label> </label> <input type="hidden" class="input-md form-control" name="eleccion" value="2"> <label> </label>
                        </div>
                     </div>
                     <button class="btn flat btn-create" id="date-range-btn" name="">Continuar <i aria-hidden="true"></i></button>
                </form>
                </div>
                  <!-- modal -->
              </div>
         </div>
         </div>
         </div>
      </div>
   </div>
<!-- modal -->
<div class="modal fade" id="upload-video-url" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body payment">
               <button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
               <h3 class="title"><i class="fa fa-video-camera"></i> Add video URLs</h3>
               <p>Add Vimeo and Youtube links of your recent and best videos. These will be displayed on your portfolio page so choose the works that reflects your talents and expertise. First impression is important so make it count.</p>
               <input class="input-form" type="text" placeholder="http://">
               <p class="add-link"><a>+ Add more links</a></p>
               <p class="align-center"><a class="btn flat btn-create">Save</a></p>
            </div>
        </div>
    </div>
</div>  
</body>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.4.2/Sortable.min.js'></script>
</body>

<?php include 'barralateralfinal.php'; ?>