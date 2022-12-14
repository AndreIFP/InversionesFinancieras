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

Programa:          preguntasxUsuario
Fecha:             16-jul-2022
Programador:       David
descripcion:       Gestion

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Luis	          01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
David		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Sara 	          01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Andrés		      01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login recuperacion</title>
    <!-- JS ===================== -->
    <!-- load angular -->
    <script src="https://code.angularjs.org/1.5.5/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.js"></script>
    <!--Load angular bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.0.0/ui-bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.0.0/ui-bootstrap-tpls.js"></script>
    <script src="app.js"></script>
    <!-- CSS ===================== -->
    <!--load font awesome-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <!-- load bootstrap -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <style>
        body {
            padding-top: 30px;
            background-color: #DCE3E7;
        }

        .popover {
            width: 350px;
            text-align: center;
        }

        .criteria-met {
            color: #5cb85c;
        }

        .criteria-failed {
            color: #246081;
        }

        .password-glyphicon {
            margin-right: 10px;
            font-size: 20px;
        }

        .initial-state {
            display: none;
        }

        .white-background {
            background-color: #D3EEFD;
            cursor: pointer;
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: 0;
            box-shadow: none;
            border: 0 !important;

            background: #969696;
            background-image: none;
            flex: 1;
            padding: 0 .5em;
            color: #fff;
            cursor: pointer;
            font-size: 1em;
            font-family: 'Open Sans', sans-serif;
        }

        select::-ms-expand {
            display: none;
            border-color: #5cb85c;
        }

        .select {
            position: relative;
            display: flex;
            width: 20em;
            height: 3em;
            line-height: 3;

            overflow: hidden;
            border-radius: .25em;

        }

        .select::after {
            content: '\25BC';
            position: absolute;
            top: 0;
            right: 0;
            padding: 0 1em;
            background: #2b2e2e;
            cursor: pointer;
            pointer-events: none;
            transition: .25s all ease;
        }

        .select:hover::after {
            color: #d9534f;
        }
    </style>
    <link rel="stylesheet" href="/CSS/Preguntas.css">

</head>

<br>


<body>
    <!-- partial:index.partial.html -->
    <!-- apply angular app and controller to body -->
    <div class="box">

        <div class="box-header with-border">

            <body data-ng-app="validationApp">
                <div class="container" data-ng-controller="RegistrationController">
                    <!-- PAGE HEADER -->

                    <center>
                        <h2><strong> Recuperación Por Pregunta De Seguridad </strong></h2>
                    </center>

                    <Hr>

                    <?php
                    include('conexion.php');

                    $tusuario = $_POST["txtusuario"];
                    $nombre = $_POST["txtusuario"];

                    //   $respuesta=$_POST['txtrespuesta'];



                    if (isset($_POST["btxenviar"])) {
                        $query = mysqli_query($conn, "SELECT * FROM tbl_usuario WHERE Usuario = '" . $nombre . "'");
                        $nr = mysqli_num_rows($query);
                        while ($row = mysqli_fetch_array($query)) {
                            $idusrol = $row['Id_Usuario'];
                        }
                        
                        //validacion
                        
                        $pr = mysqli_query($conn, "SELECT * FROM tbl_preguntas_x_usuario WHERE Id_Usuario = $idusrol");
                        $mr = mysqli_num_rows($pr);
                        
                        if ($mr == 0) {
                            echo "<script> alert('Aún no tienes configurada tu pregunta de seguridad: $nombre');window.location= 'login.php' </script>";
                        }
                       //fin

                        if ($nr == 1) {
                            echo "<script> alert('Usuario Valido: $nombre') </script>";
                        } else if ($nr == 0) {
                            //header("Location: login.php");
                            echo "No ingreso";
                            echo "<script> alert('Usuario No Valido: $nombre');window.location= 'OlvidoContra.php' </script>";
                        }
                    }
                    ?>

                    <!--preguntas-->
                    <a href="OlvidoContra.php" class="btn btn-primary "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>

                    <hr>

                    <H4> <strong> <em> ¡BIENVENIDO <?php echo $nombre ?> <i class="fa fa-heart-o" aria-hidden="true"></i>! </em></strong></H4>
                    <P>Si ha olvidado su contraseña, puede hacer uso de su pregunta de seguridad para restablecer la contraseña <i class="fa fa-key" aria-hidden="true"></i></P>
                    <hr>

                    <form id="frmregistrar" class="login-form" action="validacionpregseguri.php" method="post">
                        <DIV CLASS="CONTEINER">
                            <div class="select" style="width:500px">
                                <select name="txtpregunta" id="format" required>
                                    <option selected disabled value="">SELECIONE SU PREGUNTA</option>

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

                            <br>



                            <!--respuesta-->
                            <div class="row">


                                <!---- <
      if(isset($_POST["btnregistrarx"])){

      
      if($respuesta!=$nombrerespu){
        echo "<script> alert('Id de usuario no coincide: $respuesta');window.location= 'OlvidoContra.php' </script>";
      }
    }
      ?>-->
                            </div>

                            <!--PASSWORD -->
                            <div class="form-group">

                                <input type="text" class="form-control" placeholder="Respuesta" name="tpregunta" maxlength="15" required onkeypress="return blockSpecialCharacters(event)" required />
                                <input type="text" value=<?php echo $tusuario ?> name="tusuario" style="visibility: hidden;" />

                                <div class="input-group">

                                    <input type="{{typeForFirstPassword}}" name="userpassword" class="form-control" placeholder="Contraseña" data-ng-model="user.password" data-ng-change="checkPasswordCriteria(user.password)" data-ng-focus="isCollapsed = !isCollapsed" data-ng-blur="isCollapsed = !isCollapsed" required onkeypress="return blockSpecialCharacters(event)" required />

                                    <span class="input-group-addon white-background">
                                        <i class="fa fa-eye" data-ng-click="changeInputType(0,$event)"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default" data-uib-collapse="isCollapsed">
                                        <div class="panel-body">
                                            <p class="lead">Su contraseña debe: </p>
                                            <div class="list-group">
                                                <a data-ng-diabled="true" class="list-group-item">
                                                    <span data-ng-class="passwordLengthClass" class="password-glyphicon"></span>
                                                    <span>contener {{minimumPasswordLength}} o más caracteres</span>
                                                </a>
                                                <a class="list-group-item">
                                                    <span data-ng-class="caseClass" class="password-glyphicon"></span>
                                                    <span>tener una letra mayúscula y minúscula</span>
                                                </a>
                                                <a class="list-group-item">
                                                    <span data-ng-class="numberClass" class="password-glyphicon"></span>
                                                    <span>contener al menos un número</span>
                                                </a>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="text-muted">Seguridad: </p>
                                                    <data-uib-progressbar class="progress-striped" max="99" value="progress" type="{{strengthType}}" title="{{passwordStrength}}">
                                                    </data-uib-progressbar>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ONE MORE TIME-->
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="{{typeForSecondPassword}}" name="confirmedUserPassword" class="form-control" placeholder="Confirmar contraseña" data-ng-model="user.confirmedPassword" data-ng-change="confirmEnteredPassword(user.confirmedPassword)" maxlength="16" <input type="{{typeForSecondPassword}}" name="confirmedUserPassword" class="form-control" placeholder="Confirmar contraseña" data-ng-model="user.confirmedPassword" data-ng-change="confirmEnteredPassword(user.confirmedPassword)" maxlength="16" required onkeypress="return blockSpecialCharacters(event)" required />
                                    <span class="input-group-addon white-background"><i class="fa fa-eye" data-ng-click="changeInputType(1)"></i></span>
                                </div>

                            </div>
                            <div class="alert alert-danger" role="alert" data-ng-if="confirmedPasswordMatchError">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                Las contraseñas no coinciden <i class="fa fa-times" aria-hidden="true"></i>
                            </div>

                            <hr>

                            <center>
                                <H4><i class="fa fa-hand-o-down" aria-hidden="true"></i> <strong>Si deseas restablecer tu contraseña haga clic en el siguiente botón</strong> <i class="fa fa-hand-o-down" aria-hidden="true"></i></H4>
                            </center>

                            <hr>

                            <!-- SUBMIT BUTTON -->
                            <center><button type="submit" name="btnregistrarx" class="btn btn-success btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Restablecer Contraseña</button></center>
                        </DIV>
                    </form>

                </div>

            </body>
        </div>
    </div>
</body>

<script>
    var validationApp = angular.module('validationApp', ['ui.bootstrap']);

    // create angular controller

    validationApp.controller('RegistrationController', function($scope) {
        $scope.forms = {
            'userForm': {
                'validEmail ': false,
                'validConfirmedPasswords': false,
                'allSecurityAnswered': false
            }

        };
        var answersProvided = [];
        $scope.typeForFirstPassword = "password";
        $scope.typeForSecondPassword = "password";
        $scope.submitState = true;
        $scope.user = {
            'securityQuestions': [{
                    'questionSelected': '',
                    'answerProvided': ''
                },
                {
                    'questionSelected': '',
                    'answerProvided': ''
                },
                {
                    'questionSelected': '',
                    'answerProvided': ''
                }
            ]
        };
        $scope.count = 0;
        var emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        $scope.emailWrong = false;
        $scope.selectedValue = [{
                'initialValue': "Pregunta de seguriadad"
            },
            {
                'initialValue': "Pregunta de seguriadad 2"
            },
            {
                'initialValue': "Pregunta de seguriadad 3"
            }
        ];
        $scope.selectQuestion = [{
                'initialState': true,
                'alreadySelected': false
            },
            {
                'initialState': true,
                'alreadySelected': false
            },
            {
                'initialState': true,
                'alreadySelected': false
            }
        ];
        $scope.securityQuestions = [{
                "question": "¿Cual es el nombre de su primer mascota?"
            },
            {
                "question": "¿Cual es su comida favorita?"
            },
            {
                "question": "¿como se llama su mamá?"
            }
        ];
        $scope.dateBirthPlaceHolder = "Fecha de Nacimiento";
        $scope.inputType = "number";
        $scope.isCollapsed = true;
        $scope.focusEvent = function() {
            $scope.dateBirthPlaceHolder = "dd/mm/yyyy";
            //        $scope.inputType = "date";
        };
        $scope.leaveEvent = function() {
            $scope.dateBirthPlaceHolder = "Date of Birth";
            //        $scope.inputType = "number";
        };
        $scope.selectValue = function(valueSelected, questionNumber) {
            switch (questionNumber) {
                case 0:
                    if ($scope.selectedValue[1].initialValue === valueSelected ||
                        $scope.selectedValue[2].initialValue === valueSelected) {
                        $scope.selectQuestion[0].alreadySelected = true;
                    } else {
                        $scope.selectQuestion[0].alreadySelected = false;
                    }
                    break;
                case 1:
                    if ($scope.selectedValue[0].initialValue === valueSelected ||
                        $scope.selectedValue[2].initialValue === valueSelected) {
                        $scope.selectQuestion[1].alreadySelected = true;
                    } else {
                        $scope.selectQuestion[1].alreadySelected = false;
                    }
                    break;
                case 2:
                    if ($scope.selectedValue[1].initialValue === valueSelected ||
                        $scope.selectedValue[0].initialValue === valueSelected) {
                        $scope.selectQuestion[2].alreadySelected = true;
                    } else {
                        $scope.selectQuestion[2].alreadySelected = false;
                    }
                    break;
            }
            $scope.selectedValue[questionNumber].initialValue = valueSelected;
            $scope.selectQuestion[questionNumber].initialState =
                ($scope.selectQuestion[questionNumber].alreadySelected) ? true : false;
        };
        $scope.status = [{
                isopen: false
            },
            {
                isopen: false
            },
            {
                isopen: false
            }
        ];
        $scope.toggleDropdown = function($event) {
            $event.preventDefault();
            $event.stopPropagation();
            $scope.status.isopen = !$scope.status.isopen;
        };
        $scope.validateEmail = function() {
            //console.log("email enetered is"+$scope.user.email);
            var emailIdLength = ($scope.user.email === undefined) ? 0 : $scope.user.email.length;
            var inValid = (emailIdLength === 0) ? true : false;
            if (!inValid) {
                if (!emailRegex.test($scope.user.email)) {
                    $scope.emailWrong = true;
                    $scope.emailValidationError = "El formato de coreeo no es correcto";
                } else {
                    $scope.emailWrong = false;
                    $scope.forms.userForm.validEmail = true;
                }
            } else {
                $scope.emailWrong = false;
            }

        };
        $scope.minimumPasswordLength = 8;
        var caseRegex = /[a-z].*[A-Z]|[A-Z].*[a-z]/;
        var numberRegex = /.*[0-9].*/;
        $scope.progress = 0;
        $scope.strengthType = "success";
        $scope.passwordStrength = "";
        var passwordProgressBar = {
            'lengthCriteria': false,
            'caseCriteria': false,
            'numberCriteria': false
        };
        $scope.checkPasswordCriteria = function(enteredPassword) {
            if (enteredPassword.length < 8) {
                $scope.passwordLengthClass = "glyphicon glyphicon-remove-circle criteria-failed";
                passwordProgressBar.lengthCriteria = false;
            } else {
                $scope.passwordLengthClass = "glyphicon glyphicon-ok-circle criteria-met";
                passwordProgressBar.lengthCriteria = true;
            }
            if (caseRegex.test(enteredPassword)) {
                $scope.caseClass = "glyphicon glyphicon-ok-circle criteria-met";
                passwordProgressBar.caseCriteria = true;
            } else {
                $scope.caseClass = "glyphicon glyphicon-remove-circle criteria-failed";
                passwordProgressBar.caseCriteria = false;
            }
            if (numberRegex.test(enteredPassword)) {
                $scope.numberClass = "glyphicon glyphicon-ok-circle criteria-met";
                passwordProgressBar.numberCriteria = true;
            } else {
                $scope.numberClass = "glyphicon glyphicon-remove-circle criteria-failed";
                passwordProgressBar.numberCriteria = false
            }
            //        if(($scope.user.firstName !== undefined && $scope.user.lastName !== undefined)){
            //            if($scope.user.lastName.length >2 && $scope.user.lastName.length >2){
            //                if(enteredPassword.indexOf($scope.user.firstName) != -1 || enteredPassword.indexOf($scope.user.lastName) != -1) {
            //                     $scope.nameClass = "glyphicon glyphicon-remove-circle criteria-failed";
            //                }else{
            //                     $scope.nameClass = "glyphicon glyphicon-ok-circle criteria-met";
            //                }
            //            }
            //        }
            if (passwordProgressBar.lengthCriteria && passwordProgressBar.caseCriteria && passwordProgressBar.numberCriteria) {
                $scope.progress = 99;
                $scope.strengthType = "success";

            } else if ((passwordProgressBar.lengthCriteria && passwordProgressBar.caseCriteria) ||
                (passwordProgressBar.lengthCriteria && passwordProgressBar.numberCriteria) ||
                (passwordProgressBar.caseCriteria && passwordProgressBar.numberCriteria)) {
                $scope.progress = 66;
                $scope.strengthType = "primary";
            } else if (passwordProgressBar.lengthCriteria || passwordProgressBar.caseCriteria || passwordProgressBar.numberCriteria) {
                $scope.progress = 33;
                $scope.strengthType = "danger";
            }
        };
        $scope.confirmedPasswordMatchError = false;
        $scope.confirmEnteredPassword = function(confirmedPassword) {
            if ($scope.progress === 99) {
                if ($scope.user.password !== $scope.user.confirmedPassword) {
                    $scope.confirmedPasswordMatchError = true;
                    $scope.forms.userForm.validConfirmedPasswords = false;
                } else {
                    $scope.confirmedPasswordMatchError = false;
                    $scope.forms.userForm.validConfirmedPasswords = true;
                }
            }
        };
        $scope.changeInputType = function(index, event) {
            console.log(event);
            if (index === 0) {
                $scope.typeForFirstPassword = ($scope.typeForFirstPassword === "password") ? "text" : "password";
            } else if (index === 1) {
                $scope.typeForSecondPassword = ($scope.typeForSecondPassword === "password") ? "text" : "password";
            }
        };
        $scope.popup1 = {
            opened: false
        };
        $scope.open1 = function() {
            $scope.popup1.opened = true;
            $scope.dateBirthPlaceHolder = "dd/mm/yyyy"
        };
        $scope.$watch('popup1.opened', function(opened) {
            //         alert("watch working");
            if (!opened) {

                $scope.dateBirthPlaceHolder = "Date of Birth";
            }
        });
        $scope.$watchCollection('[user.securityQuestions[0].answerProvided,' +
            'user.securityQuestions[1].answerProvided,' +
            'user.securityQuestions[2].answerProvided]',
            function(values) {
                var firstAnswer = values[0];
                var secondAnswer = values[1];
                var thirdAnswer = values[2];
                if (firstAnswer.length >= 2 && secondAnswer.length >= 2 && thirdAnswer.length >= 2) {
                    $scope.forms.userForm.allSecurityAnswered = true;
                } else {
                    $scope.forms.userForm.allSecurityAnswered = false;
                }
            });

    });
</script>

</body>

</html>