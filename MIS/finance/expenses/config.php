<?php
$con = mysqli_connect("localhost","tkayinve_tkayinvestment","tkayMIS@2022","tkayinve_mis");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error() ." | Seems like you haven't created the DATABASE with an exact name";
  }
?>