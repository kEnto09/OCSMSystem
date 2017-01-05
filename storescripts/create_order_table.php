<?php
// This file is www.developphp.com curriculum material
// Written by Adam Khoury January 01, 2011
// http://www.youtube.com/view_play_list?p=442E340A42191003
// Connect to the MySQL database  
require "dbconnect.php";  

$sqlCommand = "CREATE TABLE order (
		 		 orderid int(11) NOT NULL auto_increment,
				 customerid int(11) NULL,
				 branchid id(11)  NULL,
				 productid int(11)  NULL,
		 		 totalprice varchar(16) NOT NULL,
		 		 PRIMARY KEY (orderid)
		 		 ) ";
if (mysql_query($sqlCommand)){ 
    echo "Your products table has been created successfully!"; 
} else { 
    echo "CRITICAL ERROR: products table has not been created.";
}
?>