<?php
class Revisions{
	function __construct(){
		include_once 'connection.php';
		$this->conn = db_connection();
	}
	function Get_revisions($query = "select * from Revisions"){
		//$query = "select * from Revisions";
		$sqlResult  = sqlsrv_query($this->conn,$query);
		$temp ="";
		while ($row = sqlsrv_fetch_array($sqlResult))
		{
			$temp .= '{"Id":"'.$row['Id'].'",';
			$temp .= '"Revision": "'.$row['Revision'].'",';
			$temp .= '"Status": "'.$row['Status'].'",';
			$temp .= '"Active": "'.$row['Active'].'",';
			$temp .= '"Path": "'.$row['Active'].'",';
			$temp .= '"Dept": "'.$row['Dept'].'"},';

		}
		$temp = substr($temp,0, -1);
		$json ='{"All":"algo","dataset":[ '.$temp.']}';
		print $json;
		$object = json_decode($json);
		echo $object;
		return  $object;
		
	}
	
}


?>