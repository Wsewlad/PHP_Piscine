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

if (!$_POST[name] || $_POST[submit] !== "add categories")
{
	echo ("ERROR2\n");
	return (0);
}
$name = mysqli_real_escape_string($conn, $_POST[name]);
$sql = "SELECT name FROM categories";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
        if ($row['name'] == $name)
        {
            header('Location: ./index.php?c=profile&sc=category already exist');
			return(0);
		}
    }
   
}
$sql = "INSERT INTO categories (name)
VALUEs ('$name')";
if (mysqli_query($conn, $sql)) {
    header('Location: ./index.php?c=profile&sc=category created successfully');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}