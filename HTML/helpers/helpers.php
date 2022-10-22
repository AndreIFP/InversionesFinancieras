<?php
    //include("../conexion.php");

    function dep($value)
    {
        $format  = print_r('<pre>');
        $format .= print_r($value);
        $format .= print_r('</pre>');
        return $format;
    }

    function updatePermisos($rol)
    {
        include("../conexion.php");
        $permisos = mysqli_query($conn,"select p.Id_Rol,r.Rol,p.Id_Objetos, o.Objetos,p.Permiso_Creacion as w, p.Permiso_Visualizacion as r, p.Permiso_Eliminacion as d, p.Permiso_Actualizacion as u from tbl_roles_objetos p 
        INNER JOIN tbl_roles r on p.Id_Rol=r.Id_Rol
        INNER JOIN tbl_objetos o on p.Id_Objetos = o.Id_Objetos where r.Id_Rol=".$rol."");
        $result_register = mysqli_fetch_all($permisos,1);
        $row=$result_register;
        
        
        for ($i=0; $i < count($row); $i++) { 
            $arrPermisos[$row[$i]['Id_Objetos']] = $row[$i];

           
        }
        $_SESSION['permisos']=$arrPermisos;
    }

    function updatePermisos2($rol)
    {
        include("conexion.php");
        $row=array();
        $arrPermisos=array();
        $permisos = mysqli_query($conn,"select p.Id_Rol,r.Rol,p.Id_Objetos, o.Objetos,p.Permiso_Creacion as w, p.Permiso_Visualizacion as r, p.Permiso_Eliminacion as d, p.Permiso_Actualizacion as u from tbl_roles_objetos p 
        INNER JOIN tbl_roles r on p.Id_Rol=r.Id_Rol
        INNER JOIN tbl_objetos o on p.Id_Objetos = o.Id_Objetos where r.Id_Rol=".$rol."");
        $result_register = mysqli_fetch_all($permisos,1);
        $row=$result_register;
        
        
        for ($i=0; $i < count($row); $i++) { 
            $arrPermisos[$row[$i]['Id_Objetos']] = $row[$i];

           
        }
        $_SESSION['permisos']=$arrPermisos;
    }

    function NOW(){
        $date = date('Y-m-d H:i:s');
        return $date;
    }

    //r= read = permiso de visualización, poder ingresar al módulo
    //w= write = permiso de creación, poder agregar datos al módulo
    //u= update = permiso de actualización, poder actualizar datos del módulo
    //d= delete = permiso de Eliminación, poder eliminar datos del módulo

    const M_FACTURACION=1; //solo ver
    const M_INVENTARIOS=2;
    const M_LIBRO_DIARIO=3;// ver
    const M_BALGENERAL=4;//ver
    const M_ESTADORESULTADO=5;//ver
    const M_REP_ESTADORESULTADO=6;//ver
    const M_GESTION_BITACORA=7;
    const M_GESTION_CAT_CUENTA=8;
    const M_GESTION_CLIENTE=9;
    const M_GESTION_FACTURAS=10;
    //const M_GESTION_INVENTARIO=11;
    const M_LIBRO_MAYOR=12;
    const M_GESTION_PARAMETROS=13;
    const M_GESTION_PREGUNTAS=14;
    const M_GESTION_PREG_USUARIOS=15;
    const M_GESTION_USUARIOS=16;
    const M_GESTION_ROLES=17;
    const M_GESTION_OBJETOS=18;
    const M_BACKUP=19;//sin eliminar


    

?>