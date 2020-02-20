<?php   
include "ayar.php";

if($_GET['islem']=="fillsensor")
{
	
	
		$query = "SELECT * FROM Sensor";					
		$ret = $db->query($query);	
		$count = $db->query("SELECT Count(*) FROM Sensor ");
		while($row = $ret->fetchArray(SQLITE3_ASSOC))
		{
			$rows[] =$row;
		}
		$i = 0;
				
		$data1 =json_encode($rows);	
		//echo" $data1";
		print_r($data1);
	}
?>