<?php
    include "config.php";
    $usernameError = "";
    $id=$_GET['id'];
    if(isset($_POST['update']))
    {   
        $name = $_POST['name'];
        $email = $_POST['emailid'];
        $mobileNo = $_POST['mobile'];
        $username = $_POST['username'];
        $query1 = "SELECT * from admin where adminUserName='$username' and adminId!=$id";
        $result1 = mysqli_query($conn,$query1) or die("Query failed");
        if(mysqli_num_rows($result1)>0)
        {
                $usernameError = "* Username already exist";
        }
        else{
            $query = "UPDATE `admin` SET `adminName`='$name',`adminUserName`='$username',`adminEmail`='$email',`adminMobileNo`='$mobileNo' WHERE adminId=$id;";
            $query .= "UPDATE `news` SET `userName`='$username',`name`='$name' WHERE userId=$id AND postBy='admin';";
            if(mysqli_multi_query($conn,$query))
            {   
                session_start();
                $_SESSION['adminUserName'] = $username;
                echo "<script>
                    alert('Profile updated');
                </script>";
                header("location: dashbord.php");
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
    <link rel="stylesheet" href="../css/style.css">
    <!-- logo -->
    <link rel="shortcut icon" href="../logo/logo_transparent.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="../script/script.js"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/96c97d736b.js" crossorigin="anonymous"></script>
</head>
<div class="login signup-login">
    <div class="signup">
        <div class="form">
            <div class="login-logo h-1">Edit Profile</div>
            <?php
                $sql = "SELECT * FROM ADMIN WHERE adminId=$id";
                $result = mysqli_query($conn,$sql) or die("Query failed");
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
            ?>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                <div class="input">
                    <label for="Nname">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $row['adminName']; ?>">
                </div>
                <div class="input">
                    <label for="emailid">Email Id</label>
                    <input type="email" name="emailid" id="emailid" value="<?php echo $row['adminEmail']; ?>"> 
                </div>
                <div class="input">
                    <label for="mobile">Mobile NO</label>
                    <input type="tel" name="mobile" id="mobile" value="<?php echo $row['adminMobileNo']; ?>">
                </div>
                <div class="input">
                    <label for="nusername">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $row['adminUserName']; ?>">
                </div>
                <span class="usernameError"><?php echo $usernameError; ?></span>
                <div class="input submit">
                    <button type="submit" name="update" class="btn">update</button>
                </div>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>