<?php
include "navbar.php";
?>
<div class="form-container">
    <div class="h-1">Add News</div>
    <div class="add-news form">
        <form action="save_news.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <!-- <div class="input">
                <input type="hidden" name="postId" value="<?php echo $_POST['postId'] ?>">
            </div> -->
            <div class="input">
                <label for="cat">Select Category</label>
                <select name="category" id="category">
                    <?php
                        include "config.php";
                        $query = "SELECT * FROM category";
                        $result = mysqli_query($conn,$query) or die("Query Failed");
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option value={$row['categoryId']}>{$row['categoryName']}</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="input">
                <label for="ttl">News title</label>
                <input type="text" name="title" id="title" placeholder="Title">
            </div>
            <div class="input">
                <label for="dis">News Discription</label>
                <textarea name="discription" id="discription" cols="30" rows="7" placeholder="Discription"></textarea>
            </div>
            <div class="input">
                <label for="img">Select Image</label>
                <input type="file" name="newsImage" id="image">
            </div>
            <div class="input">
                <div class="submit">
                    <button type="submit" class="btn">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>