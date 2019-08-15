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
    <div class="title-menu-nav">
        <h2>Jeparaku</h2>
    </div>
    <div class="title-nav">
        <h2><?php echo $_SESSION["username"]; ?></h2>
        <button onclick="window.location.href='http://localhost:8888/sinaudua/admin/logout.php'">Exit</button>
    </div>
</body>
</html>