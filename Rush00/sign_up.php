<?php 
session_start();

if ($_POST[submit2] == "return")
{
    header('Location: ./index.php');
    return (0);
}
if ($_POST[submit3] == "sign in")
{
    header('Location: ./index.php?c=signing_in');
    return (0);
}
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
print_r($_POST);
if (!$_POST[fn] || !$_POST[ln] || !$_POST[login] || !$_POST[passwd] || $_POST[submit] !== "OK" || !$_POST[mail])
{
	echo ("ERROR2\n");
	return (0);
}

$sql = "SELECT login FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {

        if ($row['login'] == $_POST['login'])
        {
			header('Location: ./dreg.php?error=Such user exist');
			return(0);
		}
    }  
}

$login = mysqli_real_escape_string($conn, $_POST[login]);
$fn = mysqli_real_escape_string($conn, $_POST[fn]);
$ln = mysqli_real_escape_string($conn, $_POST[ln]);
$passwd = mysqli_real_escape_string($conn, $_POST[passwd]);
$mail = mysqli_real_escape_string($conn, $_POST[mail]);
$fn = htmlspecialchars($fn);
$ln = htmlspecialchars($ln);
$passwd = htmlspecialchars($passwd);
$main = htmlspecialchars($main);
$login = htmlspecialchars($login);
$passwd = hash("sha512", $passwd);

$sql = "INSERT INTO Users (login, password, firstname, lastname, email)
VALUES ('$login', '$passwd', '$fn', '$ln', '$mail')";

if (mysqli_query($conn, $sql)) {
    $_SESSION["logged_in_user"] = $login;
    header('Location: ./index.php');
    return(0);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
return(1);
?>