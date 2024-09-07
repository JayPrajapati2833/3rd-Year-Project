<?php
include "navbar1.php";
?>
<div class="form-container">
    <div class="h-1">Update News</div>
    <div class="add-news form">
        <?php
            $id=$_GET['id'];
            include "config.php";
            $query = "SELECT * FROM news LEFT JOIN category ON news.newsCategory=category.categoryId WHERE newsId=$id";
            $result = mysqli_query($conn,$query) or die("Query failed");
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
        ?>
        
        <form action="save-update-news.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="input">
                <input type="hidden" name="newsId" value="<?php echo $row['newsId']; ?>">
            </div>
            <div class="input">
                <label for="cat">Select Category</label>
                <select name="category" id="category">
                <?php
                        include "config.php";
                        $query1 = "SELECT * FROM category";
                        $result1 = mysqli_query($conn,$query1) or die("Query Failed");
                        if(mysqli_num_rows($result1)>0)
                        {
                            while($row1 = mysqli_fetch_assoc($result1))
                            {
                                if($row['newsCategory']==$row1['categoryId'])
                                {
                                    $selected = "selected";
                                }
                                else{
                                    $selected = "";
                                }
                                echo "<option {$selected} value={$row1['categoryId']}>{$row1['categoryName']}</option>";
                            }
                        }
                    ?>
                </select>
                <input type="hidden" name="old-category" value="<?php echo $row['newsCategory']; ?>">
            </div>
            <div class="input">
                <label for="ttl">News title</label>
                <input type="text" name="title" id="title" value="<?php echo $row['newsTitle']; ?>">
            </div>
            <div class="input">
                <label for="dis">News Discription</label>
                <textarea name="discription" id="discription" cols="30" rows="7"><?php echo $row['newsDescription']; ?>"</textarea>
            </div>
            <div class="input">
                <label for="img">Select Image</label>
                <div class="image">
                    <input type="file" name="newsImage" id="image">
                    <img src="../upload/<?php echo $row['Image']; ?>" alt="" height="100px" width="100px">
                    <input type="hidden" name="old-image" value="<?php echo $row['Image']; ?>">
                </div>
            </div>
            <div class="input">
                <div class="submit">
                    <button type="submit" class="btn">Update</button>
                </div>
            </div>
        </form>
        <?php } } ?>
    </div>
</div>
<?php
include "navbar2.php";
?>