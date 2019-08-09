<?php
    include('../db.php');
    include('../auth.php');

    if(isset($_REQUEST["id"])){
        $id = stripslashes($_REQUEST["id"]);
        $id = mysqli_real_escape_string($conn,$id);
        $title = stripslashes($_REQUEST["title"]);
        $title = mysqli_real_escape_string($conn,$title);
        $description = stripslashes($_REQUEST["description"]);
        $description = mysqli_real_escape_string($conn,$description);
        $photoBy = stripslashes($_REQUEST["photoBy"]);
        $photoBy = mysqli_real_escape_string($conn,$photoBy);

        $postBy = $_SESSION["username"];

        $fileDir = "image/";
        $fileName = trim($title . $postBy . $photoBy . ".jpg");
        $targetFile = $fileDir . $fileName;

        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
            $query = "UPDATE `data` SET title='$title', description='$description',postBy='$postBy' , photoBy='$photoBy',image='$fileName' WHERE id='$id'";
            $result = mysqli_query($conn,$query);
            header('Location: post.php');
        }
    }
?>