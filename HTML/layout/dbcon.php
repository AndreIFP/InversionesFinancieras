<?php
$dbuser = 'root';
$dbpass = '3214';
$dbname = '2w4GSUinHO';
$con = mysqli_connect("localhost:3307",$dbuser,$dbpass,$dbname);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>