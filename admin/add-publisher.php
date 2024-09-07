<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $emailid = $_POST['email'];
    $mno = $_POST['mobile'];
    $username = $_POST['user'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO `publisher`(`publisherName`, `mobileNo`, `emailId`, `username`, `publisherPassword`) VALUES ('$name','$mno','$emailid','$username','$password')";

    if (mysqli_query($conn, $sql)) {
        echo "
                    <script>
                        window.location.href='publisher.php';
                    </script>
                ";
    } else {
        echo "error:" . mysqli_error($conn);
    }
}
?>
<?php
include "navbar1.php";
?>
<div class="form-container">
    <div class="h-1">Add Publisher</div>
    <div class="add-news form">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
            <div class="input">
                <label for="nam">Enter Name : </label>
                <input type="text" name="name" id="name" placeholder="Name" required>
            </div>
            <div class="input">
                <label for="mail">Enter Email : </label>
                <input type="email" name="email" id="email" placeholder="email@gmail.com" required>
            </div>
            <div class="input">
                <label for="mobil">Enter Mobile no : </label>
                <input type="tel" name="mobile" id="mobile" placeholder="1234567890" required>
            </div>
            <div class="input">
                <label for="usr">Enter Username : </label>
                <input type="text" name="user" id="user" placeholder="User@12345" required>
            </div>
            <div class="input">
                <label for="pass">Enter Password : </label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="input">
                <div class="submit">
                    <button type="submit" name="submit" class="btn">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include "navbar2.php";
?>