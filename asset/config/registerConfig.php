<?php
    require "dbconnect.php";
    require "session.php";
   

    date_default_timezone_set("Africa/Lagos");
  
    // Check if the button is clicked or set
    if (!isset($_POST['register'])) { 
        header("Location: ../../register.php");
    }else{
         $Name = $_POST['name'];
         $Username = $_POST['username'];
         $Password = $_POST['password'];
       
         $date = date("Y-m-d");
         $pass = password_hash($Password, PASSWORD_DEFAULT); // Encrypt users Password


        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_stmt_init($connectDB);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"s",$email);
        $execute = mysqli_stmt_execute($stmt);
   
        $result = mysqli_stmt_get_result($stmt);

        $numRows = mysqli_num_rows($result);

        if ($numRows > 0) {
            $_SESSION['error_msg'] = "This email already exists!";
            header("Location: ../../login");
        }
        elseif (strlen($pass) < 5) {
            $_SESSION['error_msg'] = "Password must be at least 8 characters!";
           header("Location: ../../register.php");
        }
        else{
           
            // Prepare SQL Statement
            $sql = "INSERT INTO users(fullname,username,passwords,date_created) VALUES(?,?,?,?)";

            // Initialize connection with database
            $stmt = mysqli_stmt_init($connectDB);

            // Prepare Connection with SQL
            mysqli_stmt_prepare($stmt,$sql);
            // var_dump($stmt);

            // Bind the values that will be sent to the database
            mysqli_stmt_bind_param($stmt,"ssss",$Name,$Username,$pass,$date);

            $execute = mysqli_stmt_execute($stmt);

            if (!$execute) {
                $_SESSION['error_msg'] = "Opps! Something went wrong";
                header("Location: ../../register.php");
            }else{  
                $_SESSION['success_msg'] = "Registration Successful!";
                header("Location: ../../register.php");
            }
         }
        
    }
