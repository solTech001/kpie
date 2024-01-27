<?php
    require "dbconnect.php";
    require "session.php";
    
    if (!isset($_POST['login'])) {
        header("Location: ../../login");
    }
    else{
        $email = $_POST['username'];
        $password = $_POST['Password'];
       
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_stmt_init($connectDB);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"s",$email);
        var_dump( $stmt);
        $execute = mysqli_stmt_execute($stmt);
   
        $result = mysqli_stmt_get_result($stmt);

        $numRows = mysqli_num_rows($result);
        if ($numRows < 1) {
            $_SESSION['error_msg'] = "Invalid Email!";
            header("Location: ../../login.php");
        }
        else{
            $row = mysqli_fetch_assoc($result);
            $returnedPassword = $row['passwords'];
            if (!password_verify($password,$returnedPassword)) {
                $_SESSION['error_msg'] = "Incorrect Password!";
                header("Location: ../../login.php");
            }else{
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['users_id'] = $row['id'];
                $_SESSION['success_msg'] = "Login Successful";
                
                header("Location: ../../portal/dashboard.php");  
            }
        }

    }