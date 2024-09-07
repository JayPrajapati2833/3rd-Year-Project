<?php
include "navbar1.php";
?>
<div class="container1">
    <?php
    include "config.php";
    $limit = 10;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $offset = ($page - 1)  * $limit;
    $publisherId = $_GET['publisherId'];
    $query = "SELECT * FROM publisher where publisherId=$publisherId LIMIT {$offset},{$limit};";
    $result = mysqli_query($conn, $query) or die("Query failed");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $publisherName = $row['username'];
    ?>
            <div class="user-container">
                <div class="container">
                    <div class="header">
                        <span><?php echo $publisherName; ?></span>
                    </div>
                    <table border="1">
                        <thead>
                            <th>News Category</th>
                            <th>News Title</th>
                            <th>Image</th>
                            <th>Publish</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            $query2 = "SELECT news.newsId, news.newsCategory, news.newsTitle, news.newsDescription, news.Image, news.newsDate, news.postBy, news.userId, news.userName, news.name, news.publish, category.categoryId,category.categoryName FROM news LEFT JOIN publisher ON news.userId=publisher.publisherId LEFT JOIN category ON news.newsCategory=category.categoryId WHERE news.postBy='publisher' AND news.userName='$publisherName';";
                            $result2 = mysqli_query($conn, $query2) or die("Query failed");
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                                    <tr>
                                        <td><?php echo $row2['categoryName']; ?></td>
                                        <td><?php echo $row2['newsTitle']; ?></td>
                                        <td><img src="../upload/<?php echo $row2['Image']; ?>"></td>
                                        <td><?php echo $row2['publish']; ?></td>
                                        <td><a href="delete-news.php?id=<?php echo $row2['newsId']; ?>&cid=<?php echo $row2['categoryId']; ?>"><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                    <?php
                        $qrypagination = "SELECT news.newsId, news.newsCategory, news.newsTitle, news.newsDescription, news.Image, news.newsDate, news.postBy, news.userId, news.userName, news.name, category.categoryId,category.categoryName FROM news LEFT JOIN publisher ON news.userId=publisher.publisherId LEFT JOIN category ON news.newsCategory=category.categoryId WHERE news.postBy='publisher' AND news.userName='$publisherName';";
                        $resultpagination = mysqli_query($conn, $qrypagination) or die("Query failed");
            
                        if (mysqli_num_rows($resultpagination) > 0) {
                            $total_record = mysqli_num_rows($resultpagination);
            
                            $total_page = ceil($total_record / $limit);
                            echo '<div class="pagination">';
                            echo "<ul>";
                            if ($page > 1) {
                                echo "<li class='btn'><a href='publisher-news.php?page=" . ($page - 1) . "' class='btn'>Prev</a></li>";
                            }
                            for ($i = 1; $i <= $total_page; $i++) {
                                if ($i == $page) {
                                    $active = "active";
                                } else {
                                    $active = "";
                                }
                                echo '<li class="' . $active . ' btn"><a href="publisher-news.php?page=' . $i . '" >' . $i . '</a></li>';
                            }
                            if ($total_page > $page)
                                echo "<li class='btn'><a href='publisher-news.php?page=" . ($page + 1) . "'>Next</a></li>";
                            echo "</ul>";
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
<?php }
                        }
                    } ?>
</div>
<?php
include "navbar2.php";
?>