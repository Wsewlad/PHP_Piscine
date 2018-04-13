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

if (!$_POST[name] || $_POST[submit] !== "dell user")
{
    echo ("ERROR2\n");
    return (0);
}
$name = mysqli_real_escape_string($conn, $_POST[name]);
if($name === "admin"){
     header("Location: index.php?c=profile&ud=admin can not be removed");
}

$sql = "SELECT login, user_id FROM users";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
        if ($row['login'] == $name)
        {
             $n = $row['user_id'];
             break;
        }
    }
}
$sql = "DELETE FROM users WHERE user_id=$n";
if (mysqli_query($conn, $sql)) {
    header("Location: index.php?c=profile&ud=User deleted successfully");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return(0);
    header("Location: index.php?c=profile&ud=User is not found");
}