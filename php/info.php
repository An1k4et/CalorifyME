<?php 
    include_once "config.php";
    session_start();
    $height = mysqli_real_escape_string($conn, $_POST['height']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $activity = mysqli_real_escape_string($conn, $_POST['activiy']);
    
    if(!empty($height) && !empty($weight) && !empty($age) && !empty($gender) && !empty($activity) ){
        $sql2 = mysqli_query($conn, "INSERT INTO counter (Height, Weight, Age, Gender, Activity, user_id) VALUES ({$height},{$weight},{$age},'{$gender}','{$activity}','{$_SESSION['unique_id']}')");
        if($sql2){
            echo "success";
        }
    }
?>




                            