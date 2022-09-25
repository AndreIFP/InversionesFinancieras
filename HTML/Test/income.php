<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
     <title>Ingresos |  Sistemas Web </title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/morris/morris.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"> 

   
    </head>

   <!--  <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                          <a href="#" class="site_title"><i class="fa fa-bar-chart"></i> <span>Sistemas Web</span></a>
                        </div>
                        <div class="clearfix"></div>

                            <!-- menu profile quick info -->
                                <!-- <div class="profile clearfix"> -->
                                    <!-- <div class="profile_pic"> -->
                                        <!-- <img src="images/profiles/46470_472352572815744_1037685090_n.jpg" alt="Obed Alvarado" class="img-circle profile_img"> -->
                                    <!-- </div> -->
                                    <!-- <div class="profile_info"> -->
                                        <!-- <span>Bienvenido,</span> -->
                                        <!-- <h2>Obed Alvarado</h2> -->
                                    <!-- </div> -->
                                <!-- </div> -->
                            <!-- /menu profile quick info -->

                        <!-- <br /> -->  

    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="#" class="logo text-white">
                    
					Accounting System
                </a>
            </div>
            <div class="page-title-box pull-left">
                
            </div>
            <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <ul class="nav user-menu pull-right">                
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="images/profiles/46470_472352572815744_1037685090_n.jpg" width="40" alt="Admin">
                            <span class="status online"></span></span>
                        <span>Obed Alvarado</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.php">Mi cuenta</a>
                        <a class="dropdown-item" href="http://obedalvarado.pw/contacto/" target="_blank">Soporte</a>                        
                        <a class="dropdown-item" href="action/logout.php">Cerrar Sesión</a>
                    </div>
                </li>
            </ul>            
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="">
                            <a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>

                        <li class="">
                            <a href="accounts.php"><i class="fa fa-th"></i> Cuentas</a>
                        </li>
                         <li class="submenu">
                            <a href="#"><i class="fa fa-ticket" aria-hidden="true"></i> <span> Transacciones</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="">
                                <li class=""><a href="expences.php">Gastos</a></li>
                               <li class="active"><a href="income.php">Ingresos</a></li>
                                <li class=""><a href="transfer.php">Transferencias</a></li>                       
                            </ul>
                        </li>
                         <li class="submenu">
                            <a href="#"><i class="fa fa-tags" aria-hidden="true"></i> <span> Categorías</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li class=""><a href="category_expence.php" >Gastos</a></li>
                                <li class=""><a href="category_income.php">Ingresos</a></li>                                
                            </ul>
                        </li>
                        <!-- <li class="">
                            <a href="category_expence.php"><i class="fa fa-dashboard"></i> Categoría de gastos</a>
                        </li>
                        <li class="">
                            <a href="category_income.php"><i class="fa fa-dashboard"></i> Categoría de ingresos</a>
                        </li> -->
                        <li class="">
                            <a href="users.php"><i class="fa fa-users"></i> Usuarios</a>
                        </li>
                       <!--  <li class="">
                            <a href="settings.php"><i class="fa fa-dashboard"></i> Configuración</a>
                        </li> -->  


                                           
                       
                       
                        <li class="submenu">
                            <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> <span> Configuración</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li class=""><a href="settings.php">General</a></li>                                
                            </ul>
                        </li>  

                  
                         <li class="submenu">
                            <a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span> Reportes</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li class=""><a href="expences_report.php">Gastos</a></li>
                                <li class=""><a href="expences_byday_report.php">Gastos por día</a></li>
                                <li class=""><a href="income_report.php">Ingresos</a></li>
                                <li class=""><a href="income_byday_report.php">Ingresos por día</a></li>

                                <li class=""><a href="transfer_report.php">Transferencias</a></li>
                                
                                <li class=""><a href="account_statement_report.php">Estado de cuentas</a></li>


                                <!-- <li><a href="edit-blog.html">Edit Blog</a></li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
   
<form class="form-horizontal form-label-left input_mask" method="post" id="add_income" name="add_income">
   
 <div id="add_incomes" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-content modal-lg">
                        <div class="modal-header">
                            <h4 class="modal-title">Nuevo Ingreso</h4>
                        </div>
                        <div id="result_income"></div>
                        <div class="modal-body">
                            <div class="m-b-20">                                
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Cuenta a acreditar <span class="text-danger">*</span></label>                                                
                                                <div class="">
                                                    <select class="select2 form-control" name="account" required>                                                  
                                                </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <!-- <input type="hidden" id="account_id" name="account_id">                                                  -->
                                        

                                       
                                            <div class="col-md-12">   
                                                <div class="form-group">
                                                    <label>Fecha <span class="text-danger">*</span></label>
                                                    <div class="cal-icon">
                                                         <input class="form-control datetimepicker" type="text" type="date"  name="date" value="31/07/2022">
                                                     </div>
                                                </div>
                                         </div> 
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Descripción <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="description" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Monto <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text"  name="amount" pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Categoría <span class="text-danger">*</span></label>
                                                <select class="form-control col-xs-3" name="category" required>
                                                    <option selected="" value="">-- Selecciona Categoria --</option>
                                                                                                                    <option value="1">Ganancias inversiones</option>
                                                                                                                     <option value="2">Intereses bancarios</option>
                                                                                                                     <option value="3">Arriendos de propiedades</option>
                                                                                                                     <option value="4">Comisiones</option>
                                                                                                                     <option value="5">Bonos</option>
                                                                                                                     <option value="7">Salario</option>
                                                                                                         </select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                   
                                    <div class="text-right m-t-20">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                                        <button id="save_data" type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
    </div>   
</form>	



<form class="form-horizontal form-label-left input_mask" method="post" id="upd_income" name="upd_income">    
	  <div  id="update_incomes" class="modal custom-modal fade  bs-example-modal-lg-udp" role="dialog">
                <div class="modal-dialog">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-content modal-lg">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar Ingreso</h4>
                        </div>
                        <div id="result_income2"></div>
                        <div class="modal-body">
                            <div class="m-b-20">
                                <form>
                                    <div class="row">                                        
                                        <div id="result_expence2"></div>
                                         <input type="hidden" name="mod_id" id="mod_id">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Descripción <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text"name="mod_description" id="mod_description"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Monto <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text"   name="mod_amount" id="mod_amount"  pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Categoría <span class="text-danger">*</span></label>
                                                <select class="form-control" id="mod_category" name="mod_category" required>
                                                    <!-- <option selected="" value="">-- Selecciona Categoria --</option> -->
                                                                                                                <option value="1" >Ganancias inversiones</option>
                                                                                                                <option value="2" >Intereses bancarios</option>
                                                                                                                <option value="3" >Arriendos de propiedades</option>
                                                                                                                <option value="4" >Comisiones</option>
                                                                                                                <option value="5" >Bonos</option>
                                                                                                                <option value="7" >Salario</option>
                                                                                                        </select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                   
                                    <div class="text-right m-t-20">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                                        <button id="upd_data" type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
 </form>	

 

  


          <div class="page-wrapper">
            <div class="content container-fluid">
                 <div class="row">
                    <div class="col-sm-4 col-5">
                        <h4 class="page-title">Ingresos</h4>
                    </div>
                    <div class="col-sm-8 col-7 text-right m-b-30">
                        <a href="#" class="btn btn-primary btn-rounded pull-right" data-toggle="modal" data-target="#add_incomes"><i class="fa fa-plus"></i> Agregar Ingreso</a>
                    </div>
                </div>
                <div class="row">                    
                     <div class="col-lg-12">                     
                        <div class="card-box">
                            <div class="card-block">
                                <!-- <h4 class="card-title">Gastos</h4> -->
                                <!-- form print -->
                        <form class="form-horizontal" role="form" id="data_income">
                             <div class="form-group row">
                                <input type="hidden" class="form-control" id="name_user" value="Obed Alvarado">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="daterange" name="daterange" value="01/07/2022 - 31/07/2022" readonly onchange="load(1);">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <select class="form-control" id="category" name="category" onchange="load(1);">
                                            <option selected="" value="0">-- Buscar por Categoria --</option>
                                                                                        <option value="1">Ganancias inversiones</option>
                                                                                        <option value="2">Intereses bancarios</option>
                                                                                        <option value="3">Arriendos de propiedades</option>
                                                                                        <option value="4">Comisiones</option>
                                                                                        <option value="5">Bonos</option>
                                                                                        <option value="7">Salario</option>
                                                                                    </select>
                                    </div>   
                                    <div class="col-md-3">
                                    <button type="button" class="btn btn-success" onclick='load(1);'>
                                        <i class="fa fa-search"></i> Buscar</button>
                                        <span id="loader"></span>
                                    </div>  
                                <!-- <div class="col-md-3 ">
                                    <button type="submit" class="btn btn-light pull-right">
                                      <span class="glyphicon glyphicon-print"></span> Imprimir
                                    </button>
                                </div>  --> 
                            </div>    
                        </form>
                        <!-- end form print -->
                                <div class="table-responsive">
                                    <!-- ajax -->
                                    <div id="resultados"></div><!-- Carga los datos ajax -->
                                    <div class='outer_div'></div><!-- Carga los datos ajax -->
                                <!-- /ajax -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>           
        </div>
</div>        


   
 
                <!-- <footer>footer content -->
                <!--     <div class="pull-right">
                        Copyright © 2022 <a target="_blank"  href="http://obedalvarado.pw">Sistemas Web</a> All rights reserved. 
                    </div>
                    <div class="clearfix"></div> -->
                <!-- </footer>/footer content -->
            
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/moment.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="assets/plugins/morris/morris.min.js"></script>
    <script type="text/javascript" src="assets/plugins/raphael/raphael-min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    </body>
</html><!-- Include Required Prerequisites -->















<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="js/income.js"></script>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script>
$( "#add_income" ).submit(function( event ) {
  $('#save_data').attr("disabled", true);
  
 var parametros = $(this).serialize(); 
     $.ajax({
            type: "POST",
            url: "action/add_income.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#resultados").html(datos);
            $('#save_data').attr("disabled", false);
            $('#add_incomes').modal('hide');
            load(1);
          }
    });
  event.preventDefault();
})

// success

$( "#upd_income" ).submit(function( event ) {
  $('#upd_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/upd_income.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#resultados").html(datos);
            $('#upd_data').attr("disabled", false);
             $('#update_incomes').modal('hide');            
            load(1);
          }
    });
  event.preventDefault();
})

    function obtener_datos(id){
            var description = $("#description"+id).val();
            var amount = $("#amount"+id).val();
			var category_id = $("#category_id"+id).val();
            $("#mod_id").val(id);
            $("#mod_description").val(description);
            $("#mod_amount").val(amount);
			$("#mod_category").val(category_id);
        }


        // function print
        $("#data_income").submit(function(e){
            e.preventDefault();
          var daterange = $("#daterange").val();
          var category = $("#category").val();
          

         VentanaCentrada('./pdf/documentos/income_pdf.php?daterange='+daterange+'&category='+category,'Gasto','','1024','768','true');
    });

</script>
<script type="text/javascript">
$(function() {
    $('input[name="daterange"]').daterangepicker({
		 locale: {
      format: 'DD/MM/YYYY',
	  "applyLabel": "Aplicar",
	  "cancelLabel": "Cancelar",
	  "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
       "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],		
    }
	});
});
</script>

<script >
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();  
              
    });

</script>

<script type="text/javascript">

$(document).ready(function() {
    $( ".select2" ).select2({        
    ajax: {
        url: "ajax/accounts_select2.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            // console.log(params.term);
            return {
                q: params.term // search term
            };
        },
        processResults: function (data) {
            // parse the results into the format expected by Select2.
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data
            // var datos = data[0].id;
            // console.log(datos);
            // $("#account_id").val(datos);
            
            return {
                results: data
            };


        },
        cache: true
        
        
        
    },
    minimumInputLength: 2,
    width:'100%'
    
})

});

</script>