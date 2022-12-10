<!-- -----------------------------------------------------------------------
	    Universidad Nacional Autonoma de Honduras (UNAH)
		           Facultad de Ciencias Economicas
	        Departamento de Informatica administrativa
        Analisis, Programacion y Evaluacion de Sistemas
                    Primer Periodo 2022


Equipo:
Allan Mauricio Hernández ...... (mauricio.galindo@unah.hn)
Andrés Isaías Flores .......... (aifloresp@unah.hn)
Esperanza Lisseth Cartagena ... (esperanza.cartagena@unah.hn)
Fanny Merari Ventura .......... (fmventura@unah.hn
José David García ............. (jdgarciad@unah.hn)
José Luis Martínez ............ (jlmartinezo@unah.hn)
Luis Steven Vásquez ........... (Lsvasquez@unah.hn)
Sara Raquel Ortiz ............. (Sortizm@unah.hn)

Catedratico:
LIC. CLAUDIA REGINA NUÑEZ GALINDO
Lic. GIANCARLO MARTINI SCALICI AGUILAR
Lic. KARLA MELISA GARCIA PINEDA 

----------------------------------------------------------------------

Programa:          perfil_pass
Fecha:             16-jul-2022
Programador:       Sara
descripcion:       Pantalla 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
José	          01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Fanny 	       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Esperanza	    01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

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

  <title>Cambios de Seguridad</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'><link rel="stylesheet" href="./cssperfil/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body>
<h1>Cambios de Seguridad</h1>    
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
                   <a href="#user-profile-info" data-toggle="tab">Preguntas de Seguridad</a>
                   </li>
                   <li>
                      <a href="#user-profile-payments" data-toggle="tab">contraseña</a>
                   </li>
               </ul>
            </div>
            
               <div class="panel-body">
                 <div class="tab-content">
                  <!-- modal -->
                  <div class="tab-pane active" id="user-profile-info">

                  <form class="" action="perfil_validacion_pass.php" method="post">
                    
                      <div class="row">
                        <div class="col-sm-3">
                           <label>Pregunta de Seguridad</label>
                           <select name="txtpregunta" id="format" required>
                                    <option selected disabled value="">Seleccione su nueva pregunta de seguridad‍‍‍‍‍</option>

                                    <?php
                                    include('conexion.php');
                                    #consulta de todos los paises
                                    $consulta = mysqli_query($conn, "SELECT * FROM tbl_preguntas ;");
                                    while ($row = mysqli_fetch_array($consulta)) {
                                        $nombrepais = $row['Preguntas'];
                                        $nombeid = $row['Id_Preguntas'];

                                    ?>

                                        <option class="dropdown-item" value="<?php echo $nombeid ?>"><?php echo $nombrepais ?></option>

                                    <?php

                                    }
                                    $respuesta = $nombrepais;
                                    ?>
                                </select>
                        </div>
                        <label></label> <label></label>
                        <div class="col-sm-3">
                           <label>Respuesta</label>
                           <input type="txtrespuesta" name="txtrespuesta" class="input-md form-control" value="" placeholder="Ingrese su Nueva Respuesta" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                        <div class="col-sm-6">
                           <label></label>
                        </div>
                        <label></label> <input type="hidden" class="input-md form-control" name="eleccion" value="1"> <label></label>
                     </div>
                     <button class="btn flat btn-create" id="daterange-btn" name="">Guardar <i aria-hidden="true"></i></button>
                </form>
                </div>

                  <!-- modal -->
                  <div class="tab-pane fade" id="user-profile-payments">

                  <form class="" action="perfil_validacion_pass.php" method="post">
                    
                      <div class="row">
                      <p>Ingrese la nueva contraseña.</p>
                      <div class="col-sm-12">
                           <label> </label> <label> </label>
                        </div>
                        <div class="col-sm-3">
                           <label>Nueva Contraseña</label>
                           <input type="password" name="userpassword" class="input-md form-control " required placeholder="Ingrese su Contraseña" maxlength="16" required size="30" pattern="[A-Za-z0-9/@/`/!/#/$/%/^/~/&/*/_/-/=/+/|/;/:/'/,/./>/</?/¡/¿/]{8,30}" title="Letras Mayusculas y Minusculas , números. Incluir un caracter especial. Tamaño mínimo: 8. Tamaño máximo: 30.">
                        </div>
                        <div class="col-sm-3">
                           <label>Ingrese Otra vez la Contraseña</label>
                           <input type="password" name="userpassword" class="input-md form-control " required placeholder="Ingrese su Contraseña" maxlength="16" required size="30" pattern="[A-Za-z0-9/@/`/!/#/$/%/^/~/&/*/_/-/=/+/|/;/:/'/,/./>/</?/¡/¿/]{8,30}" title="Letras Mayusculas y Minusculas , números. Incluir un caracter especial. Tamaño mínimo: 8. Tamaño máximo: 30." onblur="verificar()">
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


<script>
    //validacion no espacios en contraseña
    var input = document.getElementById('inpucontra2');
    input.addEventListener('input', function() {
      this.value = this.value.trim();
    })

    var input = document.getElementById('inpucontracon');
    input.addEventListener('input', function() {
      this.value = this.value.trim();
    })
    //validacion bloqueo de caracteres especiales
    function blockSpecialCharacters(e) {
      let key = e.key;
      let keyCharCode = key.charCodeAt(0);

      // A-Z
      if (keyCharCode >= 65 && keyCharCode <= 90) {
        return key;
      }
      // a-z
      if (keyCharCode >= 97 && keyCharCode <= 122) {
        return key;
      }

      return false;
    }

    $('#theInput').keypress(function(e) {
      blockSpecialCharacters(e);
    });

    //validacion contra1
    let password = document.getElementById("inpucontra2");
    let password2 = document.getElementById("inpucontracon");
    let viewPassword = document.getElementById('viewPassword');


    let click = false;

    viewPassword.addEventListener('click', (e) => {
      if (!click) {
        password.type = 'text'
        password2.type = 'text'

        click = true
      } else if (click) {
        password.type = 'password'
        password2.type = 'password'
        click = false
      }
    })

    function verificar() {
      let clave1 = document.getElementById('inpucontracon').value;
      let clave2 = document.getElementById('inpucontra2').value;
      if (clave1 == clave2) {
        alert('Las dos claves ingresadas son iguales');
      } else {
        <?php

        ?>
        alert('Las dos claves ingresadas son distintas', );
      }
    }
  </script>


</body>

<?php include 'barralateralfinal.php'; ?>