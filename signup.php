<?php
    include "config.php";
    $usernameError = "";
    if(isset($_POST['submit']))
    {   
        $name = $_POST['name'];
        $email = $_POST['emailid'];
        $mobileNo = $_POST['mobile'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query1 = "SELECT * from user where username='$username'";
        $result1 = mysqli_query($conn,$query1) or die("Query failed");
        if(mysqli_num_rows($result1)>0)
        {
                $usernameError = "* Username already exist";
        }
        else{
            $query = "INSERT INTO user(name,mobileNo,emailId,username,password) values('$name','$mobileNo','$email','$username','$password')";
            if(mysqli_query($conn,$query))
            {   
                echo "<script>
                    alert('signup successfully');
                </script>";
                $query2 = "SELECT * from user where username='$username'";
                $result2 = mysqli_query($conn, $query2) or die("Query failed");
                if (mysqli_num_rows($result2) > 0) {
                    while ($row = mysqli_fetch_assoc($result2)) {
                        session_start();
                        $_SESSION['userId'] = $row['userId'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['username'] = $row['username'];
                    }
                }
                header("location: ./user/news.php");
            }
            else{
                echo "<script>
                    alert('Data not inserted');
                </script>";
            }
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
<div class="login signup-login">
    <div class="signup">
        <div class="form">
            <div class="login-logo h-1">SIGNUP</div>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                <div class="input">
                    <label for="Nname">Name</label>
                    <input type="text" name="name" id="name" placeholder="name" required>
                </div>
                <div class="input">
                    <label for="emailid">Email Id</label>
                    <input type="email" name="emailid" id="emailid" placeholder="abc123@gmail.com" required>
                </div>
                <div class="input">
                    <label for="mobile">Mobile NO</label>
                    <input type="tel" name="mobile" id="mobile" placeholder="+91 123456 78945" required>
                </div>
                <div class="input">
                    <label for="nusername">Username</label>
                    <input type="text" name="username" id="username" placeholder="username" required>
                </div>
                <div class="input">
                    <label for="npassword">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <span class="usernameError"><?php echo $usernameError; ?></span>
                <div class="input submit">
                    <button type="submit" name="submit" class="btn"> <i class="fas fa-sign-in-alt"></i> Signup</button>
                </div>
            </form>
        </div>
    </div>
</div>