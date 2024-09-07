<?php
include "navbar1.php";
?>
<div class="container1">
    <div class="user-container">
        <div class="container">
            <div class="header">
                <span>ALL CATEGORY</span>
                <a href="add-category.php" class="btnradius">Add Category</a>
            </div>
            <?php
            include "config.php";
            $limit = 5;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $offset = ($page - 1)  * $limit;
            $query = "SELECT * FROM category  LIMIT {$offset},{$limit};;";
            $result = mysqli_query($conn, $query) or die("Query failed");
            if (mysqli_num_rows($result) > 0) {
            ?>
                <table border="1">
                    <thead>
                        <th>Category Name</th>
                        <th>No. of News</th>
                        <th>Edit</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['categoryName'] ?></td>
                                <td><?php echo $row['totalNews'] ?></td>
                                <td><a href="update-category.php?id=<?php echo $row['categoryId']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php }
            $qrypagination = "SELECT * FROM category";
            $resultpagination = mysqli_query($conn, $qrypagination) or die("Query failed");

            if (mysqli_num_rows($resultpagination) > 0) {
                $total_record = mysqli_num_rows($resultpagination);

                $total_page = ceil($total_record / $limit);
                echo '<div class="pagination">';
                echo "<ul>";
                if ($page > 1) {
                    echo "<li class='btn'><a href='category.php?page=" . ($page - 1) . "' class='btn'>Prev</a></li>";
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo '<li class="' . $active . ' btn"><a href="category.php?page=' . $i . '" >' . $i . '</a></li>';
                }
                if ($total_page > $page)
                    echo "<li class='btn'><a href='category.php?page=" . ($page + 1) . "'>Next</a></li>";
                echo "</ul>";
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
<?php
include "navbar2.php";
?>