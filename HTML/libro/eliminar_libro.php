<?php session_start();
$_SESSION['cliente'];
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

$cliente=$_SESSION['cliente'];

include('../../dist/includes/dbcon.php');

       if(isset($_REQUEST['id_usuario']))
            {
              $id_usuario=$_REQUEST['id_usuario'];
            }
            else
            {
            $id_usuario=$_POST['id_usuario'];
          }

          if(isset($_REQUEST['monto']))
            {
              $monto=$_REQUEST['monto'];
            }
            else
            {
            $monto=$_POST['monto'];
          }

          if(isset($_REQUEST['id_libro']))
            {
              $id_libro=$_REQUEST['id_libro'];
            }
            else
            {
            $id_libro=$_POST['id_libro'];
          }

        if(isset($_REQUEST['debe_haber']))
            {
              $debe_haber=$_REQUEST['debe_haber'];
            }
            else
            {
            $debe_haber=$_POST['debe_haber'];
          }
  mysqli_query($con,"delete from libro where id_libro='$id_libro'")or die(mysqli_error());
if ($debe_haber=="haber") {
       $update=mysqli_query($con,"update tbl_libros set caja=caja+'$monto' where Id_cliente='$cliente' ");
}



  echo "<script>document.location='../libro/libro.php'</script>";
     // header('Location:../usuario.php');
?>