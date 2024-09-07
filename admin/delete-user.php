<?php
    include "config.php";
    $id=$_GET['id'];
    $query = "DELETE FROM user WHERE userId = $id";
    if(mysqli_query($conn,$query))
    {
        echo "<script>
                alert('User deleted');
                window.location.href='user.php';
            </script>";
    }
    else{
        echo "<script>
                alert('user not deleted');
                window.location.href='user.php';
            </script>";
}
?>