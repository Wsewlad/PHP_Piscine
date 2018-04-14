<?php

// Create connection
$conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);
// Check connection
if (!$conn) {
    header('Location: install.php');
    return (0);
}

$sql = "SELECT * FROM chat";
$result = mysqli_query($conn, $sql);

?>