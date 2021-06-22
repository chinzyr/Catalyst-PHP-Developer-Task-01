<?php
/**
* Name : Catalyst-PHP-Developer-Task-01
* Date : 23-06-2021
* Dev : Chinzy Ranasinghe
* Question : Create a PHP script that is executed form the command line which accepts a CSV file as input and processes the CSV file user details into a created database table.
**/


// define and gather the command line options using getopt -- START

// defining short values
$shortoptions  = "u:"; // -u to gather the database username
$shortoptions  .= "p:"; // -u to gather the database password
$shortoptions  .= "h:"; // -u to gather the database host
$shortoptions  .= "n:"; // -u to gather the database name, this is an option value as the database name will be set to userdetails

// gathering options
$options = getopt($shortoptions);

var_dump($options);

// define and gather the command line options using getopt -- END


?>