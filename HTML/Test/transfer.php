<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
     <title>Transferencias |  Sistemas Web </title>
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
                               <li class=""><a href="income.php">Ingresos</a></li>
                                <li class="active"><a href="transfer.php">Transferencias</a></li>                       
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
        
    


        <div class="page-wrapper">
            <div class="content container-fluid">
                 <div class="row">
                    <div class="col-sm-4 col-5">
                        <h4 class="page-title">Transferencias</h4>
                    </div>
                    <div class="col-sm-8 col-7 text-right m-b-30">
                        <a href="transfer_add.php" class="btn btn-primary btn-rounded pull-right"><i class="fa fa-plus"></i> Agregar Transferencia</a>
                    </div>
                </div>
                <div class="row">                    
                     <div class="col-lg-12">                     
                        <div class="card-box">
                            <div class="card-block">
                                <!-- <h4 class="card-title">Transferencias</h4> -->
                                <!-- form print -->
                        <form class="form-horizontal" role="form" id="data_expence">
                             <div class="form-group row">
                                <input type="hidden" class="form-control" id="name_user" value="Obed Alvarado">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="daterange" name="daterange" value="01/07/2022 - 31/07/2022" readonly onchange="load(1);">
                                    </div>
                                    <!-- <div class="col-md-3 form-group">
                                        <select class="form-control" id="category" name="category" onchange="load(1);">
                                            <option selected="" value="0">-- Imprimir por Categoria --</option>
                                                                                        <option value="1">Lavandería</option>
                                                                                        <option value="2">Alarma</option>
                                                                                        <option value="3">TV Cable</option>
                                                                                        <option value="4">Teléfono</option>
                                                                                        <option value="5">Alementación</option>
                                                                                        <option value="6">Alquileres</option>
                                                                                        <option value="7">Energía eléctrica </option>
                                                                                        <option value="8">Agua potable</option>
                                                                                        <option value="9">Internet</option>
                                                                                        <option value="10">Colegiaturas</option>
                                                                                    </select>
                                    </div>    -->
                                    <div class="col-md-3">
                                    <button type="button" class="btn btn-success" onclick='load(1);'>
                                        <i class="fa fa-search"></i> Buscar</button>
                                        <span id="loader"></span>
                                    </div>  
                               <!--  <div class="col-md-3  offset-3">
                                    <button type="submit" class="btn btn-light pull-right">
                                      <span class="glyphicon glyphicon-print"></span> Imprimir
                                    </button>
                                </div>   -->
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

<script type="text/javascript" src="js/VentanaCentrada.js"></script>

<script >
    
    $(document).ready(function(){
    load(1);
});

function load(page){
    var daterange= $("#daterange").val();    
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'./ajax/transfers.php?action=ajax&page='+page+'&daterange='+daterange,
        beforeSend: function(objeto){
            $('#loader').html('<img src="./images/ajax-loader.gif"> Cargando...');
        },
        success:function(data){
            $(".outer_div").html(data).fadeIn('slow');
            $('#loader').html('');
        }
    })
}



function eliminar (id)
{
    var q= $("#q").val();
    if (confirm("Realmente deseas eliminar la transferencia?")){    
        $.ajax({
            type: "GET",
            url: "./ajax/transfers.php",
            data: "id="+id,"q":q,
            beforeSend: function(objeto){
                $("#resultados").html("Mensaje: Cargando...");
            },
            success: function(datos){
                $("#resultados").html(datos);
                load(1);
            }
        });
    }
}
</script>
<script>
    // function print
        $("#data_expence").submit(function(e){
        	e.preventDefault();
          var daterange= $("#daterange").val();          
         VentanaCentrada('./pdf/documentos/transfers.php?daterange='+daterange,'Gasto','','1024','768','true');
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

