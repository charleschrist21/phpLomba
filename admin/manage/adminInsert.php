<?php
    require('../db.php');
    include('../auth.php');

    if(isset($_REQUEST["password"])){
        $username = stripslashes($_REQUEST["username"]);
        $username = mysqli_real_escape_string($conn, $username);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn,$email);
        $password = stripslashes($_REQUEST["password"]);
        $password = mysqli_real_escape_string($conn, $confirmPassword);

        $fileDir = "image/admin/";
        $fileName = trim($username . " . md5($password) ." . ".jpg");
        $target_file = $fileDir . $fileName;

        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            $query = "INSERT into `admin` (username,email,password,image) VALUES ('$username', '$email', '" .md5($password). "', '$fileName' )";
            $result = mysqli_query($conn,$query);

        header('Location: admin.php');


        
    }
?>