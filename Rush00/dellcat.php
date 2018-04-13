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
if (!$_POST[name] || $_POST[submit] !== "dell categories")
{
	echo ("ERROR3\n");
	return (0);
}

$name = mysqli_real_escape_string($conn, $_POST[name]);

$sql = "SELECT name, cat_id FROM categories";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
        if ($row['name'] == $name)
        {
             $n = $row['cat_id'];
             break;
        }
    }
}
$sql = "DELETE FROM connect WHERE cat_id=$n";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
$sql = "DELETE FROM categories WHERE cat_id=$n";
if (mysqli_query($conn, $sql)) {
   header("Location: index.php?c=profile&sd=Category deleted successfully");
} else {
   header("Location: index.php?c=profile&sd=Category does not exist");
}