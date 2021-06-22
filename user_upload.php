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

// looping through the options and switching the values according to the array keys
foreach (array_keys($options) as $opt) switch ($opt) {

	// short values
	case 'u':
		$baseClass->set_Global_Variable('dbuser',$options['u']);
		$baseClass->get_Global_Variable('dbuser',$options['u']);
	break;

	case 'p':
	print $options['p'];
	break;

	case 'h':
	print $options['h'];
	break;

	case 'n':
	print $options['n'];
	break;

	// long values

	case 'help':
	print 'help';
	break;

	case 'create_table':
	print 'create_table';
	break;

	case 'dry_run':
	print 'dry_run';
	break;

	case 'file':
	print $options['file'];
	break;

}

// define and gather the command line options using getopt -- END


?>