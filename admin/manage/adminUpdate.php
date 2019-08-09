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

        $query = "UPDATE `admin` SET username='$username', email='$email', password='" .md5($password). "' WHERE id='$id' ";
        $result = mysqli_query($conn,$query);
        header('Location: admin.php');
    }
?>