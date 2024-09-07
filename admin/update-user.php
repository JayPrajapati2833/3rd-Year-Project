<?php
include "navbar1.php";
$id=$_GET['id'];
if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $userName = $_POST['user'];
    $query = "UPDATE user set name='$name',mobileNo='$mobile',emailId='$email',username='$userName' WHERE userId='$id'";
    if(mysqli_query($conn,$query))
    {
        echo "<script>
            alert('User Updated');
         window.location.href='user.php';
        </script>";
    }
    else {
        echo "<script>
                            alert('User Not Updated');
                            window.location.href='user.php';
                        </script>";
    }
}
?>
<div class="form-container">
    <div class="h-1">Update User</div>
    <div class="add-news form">
    <?php
            $query = "SELECT * FROM user WHERE userId=$id";
            $result=mysqli_query($conn,$query) or die("Query failed");
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
        ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
            <div class="input">
                <label for="nam">Enter Name : </label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" id="name">
            </div>
            <div class="input">
                <label for="mail">Enter Email : </label>
                <input type="email" name="email" value="<?php echo $row['emailId']; ?>" id="email">
            </div>
            <div class="input">
                <label for="mobil">Enter Mobile no : </label>
                <input type="tel" name="mobile" value="<?php echo $row['mobileNo']; ?>"  id="mobile">
            </div>
            <div class="input">
                <label for="usr">Enter Username : </label>
                <input type="text" name="user" value="<?php echo $row['username']; ?>" id="user">
            </div>
            <div class="input">
                <div class="submit">
                    <button type="submit" name="update" class="btn">Update</button>
                </div>
            </div>
        </form>
        <?php } } ?>
    </div>
</div>
<?php
include "navbar2.php";
?>