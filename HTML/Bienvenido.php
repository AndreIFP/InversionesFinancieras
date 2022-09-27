<?php
include("conexion.php");
session_start();
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
                  
                  </div>
                
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
</script>
    
</body>
<?php include 'barralateralfinal.php';?>
