<?php   
include "ayar.php";

if($_GET['islem']=="giris")
	{
         $deger=$_POST['deger'];		  			  
		 $data = json_decode($deger);
		
		 $email=$data->email;
		 $pass=$data->pass;
		 			
		$query = "SELECT Count(*) FROM Uyeler WHERE email = '$email' AND password = '$pass'";
		$ret= $db->querySingle($query);	
		
		if($ret>0)
		{
			$login = true;
			echo $login;				
		}				
		else 
		{
			$login = false;				
		}			
	}
		
		
if($_GET['islem']=="doldur")
	{
		$row = array();
		$query = "SELECT Count(*) FROM Uyeler ";					
		$sth = $db->querySingle($query);	
		$row = $sth->fetch($db->FETCH_ASSOC);
		
		/*
		while () {
			echo "<br /> ID: " .$row['id']. "<br /> email: ".$row['$email']. "<br /> pasword: ".$row['$pass'];
			}

	*/
	}
?> 