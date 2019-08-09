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
    <?php require('../db.php'); include('../auth.php'); include('navbar.php'); include('sidebar.php'); ?>
    <div class="data-post">
        <h1>Data Admin</h1>

        <div class="table-post">
            <h2>Admin</h2>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM admin";
                        $result = mysqli_query($conn,$query);

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                $id = $row["id"];
                                echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . "<a href=' adminDelete.php? id=$id'>" . "Delete" . "</a>" . " " . " " . "<a href='? id=$id'>" . "Update" . "</a>" . "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <h1>Form</h1>
        <div class="add-post">
            <h2>Add</h2>

            <form class="form-add" action="adminInsert.php" method="post">
                <label for="username">Username</label> <br>
                <input type="text" class="inp-post" name="username" id=""> <br>
                <label for="email">Email</label> <br>
                <input type="email" class="inp-post" name="email" id=""> <br>
                <label for="password">Password</label> <br>
                <input type="password" class="inp-post" name="password" id=""> <br>
                <input type="submit" name="Submit" class="btn-post" id="">
            </form>

        </div>

        <div class="edit-admin">
            <h2>Edit Form</h2>
           <form action="adminUpdate.php" method="post" class="form-add">
               <label for="id">Id</label> <br>
               <input type="number" value="<?php echo $_GET["id"]; ?>" class="inp-post" name="id" id=""> <br>
               <label for="username">Username</label> <br>
               <input type="text" name="username" class="inp-post" id=""> <br>
               <label for="email">Email</label> <br>
               <input type="email" name="email" class="inp-post" id=""> <br>
               <label for="password">Password</label> <br>
               <input type="password" name="password" class="inp-post" id=""> <br>
               <input type="submit" name="submit" class="btn-post" value="Submit" id="">
           </form>
        </div>
    </div>
</body>
</html>