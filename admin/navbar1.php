<?php
    include "config.php";
    session_start();
    if(!isset($_SESSION['adminUserName']))
    {
        header("Location: http://localhost/PHP/third_year_project/enews/admin/");
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
    <link rel="stylesheet" href="../css/dashbord.css">
    <!-- logo -->
    <link rel="shortcut icon" href="../logo/logo_transparent.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <!-- fontawesom -->
    <script src="https://kit.fontawesome.com/96c97d736b.js" crossorigin="anonymous"></script>
</head>

<body>
    <section id="sidebar">
        <div class="white-label">
            <a href="dashbord.php">
                <img src="../logo/logo_transparent.png" alt="Enews">
                <span>Enews</span>
            </a>
        </div>
        <div id="sidebar-nav">
            <ul>
                <li><a href="dashbord.php">Dashboard</a></li>
                <li><a href="news.php"> News </a></li>
                <li><a href="category.php"> Category </a></li>
                <li><a href="publish.php"> Publish </a></li>
                <li><a href="publisher.php"> Publisher</a></li>
                <li><a href="user.php"> User</a></li>
                <li><a href="feedback.php"> feedback</a></li>
            </ul>
        </div>
    </section>
    <section id="content">
        <div id="header">
            <div class="header-nav">
                <div class="user">
                    <div class="logout">
                        <div class="username" onclick="menuToggle()"><?php echo $_SESSION['adminUserName']; ?></div>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="edit-profile.php?id=<?php echo $_SESSION['adminID']; ?>"><i class="fas fa-edit"></i>Edit Profile</a></li>
                            <li><a href="edit-password.php?id=<?php echo $_SESSION['adminID']; ?>"><i class="fas fa-lock"></i>Change Password</a></li>
                            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content">