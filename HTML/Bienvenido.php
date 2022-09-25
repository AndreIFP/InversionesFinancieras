<?php
include("conexion.php");

?>
<?php include 'barralateralinicial.php';?>
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
