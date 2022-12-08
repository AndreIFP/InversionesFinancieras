<?php
$dbuser = 'CALAPAL';
$dbpass = 'Calapal##567';
$dbname = '2w4GSUinHO';
$con = mysqli_connect("142.44.161.115",$dbuser,$dbpass,$dbname);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>