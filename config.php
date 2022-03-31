<?php 
    $conn = mysqli_connect("localhost", "root", "rootmysql@1#", "simple_img_posts");

    if (!$conn) {
        die("Couldn't connect to database");
    }
?>