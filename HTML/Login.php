<!DOCTYPE html 5>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Login</title>
</head>
<body>


    <div class="login-page">
        <div class="form">
        <a href="http://localhost/login2/HTML/login.php">
          <img src="login.png" alt="Logo de Login">
        </a>
            
            
          <form class="register-form" action="ValidacionReg.php" method="post">
          <label for="text"> Registro</label>
            <input type="text" placeholder="Nombre de Usuario"  name="txtusuario" maxlength="15" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return blockSpecialCharacters(event)" required/>
            
            <div class="container">
            <div class="row">
            <div class="col s12 m12 l6">
            <input  id="inpucontra2"  type="password" placeholder="Contraseña" name="txtpassword" maxlength="30" required pattern="[A-Za-z0-9/@]{8,30}"
            title="Letras Mayusculas y Minusculas , números. Incluir un caracter especial. Tamaño mínimo: 8. Tamaño máximo: 30. "/>
            <input  id="inpucontracon"  type="password" placeholder="Confirmar Contraseña"  maxlength="16" required pattern="[A-Za-z0-9/@]{8,30}"
             title="Letras Mayusculas y Minusculas , números. Incluir un caracter especial. Tamaño mínimo: 8. Tamaño máximo: 30. "  onblur="verificar()"  />
            </div>
            <div class="col s12">
            <a id="viewPassword" class="mover"  >Mostrar contraseña</a>
            </div>
            </div>
            </div>
            
            <input type="email" placeholder="Direccion de correo" name="txtcorreo" maxlength="50" required required />
            <br>
            <button type="submit" name="btnregistrarx">Registrar</button>
            <p class="message">¿Ya te registraste? <a href="#">Iniciar Sesión</a></p>
          </form>

          <form  id="frmregistrar" class="login-form" action="ValidacionLogin.php" method="post">
          <label for="text"> Login</label>
            <input   type="text" placeholder="Nombre de Usuario" name="txtusuario" maxlength="15" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return blockSpecialCharacters(event)" required/>
            <!--contra 1--->
            <div class="container">
            <div class="row">
            <div class="col s12 m12 l6">
            <input id="inpucontra" type="password" placeholder="Contraseña" name="txtpassword" maxlength="16" required />
            </div>
            <div class="col s12">
            <a id="viewPasswordee" class="mover"  >Mostrar contraseña</a>
            </div>
            </div>
            </div>
            <!-- <div class="ub1">ROL</div>
           <select name="rol">
           <option value="0" style="display:none;"><label>Seleccionar</label></option>
           <option value="Admin">Administrador</option>
           <option value="Adminpriv">Usuario con privilegios</option>
           <option value="Adminrest">Usuario con restricciones</option>
           </select>
           <br> -->
           <br>
            <button type="submit" name="btnrlogin">Acceder</button>
            <p class="message">¿No te has registrado? <a href="#">Crear Cuenta</a></p>
            <p class="message"  ><a type="submit" href="OlvidoContra.php">¿Has olvidado tu contraseña?</a></p>
          
          
          </form>
          </form>
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

 select
{
	width: 100%;
    padding: 0.5em;
	font-size:1em;
	border-radius:10px;
	border:1px solid gray;
	color:gray;
	text-align:left;
	
}

.ub1
{
text-align:center;
font-weight: bold;

margin-bottom:0.5em;
margin-top:0.5em;
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
body {
  background: #76b852; /* fallback for old browsers */
  background: rgb(111, 161, 194);
  background: linear-gradient(90deg, rgb(111, 126, 194) 0%, rgb(82, 184, 125) 50%);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
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

#viewPassword{
  cursor:pointer;
}
#viewPasswordee{
  cursor:pointer;
}

 </style>
<script>
$('.message a').click(function(){
  $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
var y = document.getElementById("frmregistrar");

//validacion no espacios en contraseña
var input = document.getElementById('inpucontra2');
input.addEventListener('input',function(){
     this.value = this.value.trim();
}) 

var input = document.getElementById('inpucontracon');
input.addEventListener('input',function(){
     this.value = this.value.trim();
}) 
var input = document.getElementById('inpucontra');
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

let viewPasswordee = document.getElementById('viewPasswordee');
let password3 = document.getElementById("inpucontra");


viewPasswordee.addEventListener('click', (e)=>{
  if(!click){
    password3.type = 'text'
    click = true
  }else if(click){
    password3.type = 'password'
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
</html>
