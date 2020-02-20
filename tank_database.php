<?php   
include "ayar.php";
	

if($_GET['islem']=="filltank")
	{
		
		$query = "SELECT * FROM Tank ";					
		$ret = $db->query($query);	
		$count = $db->query("SELECT Count(*) FROM Tank ");
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