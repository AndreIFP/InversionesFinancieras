<!DOCTYPE html>
<html>
<head>
	<title>HTML to PDF</title>
</head>
<body>
	<!-- 
	content of this area will be the content of your PDF file 
	-->
	<div id="HTMLtoPDF">

	<h2>HTML to PDF</h2>

	<tr class=""><th><label for="companyDirectorModel_Forename" >Bancos</label></th><td class=""><?php echo $banco; ?></td></tr>
    <tr class="Surname"><th><label for="companyDirectorModel_Surname">Caja</label></th><td class=""><?php echo $caja; ?></tr>
    <tr class="TaxCod"><th><label for="companyDirectorModel_TaxCode">Cuentas x Cobrar</label></th><td class=""><?php echo $cxc; ?></td></tr>
    <tr class="TaxCode"><th><label for="companyDirectorModel_TaxCode">Documentos por Cobrar</label></th><td class=""><?php echo $dxc; ?></td></tr>
    <tr class="Gender"><th><label for="companyDirectorModel_Gender">Pagos anticipados</label></th><td class=""><?php echo $pag_anti; ?></td></tr>

	</div>
	<!-- here we call the function that makes PDF -->
	<a href="#" onclick="HTMLtoPDF()">Download PDF</a>
	
	<!-- these js files are used for making PDF -->
	<script src="js/jspdf.js"></script>
	<script src="js/jquery-2.1.3.js"></script>
	<script src="js/pdfFromHTML.js"></script>
</body>
</html>