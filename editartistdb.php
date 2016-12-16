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
        $artist = $_POST["Artist"];
        $picture = $_POST["Picture"];
        $website = $_POST["Website"];

        if($results = $dbConnection->prepare("UPDATE artists SET Artist = ?, Picture = ?, Website = ? WHERE id = $id;")) {
            $results->bind_param("sss", $artist, $picture, $website);
            $results->execute();
            $results->close();
        } else {
            echo 'Error';
        }

        if (!$results) {
            echo "<script type='text/javascript'>alert('Artist not updated.'); window.location.href = 'artistlist.php';</script>";
            mysqli_close($dbConnection);
            exit();
        } else {
            echo "<script type='text/javascript'>alert('The artist\'s info has been successfully updated!'); window.location.href = 'artistlist.php';</script>";
            mysqli_close($dbConnection);
            exit();
        }

        mysqli_close($dbConnection);
        header("Location: artistlist.php"); /* Redirect browser */
        exit();
    }
}
?>