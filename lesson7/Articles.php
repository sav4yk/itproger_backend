<?php
	class Articles {
		private $_db = null;

		public function __construct() {
			$this->_db = DB::getInstance();
		}

		public function getAll() {
			$result = $this->_db->query("SELECT * FROM `articles`");
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>
