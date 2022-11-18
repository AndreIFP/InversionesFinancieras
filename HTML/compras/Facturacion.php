
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<div class="control-bar">
  <div class="container">
    <div class="row">
      <div class="col-2-4">
        <div class="slogan">Facturación </div>

        <label for="config_tax">IVA:
          <input type="checkbox" id="config_tax" />
        </label>
        <label for="config_tax_rate" class="taxrelated">Tasa:
          <input type="text" id="config_tax_rate" value="13"/>%
        </label>
        <label for="config_note">Nota:
          <input type="checkbox" id="config_note" />
        </label>
        
      </div>
      <div class="col-4 text-right">
        <a href="javascript:window.print()">Imprimir</a>
        <a href="../index.php"><input type="submit" class="btn btn-primary" Value="Atras"></a>
      </div><!--.col-->
    </div><!--.row-->
  </div><!--.container-->
</div><!--.control-bar-->

<header class="row">

<form method="post" action="../factura1.php">
  <div class="me">
    <div class="col-2">
    <h1>Factura Inventario</h1>
  </div><!--.col-->
  </div><!--.me-->
</header>


<div class="row section">

	<div class="col-2">
  <input type="text" style="width:400px;height:35px;border:0;text-transform:uppercase"  placeholder="Ingrese el nombre del proveedor" size="50" value="" /><br>
  </div><!--.col-->

  <div class="col-2 text-center details">
      Fecha: <input type="date" name="Fecha" style="width:90px;" name="Fechaini" required><br>
      Factura #: <input type="text" placeholder="000-001-01-000000" style="width:120px;" oninput="this.value = this.value.replace(/[^0-9_-]/,'')" required/><br>
      CAI: <input type="text" value="" placeholder="00000000000" style="width:120px;" oninput="this.value = this.value.replace(/[^0-9\s]/,'')" required/><br>
     Vence: <input type="date" style="width:90px;" name="Fechaven" required/>
  </div><!--.col-->
  
  
  
  <div class="col-2">
    

    <p class="client">
      <strong>Datos</strong><br>
      <input type="text" style="width:400px;height:35px;border:0"  placeholder="Direccion del Proveedor" size="150" value="" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" required /><br><br>
      <input type="text" style="width:150px;height:20px;border:0" maxlength="10"  placeholder="Telefono" size="15" value="" oninput="this.value = this.value.replace(/[^0-9\s]/,'')" required/><br>
    </p>
  </div><!--.col-->
  
  
  <div class="col-2">
   
      
  </div><!--.col-->

  

</div><!--.row-->

<div class="row section" style="margin-top:-1rem">
<div class="col-1">
	<table style='width:100%'>
    <thead contenteditable>
	<tr class="invoice_detail">
      <th width="25%" style="text-align">Proveedor</th>
      <th width="30%">Términos y condiciones</th>
	 </tr> 
    </thead>
    <tbody contenteditable>
	<tr class="invoice_detail">
      <td width="25%" style="text-align"> <input type="text" name="Proveedor" style="width:250px;height:20px;border:0" maxlength="50"  placeholder="Nombre de proveedor" size="30" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" value="" required/></td>
      <td width="30%"><input type="text" name="Terminos" style="width:200px;height:20px;border:0" maxlength="30"  placeholder="Terminos y condiciones" size="30" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" value="" required/></td>
	 </tr>
	</tbody>
	</table>
</div>

</div><!--.row-->

<div class="invoicelist-body">
  <table>
    <thead>
      <th width="5%">Código</th>
      <th width="60%">Descripción</th>
      
      <th width="10%">Cant.</th>
      <th width="15%">Precio</th>
      <th class="taxrelated">IVA</th>
      <th width="10%">Total</th>
    </thead>
    <tbody>
      <tr>
        <td width='5%'><a class="control removeRow" href="#">x</a><input type="text" name="Codigo" style="width:150px;height:20px;border:0" maxlength="10"  placeholder="Codigo" size="15" value="" oninput="this.value = this.value.replace(/[^0-9]/,'')" required/><br> </td>
        <td width='60%'><input type="text" name="Descripcion" style="width:250px;height:20px;border:0" maxlength="50"  placeholder="Descripción" size="30" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/,'')" value="" required/><br></td>
        <td class="amount"><input type="number" name="cantidad" style="width:50px;height:20px;border:0" value="1" required/></td>
        <td class="rate"><input type="number" name="precio" style="width:60px;height:20px;border:0" Placeholder="Precio" step=00.01 required/></td>
        <td class="tax taxrelated"></td>
        <td class="sum"></td>
      </tr>
    </tbody>
  </table>
  <a class="control newRow" href="#">+ Nueva fila</a>
</div><!--.invoice-body-->
<center>




<div class="invoicelist-footer">
  <table>
    <tr class="taxrelated">
      <td>IVA:</td>
      <td id="total_tax"></td>
    </tr>
    <tr>
      <td><strong>Total:</strong></td>
      <td id="total_price"></td>
    </tr>
  </table>
</div>
<button type="submit" class="btn btn-success btn-lg">Registrar su factura</button>
</form>
<div class="note" contenteditable>
  <h2>Nota:</h2>
</div><!--.note-->

<footer class="row">
  <div class="col-1 text-center">
    <p class="notaxrelated" contenteditable>El monto de la factura no incluye el impuesto sobre las ventas.</p>
    
  </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')</script>
<script src="assets/js/main.js"></script>
</body>
</html>

