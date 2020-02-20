<?php 
include "ayar.php";
if($_GET['islem']=="guncelleuser")
	{
		
		$deger=$_POST['deger'];
		  $data = json_decode($deger);
		 
		  $id = $data->id;
		  $email=$data->email;
		  $pass=$data->pass;		
		  $confirm_pass=$data->confirm_pass;
		  $personname=$data->personname;
		  $persontc=$data->persontc;
		  $telno=$data->telno;
		  $adress=$data->adress;
		  
/*
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
		{*/
	$queryupdate ="UPDATE Uyeler SET email = '$email',password = '$pass', personname = '$personname',persontc = '$persontc',telno = '$telno', adress = '$adress' WHERE id=$id";
			
		if(	$db->exec($queryupdate))
		{			 
				 echo "Succesful";
		}
		else 	 echo "Unsuccesful";
		//} email tc kontrolünün parantezi ondan yorum satırı yaptım
	}





if($_GET['islem']=="guncelletank")
	{
		
		$deger=$_POST['deger'];
		  $data = json_decode($deger);
		 
		  $id = $data->id;
		  $plate=$data->plate;
		  $personname=$data->personname;
		  $telno=$data->telno;
		  $product=$data->product;
		  		 
				 
		$queryplate = "SELECT Count(*) FROM Tank WHERE plate = '$plate'";
		$retplate= $db->querySingle($queryplate);								 
		if($retplate>0)
		{			
			echo "You have entered a previously registered plate.";				
		}	
		else
		{
	$queryupdate ="UPDATE Tank SET plate = '$plate', personname = '$personname', telno = '$telno', product = '$product' WHERE id=$id";
			
		if(	$db->exec($queryupdate))
		{			 
				 echo "Succesful";
		}
		else 	 echo "Unsuccesful";
		}	
	}


if($_GET['islem']=="guncellesensor")
	{
		
		$deger=$_POST['deger'];
		  $data = json_decode($deger);
		 
		  $id=$data->id;
		  $mintemp=$data->mintemp;		 		
		  $maxtemp=$data->maxtemp;
		  $minpress=$data->minpress;
		  $maxpress=$data->maxpress;
		  $minsp=$data->minsp;
		  $maxsp=$data->maxsp;
		  		 
				 
		
	$queryupdate ="UPDATE Sensor SET mintemp = '$mintemp', maxtemp = '$maxtemp', minpress = '$minpress', maxpress = '$maxpress'
, minsp = '$minsp', maxsp = '$maxsp' WHERE id=$id";
			
		if(	$db->exec($queryupdate))
		{			 
				 echo "Succesful";
		}
		else 	 echo "Unsuccesful";
		}	
	



	?>