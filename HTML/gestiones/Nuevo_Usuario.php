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

Programa:          Nuevo_Usuario
Fecha:             16-jul-2022
Programador:       Allan
descripcion:       entrada

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Fanny	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Luis		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

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
} else {
  //actualiza los permisos
  updatePermisos($_SESSION['rol']);

  //si no tiene permiso de visualización redirige al index
  if ($_SESSION['permisos'][M_GESTION_USUARIOS]['w'] == 0 or !isset($_SESSION['permisos'][M_GESTION_USUARIOS]['w'])) {
    header("Location: ../index.php");
    die();
  }
}
?>
<script>
  function valida(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true; //Tecla de retroceso (para poder borrar)
    // dejar la línea de patron que se necesite y borrar el resto
    patron = /[a-zA-ZñÑáéíóúÁÉÍÓÚ ]/; // Solo acepta letras y espacios

    te = String.fromCharCode(tecla);
    return patron.test(te);
  }
</script>

<?php include 'barralateralinicial.php'; ?>
<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 12px; ">
  <title>Gestion Usuario</title>

  <a class="btn btn-primary" href="Gestion_Usuarios.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <hr>
  <div clas="row ">

    <div class="box-header with-border">

      <div class="box-body">

        <form class="register-form" action="../ValidacionReg2.php" method="post">
          <center>
            <h2><strong> Registrar Nuevo Usuario </strong></h2>
          </center>
          <hr>

          <div class="row">

            <div class="col-xs-14 pull-right">

              <table class="table">
                <thead class="table-primary">
                  <tr>

                    <th>
                      <center>Usuario</center>
                    </th>


                    <th>
                      <center>Nombre de Usuario</center>
                    </th>

                  </tr>
                </thead>

                <tbody>

                  <tr>

                    <td style="width: 50%">

                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Usuario" name="txtusuario" maxlength="15" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return blockSpecialCharacters(event)"  required size="40" />

                      </div>

                    </td>

                    <td style="width: 50%">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span>
                        <input type="text" class="form-control" placeholder="Nombre de Usuario" name="Nombre_Usuario" maxlength="40" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return valida(event)" required size="40">

                      </div>

                    </td>

                  </tr>

                </tbody>
              </table>

            </div>

          </div>

          <div class="row">

            <div class="col-xs-14 pull-right">

              <table class="table">
                <thead class="table-primary">
                  <tr>

                    <th>
                      <center>Contraseña</center>
                    </th>


                    <th>
                      <center>Confirmar Contraseña</center>
                    </th>

                  </tr>
                </thead>

                <tbody>

                  <tr>

                    <td style="width: 50%">

                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input id="inpucontra2" class="form-control" type="password" placeholder="Contraseña" name="txtpassword" maxlength="30" required pattern="[A-Za-z0-9/@/`/!/#/$/%/^/~/&/*/_/-/=/+/|/;/:/'/,/./>/</?/¡/¿/]{8,30}" title="Letras Mayusculas y Minusculas , números. Incluir un caracter especial. Tamaño mínimo: 8. Tamaño máximo: 30. " />

                      </div>

                    </td>

                    <td style="width: 50%">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input id="inpucontracon" class="form-control" type="password" placeholder="Confirmar Contraseña" maxlength="16" required pattern="[A-Za-z0-9/@/`/!/#/$/%/^/~/&/*/_/-/=/+/|/;/:/'/,/./>/</?/¡/¿/]{8,30}" title="Letras Mayusculas y Minusculas , números. Incluir un caracter especial. Tamaño mínimo: 8. Tamaño máximo: 30. " onblur="verificar()" />
                        <span class="input-group-addon"> <a id="viewPassword" class="mover"><i class="fa fa-eye" aria-hidden="true"></i></a></span>
                      </div>

                    </td>

                  </tr>

                </tbody>
              </table>

            </div>

          </div>

          <div class="row">

            <div class="col-xs-14 pull-right">

              <table class="table">
                <thead class="table-primary">
                  <tr>

                    <th>
                      <center>Correo</center>
                    </th>

                  </tr>
                </thead>

                <tbody>

                  <tr>

                    <td style="width: 100%">

                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Direccion de correo" name="txtcorreo" maxlength="50" required size="40" />

                      </div>

                    </td>

                  </tr>

                </tbody>
              </table>

            </div>

          </div>

          <hr>
          <center><button type="submit" name="btnregistrarx" class="btn btn-primary btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar</button></center>
        </form>
      </div>
    </div>
  </div>


  </secction>
  </div>


  <!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="/JS/Java.js"></script>

  <!--Estilos Css-->

  <style type="text/css">
    .btn-atras {
      background: #1faac8;
      color: #FFF;
      padding: 0 20px;
      border: 0;
      cursor: pointer;
      margin-left: 20px;
    }

    .form_register {
      width: 450px;
      margin: auto;
    }

    .form_register h1 {
      color: #3c93b0;
    }

    hr {
      border: 0;
      background: #CCC;
      height: 1px;
      margin: 10px 0;
      display: block;
    }

    form {
      background: #FFF;
      margin: auto;
      padding: 20px 50px;
      border: 1px solid #d1d1d1;
    }

    label {
      display: block;
      font-size: 12pt;
      font-family: 'GothamBook';
      margin: 15px auto 5px auto;
    }

    .btn_save {
      font-size: 12pt;
      background: #12a4c6;
      padding: 10px;
      color: #FFF;
      letter-spacing: 1px;
      border: 0;
      cursor: pointer;
      margin: 15px auto;
    }

    .alert {
      width: 100%;
      background: #66e07d66;
      border-radius: 6px;
      margin: 20px auto;
    }

    .msg_error {
      color: #e65656;
    }

    .msg_save {
      color: #126e00;
    }

    .alert p {
      padding: 10px;
    }

    #viewPassword {
      cursor: pointer;
    }

    #viewPasswordee {
      cursor: pointer;
    }
  </style>
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