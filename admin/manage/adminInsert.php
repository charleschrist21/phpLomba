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

        $query = "INSERT into `admin` (username,email,password) VALUES ('$username', '$email', '" .md5($password). "' )";
        $result = mysqli_query($conn,$query);

        header('Location: admin.php');
    }
?>