<?php
    require('../db.php');
    include('../auth.php');

    if(isset($_REQUEST["id"])){
        $id = stripslashes($_REQUEST['id']);
        $id = mysqli_real_escape_string($conn, $id);
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn,$email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn,$password);

        $fileDir = "image/admin/";
        $fileName = trim($username . md5($password) . ".jpg");
        $targetFile = $fileDir . $fileName;

        move_uploaded_file($_FILES["image"]["tmp_name"],$targetFile);

        $query = "UPDATE `admin` SET username='$username', email='$email', password='" .md5($password). "', image='$fileName'  WHERE id='$id' ";
        $result = mysqli_query($conn,$query);
        header('Location: admin.php');
    }
?>