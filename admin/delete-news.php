<?php
    include "config.php";
    $id = $_GET['id'];
    $cid = $_GET['cid'];
    $sql = "SELECT * FROM news WHERE newsId=$id;";
    $result = mysqli_query($conn,$sql) or die("Query failed");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            unlink('../upload/'.$row['Image']);
        }
    }
    $query = "DELETE FROM news where newsId = $id;";
    $query .= "UPDATE category set totalNews = totalNews-1 WHERE categoryId=$cid";
    if(mysqli_multi_query($conn,$query))
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