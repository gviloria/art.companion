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

        $artwork = $_POST["Artwork"];
        $medium = $_POST["Medium"];
        $artist = $_POST["Artist"];
        $title = $_POST["Title"];

        if(empty($artwork) && empty($title) && empty($artist)) {
            $results = $dbConnection->query("INSERT INTO art (Medium) VALUES ('$medium');");

        } else if (!empty($artwork) && empty($title) && !empty($artist)) {
            $results = $dbConnection->query("INSERT INTO art (Artwork, Artist, Medium) VALUES ('$artwork', '$artist', '$medium');");

        } else if (!empty($artwork) && empty($title) && empty($artist)) {
            $results = $dbConnection->query("INSERT INTO art (Artwork, Medium) VALUES ('$artwork','$medium');");

        } else if (!empty($artwork) && !empty($title) && empty($artist)) {
            $results = $dbConnection->query("INSERT INTO art (Artwork, Title, Medium) VALUES ('$artwork', '$title','$medium');");

        } else if (empty($artwork) && !empty($title) && empty($artist)) {
            $results = $dbConnection->query("INSERT INTO art (Title, Medium) VALUES ('$title','$medium');");

        } else if (empty($artwork) && !empty($title) && !empty($artist)) {
            $results = $dbConnection->query("INSERT INTO art (Title, Artist, Medium) VALUES ('$title', '$artist', '$medium');");

        } else if (empty($artwork) && empty($title) && !empty($artist)) {
            $results = $dbConnection->query("INSERT INTO art (Artist, Medium) VALUES ('$artist','$medium');");

        } else {
            $results = $dbConnection->query("INSERT INTO art (Artwork, Title, Artist, Medium) VALUES ('$artwork','$title','$artist','$medium');");
        }

        if (!$results) {
            echo "<script type='text/javascript'>alert('Unsuccessful - Art Not Added.'); window.location.href = 'favoritegallery.php';</script>";
            mysqli_close($dbConnection);
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Art successfully added to favorites!'); window.location.href = 'favoritegallery.php';</script>";
            mysqli_close($dbConnection);
            exit();
        }

        mysqli_close($dbConnection);
        header("Location: favoritegalleryartonly.php"); /* Redirect browser */
        exit();
    }
}
?>