<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include("conexion.php");

session_start();
$_SESSION['id'];
$_SESSION['user'];


?>

<?php include 'barralateralinicial.php'; ?>

<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 16px; ">

  <title>Facturación</title>

  <a class="btn btn-primary" href="index.php "><i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
                    
  <hr>
  <div class="row">
    <div class="col-xs-14 pull-right">

      <table class="table">
        <thead class="table-primary">
          <tr>
            <th>
              <center>Servicios</center>
            </th>
            <th>
              <center>Honorarios</center>
            </th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <!--Servicios-->
            <td style="width: 50%">
              <div class="input-group">
                
                <center><a href="factura/Facturacion_H1.php" type="submit" class="btn btn-success btn-lg"> <i class='bx bxs-receipt icon'></i> Factura por servicios</a></center>

              </div>

            </td>
            <!--Honorarios-->
            <td style="width: 50%">
              <div class="input-group">
                <center><a href="factura/Facturacion_H.php" type="submit" class="btn btn-warning btn-lg"> <i class='bx bxs-detail icon'></i> Factura por honorarios</a></center>
              </div>
            </td>

          </tr>

        </tbody>
      </table>

    </div>
  </div>
  <hr>

</section>
</div>

<!-- partial -->
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="/JS/Java.js"></script>

<!--Estilos Css-->
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);

  .login-page {
    width: 360px;
    padding: 8% 0 0;
    margin: auto;
  }



  #pp {
    text-align: left;
    font-size: 18;
  }

  .per {
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

  .form button:hover,
  .form button:active,
  .form button:focus {
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

  .container:before,
  .container:after {
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

  .form label {
    font-family: "Roboto", sans-serif;
    font-size: 25px;
    letter-spacing: 1px;
    text-align: center;
    text-transform: uppercase;
    padding: 12px;
    text-decoration: none;
    -moz-osx-font-smoothing: grayscale;
    color: #4d4d4d;
    display: block;
    top: 20px;
    margin: 15px auto;
  }
</style>


</body>

<?php include 'barralateralfinal.php'; ?>