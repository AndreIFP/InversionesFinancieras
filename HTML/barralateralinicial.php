<!DOCTYPE html>
<html lang="en">
    <head>
         <meta charset="UTF-8">
         
         <script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
          <!-- menu -->
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
         <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.css'>

        </head>
    <body>
   <style>
  /* Google Fonts Import Link */
/* Google Font Import - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
*{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}

:root{
/* ===== Colors ===== */
--body-color: #E4E9F7;
--sidebar-color: #FFF;
--primary-color: cornflowerblue;
--primary-color-light: #F6F5FF;
--toggle-color: #DDD;
--text-color: #707070;

/* ====== Transition ====== */
--tran-03: all 0.2s ease;
--tran-03: all 0.3s ease;
--tran-04: all 0.3s ease;
--tran-05: all 0.3s ease;
}

body{
min-height: 100vh;
background-color: var(--body-color);
transition: var(--tran-05);
}

::selection{
background-color: var(--primary-color);
color: #fff;
}

body.dark{
--body-color: #18191a;
--sidebar-color: #242526;
--primary-color: #3a3b3c;
--primary-color-light: #3a3b3c;
--toggle-color: #fff;
--text-color: #ccc;
}

/* ===== Sidebar ===== */
.sidebar{
position: fixed;
top: 0;
left: 0;
height: 100%;
width: 290px;
padding: 10px 14px;
background: var(--sidebar-color);
transition: var(--tran-05);
z-index: 100;  
}
.sidebar.close{
width: 88px;
height: 100%;
}

/* ===== Reusable code - Here ===== */
.sidebar li{

list-style: none;
align-items: center;
margin-top: 10px;
}



.sidebar header .image,
.sidebar .icon{
min-width: 60px;
border-radius: 6px;
}

.sidebar .icon{
min-width: 60px;
border-radius: 6px;
height: 100%;
display: flex;
align-items: center;
justify-content: center;
font-size: 20px;
}

.sidebar .text,
.sidebar .icon{
color: var(--text-color);
transition: var(--tran-03);
}

.sidebar .text{
font-size: 17px;
font-weight: 500;
white-space: nowrap;
opacity: 1;
}
.sidebar.close .text{
opacity: 0;
text-align: left;
}
/* =========================== */

.sidebar header{
position: relative;
}

.sidebar header .image-text{
align-items: center;
}
.sidebar header .logo-text{
display: flex;
flex-direction:column;
justify-content: left;
}
header .image-text .name {
margin-top: 1px;
font-size: 15px;
font-weight: 600;
justify-content: left;

}

header .image-text .profession{
font-size: 14px;
margin-top: 2px;
display: block;
justify-content: left;

}

.sidebar header .image{
display: flex;
align-items: center;
justify-content: center;
}

.sidebar header .image img{
width: 40px;
border-radius: 6px;
}

.sidebar header .toggle{
position: absolute;
top: 50%;
right: -25px;
transform: translateY(-50%) rotate(180deg);
height: 25px;
width: 25px;
background-color: var(--primary-color);
color: var(--sidebar-color);
border-radius: 50%;
display: flex;
align-items: center;
justify-content: center;
font-size: 22px;
cursor: pointer;
transition: var(--tran-05);
}

body.dark .sidebar header .toggle{
color: var(--text-color);
}

.sidebar.close .toggle{
transform: translateY(-50%) rotate(0deg);
}

.sidebar .menu{
margin-top: 40px;
}

.sidebar li.search-box{
border-radius: 6px;
background-color: var(--primary-color-light);
cursor: pointer;
transition: var(--tran-05);
}

.sidebar li.search-box input{
height: 100%;
width: 100%;
outline: none;
border: none;
background-color: var(--primary-color-light);
color: var(--text-color);
border-radius: 6px;
font-size: 17px;
font-weight: 500;
transition: var(--tran-05);
}


.sidebar li a{
list-style: none;
height: 100%;
background-color: transparent;
display: flex;
height: 100%;
width: 100%;
border-radius: 6px;
text-decoration: none;
transition: var(--tran-03);
}

.sidebar li a:hover{
background-color: var(--primary-color);
}
.sidebar li a:hover .icon,
.sidebar li a:hover .text{
color: var(--sidebar-color);

}
body.dark .sidebar li a:hover .icon,
body.dark .sidebar li a:hover .text{
color: var(--text-color);
}

.sidebar .menu-bar{
height: calc(100% - 55px);
display: flex;
flex-direction: column;
justify-content: space-between;
overflow-y: scroll;
}
.menu-bar::-webkit-scrollbar{
display: none;
}
.sidebar .menu-bar .mode{
border-radius: 6px;
background-color: var(--primary-color-light);
position: relative;
transition: var(--tran-05);
}

.menu-bar .mode .sun-moon{
height: 50px;
width: 60px;
}

.mode .sun-moon i{
position: absolute;
}
.mode .sun-moon i.sun{
opacity: 0;
}
body.dark .mode .sun-moon i.sun{
opacity: 1;
}
body.dark .mode .sun-moon i.moon{
opacity: 0;
}

.menu-bar .bottom-content .toggle-switch{
position: absolute;
right: 0;
height: 100%;
min-width: 60px;
display: flex;
align-items: center;
justify-content: center;
border-radius: 6px;
cursor: pointer;
}
.toggle-switch .switch{
position: relative;
height: 22px;
width: 40px;
border-radius: 25px;
background-color: var(--toggle-color);
transition: var(--tran-05);
}

.switch::before{
content: '';
position: absolute;
height: 15px;
width: 15px;
border-radius: 50%;
top: 50%;
left: 5px;
transform: translateY(-50%);
background-color: var(--sidebar-color);
transition: var(--tran-04);
}

body.dark .switch::before{
left: 20px;
}

.home{
position: absolute;
top: 0;
top: 0;
left: 250px;
height: 100vh;
width: calc(100% - 250px);
background-color: var(--body-color);
transition: var(--tran-05);
}
.home .text{
font-size: 30px;
font-weight: 500;
color: var(--text-color);
padding: 12px 60px;
}

.sidebar.close ~ .home{
left: 78px;
height: 100vh;
width: calc(100% - 78px);
}
body.dark .home .text{
color: var(--text-color);
}
/* 
#menu ul{
	list-style:none;
	margin-top:10;
	padding:0
}
#menu ul li{border-bottom: 3px solid #2a2a2a;}
#menu>ul>li>a{border-left:4px solid #222;}
#menu ul li a{
	color:inherit;
	font-size:14px;
	display:block;
	padding:8px 0 8px 7px;
	text-decoration:none;
	-webkit-transition: all 0.3s ease;
	-moz-transition: all 0.3s ease;
	transition: all 0.3s ease;
	font-weight: 600;
}
#menu ul a i{
	margin-right:20px;
	font-size: 14px;
	margin-top: 2px;
	width: 5px;
}

#menu ul a i[class*='fa-caret']{float: right;}
#menu ul a:hover,#menu ul a.active{
	background-color:#111;
	border-left-color: #00a4a2;
	color:#FFCC33;
}
#menu ul a:hover i:first-child{color:#00a4a2;}

	/* Submenu 
	#menu ul li a.active+ul{display:block}
	#menu ul li ul{margin-top: 0;display: none;}
	#menu ul li ul li{border-bottom: none;}
	#menu ul li ul li a{padding-left: 30px;}
	#menu ul li ul li a:hover{
		background-color:#1A1A1A;
	}
	/* Submenu 


/* Cuando este a la Izq, para esconderlo posicionarlo a la Izq a -width 
.left{left:-180px;}
.show{left:0;}
*/

</style>
<nav id="menu" class="sidebar close">
  <header>
      <div class="image-text">
          <span class="image">
          </span>

          <div class="text logo-text" >
              
             <span class="name" >Inversiones Financieras </span>
              <span class="profession">I. S de Honduras</span>
          </div>
      </i>
      </div>

      <i class='bx bx-chevron-right toggle'></i>
  </header>

  <div class="menu-bar">
      <div class="menu">

     <li class="search-box" style="display:flex; height: 50px;" >
            <i class='bx bx-search icon'></i>
            <input type="text" placeholder="Buscando...">
        </li>
 <br>
          
              <li class="" class="fa fa-caret-down"  >
            
                <a href="index.php" style="align-items: center; height: 50px;"  >
                    <i class='bx bx-home-alt icon' ></i>
                    <span class="text nav-text">Inicio</span>
                </a>
                
               
                 
            </li>  
            
              </li>
             
            
              <li class="" style="height: 50px;">
                  <a href="demo.php" style="align-items: center;">
                      <i class='bx bx-detail icon' ></i>
                      <span class="text nav-text">Facturacion</span>
                  </a>
              </li>

              <li class="" style="height: 50px;">
                  <a href="gestiones/Gestion_Inventario.php" style="align-items: center;">
                      <i class='bx bx-pie-chart-alt icon' ></i>
                      <span class="text nav-text">Inventarios</span>
                  </a>
              </li>

              <li class="" style="height: 50px;">
                  <a href="libro/validacionlibro.php" style="align-items: center;">
                      <i class='bx bx-book icon'></i>
                      <span class="text nav-text">Libro Diario</span>
                  </a>
              </li>

              <li class="" style="height: 50px;">
                  <a href="libro/validacionbalance.php" style="align-items: center;">
                      <i class='bx bx-book icon'></i>
                      <span class="text nav-text">Reporte Bal. General</span>
                  </a>
              </li>

              <li class="" style="height: 50px;">
                  <a href="libro/validacionestado.php" style="align-items: center;">
                      <i class='bx bx-book icon'></i>
                      <span class="text nav-text">Estado de Resultado</span>
                  </a>
              </li>

              <li class="" style="height: 50px;">
                  <a href="libro/validacionresultado.php" style="align-items: center;">
                      <i class='bx bx-book icon'></i>
                      <span class="text nav-text">Reporte Est. Resultado</span>
                  </a>
              </li>

              </li>
              <li class="" class="fa fa-caret-down"   >
            
                <a href="index.php" style="align-items: center; height: 50px;  "  >
                    <i class='bx bx-cog icon' ></i>
                    <span class="text nav-text">Gestiones</span>
                </a>
                
               
                  <ul style="position: relative;  display: none; "  >
                  <a href="gestiones/Gestion_Bitacora.php" style="align-items: center;" >
                    <span class="text nav-text"  >Gestion Bitacora </span>
                </a>
                  <a href="gestiones/Gestion_CatalogoCuenta.php" style="align-items: center;"  >
                    <span class="text nav-text">Gestion Catalogo Cuentas</span>
                </a>
                  <a href="gestiones/Gestion_Clientes.php" style="align-items: center;"  >
                      <span class="text nav-text">Gestion Clientes</span>
                  </a>                  
                <a href="gestiones/Gestion_Factura.php" style="align-items: center; ">
                    <span class="text nav-text" >Gestion Facturas</span>
                </a>
                  <a href="gestiones/Gestion_Inventario.php" style="align-items: center;"  >
                    <span class="text nav-text">Gestion Inventario</span>
                </a>
                <a href="gestiones/Gestion_LibroMayor.php" style="align-items: center;"  >
                    <span class="text nav-text">Gestion Libro Mayor</span>
                </a>
                <a href="gestiones/Gestion_parametros.php" style="align-items: center;"  >
                    <span class="text nav-text">Gestion Parametros</span>
                </a>
                <a href="gestiones/Gestion_Preguntas.php" style="align-items: center;"  >
                    <span class="text nav-text">Gestion Preguntas</span>
                </a>
                <a href="gestiones/Gestion_PreguntasUsuarios.php" style="align-items: center;"  >
                    <span class="text nav-text">Gestion Preguntas Usuario</span>
                </a>
                  <a href="gestiones/Gestion_Usuarios.php" style="align-items: center;" >
                    <span class="text nav-text"  >Gestion Usuarios </span>
                </a>
                <a href="gestiones/GestionRoles.php" style="align-items: center;" >
                    <span class="text nav-text"  >Gestion Roles </span>
                </a>   
                          
            </ul>
        </li>  


          

      
      <div class="bottom-content">
        
        <li class="" style="height: 50px;">
            <a href="backupr.php" style="align-items: center;">
                <i class='bx bx-data icon' ></i>
                <span class="text nav-text">Backup</span>
            </a>
        </li>
        <li class="" style="height: 50px; display: flex;">
            <a href="login.php" style="align-items: center;">
                <i class='bx bx-log-out icon' ></i>
                <span class="text nav-text">Cerra Sesion</span>
            </a>
        </li>



        <li class="mode" style="height: 50px; display: flex;">
            <div class="sun-moon">
                <i class='bx bx-moon icon moon'></i>
                <i class='bx bx-sun icon sun'></i>
            </div>
            <span class="mode-text text">Modo Oscuro</span>

            <div class="toggle-switch">
                <span class="switch"></span>
            </div>
        </li>
        
    </div>
</div>

</nav>

<section class="home" >
<div class="text"> 
  <section  style=" background-color:cornflowerblue;
padding: 15px;
color:black;
font-size: 20px; ">
    <div id="header">
      <div class="header-nav">
        <div class="menu-button">
          <!--<i class="fa fa-navicon"></i>-->
        </div>
      </div>
    </div>
    <div class="content">
      <div class="content-header" >
          <h3  style><center>INVERSIONES FINANCIERAS - IS DE HONDURAS S.A</center></h3>
          <p><center>Trabajando Juntos Hoy Forjamos Nuestro Patrimononio del Mañana</center></p>
        </div>
        </div>
        </section>
  