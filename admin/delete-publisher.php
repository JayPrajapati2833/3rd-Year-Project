<?php
    include "config.php";
    $id=$_GET['id'];
    $query = "DELETE FROM publisher WHERE publisherId = $id";
    if(mysqli_query($conn,$query))
    {
        echo "<script>
                alert('publisher deleted');
                window.location.href='publisher.php';
            </script>";
    }
    else{
        echo "<script>
                alert('ublisher not deleted');
                window.location.href='publisher.php';
            </script>";
}
?>