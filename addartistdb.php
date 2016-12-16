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

        $picture = $_POST["Picture"];
        $artist = $_POST["Artist"];
        $website = $_POST["Website"];


        if(empty($picture)){
            $results = $dbConnection->query("INSERT INTO artists (Artist, Website) VALUES ('$artist','$website');");
        } else {
            $results = $dbConnection->query("INSERT INTO artists (Picture, Artist, Website) VALUES ('$picture','$artist','$website');");
        }


        if (!$results) {
            echo "<script type='text/javascript'>alert('Unsuccessful - Artist Not Added.'); window.location.href = 'artists.php';</script>";
            mysqli_close($dbConnection);
            exit();
        } else {
            echo "<script type='text/javascript'>alert('The artist was successfully added!'); window.location.href = 'artists.php';</script>";
            mysqli_close($dbConnection);
            exit();
        }

    }
}
?>