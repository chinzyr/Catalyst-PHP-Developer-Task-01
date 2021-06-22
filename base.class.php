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

		// funciton to get a current value of a public variable
		public function get_Public_Variable($var){
			return $this->$var;
		}

		// funciton to set a value to a public variable
		public function set_Public_Variable($var,$val){
			$this->$var = $val;
		}


		// funciton to get error messages according to the passed error_value
		public function send_Error_Message($error_value){

			switch($error_value){
				case 'noparam':
					$error_msg = "The parameters passed doesn't seem to exist. Please pass a proper parameter or use --help to find out more about parameters.";
				break;

				default:
					$error_msg = "No error value passed. Please contact admin for support";
				break;

			}

			return $error_msg;

		}

	}
?>