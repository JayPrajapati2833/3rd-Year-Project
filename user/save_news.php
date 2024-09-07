<?php
    include "config.php";
    if(isset($_FILES['newsImage']))
    {
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
            $error[] = "extension of file does not allowed, please select jpeg, jpg or png file";
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
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $newsTitle = mysqli_real_escape_string($conn,$_POST['title']);
    $newsDiscription = mysqli_real_escape_string($conn,$_POST['discription']);
    $date = date('Y-m-d');
    $userId = $_SESSION['userId'];
    $name = $_SESSION['name'];
    
    $username = $_SESSION['username'];
    $query = "INSERT INTO `news`(`newsCategory`, `newsTitle`, `newsDescription`, `Image`, `newsDate`, `postBy`,`publish`, `userId`,`userName`,`name`) VALUES ('$category','$newsTitle','$newsDiscription','$fileName','$date','user','publish','$userId','$username','$name');";

    if(mysqli_query($conn,$query)){
        echo "
                    <script>
                        alert('news inserted successfully.');
                        window.location.href='news.php';
                    </script>
                ";
    }
    else{
        "<p>Query failed</p>";
    }
?>