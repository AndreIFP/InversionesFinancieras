<?php
include("../conexion.php");
?>
<?php


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
   if ($_SESSION['permisos'][M_GESTION_USUARIOS]['w']==0 or !isset($_SESSION['permisos'][M_GESTION_USUARIOS]['w'])) {
       header("Location: ../index.php");
       die();
   }
}
?>
<?php include 'barralateralinicial.php';?>
  </div>
  <title>Gestion Usuario</title>
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <h6><a  class="btn btn-primary"  href="Gestion_Usuarios.php ">Volver Atrás</a></h6>
  <div class="form_register">
  
          <form class="register-form" action="../ValidacionReg2.php" method="post">
          <h1> Registra Nuevo Usuario</h1>
  <hr>
            <label for="text"> Usuario</label>
            <input type="text" placeholder="Usuario"  name="txtusuario" maxlength="15" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return blockSpecialCharacters(event)" required size="40"/>
            <label for="">Nombre Del Usuario</label>
            <input type="text" placeholder="Nombre de Usuario"  name="Nombre_Usuario" maxlength="30" style="text-transform:uppercase;" required size="40">
            <label for="Password"> Contraseña</label>
            <input  id="inpucontra2"  type="password" placeholder="Contraseña" name="txtpassword" maxlength="30" required pattern="[A-Za-z0-9/@/`/!/#/$/%/^/~/&/*/_/-/=/+/|/;/:/'/,/./>/</?/¡/¿/]{8,30}"
            title="Letras Mayusculas y Minusculas , números. Incluir un caracter especial. Tamaño mínimo: 8. Tamaño máximo: 30. "/>
            <label for="Password"> Confirmar Contraseña</label>
              <input  id="inpucontracon"  type="password" placeholder="Confirmar Contraseña"  maxlength="16" required pattern="[A-Za-z0-9/@/`/!/#/$/%/^/~/&/*/_/-/=/+/|/;/:/'/,/./>/</?/¡/¿/]{8,30}"
            title="Letras Mayusculas y Minusculas , números. Incluir un caracter especial. Tamaño mínimo: 8. Tamaño máximo: 30. "  onblur="verificar()"  />
            <div class="col s12">
            <a id="viewPassword" class="mover" >Mostrar contraseña</a>
            </div>
            <label for="text"> Correo</label>
            <input type="email" placeholder="Direccion de correo" name="txtcorreo" maxlength="50" required size="40" />
            <br>
            <br>
            <center><button type="submit" name="btnregistrarx" class="btn btn-danger">Registrar</button></center>
          </form>
    </div>
	</section>
      <!-- partial -->
        <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="/JS/Java.js"></script>
      
        <!--Estilos Css-->
 
        <style type="text/css">
  .btn-atras{
	background: #1faac8;
	color: #FFF;
	padding: 0 20px;
	border: 0;
	cursor: pointer;
	margin-left: 20px;
}
.form_register{
	width: 450px;
	margin: auto;
}
.form_register h1{
	color: #3c93b0;
}
hr{
	border: 0;
	background: #CCC;
	height: 1px;
	margin: 10px 0;
	display: block;
}
form{
	background: #FFF;
	margin: auto;
	padding: 20px 50px;
	border: 1px solid #d1d1d1;
}
label{
	display: block;
	font-size: 12pt;
	font-family: 'GothamBook';
	margin: 15px auto 5px auto;
}
.btn_save{
	font-size: 12pt;
	background: #12a4c6;
	padding: 10px;
	color: #FFF;
	letter-spacing: 1px;
	border: 0;
	cursor: pointer;
	margin: 15px auto;
}
.alert{
	width: 100%;
	background: #66e07d66;
	border-radius: 6px;
	margin: 20px auto;
}
.msg_error{
	color: #e65656;
}
.msg_save{
	color: #126e00;
}
.alert p{
	padding: 10px;
}
#viewPassword{
  cursor:pointer;
}
#viewPasswordee{
  cursor:pointer;
}
</style>
<script>
//validacion no espacios en contraseña
var input = document.getElementById('inpucontra2');
input.addEventListener('input',function(){
     this.value = this.value.trim();
}) 

var input = document.getElementById('inpucontracon');
input.addEventListener('input',function(){
     this.value = this.value.trim();
}) 
//validacion bloqueo de caracteres especiales
function blockSpecialCharacters(e) {
            let key = e.key;
            let keyCharCode = key.charCodeAt(0);
            
            // A-Z
            if(keyCharCode >= 65 && keyCharCode <= 90) {
                return key;
            }
            // a-z
            if(keyCharCode >= 97 && keyCharCode <= 122) {
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

viewPassword.addEventListener('click', (e)=>{
  if(!click){
    password.type = 'text'
    password2.type = 'text' 

    click = true
  }else if(click){
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
                alert('Las dos claves ingresadas son distintas',);
            }
        }
</script>
</body>
<?php include 'barralateralfinal.php';?>
