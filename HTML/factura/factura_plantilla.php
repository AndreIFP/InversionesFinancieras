<!-- -----------------------------------------------------------------------
	    Universidad Nacional Autonoma de Honduras (UNAH)
		           Facultad de Ciencias Economicas
	        Departamento de Informatica administrativa
        Analisis, Programacion y Evaluacion de Sistemas
                    Primer Periodo 2022


Equipo:
Allan Mauricio Hernández ...... (mauricio.galindo@unah.hn)
Andrés Isaías Flores .......... (aifloresp@unah.hn)
Esperanza Lisseth Cartagena ... (esperanza.cartagena@unah.hn)
Fanny Merari Ventura .......... (fmventura@unah.hn
José David García ............. (jdgarciad@unah.hn)
José Luis Martínez ............ (jlmartinezo@unah.hn)
Luis Steven Vásquez ........... (Lsvasquez@unah.hn)
Sara Raquel Ortiz ............. (Sortizm@unah.hn)

Catedratico:
LIC. CLAUDIA REGINA NUÑEZ GALINDO
Lic. GIANCARLO MARTINI SCALICI AGUILAR
Lic. KARLA MELISA GARCIA PINEDA 

----------------------------------------------------------------------

Programa:          facturacion
Fecha:             16-jul-2022
Programador:       Luis
descripcion:       factura_plantilla 

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Luis	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Esperanza		 01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Fanny 	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Andrés		     01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
				<div>

					<img src="img/logo.PNG" width="130" height="100" >
				</div>
			</td>
			<td class="info_empresa">
				<div>
					<span class="h2">INVERSIONES FINANCIERAS IS</span>
					<p>Barrio el centro edificio el centro 3er nivel cubículo 308</p>
					<p>Teléfono: +(504) 8839-8891</p>
					<p>Email: : Edgard_issa7@yahoo.com</p>
				</div>
			</td>
			<td class="info_factura">
				<div class="round">
					<span class="h3">Factura</span>
					<p>No. Factura: <strong>000001</strong></p>
					<p>Fecha Emisión De Factura 20/01/2019</p>
					<p>Hora: 10:30am</p>
					<p>Vendedor: Jorge Pérez Hernández Cabrera</p>
				</div>
			</td>
		</tr>
	</table>
	<table id="factura_cliente">
		<tr>
			<td class="info_cliente">
				<div class="round">
					<span class="h3">Cliente</span>
					<table class="datos_cliente">
						<tr>
							<td><label>Nit:</label><p>54895468</p></td>
							<td><label>Teléfono:</label> <p>7854526</p></td>
						</tr>
						<tr>
							<td><label>Nombre:</label> <p>Angel Arana Cabrera</p></td>
							<td><label>Dirección:</label> <p>Calzada Buena Vista</p></td>
						</tr>
					</table>
				</div>
			</td>

		</tr>
	</table>

	<table id="factura_detalle">
			<thead>
				<tr>
					<th width="90px">Cant.</th>
					<th class="textleft">Descripción</th>
					<th class="textright" width="150px">Precio Unitario.</th>
					<th class="textright" width="150px"> Precio Total</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">
				<tr>
					<td class="textcenter">1</td>
					<td>Plancha</td>
					<td class="textright">516.67</td>
					<td class="textright">516.67</td>
				</tr>
				<tr>
					<td class="textcenter">1</td>
					<td>Plancha</td>
					<td class="textright">516.67</td>
					<td class="textright">516.67</td>
				</tr>
				<tr>
					<td class="textcenter">1</td>
					<td>Plancha</td>
					<td class="textright">516.67</td>
					<td class="textright">516.67</td>
				
			</tbody>
			<tfoot id="detalle_totales">
				<tr>
					<td colspan="3" class="textright"><span>SUBTOTAL</span></td>
					<td class="textright"><span>516.67</span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span>ISV (15%)</span></td>
					<td class="textright"><span>516.67</span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span>TOTAL</span></td>
					<td class="textright"><span>516.67</span></td>
				</tr>
		</tfoot>
	</table>
	<div>
		<p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p>
		<h4 class="label_gracias">¡Gracias por su compra!</h4>
	
</body>
</html>
