<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include("conexion.php");

session_start();
$_SESSION['id'];
$_SESSION['user'];
$_SESSION['rol'];


?>

<?php include 'barralateralinicial.php';?>

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
                <h2>Acceso Directo</h2>
               
                <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <br>
              
              <div class="row">
              <?php
              if($_SESSION['rol'] == 1){
             ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary" >
                      <div class="panel-heading" style="background:rgb(226, 62, 62);">
                        <div class="row" >
                          <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                            <div class="huge"><h1></h1></div>
                            <div>Usuarios</div>
                          </div>
                        </div>
                      </div>
                      <a href="gestiones/Gestion_Usuarios.php">
                        <div class="panel-footer">
                          <span class="pull-left" style="color:rgb(226, 62, 62);">Ver Detalles</span>
                          <span class="pull-right" style="color:rgb(226, 62, 62);"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <?php } ?>

                  <?php
              if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 5 || $_SESSION['rol'] == 2 || $_SESSION['rol'] == 6){
             ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-xs-3">
                            <i class="fa fa-book fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                            <div class="huge"><h1></h1></div>
                            <div>Inventarios</div>
                          </div>
                        </div>
                      </div>
                      <a href="gestiones/Gestion_Inventario.php">
                        <div class="panel-footer">
                          <span class="pull-left">Ver Detalles</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                        </div>
                      </a>
                    </div>
                </div>
                <?php } ?>

                <?php
              if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 5 || $_SESSION['rol'] == 2){
             ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary" >
                      <div class="panel-heading" style="background:rgb(62, 226, 130);">
                        <div class="row" >
                          <div class="col-xs-3">
                            <i class="fa fa-folder fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                            <div class="huge"><h1></h1></div>
                            <div>Facturacion</div>
                          </div>
                        </div>
                      </div>
                      <a href="demo.php">
                        <div class="panel-footer">
                          <span class="pull-left" style="color:rgb(62, 226, 130);">Ver Detalles</span>
                          <span class="pull-right" style="color:rgb(62, 226, 130);"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <?php } ?>

                  <?php
              if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3){
             ?>
                  <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary" >
                      <div class="panel-heading" style="background:rgb(226, 215, 62);">
                        <div class="row" >
                          <div class="col-xs-3">
                            <i class="fa fa-database fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                            <div class="huge"><h1></h1></div>
                            <div>Backup</div>
                          </div>
                        </div>
                      </div>
                      <a href="backupr.php">
                        <div class="panel-footer">
                          <span class="pull-left" style="color:rgb(226, 215, 62);">Ver Detalles</span>
                          <span class="pull-right" style="color:rgb(226, 215, 62);"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <?php } ?>
                
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
