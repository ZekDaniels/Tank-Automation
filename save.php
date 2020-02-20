<?php   
include "ayar.php";



if($_GET['islem']=="ekleuser"){
          $deger=$_POST['deger'];
		  $data = json_decode($deger);
		  
		  $email=$data->email;
		  $pass=$data->pass;		
		  $confirm_pass=$data->confirm_pass;
		  $personname=$data->personname;
		  $persontc=$data->persontc;
		  $telno=$data->telno;
		  $adress=$data->adress;
			
			$queryemail = "SELECT Count(*) FROM Uyeler WHERE email = '$email'";
			$retmail= $db->querySingle($queryemail);
			$querytc = "SELECT Count(*) FROM Uyeler WHERE persontc = '$persontc'";
			$rettc= $db->querySingle($querytc);				
			if($retmail>0)
		{			
			echo "You have entered a previously registered mail.";				
		}					
			else if($rettc>0)
		{			
			echo "You have entered a previously registered Person TC.";				
		}				
		else 
		{
			$queryadd ="INSERT INTO Uyeler (email,password,personname,persontc,telno,adress) 
			VALUES ('$email','$pass','$personname','$persontc','$telno','$adress')";			 
			 if($db->exec($queryadd))
			 {
				 echo "Succesful";
				  
			 }   
			 else echo "Unsuccesful";	
		}	
		
	}
	
	
	
	if($_GET['islem']=="ekletank"){
          $deger=$_POST['deger'];
		  $data = json_decode($deger);
		  
		  $plate=$data->plate;		 		
		  $product=$data->product;
		  $personname=$data->personname;
		  $telno=$data->telno;
			
			$queryplate = "SELECT Count(*) FROM Tank WHERE plate = '$plate'";
			$retplate= $db->querySingle($queryplate);						
			if($retplate>0)
		{			
			echo "You have entered a previously registered plate.";				
		}										
		else 
		{
			$queryadd ="INSERT INTO Tank (plate,product,personname,telno) 
			VALUES ('$plate','$product','$personname','$telno')";			 
			 if($db->exec($queryadd))
			 {
				 echo "Succesful";
				  
			 }   
			 else echo "Unsuccesful";	
		}	
		
	}
	
	if($_GET['islem']=="eklesensor"){
          $deger=$_POST['deger'];
		  $data = json_decode($deger);	 
		  $tankid=$data->tankid;
		  $plate=$data->plate;
		  $mintemp=$data->mintemp;		 		
		  $maxtemp=$data->maxtemp;
		  $minpress=$data->minpress;
		  $maxpress=$data->maxpress;
		  $minsp=$data->minsp;
		  $maxsp=$data->maxsp;
											
		
			$queryadd ="INSERT INTO Sensor (tankid,plate,mintemp,maxtemp,minpress,maxpress,minsp,maxsp) 
			VALUES ('$tankid','$plate','$mintemp','$maxtemp','$minpress','$maxpress','$minsp','$maxsp')";			 
			 if($db->exec($queryadd))
			 {
				 echo "Succesful";
				  
			 }   
			 else echo "Unsuccesful";	
	
		
	}
		
		
?>