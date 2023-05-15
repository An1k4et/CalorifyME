<?php
    include_once "config.php";
    session_start();
    $height = mysqli_real_escape_string($conn, $_POST['height']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
?>