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
		public $userfile = '';

		// function to get a current value of a public variable
		public function get_Public_Variable($var){
			return $this->$var;
		}

		// function to set a value to a public variable
		public function set_Public_Variable($var,$val){
			$this->$var = $val;
		}


		// function to get error messages according to the passed error_value
		public function send_Error_Message($error_value){

			switch($error_value){
				case 'noparam':
					$error_msg = "The parameters passed doesn't seem to exist. Please pass a proper parameter or use --help to find out more about parameters.";
				break;

				case 'fileerror':
					$error_msg = "The file name/path you provided or file extension is not valid. Please make sure your file is a valid CSV file and the path is correct.";
				break;

				default:
					$error_msg = "No error value passed. Please contact admin for support";
				break;

			}

			return $error_msg;

		}

		// function returns on screen help when the --help parameter is passed.		 
		public function print_help_message(){

			$help_text = "Catalyst IT Australia - TASK 01 - SCRIPT HELP".PHP_EOL;

			$help_text .= "-u : This parameter is used to set the MySQL username.".PHP_EOL;

			$help_text .= "-p : This parameter is used to set the MySQL password.".PHP_EOL;

			$help_text .= "-h : This parameter is used to set the MySQL host.".PHP_EOL;

			$help_text .= "-n : This parameter is used to set the MySQL database.".PHP_EOL;

			$help_text .= "--file : This parameter is used to pass the CSV file name which needs to be parsed. System only accepts CSV files.".PHP_EOL;

			$help_text .= "--create_table : This parameter is used to create the users table in for the passed in database details.".PHP_EOL;

			$help_text .= "--dry_run : This parameter is used to execute all functions other than updating the Database table. --file parameter is required to execute this function.".PHP_EOL;

			$help_text .= "--help : This parameter is used access help Section for this script".PHP_EOL;

		
			return $help_text;

		}

		// function checks whether the passed filename and location is valid.
		// This returns an array as this will be used when full run or dry run is called.
		public function file_Validity_Check($filename){

			$is_ValidFile = false; //  keeping a bool value to check the file validity
			$filename = trim($filename);
			$return_array = array(false,$this->send_Error_Message('fileerror'));
			
			if (file_exists($filename)) {				
				$file_info = pathinfo($filename);
				if($file_info['extension'] == "csv"){
					$is_ValidFile = true;
				}
			}

			if($is_ValidFile){
				$this->set_Public_Variable('userfile',$filename);
				$return_array = array(true, "File path and extension is valid.");
			}

			return $return_array;


		}

	}
?>