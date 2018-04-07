<?php

	function auth($login, $passwd)
	{
		$file = "../ex01/private/passwd";
		$serialized = file_get_contents($file);
		$unserialized = unserialize($serialized);
		foreach ($unserialized as $usr)
		{
			if ($usr["login"] == $login)
			{
				$hashed_passwd = hash("sha256", $passwd);
				if ($hashed_passwd == $usr["passwd"])
				{
					return (TRUE);
				}
			}
		}
		return (FALSE);
	}

?>