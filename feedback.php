<?php
    include "config.php";
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['emailid'];
        $description = $_POST['feedback'];
        $query = "INSERT INTO feedback(Username,emailId,description) VALUES ('$name','$email','$description')";
        if(mysqli_query($conn,$query))
        {
            echo "<script>
                    alert('Feedback send');
                    window.location.href='index.php';
                </script>";
        }else{
            echo "<script>
                    alert(Feedback not send);
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
<div class="login feedback-form">
    <div class="feedback">
        <div class="form">
            <div class="login-logo h-1">GIVE FEEDBACK</div>
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
                    <label for="description">Feedback Description</label>
                    <textarea name="feedback" id="feedback" rows="4" placeholder="Description" required></textarea>
                </div>
                <div class="input submit">
                    <button type="submit" name="submit" class="btn"> Send Feedback</button>
                </div>
            </form>
        </div>
    </div>
</div>