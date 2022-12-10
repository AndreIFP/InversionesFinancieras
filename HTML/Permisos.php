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

Programa:          Permisos
Fecha:             16-jul-2022
Programador:       Fanny
descripcion:       libro

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Fanny	         01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
David 	       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Allan		       01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php
include("conexion.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ROLES PERMISO</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
         <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.css'>
</head>
<body>
  <style>
    /*
  FontAwesome - The best icon font ever :)
  https://fortawesome.github.io/Font-Awesome/

  Thanks to Dave Gandy and all involved in FontAwesome !!!
*/
[class^="icon"], [class*=" icon"] {
  font-family: FontAwesome;
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  -webkit-font-smoothing: antialiased;
}

.iconUser:before {
  content: "\f007";
  margin-right: 6px;
}

.iconAdd {
  color: gray;
  cursor: pointer;
  float: right;
  font-size: 28px;
  margin-top: 6px;
  text-shadow: 0 0 2px black;
  -moz-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  -webkit-transition: all 0.2s linear;
  transition: all 0.2s linear;
}
.iconAdd:before {
  content: "\f067";
}
.iconAdd:hover {
  color: #9a9a9a;
}

.iconRemove {
  cursor: pointer;
  color: gray;
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
  opacity: 0.5;
  -moz-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  -webkit-transition: all 0.2s linear;
  transition: all 0.2s linear;
}
.iconRemove:hover {
  filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
  opacity: 1;
}
.iconRemove:before {
  content: "\f00d";
}

* {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  outline: none;
}

.patternwall {
  color: #e6e6e6;
  text-decoration: none;
  position: absolute;
  bottom: 20px;
  right: 20px;
}

body {
  font: 14px/22px "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, sans-serif;
  background: url(http://www.patternwall.net/bundles/patternwall/images/patterns/52501e74082ce.png) left top;
}

.clear {
  clear: both;
}

.permissionWrapper {
  width: 600px;
  margin: 50px auto;
}

.listFilterLabel {
  color: gray;
  text-shadow: 0 0 1px black;
}

.listFilterInput {
  margin: 0 0 20px 10px;
  height: 28px;
  line-height: 28px;
  color: gray;
  padding: 0 10px;
  background-color: #2e2e2e;
  border: solid 1px #343434;
  -moz-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.2);
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
}
.listFilterInput:focus {
  outline: none;
}

.permissionsTable {
  width: 100%;
  color: #5a5a5a;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  -moz-box-shadow: 0 0 5px black;
  -webkit-box-shadow: 0 0 5px black;
  box-shadow: 0 0 5px black;
}
.permissionsTable tr {
  background-color: #e6e6e6;
}
.permissionsTable th, .permissionsTable td {
  height: 42px;
  font-size: 14px;
  font-weight: normal;
  padding: 0 5px;
}
.permissionsTable th:first-child, .permissionsTable td:first-child {
  text-align: left;
  padding: 4px 10px;
}
.permissionsTable th:last-child, .permissionsTable td:last-child {
  width: 25px !important;
}
.permissionsTable th:not(:first-child), .permissionsTable td:not(:first-child) {
  width: 60px;
}
.permissionsTable thead th {
  border-bottom: solid 3px #2e2e2e;
}
.permissionsTable tbody tr {
  -moz-transition: all 0.4s linear;
  -o-transition: all 0.4s linear;
  -webkit-transition: all 0.4s linear;
  transition: all 0.4s linear;
}
.permissionsTable tbody tr td:first-child {
  font-style: italic;
}
.permissionsTable tbody tr:hover {
  background-color: #dbdbdb;
}
.permissionsTable tbody tr.focused {
  background-color: #d1d1d1;
}
.permissionsTable tbody tr.removeState {
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
  opacity: 0;
  -moz-transform: translate(200px, 0);
  -ms-transform: translate(200px, 0);
  -webkit-transform: translate(200px, 0);
  transform: translate(200px, 0);
}
.permissionsTable tbody tr.addState {
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
  opacity: 0;
  -moz-transform: translate(-200px, 0);
  -ms-transform: translate(-200px, 0);
  -webkit-transform: translate(-200px, 0);
  transform: translate(-200px, 0);
}
.permissionsTable tbody .userName {
  display: inline-block;
  width: 90%;
}

.permissionTag {
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
  cursor: pointer;
  text-align: center;
  font-size: 12px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
}
.permissionTag[data-perm=view].multi {
  background-color: #c1c1c1;
}
.permissionTag[data-perm=view].active {
  color: white;
  background-color: #8DCA35;
}
.permissionTag[data-perm=edit].multi {
  background-color: #c1c1c1;
}
.permissionTag[data-perm=edit].active {
  color: white;
  background-color: #FFAB00;
}
.permissionTag[data-perm=delete].multi {
  background-color: #c1c1c1;
}
.permissionTag[data-perm=delete].active {
  color: white;
  background-color: #FFAB00;
}
.permissionTag[data-perm=owner].multi {
  background-color: #c1c1c1;
}
.permissionTag[data-perm=owner].active {
  color: white;
  background-color: #FF702A;
}
.permissionTag[data-perm=admin].multi {
  background-color: #c1c1c1;
}
.permissionTag[data-perm=admin].active {
  color: white;
  background-color: #FF702A;
}
  </style>

<!-- partial:index.partial.html -->
<!-- 
  -----------
  Visit Patternwall.net for free background patterns! 
  -----------
-->
<?php include 'barralateralinicial.php';?>
<a class="patternwall" href="http://www.patternwall.net" target="_blank" title="Visit Patternwall.net for free background patterns!">www.patternwall.net</a>
<div class="container mt-12">
  <div class="col-md-12">
<div id="permissionWrapper" class="permissionWrapper">
  <label for="inputFilterPermission" class="listFilterLabel">Buscador</label>
  <input id="inputFilterPermission" type="text" class="listFilterInput"/>
  <div class="clear"></div>
  <table class="table" id="listFilterPermission" class="listFilterContainer permissionsTable" cellspacing="0" cellpadding="0">
    <thead id="permissionsHead">
      <tr class="doNotFilter">
        <th>Rol</th>
        <th>Objeto</th>
        <th><div id="view" class="permissionTag" data-perm="view">Visualizar</div></th>
        <th><div id="edit" class="permissionTag" data-perm="edit">Actualizar</div></th>
        <th><div id="delete" class="permissionTag" data-perm="delete">Eliminar</div></th>
        <th><div id="owner" class="permissionTag" data-perm="owner">Insertar</div></th>
        <th></th>
      </tr>
    </thead>
    <tbody id="permissionsBody">
    <?php
    $sql = mysqli_query($conn,"select u.Id_Rol, u.Id_Objetos, r.Rol, o.Objetos from tbl_roles_objetos u inner join tbl_roles r ON u.Id_Rol = r.Id_Rol join tbl_objetos o ON u.Id_Objetos = o.Id_Objetos");
                                    mysqli_close($conn);

			                        $result = mysqli_num_rows($sql);
                                    if($result > 0){
                                    while($row=mysqli_fetch_array($sql)){
                                ?>
                                     <tr>
                                        <th><?php echo $row['Rol']?></th>
                                        <th><?php echo $row['Objetos']?></th>
                                        <th><div id="view" class="permissionTag" data-perm="view">Visualizar</div></th>
                                        <th><div id="edit" class="permissionTag" data-perm="edit">Actualizar</div></th>
                                        <th><div id="delete" class="permissionTag" data-perm="delete">Eliminar</div></th>
                                        <th><div id="owner" class="permissionTag" data-perm="owner">Insertar</div></th>
                                    </tr>
                                <?php
                                       }
                                    }
                                ?>
    </tbody>
  </table>
</div>
  </div>
  </div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
<script>
var initPermissionRootState = function(item){
  var body = $("#permissionsBody");
  var rowCount    = body.find("tr").length;
  var perm        = item.attr("data-perm");
  var selectCount = body.find("[data-perm=" + perm + "].active").length;

  if(rowCount == selectCount){
    $("#" + perm).removeClass("multi").addClass("active");
  }else if(selectCount > 0){
    $("#" + perm).removeClass("active").addClass("multi");
  }else{
    $("#" + perm).removeClass("active").removeClass("multi");
  }
}
$("#permissionWrapper").on("click", "#addUser", function(){
  var template = '<tr class="addState">' +
                   '<td><span contenteditable="false" class="userName"></span></td>' + 
                   '<td></td>' +
                   '<td><div class="permissionTag active" data-perm="view">Visualizar</div></td>' +
                   '<td><div class="permissionTag" data-perm="edit">Actualizar</div></td>' +
                   '<td><div class="permissionTag" data-perm="delete">Eliminar</div></td>' +
                   '<td><div class="permissionTag" data-perm="owner">Insertar</div></td>' +

                   '<td><a href="#" class="iconRemove deleteUser" title="Remove this user"></a></td>' +
                 '</tr>';
  var user = $(template);
  $("#permissionsBody").prepend(user);

  setTimeout(function(){
    user.removeClass("addState");
  }, 50);

  initPermissionRootState(user.find("[data-perm=view]"));
  initPermissionRootState(user.find("[data-perm=edit]"));
  initPermissionRootState(user.find("[data-perm=delete]"));
  initPermissionRootState(user.find("[data-perm=owner]"));

                                    
  user.find(".userName").trigger("focus");
  return false;
});
$("#permissionsBody").on("focusin", ".userName", function(){
  $(this).parent().parent().addClass("focused");
}).on("focusout", ".userName", function(){
  $(this).parent().parent().removeClass("focused");
}).on("click", ".deleteUser", function(){
  var parent = $(this).parent().parent();
  parent.addClass("removeState");
  setTimeout(function(){
    parent.remove();
  }, 400);
});
// trigger root permission state
$("#permissionWrapper").on("click", ".permissionTag", function(){
  var me   = $(this);

  if(me.hasClass("active")){
    me.removeClass("active");
  }else{
    me.addClass("active");
  }

  initPermissionRootState(me);
});
// bind root permission state click and init
$("#permissionsHead").on("click", ".permissionTag", function(){
  var me   = $(this);
  var perm = me.attr("data-perm");
  var body = $("#permissionsBody");

  if(me.hasClass("active")){
    me.removeClass("active");
    body.find("[data-perm=" + perm + "].active:visible").trigger("click");
  }else{
    me.removeClass("multi");
    body.find("[data-perm=" + perm + "]:not(.active):visible").trigger("click");
  }

}).find(".permissionTag").each(function(i, e){
  initPermissionRootState($(e));
})

// init filter inputs --------------------------------------------------------------------
$("#permissionWrapper").on("keyup", ".listFilterInput", function(){
  var me    = $(this);
  var val   = $.trim(me.val());
  var items = $("#" + me.attr("id").replace("input", "list")).find("tr");
  
  if(val.length > 0){
    var item = null;
    
    $.each(items, function(i, e){
      item = $(e);
      if(!item.hasClass("doNotFilter")){
        (item.text().toUpperCase().indexOf(val.toUpperCase()) >= 0) ? item.show() 
        : item.hide();
      }
    });
  }else{
    items.show();
  }
});
</script>
<?php include 'barralateralfinal.php';?>
</body>
</html>
