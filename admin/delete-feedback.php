<?php
        include "config.php";
        $id = $_GET['id'];
        $query = "DELETE FROM feedback where id = $id;";
        if(mysqli_query($conn,$query)){
            echo "<script>
            alert('feedback deleted');
            window.location.href='feedback.php';
            </script>";
        }
        else{
            echo "<script>
                    alert('feedback not deleted');
                    window.location.href='feedback.php';
                </script>";
}
?>