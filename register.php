<?php
    require_once "asset/config/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="asset/css/login.css">
    <!-- js link -->
    <link rel="stylesheet" href="asset/style.js">
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div>
                <a href="index.php">
                    <img src="asset/img/logo.JPG" alt="logo">
                </a>
            </div>
            <div>
                <p>Having trouble? <span> Contact us</span></p>
            </div>
        </div>

        <h4>Register</h4>
        
        <form action="asset/config/registerConfig.php" method="post">
              <?php echo errorMsg(); echo successMsg(); ?>
            <label for="name">Name <span>*</span></label>
            <div>
                <input type="text" name="name" id="name">
            </div>
            <label for="username ">Username  <span>*</span></label>
            <div>
                <input type="text" name="username" id="username ">
            </div>
            <label for="Password ">Password  <span>*</span></label>
            <div>
                <input type="password" name="password" id="Password ">
            </div>
           <div> <button type="submit" name="register">Register</button></div>
           <div class="form-footer">
            <p>Having trouble signing in?</p>
            <p><span><a href="login.php">login</a></span> | <span>Forgotten Password</span></p>
           </div>
        </form>
    </div>
    <footer><p>Regulated activities are carried out on behalf of the Capital International Group by its licensed member companies. Full details can be viewed <a href="#">here</a>.</p></footer>
</body>
</html>