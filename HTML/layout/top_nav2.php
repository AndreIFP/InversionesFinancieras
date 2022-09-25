<?php 
            include('../conexion.php');
            $cliente=$_SESSION['cliente'];
            $temporada=$_SESSION['temporada'];
            $fechai=$_SESSION['fechai'];
            $fechaf=$_SESSION['fechaf'];
            $usuario=$_SESSION['user'];
            $suma_debe = 0;
            $suma_haber = 0;
            $sumabanco = 0;
            
        //  if ($guardar=="si") {
              #consulta de todos los paises
              $consulta=mysqli_query($conn,"SELECT * FROM libro2 where  id_cliente = $cliente and fecha >='$fechai' and fecha <='$fechaf'" );
              while($row=mysqli_fetch_array($consulta)){
                $monto_haber="";
                $monto_debe="";
                $monto=$row['monto'];
                $id_libro=$row['id_libro'];
                $debe_haber=$row['debe_haber'];
                 
              if($debe_haber=="debe"){
                $monto_debe=$row['monto'];
                $suma_debe = $suma_debe + $monto_debe;
                  }
              if($debe_haber=="haber"){
                $monto_haber=$row['monto'];
                $suma_haber = $suma_haber + $monto_haber;
                  }
                $sumabanco = $suma_debe - $suma_haber;
           ?>
           
            <?php
              }

            ?>
            <?php
            include('../conexion.php');
              $query_insert = mysqli_query($conn,"INSERT INTO TBL_LIBROS(fecha,Id_cliente,caja)
              VALUES('$fechai','$cliente','$sumabanco')");
            
            $simbolo_moneda="L.";
            ?>
            

              <?php

?>
</div>
 

              <ul class="nav navbar-nav navbar-right">
                         <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../usuario/subir_us/<?php echo $imagen; ?>" alt=""><?php echo $usuario; ?>

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                
                    <li><a href="../login.php"><i class="fa fa-sign-out pull-right"></i> Cerrar sesion</a></li>
                    <li><a href="validacionlibro.php"><i class="fa fa-arrow-left pull-right"></i> Atras</a></li>

                  </ul>
                </li>   


       <li class="">
                  

                </li>

     
              </ul>
            </nav>
          </div>
 </div>