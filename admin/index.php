<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    require('db.php');
    session_start();
    if(isset($_POST["username"])){
        $username = stripslashes($_REQUEST["username"]);
        $username = mysqli_real_escape_string($conn,$username);
        $password = stripslashes($_REQUEST["password"]);
        $password = mysqli_real_escape_string($conn,$password);

        $query = "SELECT * FROM `admin` WHERE username='$username' and password='".md5($password)."'";

        $result = mysqli_query($conn, $query);

        $rows = mysqli_num_rows($result);
        // var_dump($query);
        // var_dump($rows);

        if($rows == 1){
            $_SESSION['username'] = $username;
            header('Location: manage/post.php');
        }else{
            $authSalah = "*username/password salah*"; 
        }
        
        
    }
    ?>
    <form action="" class="login" method='post'>
        <h1 class="login-title">Login</h1>
        <input type="text" name="username" placeholder="Username" class="login-input">
        <input type="password" name="password" placeholder="Password" class="login-input">
        <label class="auth-salah" for=""><?php echo $authSalah; ?></label>
        <input type="submit" name="submit" value="Login" class="login-button">
    </form>
</body>
</html>