<?php
    include "config.php";
    if(isset($_GET['submit']))
    {
        $search = $_GET['search'];
        $query = "SELECT * FROM `news` WHERE `newsTitle` LIKE '%$search%' OR `newsDescription` LIKE '%$search%';";
        if(mysqli_query($conn,$query)){
            echo "";
        }
        else{
            echo "query failed";
        }
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
    <link rel="stylesheet" href="./css/style.css">
    <!-- logo -->
    <link rel="shortcut icon" href="./logo/logo_transparent.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="./script/script.js"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/96c97d736b.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">
                <a href="index.php">
                    <img src="Logo/logo_transparent.png" alt="Enews">
                    <span>Enews</span>
                </a>
            </div>
            <div class="navitem">
                <ul>
                    <li>
                        <a href="index.php"><i class="fa-solid fa-house"></i><span>Home</span></a>
                    </li>
                    <li>
                        <a href="aboutus.php"><i class="fa-solid fa-user"></i><span>About Us</span></a>
                    </li>
                    <li>
                        <a href="login.php" id="loginbtn"><i class="far fa-plus-square"></i><span>Add News</span></a>
                    </li>
                    <li>
                        <a href="feedback.php" id="feedbackbtn"><i class="fas fa-comment"></i><span>Feedback</span></a>
                    </li>
                    <li class="searchbox">
                        <form action="search.php" method="get" autocomplete="off">
                            <input type="text" name="search" id="search" placeholder="Search here...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>