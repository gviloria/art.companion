<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'testdb';

    $dbConnection = new mysqli($host, $user, $pass, $db);

    if (mysqli_connect_errno()) {
        printf("Could not connect to the mySQL database: %s\n", mysqli_connect_error());
        exit();
    }

    if ($_POST) {

        $artwork = $_POST["Artwork"];
        $title = $_POST["Title"];
        $medium = $_POST["Medium"];
        $description = $_POST["Description"];

        if (empty($artwork) && empty($title)) {
            $results = $dbConnection->query("INSERT INTO my_art (Medium, Description) VALUES ('$medium','$description');");

        } else if (!empty($artwork) && empty($title)) {
            $results = $dbConnection->query("INSERT INTO my_art (Artwork, Medium, Description) VALUES ('$artwork','$medium','$description');");

        } else if (empty($artwork) && !empty($title)) {
            $results = $dbConnection->query("INSERT INTO my_art (Title, Medium, Description) VALUES ('$title','$medium','$description');");

        } else {
            $results = $dbConnection->query("INSERT INTO my_art (Artwork, Title, Medium, Description) VALUES ('$artwork','$title','$medium','$description');");

        }


        if (!$results) {
            echo "<script type='text/javascript'>alert('Unsuccessful - Artwork Not Added.'); window.location.href = 'galleryartonly.php';</script>";
            mysqli_close($dbConnection);
            exit();
        } else {
            echo "<script type='text/javascript'>alert('The artwork was successfully added!'); window.location.href = 'galleryartonly.php';</script>";
            mysqli_close($dbConnection);
            exit();
        }

    }
}
?>