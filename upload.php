<?php 
    header("Allow-Access-Control-Orign: *");

    include "config.php";

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $name = $_FILES['image'];
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);

    $to = __DIR__."/images/";
    $unid = md5(uniqid());

    $file_name = $unid.$name['name'];

    $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

    $sql_statement = "INSERT INTO images(title, image, imgDesc, device_name) VALUES('$title', '$file_name', '$desc', '$host')";

    if (move_uploaded_file($name['tmp_name'], $to.$file_name)) {
        if (mysqli_query($conn, $sql_statement)) {
            $response_array = array("response" => "OK");

            echo json_encode($response_array);
        } else {
        $response_array = array("response" => "ERROR");

        echo json_encode($response_array);
    }
    } else {
        $response_array = array("response" => "ERROR");

        echo json_encode($response_array);
    }
?>