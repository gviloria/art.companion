<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'testdb';

$dbConnection = new mysqli($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    printf("Could not connect to the mySQL database: %s\n", mysqli_connect_error());
    exit();
}

$id = $_GET["id"];

$query = "SELECT * FROM my_art";
$result = mysqli_query($dbConnection, $query);

if ($result = $dbConnection->prepare("DELETE FROM my_art WHERE id = ? LIMIT 1"))
{
    $result->bind_param("i",$id);
    $result->execute();
    $result->close();
}

echo "<script type='text/javascript'>alert('The artwork was successfully deleted'); window.location.href = 'galleryartonly.php';</script>";
mysqli_close($dbConnection);
exit();

?>