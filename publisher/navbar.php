<?php
    include "config.php";
    session_start();
    if(!isset($_SESSION['publisherUserName']))
    {
        header("Location: http://localhost/PHP/third_year_project/enews/publisher/");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enews</title>
    <!-- css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- logo -->
    <link rel="shortcut icon" href="../logo/logo_transparent.png" type="image/x-icon">
    <!-- fontawesom -->
    <script src="https://kit.fontawesome.com/96c97d736b.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="navcontainer1">
        <nav class="navitem">
            <div class="logo">
                <img src="../Logo/logo_transparent.png" alt="">
                <h3>Enews</h3>
            </div>
            <div class="logoutitem">
                <!-- <span><?php echo $_SESSION['publisherUserName'];?></span> -->
                <div class="user">
                    <div class="logout">
                        <div class="username" onclick="menuToggle()"><?php echo $_SESSION['publisherUserName']; ?></div>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="edit-profile.php?id=<?php echo $_SESSION['publisherId']; ?>"><i class="fas fa-edit"></i>Edit Profile</a></li>
                            <li><a href="change-password.php?id=<?php echo $_SESSION['publisherId']; ?>"><i class="fas fa-lock"></i>Change Password</a></li>
                            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </nav>
    </div>
</body>
</html>