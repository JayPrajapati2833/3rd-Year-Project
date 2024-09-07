<?php
    include "config.php";
    if(empty($_FILES['newsImage']['name'])){
        $fileName = $_POST['old-image'];
    }
    else
    {
        unlink('../upload/'.$_POST['old-image']);
        $error = array();
        $fileName = $_FILES['newsImage']['name'];
        $fileSize = $_FILES['newsImage']['size'];
        $fileTmp = $_FILES['newsImage']['tmp_name'];
        $fileType = $_FILES['newsImage']['type'];
        $tmp = explode('.', $fileName);
        $fileExt = end($tmp);
        // $fileExt = strtolower(end(explode('.',$fileName)));
        $extension = array("jpeg","jpg","png","webp","jfif");
        if(in_array($fileExt,$extension) === false){
            $error[] = "extension of file does not allowed, please select jpeg, jpg, webp, jiff or png file";
        }
        if(empty($error) == true){
            move_uploaded_file($fileTmp,"../upload/".$fileName);
        }
        else{
            print_r($error);
            die();
        }
    }
    session_start();
    
    $newsId = $_POST['newsId'];
    $category = $_POST['category'];
    $oldCategory = $_POST['old-category'];
    $newsTitle = $_POST['title'];
    $newsDiscription = $_POST['discription'];
    echo "'$newsId' and $category and $oldCategory and '$newsTitle' and '$newsDiscription' and '$fileName'";
    $query = "UPDATE `news` set `newsCategory`='$category',`newsTitle`='$newsTitle',`newsDescription`='$newsDiscription',`Image`='$fileName' WHERE `newsId`='$newsId'";
    if(mysqli_query($conn,$query)){
        if($oldCategory != $category){
            $query1 = "UPDATE `category` SET totalNews = totalNews-1 WHERE categoryId = '$oldCategory';";
            $query1 .= "UPDATE `category` SET totalNews = totalNews+1 WHERE categoryId = '$category';";
            if(mysqli_multi_query($conn,$query1)){
                header("location: http://localhost/PHP/third_year_project/enews/admin/news.php");
            }
        }
        else{
            header("location: http://localhost/PHP/third_year_project/enews/admin/news.php");
        }
    }
    else{
        echo "Error: " .mysqli_errno($this->$conn);;
    }
?>