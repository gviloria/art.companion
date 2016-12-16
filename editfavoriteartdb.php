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
        $artist = $_POST["Artist"];

        if($results = $dbConnection->prepare("UPDATE art SET Artwork = ?, Title = ?, Artist = ?, Medium = ? WHERE id = $id;")) {
            $results->bind_param("ssss", $artwork, $title, $artist, $medium);
            $results->execute();
            $results->close();
        } else {
            echo 'Error';
        }

        if (!$results) {
            echo "<script type='text/javascript'>alert('Unsuccessful - Art Not Updated.'); window.location.href = 'favoritegallery.php';</script>";
            mysqli_close($dbConnection);
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Art has been successfully updated!'); window.location.href = 'favoritegallery.php';</script>";
            mysqli_close($dbConnection);
            exit();
        }

        mysqli_close($dbConnection);
        header("Location: favoritegalleryartonly.php"); /* Redirect browser */
        exit();
    }
}
?>