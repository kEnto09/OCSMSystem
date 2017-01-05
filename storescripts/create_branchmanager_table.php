<?php
require "dbconnect.php";

$sqlCommand = "CREATE TABLE bm8 (
		 		 id int(11) NOT NULL auto_increment,
				 name varchar(24) NOT NULL,
				 username varchar(24) NOT NULL,
		 		 password varchar(24) NOT NULL,
		 		 last_log_date date NOT NULL,
		 		 PRIMARY KEY (id),
		 		 UNIQUE KEY username (username)
		 		 ) ";
if (mysql_query($sqlCommand)){
    echo "Your branchmanger table has been created successfully!";
} else {
    echo "CRITICAL ERROR: branchmanager table has not been created.";
}
?>
