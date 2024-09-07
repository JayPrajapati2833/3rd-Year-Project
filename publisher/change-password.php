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
    include "config.php";
    $error = "";
    $id = $_GET['id'];
    if(isset($_POST['updatePassword'])){
    if ($_POST['password'] == $_POST['confirmPassword']) {
        $password = md5($_POST['password']);
        $update = "UPDATE `publisher` SET `publisherPassword`='$password' WHERE `publisherId`=$id";
        if (mysqli_query($conn, $update)) {
            echo "
                                <script>
                                    alert('Password Updated successfully');
                                    window.location.href='news.php';
                                </script>
                            ";
        } else {
            echo "
                                <script>
                                    alert('Query failed');
                                </script>
                            ";
        }
    } else {
        $error = "* Password and confirm password not matched";
    }
}
    ?>
    <div class='login admin-login'>
        <div class='admin'>
            <div class='form'>
                <div class='login-logo h-1'>Change password</div>
                <form method='post'>
                    <div class='input'>
                        <label for='password'>New Password</label>
                        <input type='password' name='password' id='password'>
                    </div>
                    <div class='input'>
                        <label for='password'>Confirm Password</label>
                        <input type='password' name='confirmPassword' id='confirmPassword'>
                    </div>
                    <span class='error'><?php echo $error; ?></span>
                    <div class='input submit'>
                        <button type='submit' name='updatePassword' class='btn'>Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>";


</body>

</html>