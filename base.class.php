<?php
/**
* Name : Catalyst-PHP-Developer-Task-01
* Date : 23-06-2021
* Dev : Chinzy Ranasinghe
* File : Base.class file used by the user_upload.php to execute the required functions.
**/

	class base{

		// adding public variables, default values are being set for WAMP

		public $dbhost = 'localhost';
		public $dbname = 'userdetails';
		public $dbuser = 'root';
		public $dbpass = '';

		public function get_Global_Variable($var){
			print $this->$var;
		}

		public function set_Global_Variable($var,$val){
			$this->$var = $val;
		}

	}
?>