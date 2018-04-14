<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Awesome Starships Battles II</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="wraper">
		<?php include("includes/header.html");
				include("includes/navbar_top.html"); ?>
		<div id="main">
        <?php
            if ($_GET["c"] == "profile")
                include("includes/profile.html");
            else if ($_GET["c"] == "signing_in")
                include("includes/signing_in.html");
            else if ($_GET["c"] == "registration")
                include("includes/registration.html");
            else if ($_GET["c"] == "lobby")
                include("includes/lobby.html");
            else if ($_GET["c"] == "players")
                include("includes/players.html");
            else
            	include("includes/main.html");
            ?>
         </div>
	</div>	
</body>
</html>