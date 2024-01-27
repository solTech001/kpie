<?php
require "session.php";
require "dbconnect.php";

if (!isset($_POST['update'])) {
    header("Location:../dashoard.php");
}
else{
     // Current User Id
    $uid = $_SESSION['users_id'];
    $fullName = $_POST['name'];
    var_dump($uid );
    
    $sql = "UPDATE users SET fullname = ? WHERE id = '$uid'";
    $stmt = mysqli_stmt_init($connectDB);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"s",$fullName);
    $execute = mysqli_stmt_execute($stmt);

    
    if (!$execute) {
        $_SESSION['error_msg'] = "Opps! Something went wrong";
        header("Location: ../../portal/dashboard.php");
    }else{
        $_SESSION['fullName'] = $fullName;
        $_SESSION['success_msg'] = "Update Successful!";
        header("Location: ../../portal/dashboard.php");
    }

}