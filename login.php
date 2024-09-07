<?php
include "config.php";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query) or die("Query failed");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['userId'] = $row['userId'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['username'] = $row['username'];
            header('location: http://localhost/PHP/third_year_project/enews/user/news.php');
        }
    } else {
        echo "<script>
                                alert('username or password is incorrect');
                            </script>";
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
<div class="login user-login">
    <div class="signin">
        <div class="form">
            <div class="login-logo h-1">USER LOGIN</div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                <div class="input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="input forgot">
                    <a href="forgot-password.php">forgot password?</a>
                </div>
                <div class="input submit">
                    <button type="submit" name="login" class="btn"> <i class="fas fa-sign-in-alt"></i> Login</button>
                </div>
                <div class="input">
                    <span>New user? <a href="signup.php" id="signup">Signup</a></span>
                </div>
            </form>

        </div>
    </div>
</div>