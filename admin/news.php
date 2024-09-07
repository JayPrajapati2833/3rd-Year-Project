<?php
include "navbar1.php";
?>
<div class="container1">
    <div class="user-container">
        <div class="container">
            <div class="header">
                <span>NEWS</span>
                <a href="add-news.php" class="btnradius">Add News</a>
            </div>
            <?php
                include "config.php";
                $limit = 5;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $offset = ($page - 1)  * $limit;
                $query = "SELECT news.newsId, news.newsCategory, news.newsTitle, news.newsDescription, news.Image, news.newsDate, news.postBy, news.userName,news.name,news.publish,category.categoryId,category.categoryName FROM news LEFT JOIN category ON news.newsCategory=category.categoryId WHERE publish='published' ORDER BY news.newsId DESC LIMIT {$offset},{$limit};";
                $result = mysqli_query($conn,$query) or die("Query failed");
                if(mysqli_num_rows($result) > 0)
                {
            ?>
            <table border="1">
                <thead>
                    <th>News Category</th>
                    <th>News Title</th>
                    <th>Image</th>
                    <th>Post By</th>
                    <th>Username</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                    ?>
                    <tr>
                        <td><?php echo $row['categoryName']; ?></td>
                        <td><?php echo $row['newsTitle']; ?></td>
                        <td><img src="../upload/<?php echo $row['Image']; ?>" alt="<?php echo $row['Image']; ?>"></td>
                        <td><?php echo $row['postBy']; ?></td>
                        <td><?php echo $row['userName']; ?></td>
                        <td><a href="update-news.php?id=<?php echo $row['newsId'];?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="delete-news.php?id=<?php echo $row['newsId']; ?>&cid=<?php echo $row['categoryId']; ?>"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } 
                $qrypagination = "SELECT * FROM news";
                $resultpagination = mysqli_query($conn, $qrypagination) or die("Query failed");
    
                if (mysqli_num_rows($resultpagination) > 0) {
                    $total_record = mysqli_num_rows($resultpagination);
    
                    $total_page = ceil($total_record / $limit);
                    echo '<div class="pagination">';
                    echo "<ul>";
                    if ($page > 1) {
                        echo "<li class='btn'><a href='news.php?page=" . ($page - 1) . "' class='btn'>Prev</a></li>";
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<li class="' . $active . ' btn"><a href="news.php?page=' . $i . '" >' . $i . '</a></li>';
                    }
                    if ($total_page > $page)
                        echo "<li class='btn'><a href='news.php?page=" . ($page + 1) . "'>Next</a></li>";
                    echo "</ul>";
                    echo '</div>';
                }
            ?>
            
        </div>
    </div>
</div>
<?php
include "navbar2.php";
?>