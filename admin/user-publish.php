<?php
include "navbar1.php";
?>
<div class="container1">
    <div class="user-container">
        <div class="container">
            <?php
            include "config.php";
            $limit = 5;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $offset = ($page - 1)  * $limit;
            $id = $_GET['id'];
            $query = "SELECT * FROM user where userId=$id LIMIT {$offset},{$limit};";
            $result = mysqli_query($conn, $query) or die("Query Failed");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="header">
                        <span><?php echo $row['username']; ?></span>
                    </div>
                    <table border="1">
                        <thead>
                            <th>Publish Id</th>
                            <th>News Category</th>
                            <th>News Title</th>
                            <th>Image</th>
                            <th>Publish</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            $username = $row['username'];
                            $query2 = "SELECT news.newsId, news.newsCategory, news.newsTitle, news.newsDescription, news.Image, news.newsDate, news.postBy, news.userId, news.userName,news.publish, news.name, category.categoryId,category.categoryName FROM news LEFT JOIN publisher ON news.userId=publisher.publisherId LEFT JOIN category ON news.newsCategory=category.categoryId WHERE news.postBy='user' AND news.userName='$username'";
                            $result2 = mysqli_query($conn, $query2) or die("Query failed");
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                                    <tr>
                                        <td><?php echo $row2['newsId']; ?></td>
                                        <td><?php echo $row2['categoryName']; ?></td>
                                        <td><?php echo $row2['newsTitle']; ?></td>
                                        <td><img src="../upload/<?php echo $row2['Image']; ?>" alt=""></td>
                                        <td><?php echo $row2['publish']; ?></td>
                                        <td><a href="delete-news.php?id=<?php echo $row2['newsId']; ?>&cid=<?php echo $row2['categoryId']; ?>"><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
            <?php }
            }
            $qrypagination = "SELECT * FROM user where userId=$id";
            $resultpagination = mysqli_query($conn, $qrypagination) or die("Query failed");

            if (mysqli_num_rows($resultpagination) > 0) {
                $total_record = mysqli_num_rows($resultpagination);

                $total_page = ceil($total_record / $limit);
                echo '<div class="pagination">';
                echo "<ul>";
                if ($page > 1) {
                    echo "<li class='btn'><a href='user-publish.php?page=" . ($page - 1) . "' class='btn'>Prev</a></li>";
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo '<li class="' . $active . ' btn"><a href="user-publish.php?page=' . $i . '" >' . $i . '</a></li>';
                }
                if ($total_page > $page)
                    echo "<li class='btn'><a href='user-publish.php?page=" . ($page + 1) . "'>Next</a></li>";
                echo "</ul>";
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
<?php
include "navbar1.php";
?>