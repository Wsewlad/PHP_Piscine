<?php
    session_start();
?> 
<html>
<head>
	<title>RUSH00</title>
	<link rel="stylesheet" href="css/rush00.css">
</head>
<body>
	<div id="wrap">
        <?php include("html/header.html"); ?>
        <div id="main">
        <?php
            if ($_GET["c"] == NULL || $_GET["c"] == "categories")
                include("html/categories.html");
            else if ($_GET["c"] == "items")
                include("html/items.html");
            else if ($_GET["c"] == "profile")
                include("html/profile.html");
            else if ($_GET["c"] == "signing_in")
                include("html/signing_in.html");
            else if ($_GET["c"] == "registration")
                include("html/registration.html");
            ?>
         </div>
        <?php include("html/footer.html"); ?>
    </div>
</body>
</html>