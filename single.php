<?php
include "navbar.php";
?>
<div class="main">
    <div class="main-container">
        <?php
        include "side-navbar.php";
        ?>
        <div class="single">
            <?php
            include "config.php";
            $nid = $_GET['id'];
            $query = "SELECT news.newsId, news.newsCategory, news.newsTitle, news.newsDescription, news.Image, news.newsDate, news.postBy, news.username,news.name,category.categoryId,category.categoryName FROM news LEFT JOIN category ON news.newsCategory=category.categoryId WHERE news.newsId=$nid;";
            $result = mysqli_query($conn, $query) or die("Query Failed");
            if (mysqli_num_rows($result) > 0) {
            ?>
                <div class="container">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="single-news">
                            <div class="topic">
                                <i class="fas fa-flag"></i>
                                <a href="category-news.php?categoryId=<?php echo $row['categoryId']; ?>" class="ttl"><?php echo $row['categoryName']; ?></a>
                            </div>
                            <div class="image">
                                <img src="./upload/<?php echo $row['Image']; ?>" alt="<?php echo $row['Image']; ?>">
                            </div>
                            <div class="heading">
                                <div class="h-3"><?php echo $row['newsTitle']; ?></div>
                            </div>
                            <div class="top">
                                <div class="date"><i class="far fa-calendar-alt"></i> <?php echo $row['newsDate']; ?></div>
                                <!-- <div class="share">
                                    <a href="#" class="social">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a href="#" class="social">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="social">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div> -->
                            </div>
                            <div class="content">
                                <?php echo $row['newsDescription']; ?>
                            </div>
                            <div class="publishby">Publish by : <?php echo $row['name']; ?></div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>