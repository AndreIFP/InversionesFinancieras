<!DOCTYPE html>
<html lang="es">
<head>


						
		<meta charset="utf-8" />
        <title>Categoría de gastos -  Sistemas Web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" /></head>
    <body>
		 <form class="form-horizontal form-label-left input_mask" method="post" id="add_category_expence" name="add_category_expence">   
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Nueva categoría</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div id="result_c_expence"></div>
                        
                       <div class="row">
							<div class="col-md-12">
								<label>Nombre <span class="required">*</span></label>
								<input name="name" class="form-control" required type="text" placeholder="Nombre de categoría">
                            
							</div>
                        </div>
                        
                       
                        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>	<form class="form-horizontal form-label-left input_mask" method="post" id="upd_c_expence" name="upd_c_expence"> 
 <!-- Modal -->
    <div class="modal fade bs-example-modal-lg-udp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-pencil"></i> Editar categoría</h4>
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                        <div id="result_c_expence2"></div>
                        <input type="hidden" name="mod_id" id="mod_id">
                        <div class="row">
							<div class="col-md-12">
								<label>Nombre <span class="required">*</span>
								</label>
                            
								<input name="mod_name" id="mod_name" class="date-picker form-control " required type="text" placeholder="Nombre categoría">
                            </div>
                        </div>
                        
                    
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button id="upd_data" type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div> <!-- /Modal -->
</form>	        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="images/profiles/default.png"  alt="Sistemas Web" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                Sistemas Web <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Bienvenid@! </h6>
                            </div>

                            <!-- item-->
                            <a href="profile.php" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Mi cuenta</span>
                            </a>

                            <!-- item-->
                            <a href="https://obedalvarado.pw/contacto/" target="_blank" class="dropdown-item notify-item">
                                <i class="fe-help-circle"></i>
                                <span>Soporte</span>
                            </a>

                           

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="action/logout.php" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Salir</span>
                            </a>

                        </div>
                    </li>

                   


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="dashboard.php" class="logo text-center">
                        <span class="logo-lg">
                            
                            <span class="logo-lg-text-light">Expense manager</span> 
							 
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="assets/images/logo-sm.png" alt="" height="24">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
        
                    

                    
                </ul>
            </div>            <!-- end Topbar -->
            <!-- ========== Left Sidebar Start ========== -->
			            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navegación</li>

                            <li>
                                <a href="dashboard.php">
                                    <i class="fe-airplay"></i>
                                   
                                    <span> Dashboard </span>
                                </a>
                                
                            </li>

                            <li>
                                <a href="expences.php">
                                    <i class="fe-credit-card"></i>
                                    <span> Gastos </span>
                                    
                                </a>
                               
                            </li>

                            <li>
                                <a href="income.php">
                                    <i class="fe-dollar-sign"></i>
                                    <span> Ingresos </span>
                                    
                                </a>
                               
                            </li>

                            <li>
                                <a href="category_expence.php">
                                    <i class="fe-tag"></i>
                                    <span> Categoría de gastos </span>
                                    
                                </a>
                                
                            </li>

                            <li>
                                <a href="category_income.php">
                                    <i class="fe-tag"></i>
                                    <span> Categoría de ingresos </span>
                                </a>
                                
                            </li>
                
                            <li>
                                <a href="users.php">
                                    <i class="fe-users"></i>
                                    <span> Usuarios </span>
                                    
                                </a>
                                
                            </li>

                            <li>
                                <a href="settings.php">
                                    <i class="fe-settings"></i>
                                    <span> Configuración </span>
                                    
                                </a>
                               
                            </li>

                            
                            

                         



                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Categoría de gastos </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
						
						 
						
						
						  <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                
                                                <input type="search" class="form-control" id="q" placeholder="Buscar por nombre" onkeyup="load(1);">
                                                
                                                
												
												

												
												
                                           
                                            </div>

											
											
												<div class="col-sm-2">
													<button type="button" class="btn btn-info waves-effect waves-light mb-2 mr-1" onclick="load(1);"><i class="fe-search"></i> Buscar</button>
												</div>
												
											
											
                                            <div class="col-sm-7">
                                                <div class="text-sm-right">
                                                   
                                                    <button type="button" class="btn btn-primary waves-effect waves-light mb-2" data-toggle="modal" data-target="#addModal"><i class="mdi mdi-plus-circle mr-1"></i> Agregar categoría</button>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
										
										<div id="resultados"></div><!-- Carga los datos ajax -->
										<div class='outer_div'></div><!-- Carga los datos ajax -->
                
                                        

                                      

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->

                           
                        </div>
                        <!-- end row -->
						
						
						
                    </div> <!-- container -->
                </div> <!-- content -->
                <!-- Footer Start -->
                <footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 text-right">Copyright © 2015-2022 <a target="_blank"  href="http://obedalvarado.pw">Sistemas Web</a> All rights reserved.  </div>
		 </div>
	</div>
</footer>                <!-- end Footer -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        
		<!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
		
		<script src="assets/js/category_expenses.js"></script>
		
	</body>
</html>