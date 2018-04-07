<?php

	session_start();
	
	if ($_SESSION != NULL)
		$_SESSION["loggued_on_user"] = "";

?>