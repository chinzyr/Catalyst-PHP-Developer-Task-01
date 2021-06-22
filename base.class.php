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
		public $dbuser = 'rootx';
		public $dbpass = '';
		public $userfile = '';

		// function to execute needfu initial scripts when adding the class.
		function __construct() {
	        // mysqli return errors transfered to normal errors to handle via try catch exceptions.
	        mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);

	    }

		// function to get a current value of a public variable
		public function get_Public_Variable($var){
			return $this->$var;
		}

		// function to set a value to a public variable
		public function set_Public_Variable($var,$val){
			$this->$var = $val;
		}

		// function checks and creates the database connection.
		public function DB_Con(){
						
			try {
				// Creating mysqli database connection
				return $dbconn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

			}catch(mysqli_sql_exception $e){
				print 'Database connection failed for the provided host details. Please pass valid host details and try again.';
				exit();
			}

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

				case 'tblrepaireerror':
					$error_msg = "There was an error repairng the users table. Please try again.";
				break;

				case 'tblcreateeerror':
					$error_msg = "There was an error creating the users table. Please try again.";
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

		// function manages the creation/ rebuild(repairs) of the users table on the database.
		public function manage_Users_Table(){

			$returnMsg = "";

			// calling the Database Connection
			$db = $this->DB_Con();
			$sql_table_exist = "SELECT 1 FROM users";

			// Checking whether the table exist to decide whether to create or repair table
			if ($db->query($sql_table_exist) !== FALSE) { // if table exist we repair the table

				$sql_repire_table = "REPAIR TABLE users";
			
				if ($db->query($sql_repire_table) !== FALSE){
					$returnMsg = "Users Table Successfully Repaired";
				}else{
					$returnMsg = $this->send_Error_Message("tblrepaireerror");
				}
				
			} else { // if table does not exist we create the table

			  $sql_table_create = "CREATE TABLE `userdetails`.`users` ( `uid` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(70) NOT NULL , `surname` VARCHAR(70) NOT NULL , `email` VARCHAR(150) NOT NULL , `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`uid`), UNIQUE `unique-email-address` (`email`)) ENGINE = MyISAM;";

			  if ($db->query($sql_table_create) !== FALSE){
					$returnMsg = "Users Table Successfully Created";
				}else{
					$returnMsg = $this->send_Error_Message("tblcreateeerror");
				}

			}

			$db->close(); // closing database connection
			return $returnMsg;

		}



	}
?>