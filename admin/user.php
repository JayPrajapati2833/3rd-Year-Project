<?php
include "navbar1.php";
?>
<div class="container1">
    <div class="user-container">
        <div class="container">
            <div class="header">
                <span>USER</span>
                <a href="add-user.php" class="btnradius">Add User</a>
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
            $query = "SELECT * FROM user  LIMIT {$offset},{$limit};";
            $result = mysqli_query($conn, $query) or die("Query Failed");
            if (mysqli_num_rows($result) > 0) {
            ?>
                <table border="1">
                    <thead>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Email Id</th>
                        <th>Username</th>
                        <th>News</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td>+91 <?php echo $row['mobileNo']; ?></td>
                                <td><?php echo $row['emailId']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><button class="btn"><a href="user-publish.php?id=<?php echo $row['userId']; ?>">See more</a></button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php
            }
            $qrypagination = "SELECT * FROM user";
            $resultpagination = mysqli_query($conn, $qrypagination) or die("Query failed");

            if (mysqli_num_rows($resultpagination) > 0) {
                $total_record = mysqli_num_rows($resultpagination);

                $total_page = ceil($total_record / $limit);
                echo '<div class="pagination">';
                echo "<ul>";
                if ($page > 1) {
                    echo "<li class='btn'><a href='user.php?page=" . ($page - 1) . "' class='btn'>Prev</a></li>";
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo '<li class="' . $active . ' btn"><a href="user.php?page=' . $i . '" >' . $i . '</a></li>';
                }
                if ($total_page > $page)
                    echo "<li class='btn'><a href='user.php?page=" . ($page + 1) . "'>Next</a></li>";
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