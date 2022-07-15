<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "messenger";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error";
  }
?>
