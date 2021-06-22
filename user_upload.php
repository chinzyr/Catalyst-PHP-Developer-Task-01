<?php
/**
* Name : Catalyst-PHP-Developer-Task-01
* Date : 23-06-2021
* Dev : Chinzy Ranasinghe
* Question : Create a PHP script that is executed form the command line which accepts a CSV file as input and processes the CSV file user details into a created database table.
**/


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

var_dump($options);

// define and gather the command line options using getopt -- END


?>