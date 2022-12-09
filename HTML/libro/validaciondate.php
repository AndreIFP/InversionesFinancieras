<?php
include('../conexion.php');

session_start();
$_SESSION['id'];
$_SESSION['user'];


?>

<?php include 'barralateralinicial.php'; ?>
<p></p>
<section style=" background-color:rgb(255, 255, 255); padding: 15px; color:black; font-size: 12px; ">
  <a class="btn btn-primary" href="validacionlibro.php"> <i class="fa fa-arrow-circle-left"></i> Volver Atrás</a>
  <center>
    <h2> <strong> Nuevo libro para cliente</strong></h2>
  </center>

  <hr>
  <form method="post" action="validaciondate2.php" enctype="multipart/form-data" class="form-horizontal">
    <div class="row">

      <div class="col-xs-14 pull-right">

        <table class="table">
          <input type="hidden" name="Id_Usuario" value="<?php echo $Id_Usuario  ?>">
          <thead class="table-primary">
            <tr>

              <th>
                <center>Seleciona un cliente</center>
              </th>


              <th>
                <center>Fecha Inicial</center>
              </th>

              <th>
                <center>Fecha Final</center>
              </th>
            </tr>
          </thead>

          <tbody>

            <tr>

              <td style="width: 50%">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select name="Idcliente" class="form-control js-example-basic-single" id="Idcliente" style="font-size:18px">
                    <option value="0" style="font-size:18px">Selecciona un cliente</option>
                    <?php
                    include('../conexion.php');

                    #consulta de todos los paises
                    $consulta = mysqli_query($conn, "SELECT * FROM tbl_clientes ;");
                    while ($row = mysqli_fetch_array($consulta)) {
                      $nombrepais = $row['Nombre_Empresa'];
                      $nombeid = $row['Id_Cliente'];

                    ?>
                      <option class="dropdown-item" value="<?php echo $nombeid ?>"><?php echo $nombrepais ?></option>
                    <?php

                    }

                    ?>
                  </select>
                </div>

              </td>

              <td style="width: 25%">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="date" placeholder="Fecha Inicial" class="form-control" name="txtfecha" maxlength="10" style="font-size:18px" />

                </div>

              </td>

              <td style="width: 25%">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="date" placeholder="Fecha Final" class="form-control" name="txtfecha2" maxlength="10" style="font-size:18px" />

                </div>

              </td>

            </tr>

          </tbody>
        </table>

      </div>
    </div>
    <hr>

    <center><button class="btn btn-lg btn-primary" id="daterange-btn" name=""> <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button></center>

  </form>

</section>
</div>


<!-- partial -->
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="/JS/Java.js"></script>

<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>

<!--Estilos Css-->
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);

  .login-page {
    width: 360px;
    padding: 8% 0 0;
    margin: auto;
  }

  #pa {
    text-align: left;
    font-size: 15;
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

  body {
    font-family: "Roboto", sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
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
<script>
  $('.message a').click(function() {
    $('form').animate({
      height: "toggle",
      opacity: "toggle"
    }, "slow");
  });
</script>

</body>
<?php include 'barralateralfinal.php'; ?>