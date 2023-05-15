<?php
  $conn = mysqli_connect("localhost", "root", "", "fitness");
  if(!$conn){
    echo "Database connection".mysqli_connect_error();
  }
?>