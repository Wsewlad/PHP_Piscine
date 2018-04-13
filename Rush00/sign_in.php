<?php 
session_start();

if ($_POST[submit2] == "return")
{
    header('Location: index.php');
    return (0);
}
if ($_POST[submit3] == "sign up")
{
    header('Location: index.php?c=registration');
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

if (!$_POST[login] || !$_POST[passwd] || $_POST[submit1] !== "OK")
{
	echo ("ERROR2\n");
	return (0);
}
$login = mysqli_real_escape_string($conn, $_POST[login]);
$passwd = mysqli_real_escape_string($conn, $_POST[passwd]);
$sql = "SELECT login , password FROM users";
$result = mysqli_query($conn, $sql);
$passwd = hash("sha512", $passwd);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {

        if ($row['login'] == $login && $row['password'] == $passwd)
        {
        	$_SESSION["logged_in_user"] = $row['login'];
			header('Location: ./index.php');
			return(0);
		}
    } 
    header('Location: index.php?c=signing_in?error=Incorect login or password');
}