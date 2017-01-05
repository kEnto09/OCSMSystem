<?php  
require "dbconnect.php";  

$sqlCommand = "CREATE TABLE customer (
		 		 customerid int(11) NOT NULL auto_increment,
				 name varchar(255) NOT NULL,
				 address varchar(16) NOT NULL,
				 contactnum varchar(16) NOT NULL,
		 		 PRIMARY KEY (customerid),
		 		 UNIQUE KEY customerid (customerid)
		 		 ) ";
if (mysql_query($sqlCommand)){ 
    echo "Your customer table has been created successfully!"; 
} else { 
    echo "CRITICAL ERROR:customer table has not been created.";
}
?>