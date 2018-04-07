<?php

	if ($_POST["submit"] != "OK" || $_POST["login"] == NULL || $_POST["passwd"] == NULL)
	{
		echo "ERROR\n";
	}
	else
	{
		$i = 0;
		$dir = "private/";
		$file = "private/passwd";
		if (!file_exists($dir))
			mkdir($dir);
		if (!file_exists($file))
		{
			$unserialized = array();
		}
		else
		{
			$serialized = file_get_contents($file);
			$unserialized = unserialize($serialized);
			foreach ($unserialized as $usr)
			{
				if ($usr["login"] == $_POST["login"])
				{
					echo "ERROR\n";
					return;
				}
				$i++;
			}
		}
		$hashed_pass = hash('sha256', $_POST["passwd"]);
		$user = array("login" => $_POST["login"], "passwd" => $hashed_pass);
		$unserialized[$i] = $user;
		$serialized = serialize($unserialized);
		file_put_contents($file, $serialized);
		echo "OK\n";
	}

?>