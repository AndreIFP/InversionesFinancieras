
<?php
include("../conexion.php");

//incluir las funciones de helpers
include_once("../helpers/helpers.php");

//iniciar las sesiones
session_start();
   // si no existe la variable rol, el usuario no esta logueado y redirige al Login
if (!isset($_SESSION['rol'])) {
   header("Location: ../login.php"); 
   die();
}else{
   //actualiza los permisos
   updatePermisos($_SESSION['rol']);
   
   //si no tiene permiso de visualización redirige al index
   if ($_SESSION['permisos'][M_INVENTARIOS]['w']==0 or !isset($_SESSION['permisos'][M_INVENTARIOS]['w'])) {
       header("Location: ../index.php");
       die();
   }
}
?>
<?php include 'barralateralinicial.php';?>
<title>Nuevo Producto</title>
<a href="../gestiones/gestion_Inventario.php"><input type="submit" class="btn btn-primary" Value=" Regresar "></a>
<br>  
<body>
<section  style=" background-color:rgb(240,248,255);
    padding: 15px;
    color:black;
    font-size: 30px; " >
<script>
function multiplicar(){
	m1 = document.getElementById("multiplicando").value;
	m2 = document.getElementById("multiplicador").value;
	r = m1*m2;
	document.getElementById("resultado").value = r;
	}
</script>

<script>
	function validar(e) {
		tecla = (document.all) ? e.keyCode : e.which;
		if (tecla == 8) return true; //Tecla de retroceso (para poder borrar)
		// dejar la línea de patron que se necesite y borrar el resto
		patron = /[A-Za-z\s]/; // Solo acepta letras y espacios
		
		te = String.fromCharCode(tecla);
		return patron.test(te);
	}
</script>
<CENTER>
                <b><h1>NUEVO PRODUCTO</h1></b>
</CENTER>

<form method="post" action="fichacompra.php">

<CENTER>

<br><br>

<table class="default">
 <tr>
    <td>ID de factura:</td>
    <td><input type="text" name="id_factura" value="" placeholder="Ingrese el numero de su factura" size="30" maxlength="20" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required></td> 
   </tr>
 <tr>
    <td>Fecha emisión de factura:</td>
    <td><input type="date" name="fecha_factura"
       value=""
       min="<?php date_default_timezone_set("America/Tegucigalpa"); 
       $hoy=date("Y-m-d");
            echo $hoy; ?>" required></td>
 <tr>
    <td>Empresa Emisora:</td>
    <td><input type="text" name="nombre_empresa" value="" placeholder="Ingrese el nombre de la empresa" size="30" maxlength="29" onkeypress="return validar(event)" required></td> 
 </tr>
 <tr>
    <td>Telefono de la empresa:</td>
    <td><input type="text" name="telefono_empresa" placeholder="Telefono" maxlength="12" value="" size="15" oninput="this.value = this.value.replace(/[^0-9]/,'')" required></td>
 </tr>
</table>
<br><br>
<table cellpadding="5" border="1">
<center>
<h1>Detalles del Producto</h1>

<form id="multiplicar">
<table cellpadding="" border="5">
 <tr>
    <td>Articulo/item:</td>
    <td><input type="text" name="producto" placeholder="Ingrese el nombre del articulo" maxlength="30" size="35" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')" required></td>
 </tr>
 <tr><br>
    <td>Unidades:</td>
    <td><input type="text" name="cant" placeholder="Ingrese cantidad" maxlength="6" size="15" oninput="this.value = this.value.replace(/[^0-9]/,'')" required></td>
 </tr>
 <tr>
    <td>Estado del producto recibido:</td>
    <td>
    <select name="Estado" id="estado">
     <option value="NUEVO">NUEVO</option>
     <option value="USADO EN BUEN ESTADO">USADO EN BUEN ESTADO</option>
      </select>
      </td>
 </tr>
 <tr><br>
    <td>Importe gravado:</td>
  <td><input type="text" name="gravado" id="multiplicando" onkeyup="multiplicar();" maxlength="9" step="0.001" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required onkeyup="sumar();"></td>
  </tr>
 <tr>
    <td>Impuesto():</td>
    <td><input type="text" name="impuesto" id="multiplicador" placeholder="Ej.(0.15, 0.18, 0.21)" onkeyup="multiplicar();" maxlength="9" step="0.001" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required onkeyup="sumar();"></td>
    </tr>
 <tr>
    <td>Total impuesto:</td>
    <td><input type="text" readonly name="impto" id="resultado" step="0.001"  required>
    </tr>
    <tr>
</table>
</form>

<br><br>

<button type="submit" class="btn btn-success btn-lg">PRESIONE PARA GENERAR SU FACTURA TOTAL</button>
</section>
</body>
<?php include 'barralateralfinal.php';?>