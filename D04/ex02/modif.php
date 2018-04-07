<?php

	if ($_POST["submit"] != "OK" || $_POST["login"] == NULL || $_POST["oldpw"] == NULL || $_POST["newpw"] == NULL)
	{
		echo "ERROR\n";
	}
	else
	{
		$i = 0;
		$file = "../ex01/private/passwd";
		$serialized = file_get_contents($file);
		$unserialized = unserialize($serialized);
		foreach ($unserialized as $usr)
		{
			if ($usr["login"] == $_POST["login"])
			{
				$hashed_old = hash("sha256", $_POST["oldpw"]);
				if ($hashed_old != $usr["passwd"])
				{
					echo "ERROR\n";
					return;
				}
				$hashed_new = hash("sha256", $_POST["newpw"]);
				$unserialized[$i]["passwd"] = $hashed_new;
				$serialized = serialize($unserialized);
				file_put_contents($file, $serialized);
				echo "OK\n";
				return;
			}
			$i++;
		}
		echo "ERROR\n";
	}

?>