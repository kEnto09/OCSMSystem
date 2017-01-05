<?php
require "dbconnect.php";

$sqlCommand = "CREATE TABLE product (
		 		 productid int(11) NOT NULL auto_increment,
				 name varchar(255) NOT NULL,
				 description varchar(16) NOT NULL,
				 stock varchar(16) NOT NULL,
				 category varchar(16) NOT NULL,
		 		 price varchar(16) NOT NULL,
		 		 date_added date NOT NULL,
		 		 PRIMARY KEY (productid),
		 		 UNIQUE KEY productid (productid)
		 		 ) ";
if (mysql_query($sqlCommand)){
    echo "Your products table has been created successfully!";
} else {
    echo "CRITICAL ERROR: products table has not been created.";
}
?>
