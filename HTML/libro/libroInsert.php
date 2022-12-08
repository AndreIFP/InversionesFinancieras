<?php
session_start();
$_SESSION['id'];
$_SESSION['cliente'];
include('../conexion.php');
$id_usuario = $_SESSION['id'];
$cliente = $_SESSION['cliente'];

const DRIVER='mysql';
const SERVER='142.44.161.115';
const DATABASE='2w4GSUinHO';
const USERNAME='CALAPAL';
const PASSWORD='';
class Conexion{

  public static function conectar(){
      try {
              $pdoOptions = array(
                                      PDO::ATTR_EMULATE_PREPARES => FALSE, 
                                      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''
                                  );

              $link = new PDO(''.DRIVER.':host='.SERVER.';dbname='.DATABASE, USERNAME, PASSWORD, $pdoOptions);
              return $link;

      }catch(PDOException $e){
              echo "Fallo la conexión: " . $e->getMessage();
      }
  }
}

 

   if(isset($_POST['modo'])){

    if (($_POST['modo']=="Cuenta")) {
      $mysqli = new mysqli("142.44.161.115","CALAPAL","Calapal##567","2w4GSUinHO"); 
      $idCuenta=$_POST['idCuenta'];

      $queryl = "select CODIGO_CUENTA,CUENTA as CUENTA  from tbl_catalago_cuentas c
      where c.CODIGO_CUENTA like '".$idCuenta."_%'";

      
     /*  $permisos = mysqli_query($conn,"select CODIGO_CUENTA, CONCAT(CODIGO_CUENTA,' ',CUENTA) as CUENTA  from tbl_catalago_cuentas c
      where c.CODIGO_CUENTA like '".$idCuenta."_%'");
      $result_register = mysqli_fetch_all($permisos);
      $row=$result_register; */

     


	$resultadol = $mysqli->query($queryl);
	
      $html= "<option value='0'>Seleccione El Codigo Disponible</option>";

      while($rowl = $resultadol->fetch_assoc())	
      {



        $html.= "<option value='".$rowl['CODIGO_CUENTA']."'>".$rowl['CUENTA']."</option>";
        
      }


       
            $arrResponse = array('status' => true, 'data' => $html);
             echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);  

    }else{

     
      $id_usuario=$_POST['id_usuario'];
      //$NAsiento=$_POST['NAsiento'];
      $fechax=$_POST['fechax'];
      $descripcion2=$_POST['descripcion2'];

      $items1=$_POST['debito'];
      $items2=$_POST['credito'];
      $items3=$_POST['cuentas'];
      $items4=$_POST['descripcion'];

    

      $pdo=Conexion::conectar();

      $sumaDebito=array_sum($items1);
      $sumaCredito=array_sum($items2);


    if ($sumaCredito == $sumaDebito) {
        $valores='('.$cliente.','.$id_usuario.',"'.$fechax.'","'.$descripcion2.'","'.$sumaDebito.'"),';
        //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
        $valoresQ= substr($valores, 0, -1);
        ///////// QUERY DE INSERCIÓN ////////////////////////////
        $sql = "INSERT INTO tbl_asientos (Id_cliente,Id_usuario,Fecha,Descripcion,montoTotal) 
      VALUES $valoresQ";
          //$pdo=Conexion::conectar();
      $consulta=$pdo->prepare($sql);

      $consulta -> execute();

      $NAsiento = $pdo->lastInsertId();

    
      while(true) {

        //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
        $item1 = current($items1);
        $item2 = current($items2);
        $item3 = current($items3);
        $item4 = current($items4);
        
        ////// ASIGNARLOS A VARIABLES ///////////////////
        $debito=(( $item1 !== false) ? $item1 : ", &nbsp;");
        $credito=(( $item2 !== false) ? $item2 : ", &nbsp;");
        $cuentas=(( $item3 !== false) ? $item3 : ", &nbsp;");
        $descripcion=(( $item4 !== false) ? $item4 : ", &nbsp;");

        //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
        

      
      //$sqlRes=$conexion->query($sql) or mysql_error();
      
    
      
      
     

       //insertar en Kardex
       $valores2='("'.$cuentas.'","'.$debito.'","'.$credito.'","'.$NAsiento.'","'.$descripcion.'"),';
      
       //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
       $valoresQuery= substr($valores2, 0, -1);
       ///////// QUERY DE INSERCIÓN ////////////////////////////

     
     $sql2 = "INSERT INTO tbl_detallleasientos (CODIGO_CUENTA,debito,credito,Id_asiento,descripcion) VALUES $valoresQuery";

     
     $consulta=$pdo->prepare($sql2);

     $consulta -> execute();

        
        // Up! Next Value
        $item1 = next( $items1 );
        $item2 = next( $items2 );
        $item3 = next( $items3 );
        $item4 = next( $items4 );
        
        // Check terminator
        if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;

    }
    $arrResponse = array('status' => true, 'msg' => 'Asiento Agreado Correctamente');
    }else{
        
        $arrResponse = array('status' => false, 'msg' => 'Error Al insertar Asiento');
    }


    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);  
    
 
    }
   }
  ?>