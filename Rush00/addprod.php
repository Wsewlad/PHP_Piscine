<?php 
session_start();

// Create connection
$conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR1\n");
	return (0);
}

//prot
$name = mysqli_real_escape_string($conn, $_POST[name]);
$description = mysqli_real_escape_string($conn, $_POST[description]);
$stock = mysqli_real_escape_string($conn, $_POST[stock]);
$img = mysqli_real_escape_string($conn, $_POST[img]);
$price = mysqli_real_escape_string($conn, $_POST[price]);
//

$sql = "INSERT INTO products (name, description, stock, img, price)
VALUEs ('$name', '$description', '$stock', '$img', '$price')";
if (mysqli_query($conn, $sql)){
    header('Location: ./index.php?c=profile&sp=product created successfully');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}