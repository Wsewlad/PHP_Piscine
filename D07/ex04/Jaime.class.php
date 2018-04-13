<?php

	class Jaime extends Lannister
	{
		private $class;

		public function sleepWith($parter)
		{
			$this->$class = get_class($parter);
			if ($this->$class == "Tyrion")
			{
				print("Not even if I'm drunk !".PHP_EOL);
			}
			else if ($this->$class == "Sansa")
			{
				print("Let's do this.".PHP_EOL);
			}
			else if ($this->$class == "Cersei")
			{
				print("With pleasure, but only in a tower in Winterfell, then.".PHP_EOL);
			}
		}
	}

?>