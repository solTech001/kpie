<?php
require "../asset/config/session.php";
require "../asset/config/dbconnect.php";


// Current User Id
$uid = $_SESSION['users_id'];

// Prepared SQL Command
$sql = "SELECT * FROM users WHERE id = '$uid'";
// Query Database
$query = mysqli_query($connectDB, $sql);
// Convert  value to associative array
$userData = mysqli_fetch_assoc($query);
//  print_r($userData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="../asset/css/dash.css">
    <!-- js link -->
</head>
<body>
    <div class="container">
        <div>
            <img src="../asset/img/my_img.jpg" alt="profile_pic">
        </div>
        <form action="../asset/config/updateConfig.php" method="post">
            <label for="name">Name</label>
            <div>
                <input type="text" id="name"name ="name"value="<?php echo $userData['fullname']?>">
            </div>
            <label for="username">username</label>
            <div>
              <input type="text" id="username" value="<?php echo $userData['username']?>" readonly>
            </div>
            <label for="username">Balance</label>
            <div>
               <input type="text" id="username" value="<?php echo '1000'?>" readonly>
            </div>
            <div>
             <button type="submit" name="update">Edit Profile</button>
            </div>
        </form>
    </div>
</body>
</html>