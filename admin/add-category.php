<?php
include "config.php";
if (isset($_POST['submit'])) {
    $categoryName = $_POST['category'];
    $query = "INSERT INTO category(categoryName) VALUES ('$categoryName');";
    if (mysqli_query($conn, $query)) {
        echo "
                    <script>
                        alert('Category inserted successfully');
                        window.location.href='category.php';
                    </script>
                ";
    } else {
        echo "query failed";
    }
}
?>
<?php
include "navbar1.php";
?>
<div class="form-container">
    <div class="h-1">Add News</div>
    <div class="add-news form">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
            <div class="input">
                <label for="ttl">Category Name</label>
                <input type="text" name="category" id="category" placeholder="Category Name" required>
            </div>
            <div class="input">
                <div class="submit">
                    <button name="submit" type="submit" class="btn">ADD</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include "navbar2.php";
?>