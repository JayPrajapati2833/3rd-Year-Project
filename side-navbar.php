<?php
include "config.php";
$query = "SELECT * FROM category WHERE totalNews>0";
$result = mysqli_query($conn, $query) or die("Query failed");
if (mysqli_num_rows($result) > 0) {
?>
    <div class="side-navbar">
        <ul>
            <li>
                <a href="latestnews.php" class="links">
                    <!-- <span><i class="fas fa-star"></i></span> -->
                    <span>Latest News</span>
                </a>
            </li>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <li>
                    <a href="category-news.php?categoryId=<?php echo $row['categoryId']; ?>" class="links">
                        <!-- <span><i class="fas fa-star"></i></span> -->
                        <span><?php echo $row['categoryName']; ?></span>
                    </a>
                </li>
            <?php } ?>
        </ul>

        <footer>
            
            <p>Copyright &#169; | All rights are reserved</p>
        </footer>
    </div>
<?php } ?>