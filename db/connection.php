<?php
	function db_connection(){
		$server = "10.13.9.113";
		$user = "testuser";
		$password = "testuser123";
		$db_name = "HR";
		$connectionInfo = array( "Database"=>$db_name, "UID"=>$user, "PWD"=>$password);
	    $connection = sqlsrv_connect($server,$connectionInfo);
		if ($connection)
			{
				 //echo 'Connection established.<br />';  #debug
				 return $connection;
			}
		else{
			echo "Connection could not be established.";
			die (print_r(sqlsrv_errors(),true));
			}
	}	
		


?>