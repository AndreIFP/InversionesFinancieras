<?php 
include('../conexion.php');

session_start();
$_SESSION['id'];
$_SESSION['user'];


?>

<?php include 'barralateralinicial.php';?>

<title>Libro Diario</title>
<h7><a style="font-size:18px" href="validacionlibro.php" >Volver Atrás</a></h7>
<br>
<br>
</body>
            <label for="text" > Nuevo Libro para Cliente</label>
            <br>
            <br>
             <p   id="pa">Seleccione el Cliente</p>
             
             <form method="post" action="validaciondate2.php" enctype="multipart/form-data" class="form-horizontal">
                    <div class="col-md-12 btn-print">

                    <div class="form-group">
          <div class="select">
          <select name="Idcliente" id="Idcliente" style="font-size:18px">
          <option value="0" style="font-size:18px">Selecciona una opcion</option>
             <?php 
              include('../conexion.php');
                
                #consulta de todos los paises
                $consulta=mysqli_query($conn,"SELECT * FROM TBL_CLIENTES ;" );
                while($row=mysqli_fetch_array($consulta)){
                    $nombrepais=$row['Nombre_Cliente']; 
                    $nombeid=$row['Id_Cliente'];   
                    

                     
             ?>
                 
                 
                    <option class="dropdown-item" value="<?php echo $nombeid?>"><?php echo $nombrepais ?></option>
                    
                    

                <?php

                

                 }
                 
                 ?> 
      </select>
          </div>
          </div>
          <br>

          <label for="text" style="font-size:18px" > Fecha Inicial</label>
            <input type="date" placeholder="Fecha Inicial"  name="txtfecha" maxlength="10" style="font-size:18px"/>
            <br>

          <br>    

          <label for="text" style="font-size:18px" > Fecha Final</label>
            <input type="date" placeholder="Fecha Final"  name="txtfecha2" maxlength="10" style="font-size:18px"/>
            <br>

          <br>     



                    <div class="col-md-12">
                       <div class="col-md-12">
                        <button class="btn btn-lg btn-primary btn-print" id="daterange-btn" style="font-size:20px" name="">Guardar</button>
                        

                        
                          </div>

                    </div>
                    

          </form>

          <br><br><br>
          

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
#pa{
    text-align: left;
    font-size: 15;
}
#pp{
    text-align: left;
    font-size: 18;
}
.per{
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
 </style>
<script>
$('.message a').click(function(){
  $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
    
</body>
<?php include 'barralateralfinal.php';?>

