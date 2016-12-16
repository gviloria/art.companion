<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'testdb';

    $dbConnection = new mysqli($host, $user, $pass, $db);

    if (mysqli_connect_errno()) {
        printf("Could not connect to the mySQL database: %s\n", mysqli_connect_error());
        exit();
    }

    if($_POST) {

        $id = $_POST["id"];
        $artwork = $_POST["Artwork"];
        $title = $_POST["Title"];
        $medium = $_POST["Medium"];
        $description = $_POST["Description"];

        if($results = $dbConnection->prepare("UPDATE my_art SET Artwork = ?, Title = ?, Medium = ?, Description = ? WHERE id = $id;")) {
            $results->bind_param("ssss", $artwork, $title, $medium, $description);
            $results->execute();
            $results->close();
        } else {
            echo 'Error';
        }

        if (!$results) {
            echo "<script type='text/javascript'>alert('Unsuccessful - Info Not Updated.'); window.location.href = 'gallery.php';</script>";
            mysqli_close($dbConnection);
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Info has successfully been updated!'); window.location.href = 'gallery.php';</script>";
            mysqli_close($dbConnection);
            exit();
        }

        mysqli_close($dbConnection);
        header("Location: galleryartonly.php"); /* Redirect browser */
        exit();
    }
}
?>