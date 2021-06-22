# Catalyst-PHP-Developer-Task-01
### Developer Details
Name : Catalyst-PHP-Developer-Task-01

Date : 23-06-2021

Dev : Chinzy Ranasinghe

### Question
Create a PHP script that is executed form the command line which accepts a CSV file as input and processes the CSV file user details into a created database table.

### Documentation

### User Help

-u : This parameter is used to set the MySQL username.

-p : This parameter is used to set the MySQL password.

-h : This parameter is used to set the MySQL host.

-n : This parameter is used to set the MySQL database.

--file : This parameter is used to pass the CSV file name which needs to be parsed. System only accepts CSV files formats. If the filename or any folder has spaces please enclose the file path text within "". ex: php user_upload.php --file "C:\Users\sample\Downloads\csv files\users.csv"

--create_table : This parameter is used to create the users table in for the passed in database details.

--dry_run : This parameter is used to execute all functions other than updating the Database table. --file parameter is required to execute this function.

--help : This parameter is used access help Section for this script


### Example CMD executions

Accessing Help : php user_upload.php --help

Creating Table Help : php user_upload.php -u rttt -p xxx -h ddd -n sss --create_table

Dry Run : php user_upload.php -u rttt -p xxx -h ddd -n sss --file sample.csv --dry_run

Full Run the Script : php user_upload.php -u rttt -p xxx -h ddd -n sss --file sample.csv


### Assumption Notes

** It is assumed that create_table or dry_run or help is passed into the Command line, the script will not execute fully and insert data into the database.

** It is assumed that the accepted file extension is only CSV. 

** As there are many methods to rebuild the database table, I have choosen the option to repire the table as rebuilding.