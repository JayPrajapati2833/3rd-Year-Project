<?php
    include "config.php";
    $id = $_GET['id'];
    $cid = $_GET['cid'];

    $query = "DELETE FROM news where newsId = $id;";
    $query .= "UPDATE category set totalNews = totalNews-1 WHERE categoryId=$cid";
    if(mysqli_multi_query($conn,$query))
    {
        echo "<script>
                alert('news deleted');
                window.location.href='publish.php';
                </script>";
            }
            else{
                echo "<script>
                        alert('news not deleted');
                        window.location.href='publish.php';
                    </script>";
    }
?>