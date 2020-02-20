<?php class MyDB extends SQLite3{
	
function __construct()
		{
			$this->open('./Database/Login.db');
		}
}
$db = new MyDB(); 
if(isset($login) && $login==false)
{
$login =false;
}
?>