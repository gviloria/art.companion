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

$query = "SELECT * FROM artists";
$result = mysqli_query($dbConnection, $query);

if ($result = $dbConnection->prepare("DELETE FROM artists WHERE id = ? LIMIT 1"))
{
    $result->bind_param("i",$id);
    $result->execute();
    $result->close();
}

echo "<script type='text/javascript'>alert('The artist was successfully removed.'); window.location.href = 'artistlist.php';</script>";
mysqli_close($dbConnection);
exit();

?>