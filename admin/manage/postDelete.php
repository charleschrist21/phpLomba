<?php
    require('../db.php');
    $id = $_GET['id'];
    if($id > 0){
        $query = "DELETE  FROM `data` WHERE id='$id' ";
        $result = mysqli_query($conn,$query); 
        header("Location: post.php");
    }
    
    
?>