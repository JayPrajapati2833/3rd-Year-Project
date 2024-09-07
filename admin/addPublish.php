<?php
    include "config.php";
    $id = $_GET['id'];
    $query = "SELECT news.newsId, news.newsCategory, news.newsTitle, news.newsDescription, news.Image, news.newsDate, news.postBy, news.username,news.name,category.categoryId,category.categoryName FROM news LEFT JOIN category ON news.newsCategory=category.categoryId WHERE news.newsId=$id;";
    $result = mysqli_query($conn,$query) or die("query failed");
    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $categoryId = $row['categoryId'];
            $update = "UPDATE news set `publish`='published' WHERE newsId= $id;";
            $update .= "UPDATE `category` SET `totalNews` = `totalNews`+1 WHERE `categoryId` = $categoryId";
            if(mysqli_multi_query($conn,$update))
            {
                echo "<script>
                        alert('news published');
                        window.location.href='publish.php';
                </script>";
            }
            else{
                echo "<script>
                    alert('news not published');
                </script>"; 
            }
        }
    }
?>