<?php
include "navbar1.php";
?>
<div class="news-publish">
    <?php
        $nid = $_GET['id'];
        $query = "SELECT news.newsId, news.newsCategory, news.newsTitle, news.newsDescription, news.Image, news.newsDate, news.postBy, news.username,news.name,category.categoryId,category.categoryName FROM news LEFT JOIN category ON news.newsCategory=category.categoryId WHERE news.newsId=$nid;";
        $result = mysqli_query($conn, $query) or die("Query Failed");
        if (mysqli_num_rows($result) > 0) {
    ?>
    <div class="news">
        <?php
            while($row=mysqli_fetch_assoc($result)){
        ?>
        <div class="news-content">
            <div class="top">
                <p><?php echo $row['categoryName'];?></p>
                <a href="addPublish.php?id=<?php echo $nid?>" class="publishBtn">publish</a>
            </div>
            <div class="image">
                <img src="../upload/<?php echo $row['Image']; ?>" alt="<?php echo $row['Image']; ?>">
            </div>
            <div class="heading">
                <div class="h-3"><?php echo $row['newsTitle']; ?></div>
            </div>
            <div class="content">
            <?php echo $row['newsDescription']; ?>
            </div>
            <div class="publishby">publish by : <?php echo $row['name']; ?></div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>
<?php
include "navbar2.php";
?>