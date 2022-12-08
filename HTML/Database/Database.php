<?php
    $dbhost = "142.44.161.115";
    $dbuser = "CALAPAL";
    $dbpass = "Calapal##567";
    $dbname = "2w4GSUinHO";
    
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) 
    {
        die("No hay conexión: ".mysqli_connect_error());
    }
?>