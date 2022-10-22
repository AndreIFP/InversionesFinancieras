<?php
$dbuser = 'root';
$dbpass = '';
$dbname = '2w4GSUinHO';
$con = mysqli_connect("localhost",$dbuser,$dbpass,$dbname);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>