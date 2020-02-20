<?php   
include "ayar.php";

if($_GET['islem']=="giris"){
	
	
          $deger=$_POST['deger'];
		  
		  //var_dump($deger);//bu işlemler değer kontrolü için
		  //echo $deger;
		  
		  $data = json_decode($deger);//json dosyasını dönüştürdük
		  
		 // echo($data->email);  //data kontrolü için yapıldı fakat veriyi bu şekilde($data->email) bölebiliyoruz
		 // echo "<br>".($data->pass);  
		  
		  //şimdi bunları değişkene aktaralım
		  $email=$data->email;
		  $pass=$data->pass;
		 
		  
		  			//echo"<br>";			  
		
			//var_dump($db);
			
			$query = "SELECT Count(*) FROM Uyeler WHERE email = '$email' AND password = '$pass'";
			$ret= $db->querySingle($query);	
			//echo $ret;//sonunda 2 veriyor		
		
			if($ret>0)
			{
				$login = true;
				echo $login;
				//echo "Başarılı  : ".$login;
			//$row = sqlite_fetch_array($db->$query);
			//var_dump($ret);
			//if($db->sqlite_num_rows($query) > 0 ){
		/*	while ($row = $db->sqlite_fetch_all($query)) {
			echo "<br /> ID: " .$row['id']. "<br /> email: ".$row['$email']. "<br /> pasword: ".$row['$pass'];*/
		
			}
			
			else 
			{
				$login = true;				
			}			
		}


?> 