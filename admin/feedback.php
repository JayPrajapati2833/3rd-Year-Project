<?php
include "navbar1.php";
?>
<div class="container1">
    <div class="user-container">
        <div class="container">
            <div class="header">
                <span>FEEDBACK</span>
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
                $query = "SELECT * FROM feedback LIMIT {$offset},{$limit};;";
                $result = mysqli_query($conn,$query) or die("Query Failed");
                if(mysqli_num_rows($result)>0){
            ?>
            <table border="1">
                <thead>
                    <th>User Name</th>
                    <th>Email-id</th>
                    <th>Description</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['emailId']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><a href="delete-feedback.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
            <?php } 
                
            ?>
                </tbody>
            </table>
            <?php } 
            $qrypagination = "SELECT * FROM feedback";
            $resultpagination = mysqli_query($conn, $qrypagination) or die("Query failed");

            if (mysqli_num_rows($resultpagination) > 0) {
                $total_record = mysqli_num_rows($resultpagination);

                $total_page = ceil($total_record / $limit);
                echo '<div class="pagination">';
                echo "<ul>";
                if ($page > 1) {
                    echo "<li class='btn'><a href='feedback.php?page=" . ($page - 1) . "' class='btn'>Prev</a></li>";
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo '<li class="' . $active . ' btn"><a href="feedback.php?page=' . $i . '" >' . $i . '</a></li>';
                }
                if ($total_page > $page)
                    echo "<li class='btn'><a href='feedback.php?page=" . ($page + 1) . "'>Next</a></li>";
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