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
<a href="post.php" class="post-btn">POSTINGAN</a>
        <br>
        <a href="admin.php" class="admin-btn">ADMIN</a>
    <div class="sidebar">
        <?php 
            require('../db.php');
            include('../auth.php');

            $username = $_SESSION["username"];

            $query = "SELECT * FROM `admin` WHERE username='$username' ";
            
            $result = mysqli_query($conn,$query);

            $data = mysqli_fetch_array($result);

            $image = "image/admin/" . $data["image"];
            echo "<div class='txt-user-admin'>";
            echo "<h3 class='username-admin'>" . $_SESSION["username"] . "</h3>";
            echo "<div class='icon-online' >" . "" . "</div>";
            echo "<p class='txt-online'>" . "online" .  "</p>";
            
            echo "</div>";
            echo "<img src='$image' alt='' class='image-admin'>" . "<br>";
            
        ?>
        <div class="menu"><p>Menu</p></div>
        
    </div>
    
</body>
</html>