<?php 
include('../db.php');
include('../auth.php');
                if(isset($_REQUEST["title"])){
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

                
                    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile) ;
                        $query = "INSERT into `data` (title, description , postBy, photoBy ,image) VALUES('$title','$description','$postBy','$photoBy','$fileName')";

                        $result = mysqli_query($conn,$query);
                    
                        header('Location: post.php');
          

                    }
            ?>