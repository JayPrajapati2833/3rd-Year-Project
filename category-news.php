<?php
include "navbar.php";
?>
<div class="main">
    <div class="main-container">
        <?php
        include "side-navbar.php";
        ?>
        <div class="container">
            <?php
            include "config.php";
            $catId=$_GET['categoryId'];
            $query = "SELECT news.newsId, news.newsCategory, news.newsTitle, news.newsDescription, news.Image, news.newsDate, news.postBy, news.username,category.categoryId,category.categoryName FROM news LEFT JOIN category ON news.newsCategory=category.categoryId WHERE categoryId='$catId' AND publish='published' ORDER BY news.newsId DESC;";
            $result = mysqli_query($conn, $query) or die("Query Failed");
            if (mysqli_num_rows($result) > 0) {
            ?>
                <div class="news">
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="news-container">
                        <div class="one">
                            <div class="image">
                                <img src="./upload/<?php echo $row['Image']; ?>" alt="<?php echo $row['Image']; ?>">
                            </div>
                            <div class="news-content">
                                <div class="top">   
                                    <div class="topic">
                                        <i class="fas fa-<?php echo $row['categoryName']?>"></i>
                                        <a href="category-news.php?categoryId=<?php echo $row['categoryId']; ?>" class="ttl"><?php echo $row['categoryName']; ?></a>
                                    </div>
                                    <div class="date"><i class="far fa-calendar-alt"></i> <?php echo $row['newsDate']; ?> </div>
                                </div>
                                <a href="single.php?id=<?php echo $row['newsId']; ?>" class="h-4"><?php echo $row['newsTitle']; ?></a>
                                <div class="content">
                                    <?php echo substr($row['newsDescription'],0,200); ?>
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
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
                            <a href="single.php?id=<?php echo $row['newsId']; ?>" class="btn readmore">Read more</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>