<?php
    include "config.php";
    $query = "SELECT categoryName,totalNews FROM category WHERE totalNews>0";
    $result = mysqli_query($conn,$query) or die("Query Failed");
    $data = array();
    foreach($result as $row)
    {
        $data[] = $row;
    }
    print(json_encode($data));
?>