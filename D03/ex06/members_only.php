<?php	
	if ($_SERVER['PHP_AUTH_USER'] != "zaz" || $_SERVER['PHP_AUTH_PW'] != "jaimelespetitsponeys")
	{
	    header("HTTP/1.0 401 Unauthorized");
		header("WWW-Authenticate: Basic realm=''Member area''");
	    echo "<html><body>That area is accessible for members only</body></html>\n";
	}
	else
	{
		$encoded = base64_encode(file_get_contents("../img/42.png"));
		echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64,$encoded'>\n</body></html>\n";
	}
?>