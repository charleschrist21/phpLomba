<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Postingan</title>
</head>
<body>
    <?php require('../db.php'); include('../auth.php'); include('navbar.php'); include('sidebar.php'); ?>
    <div class="data-post">
        <h1>Data Post</h1>
        
        <div class="table-post">
            <h2>Event</h2>
            <form action="" method="get" class="form-search">
                <label for="search">Search</label>
                <input type="text" name="search" id="">
                <input type="submit"  value="Search" name="" id="">
            </form>
            
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Category</td>
                        <td>Post By</td>
                        <td>Photo By</td>
                        <td>Image</td>
                        <td class="action-txt">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(isset($_GET['search'])){
                    $cari = $_GET['search'];
                    $query = "SELECT * FROM data WHERE title like '%".$cari."%' ";
                    $result = mysqli_query($conn,$query);
                    
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $image = 'image/post/'.$row["image"];
                            $id = $row[id];
                            echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["title"] . "</td>";
                                echo "<td>" . $row["category"] . "</td>";
                                echo "<td>" . $row["postBy"] . "</td>";
                                echo "<td>" . $row["photoBy"] . "</td>";
                                echo "<td>" ;
                                echo '<img src="'. $image .'" class="img" />';
                                echo "</td>";
                                echo "<td>" . "<a href=' postDelete.php? id=$id ' class='delete-btn' onclick=\"return confirm('are you sure to delete?')\">" . "Delete" . "</a>" . " ". " ". "<a href=' ? id=$id' class='update-btn' >" . " Update " . "</a>" . "</td>";
                            echo "</tr>";
                        }
                    }
                    }else{

                    $query = "SELECT * FROM data ";
                    $result = mysqli_query($conn,$query);
                    
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $image = 'image/post/'.$row["image"];
                            $id = $row[id];
                            echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["title"] . "</td>";
                                echo "<td>" . $row["category"] . "</td>";
                                echo "<td>" . $row["postBy"] . "</td>";
                                echo "<td>" . $row["photoBy"] . "</td>";
                                echo "<td>" ;
                                echo '<img src="'. $image .'" class="img" />';
                                echo "</td>";
                                echo "<td>" . "<a href=' postDelete.php? id=$id ' class='delete-btn' onclick=\"return confirm('are you sure to delete?')\">" . "Delete" . "</a>" . " ". " ". "<a href=' ? id=$id' class='update-btn' >" . " Update " . "</a>" . "</td>";
                            echo "</tr>";
                        }
                    }
                }

                    ?>
                </tbody>
            </table>
        </div>
        <h1>Form</h1>
        <div class="add-post">
            <h2>Add</h2>
           
            <form class="form-add" action="postInsert.php" method="post" enctype="multipart/form-data">
                <label for="title">Title</label> <br>
                <input type="text" class="inp-post" name="title" id=""> <br>
                <label for="category">Category</label><br>
                <select name="category" class="inp-post">
                    <option value="Sea">Sea</option>
                    <option value="Mountain">Mountain</option>
                    <option value="Culinary">Culinary</option>
                    <option value="Culture">Culture</option>
                </select> <br>
                <label for="photoBy">PhotoBy</label> <br>
                <input type="text" class="inp-post" name="photoBy" id=""> <br>
                <label for="description">description</label> <br>
                <textarea name="description" class="text-des" id="" cols="30" rows="10"></textarea> <br>
                <input type="file" name="image" > <br>
                <input type="submit" class="btn-post" name="submit" id="">
            </form>
            
        </div>
        <div class="edit-post">
            <h2>Edit Form</h2>
        <form id="edit-form" class="form-add" action="postUpdate.php" method="post" enctype="multipart/form-data">
                <label for="id">ID</label> <br>
                <input class="inp-post id" type="number" name="id" value="<?php echo $_GET["id"]; ?>" id="" required> <br>
                <label for="title">Title</label> <br>
                <input type="text" class="inp-post" name="title" id="" required> <br>
                <label for="category">Category</label><br>
                <select name="category" class="inp-post">
                    <option value="Sea">Sea</option>
                    <option value="Mountain">Mountain</option>
                    <option value="Culinary">Culinary</option>
                    <option value="Culture">Culture</option>
                </select> <br>
                <label for="photoBy">PhotoBy</label> <br>
                <input type="text" class="inp-post" name="photoBy" id="" required> <br>
                <label for="description">description</label> <br>
                <textarea name="description" class="text-des" id="" cols="30" rows="10" required></textarea> <br>
                <input type="file" name="image" id=""> <br>
                <input type="submit" class="btn-post" name="submit" id="">
            </form>
        </div>
    </div>
</body>
</html>