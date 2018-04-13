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

$name_prod = mysqli_real_escape_string($conn, $_POST[name_prod]);
$name_cat = mysqli_real_escape_string($conn, $_POST[name_cat]);
$sql = "SELECT name, cat_id FROM categories";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
        if ($row['name'] == $name_cat)
        {
             $cat_id = $row['cat_id'];
             break;
        }
    }
}
if($cat_id == NULL){
	header('Location: ./index.php?c=profile&aad=Category is not found');
}
$sql = "SELECT name, prod_id FROM products";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
        if ($row['name'] == $name_prod)
        {
             $n = $row['prod_id'];
             $sql = "INSERT INTO connect (cat_id, prod_id)
VALUEs ('$cat_id', $n)";
             if (mysqli_query($conn, $sql)) {
                $k = 1;
            }
        }
    }
}
if($k == 1){
	 header('Location: ./index.php?c=profile&aad=product successfully added to category');
}
else{
	header('Location: ./index.php?c=profile&aad=product is not found');
}