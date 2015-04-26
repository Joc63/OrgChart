<?php
	function db_connection(){
		$server = "10.13.105.87";
		$user = "testuser";
		$password = "testsrv123";
		$db_name = "BackToPretestLog";
		try {
			$connectionInfo = array( "Database"=>$db_name, "UID"=>$user, "PWD"=>$password);
	    	$connection = sqlsrv_connect($server,$connectionInfo);	
		}
		catch (SQLException $e) {
			print_r("Error: " . $e->getMessage());
		}
	    return $connection; 
		
	}
	$conn = db_connection();
    $query = "select distinct([from]) as 'From',[to],DATEDIFF(second,[from],[to]) AS 'Duration' from [BackToPretestLog].[dbo].[SeversSync] where [from] > getdate() - 7 group by [from],[to] order by [from] desc";
	$sqlResult  = sqlsrv_query($conn,$query); 
	$NoJsonFrom = "";
	$NoJsonDuration = "";
    while ($row = sqlsrv_fetch_array($sqlResult))
	{
		$NoJsonFrom .= "'".(string)$row['From']->format('Y-m-d H:i:s')."',";
		$NoJsonDuration .= "'".$row['Duration']."',";

   	}
	$NoJsonFrom = substr($NoJsonFrom,0,-1);
	$NoJsonDuration = substr($NoJsonDuration,0, -1);

$NOjson = <<<EOT
{'labels': [$NoJsonFrom],
            'dataset': [
                {
                    'label': 'Duration',
                    'fillColor': 'rgba(151,187,205,0.2)',
                    'strokeColor': 'rgba(151,187,205,1)',
                    'pointColor': 'rgba(151,187,205,1)',
                    'pointStrokeColor': '#fff',
                    'pointHighlightFill': '#fff',
                    'pointHighlightStroke': 'rgba(151,187,205,1)',
                    'data': [$NoJsonDuration]
                }
            ]}
EOT;

echo $NOjson;

?>