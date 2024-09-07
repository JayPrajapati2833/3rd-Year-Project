<?php
                    include "config.php";
                    $error="";
                    if(isset($_POST['login']))
                    {
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);
                        $query = "SELECT * FROM `publisher` WHERE `username`='$username' AND `publisherPassword`='$password'";
                        $result = mysqli_query($conn,$query) or die("Query Failed");
                        if(mysqli_num_rows($result)==1)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                                session_start();
                                $_SESSION['publisherId'] = $row['publisherId'];
                                $_SESSION['publisherUserName'] = $row['username'];
                                $_SESSION['publishername'] = $row['publisherName'];
                                $_SESSION['publisherPassword'] = $row['publisherPassword'];
                                header("Location:http://localhost/PHP/third_year_project/enews/publisher/news.php");
                            }
                        }
                        else{
                            $error = "* Username or password is incorrect";
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
    <link rel="stylesheet" href="../css/style.css">
    <!-- logo -->
    <link rel="shortcut icon" href="../logo/logo_transparent.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="../script/script.js"></script>
    <!-- fontawesom -->
    <script src="https://kit.fontawesome.com/96c97d736b.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="login publisher-login">
        <div class="publisher">
            <div class="form">
                <div class="login-logo h-1">PUBLISHER LOGIN</div>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                    <div class="input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <span class="usernameError"><?php echo $error; ?></span>
                    <div class="input">
                        <a href="forgot-password.php" class="forgot">forgot password ?</a>
                    </div>
                    <div class="input submit">
                        <button type="submit" name="login"class="btn"> <i class="fas fa-sign-in-alt"></i> Login</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</body>