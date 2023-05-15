<?php
    $conn = mysqli_connect("localhost","root","","fitness");
    if(!$conn){
        echo "Databse connected" . mysqli_connect_error() ;
    } 
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //checking email valid or not\
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //checking email already exist
            $sql = mysqli_query($conn, "SELECT email FROM users where email = '{$email}' ");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!"; //if email already exist
            }else{
                $encypt_pass = md5($password);

                $sql2 = mysqli_query($conn, "INSERT INTO users (fname, lname, email, password) VALUES ('{$fname}','{$lname}','{$email}','{$encypt_pass}')");
                    if($sql2){
                        $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                        if(mysqli_num_rows($sql3) > 0){
                            $row = mysqli_fetch_assoc($sql3);
                            $_SESSION['unique_id'] = $row['unique_id'];
                            echo "success"; //using this session we can used unique id in other php
                        }
                    }
            }
        }else{
            echo "$email - This is not a valid email!";
        }
    }else{
        echo "All input required";
    }
?>
