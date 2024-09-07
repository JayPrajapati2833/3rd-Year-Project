<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update password</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- logo -->
    <link rel="shortcut icon" href="../logo/logo_transparent.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="../script/script.js"></script>
    <!-- fontawesom -->
    <script src="https://kit.fontawesome.com/96c97d736b.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    $error = "";
    include "config.php";
    if (isset($_POST['updatePassword'])) {
        $username = $_POST['username'];
        $sql = "SELECT * FROM publisher WHERE username='$username'";
        $result2 = mysqli_query($conn,$sql)or die("Query failed");
        if(mysqli_num_rows($result2)){
            if ($_POST['password'] == $_POST['confirmPassword']) {
                $password = md5($_POST['password']);
                $update = "UPDATE `publisher` SET `publisherPassword`='$password',`token`=NULL,`forgotExpiry`=NULL WHERE `username`='$_POST[username]'";
                if (mysqli_query($conn, $update)) {
                    echo "
                                <script>
                                    alert('Password Updated successfully');
                                    window.location.href='index.php';
                                </script>
                            ";
                } else {
                    echo "
                                <script>
                                    alert('Query failed');
                                    window.location.href='forgot-password.php';
                                </script>
                            ";
                }
            }
            else{
                $error = "* Password and confirm password not matched";
            }
        } else {
            // echo "<script>
            $error = "* Invalid username";
            // </script>";
        }
    }
    ?>
    <?php
    include "config.php";
    if (isset($_GET['email']) && isset($_GET['token'])) {
        $date = date("Y-m-d");
        $query = "SELECT * FROM `publisher` WHERE `emailId`='$_GET[email]' AND `token` = '$_GET[token]' AND `forgotExpiry`='$date'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                echo "<div class='login admin-login'>
                    <div class='admin'>
                        <div class='form'>
                        <div class='login-logo h-1'>Change password</div>
                            <form method='post'>
                                <div class='input'>
                                    <label for='username'>Username</label>
                                    <input type='text' name='username' id='username'>
                                </div>
                                <div class='input'>
                                    <label for='password'>New Password</label>
                                    <input type='password' name='password' id='password'>
                                </div>
                                <div class='input'>
                                    <label for='password'>Confirm Password</label>
                                    <input type='password' name='confirmPassword' id='confirmPassword'>
                                </div>
                                <span class='error'>$error</span>
                                <div class='input submit'>
                                    <button type='submit' name='updatePassword' class='btn'>Update Password</button>
                                </div>
                                <input type='hidden' name='email' value='$_GET[email]'>
                            </form>
                        </div>
                    </div>
                </div>";
            } else {
                echo "
                    <script>
                        alert('Link is invalid or expire');
                        window.location.href='forgotPassword.php';
                    </script>
                    ";
            }
        } else {
            echo "
                    <script>
                        alert('Query failed');
                        window.location.href='forgotPassword.php';
                    </script>
                ";
        }
    }
    ?>


</body>

</html>