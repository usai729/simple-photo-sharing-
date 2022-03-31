<?php 
    header("Allow-Access-Control-Orign: *");

    include "config.php";

    $sql_statement = "SELECT * FROM images ORDER BY id DESC";

    $query_results = mysqli_query($conn, $sql_statement);

    $array = array();
?>

<html>
    <head>
        <title>Home</title>

        <link rel="stylesheet" href="./home.css">
        <meta name="viewport" content="width=device-width" />
    </head>

    <body>
        <div class="top">
            <form action="search_results.php" method="get">
                <input type="text" name="search" id="search" placeholder="Search.." autocomplete="off">
                <input type="submit" name="submit" value="Search">
            </form>
            <a href="http://localhost:8000/post.html" target="post.html" style="color: cyan;">Post new image</a>
        </div>
        <center>
            <div class="container">
                <?php 
                    while ($rows = mysqli_fetch_assoc($query_results)) {
                        echo "
                                <div class='card'>
                                    <img src='./images/".$rows['image']."'><br>
                                    <strong style='color: #fff; font-weight: bold; font-size: 1.5rem'>".$rows['title']."</strong><br>
                                    <span style='color: #fff; font-weight: normal'>".$rows['imgDesc']."</span>
                                    <span>".$rows['id']."</span>
                                </div>
                            ";
                    }
                ?>
            </div>
        </center>
    </body>
</html>