<?php
include "navbar1.php";
$id = $_GET['id'];
if(isset($_POST['update'])){
$categoryName = $_POST['category'];
$update = "UPDATE category SET categoryName='$categoryName' WHERE categoryId=$id";
if (mysqli_query($conn, $update)) {
    echo "<script>
    alert('Category Updated');
    window.location.href='category.php';
        </script>";
} else {
    echo "<script>
                        alert('Category Not Updated');
                        window.location.href='category.php';
                    </script>";
}}
?>
<div class="form-container">
    <div class="h-1">Update News</div>
    <div class="add-news form">
        <?php
        $query = "SELECT * FROM category WHERE categoryId = $id";
        $result = mysqli_query($conn, $query) or die("Query Failed");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
                    <div class="input">
                        <label for="ttl">Category Name</label>
                        <input type="text" name="category" id="category" value=<?php echo $row['categoryName']; ?>>
                    </div>
                    <div class="input">
                        <div class="submit">
                            <button type="submit" name="update" class="btn">Update</button>
                        </div>
                    </div>
                </form>
        <?php
            }
        }
        ?>
    </div>
</div>
<?php
include "navbar2.php";
?>