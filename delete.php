<?php   
include "ayar.php";



if($_GET['islem']=="siluser"){
          $deger=$_POST['deger'];
		  $data = json_decode($deger);
		 
		  $id = $data->id;
		
		  $querydelete ="DELETE FROM Uyeler  WHERE id=$id";
			
		if(	$db->exec($querydelete))
		{			 
				 echo "Succesful";
		}
		else  echo "Unsuccesful";
	}
	
if($_GET['islem']=="siltank"){
          $deger=$_POST['deger'];
		  $data = json_decode($deger);
		 
		  $id = $data->id;
		
		  $querydelete ="DELETE FROM Tank  WHERE id=$id";
			
		if(	$db->exec($querydelete))
		{			 
				 echo "Succesful";
		}
		else  echo "Unsuccesful";
	}

if($_GET['islem']=="silsensor"){
          $deger=$_POST['deger'];
		  $data = json_decode($deger);
		 
		  $id = $data->id;
		
		  $querydelete ="DELETE FROM Sensor  WHERE id=$id";
			
		if(	$db->exec($querydelete))
		{			 
				 echo "Succesful";
		}
		else  echo "Unsuccesful";
	}
		
	
?>