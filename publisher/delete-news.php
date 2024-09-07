<?php
    include "config.php";
    $id = $_GET['id'];
    $query = "DELETE FROM news where newsId = $id";
    if(mysqli_query($conn,$query))
    {
        echo "<script>
                alert('news deleted');
                window.location.href='news.php';
                </script>";
            }
            else{
                echo "<script>
                        alert('news not deleted');
                        window.location.href='news.php';
                    </script>";
    }
?>