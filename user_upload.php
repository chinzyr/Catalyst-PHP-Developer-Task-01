<?php
/**
* Name : Catalyst-PHP-Developer-Task-01
* Date : 23-06-2021
* Dev : Chinzy Ranasinghe
* Question : Create a PHP script that is executed form the command line which accepts a CSV file as input and processes the CSV file user details into a created database table.
**/

// including new base class to file
require_once('base.class.php');
$baseClass = new base();

// define and gather the command line options using getopt -- START

// defining short values
$shortoptions  = "u:"; 	// -u to gather the database username
$shortoptions  .= "p:"; // -p to gather the database password
$shortoptions  .= "h:"; // -h to gather the database host
$shortoptions  .= "n:"; // -n to gather the database name, this is an optional value as the database name will be set to userdetails

// defining long values
$longoptions  = array(
    "file:",     		// Gets the passed csv file that needs to be parsed
    "help",        		// executes the help section and displays to the user
    "create_table",  	// executes table creation process
    "dry_run", 			// executes dry run process but is dependent on the file input
);

// gathering options
$options = getopt($shortoptions, $longoptions);

// Checking whether options were passed.
if(count($options)){
	
	// This bool variable has been set to check whether the data should be processed, valudated and inserted into the database. If it's a dry_run or if any variables are missing this will automatically be set to false.

	$full_run = true;
	
	// looping through the options and switching the values according to the array keys
	foreach (array_keys($options) as $opt) {

		switch ($opt) {

			// short options
			case 'u':
				$baseClass->set_Public_Variable('dbuser',$options['u']);
			break;

			case 'p':
				$baseClass->set_Public_Variable('dbpass',$options['p']); 
			break;

			case 'h':
				$baseClass->set_Public_Variable('dbhost',$options['h']);
			break;

			case 'n':
				$baseClass->set_Public_Variable('dbname',$options['n']);
			break;

			// long options

			case 'help':
				$full_run = false;
				print $baseClass->print_help_message();
			break;

			case 'create_table':
				$full_run = false;
				$return_Data =  $baseClass->manage_Users_Table();
				print $return_Data[1];				
			break;

			case 'dry_run':
				$full_run = false;
				print $baseClass->dry_Run($options['file']);				
			break;

			
			 	
		}

	}

	if($full_run){
		print "FULL RUN YES";
	}


}else{
	// Send error message is no parameters were passed or incorrect ones are passed
	print $baseClass->send_Error_Message('noparam');
}

// define and gather the command line options using getopt -- END


?>