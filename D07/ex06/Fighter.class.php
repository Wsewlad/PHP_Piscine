<?php

	class Fighter
	{
		private $type;

		public function __construct($t)
		{
			$this->type = $t;
		}

		public function getType()
		{
			return $this->type;
		}
	}

?>