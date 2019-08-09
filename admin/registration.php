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
    if(isset($_REQUEST["username"])){
        $username = stripslashes($_REQUEST["username"]);
        $username = mysqli_real_escape_string($conn,$username);
        $email = stripslashes($_REQUEST["email"]);
        $email = mysqli_real_escape_string($conn,$email);
        $password = stripslashes($_REQUEST["password"]);
        $password = mysqli_real_escape_string($conn,$password);


        $query = "INSERT into `admin` (username,email,password) VALUES('$username','$email','" .md5($password). "')";

        $result = mysqli_query($conn,$query);
    }
    ?>
    <form class="login" action="" method="post">
    <h1 class="login-title">Sign Up</h1>
    <input type="text" name="username" placeholder="Username" class="login-input">
    <input type="text" name="email" placeholder="Email" class="login-input">
    <input type="password" name="password" placeholder="Password" class="login-input">
    <input type="submit"  name="submit" value="Signup" class="login-button">
    </form>
</body>
</html>