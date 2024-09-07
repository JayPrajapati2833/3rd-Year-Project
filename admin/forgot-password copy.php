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
    <div class="login admin-login">
        <div class="admin">
            <div class="form">
                <div class="frgt-top">
                    <div class="icon">
                    <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="title">
                        Forgot password
                    </div>
                    <p>Enter your email and we will send you an email to change password.</p>
                </div>
                <form action="forgot.php" method="post" autocomplete="off">
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="input submit">
                        <button type="submit" name="submit" class="btn">Submit</button>
                    </div>
                    <div class="input">
                        <a href="index.php" class="back-link"><span><i class="fas fa-chevron-left"></i></span>Back to login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>